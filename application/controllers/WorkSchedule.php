<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WorkSchedule extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation', 'upload');
    $this->load->model('app_model', 'workschedule_model', 'properti_model');
    $this->load->helper(array('form', 'url'));
    $this->load->library('encryption');
  }
  public function getevent_grup()
  {
    check_not_login();
    $PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
    $Periodeend =  date("Y-m-d", strtotime("2021-12-20"));

    $start = html_escape($this->input->get("start", TRUE));
    $end = html_escape($this->input->get("end", TRUE));
    $startdt = new DateTime('now'); // setup a local datetime
    $startdt->setTimestamp($start); // Set the date based on timestamp
    $start_format = $startdt->format('Y-m-d');
    $enddt = new DateTime('now'); // setup a local datetime
    $enddt->setTimestamp($end); // Set the date based on timestamp
    $end_format = $enddt->format('Y-m-d');
    $sql = $this->workschedule_model->getEventGrup($PeriodeStart, $Periodeend);
    $data = [];
    foreach ($sql->result() as $key) {
      $endDate = $key->end_work;
      $data[] = array(
        'id' => encrypt_url($key->id_schedule),
        'title' => $key->Nama_jadwal,
        'start' => $key->start_work,
        'end' => $endDate,
        'grup' => $key->nama_grup
      );
    }
    echo json_encode(array("events" => $data));
    exit;
  }
  public function workScheduleGrup()
  {

    check_not_login();
    $NIK = $this->session->userdata('NIK');
    $PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
    $Periodeend =  date("Y-m-d", strtotime("2021-12-20"));
    // $data['user'] = $this->db->get_where('tbl_karyawan', ['NIK' => $id_user]);
    // $data['karyawan'] = $this->db->query("SELECT * FROM tbl_karyawan LEFT JOIN tbl_departemen ON tbl_karyawan.id_departemen = tbl_departemen.id_departemen WHERE tbl_karyawan.NIK ='$id_user' ");
    // $data['title'] = "Page Form Work schedule Nippisun";
    // $data['jadwal'] = $this->db->query("SELECT * FROM tbl_jenis_jadwal");
    $sql = $this->app_model->getDataPribadi($NIK);
    $data['user'] = $sql;
    $data['title'] = "Page Form Work schedule Nippisun";
    $data['jadwal'] = $this->properti_model->getDataJadwal();
    $data['getGrup'] = $this->workschedule_model->getGrup($PeriodeStart, $Periodeend);
    $this->template->load('template', 'workSchedulegrup', $data);
  }

  public function workschedule_DataPersonGrup()
  {
    check_not_login();
    $NIK = $this->session->userdata('NIK');
    $sql = $this->app_model->getDataPribadi($NIK);
    $data['user'] = $sql;
    $data['title'] = "Page Form Work schedule Nippisun";

    $this->template->load('template', 'DataGrupPerson', $data);
  }
  public function addGrup()
  {
    check_not_login();
    $this->form_validation->set_rules("namaGrup", "NamaGrup", "required");
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('error', 'Berhasil Menyetujui Permohonan');
      redirect('workschedule/workScheduleGrup');
    }
    $name = html_escape($this->input->post("namaGrup", TRUE));
    $getGrup = $this->workschedule_model->getGrupByname($name);
    $numGrup = $getGrup->num_rows();
    if ($numGrup > 0) {
      $this->session->set_flashdata('error', 'Grup Sudah Ada');
      redirect('workschedule/workScheduleGrup');
    } else {
      $data = array(
        'id_grup' => uniqid(),
        'nama_grup' => $name,
        'date_Created' => date("Y-m-d")
      );
      $this->workschedule_model->insertGrup($data);
      if ($this->db->affected_rows() == 1) {
        $this->session->set_flashdata('success', 'Grup Berhasil Ditambahkan');
        redirect('workschedule/workScheduleGrup');
      } else {
        $this->session->set_flashdata('error', 'Grup Gagal Ditambahkan');
        redirect('workschedule/workScheduleGrup');
      }
    }
  }
  public function addScheduleGrup()
  {
    check_not_login();
    $this->form_validation->set_rules("addNameGrup", "AddNameGrup", "required");
    $this->form_validation->set_rules("addStartDate", "AddStartDate", "required");
    $this->form_validation->set_rules("addEndDate", "AddEndDate", "required");
    $this->form_validation->set_rules("jenisshift", "JenisShift", "required");
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('error', 'Input Tidak Boleh Kosong');
      redirect('workschedule/workScheduleGrup');
    } else {
      $PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
      $Periodeend =  date("Y-m-d", strtotime("2021-12-20"));
      $nameGrup = html_escape($this->input->post("addNameGrup", TRUE));
      $addStartDate = html_escape(date('Y-m-d H:i:s', strtotime(htmlspecialchars($this->input->post("addStartDate", TRUE)))));
      $addEndDate = html_escape(date('Y-m-d H:i:s', strtotime(htmlspecialchars($this->input->post("addEndDate", TRUE)) . "23:59:00")));
      $idJadwal = html_escape(decrypt_url($this->input->post("jenisshift", TRUE)));
      $getGrup = $this->workschedule_model->getGrupByname($nameGrup)->row_array();
      $idGrup = $getGrup['id_grup'];
      $id_scheduleGrup = uniqid();
      if (($addStartDate >= $PeriodeStart || $addStartDate <= $Periodeend) && ($addEndDate <= $Periodeend)) {
        $data = array(
          "id_schedule" => $id_scheduleGrup,
          "id_grup" => $idGrup,
          "id_jadwal" => $idJadwal,
          "start_work" => $addStartDate,
          "end_work" => $addEndDate,
          "date_created" => date('Y-m-d H:i:s'),
          "date_update" => NULL,
          "Periode" => date("Y-m")
        );
        $checkgrup = $this->workschedule_model->getKaryawanByGrup($idGrup);
        $numRow = $checkgrup->num_rows();
        $index = 0;
        $dataPerson = array();
        if ($numRow > 0) {
          foreach ($checkgrup->result_array() as $key => $row) {
            $NIK = $row['NIK'];
            array_push(
              $dataPerson,
              array(
                'id_workperson' => uniqid(),
                "id_schedule" => $id_scheduleGrup,
                'NIK' => $NIK,
                'id_grup' => $idGrup,
                'date_created' => date('Y-m-d H:i:s'),
                'date_update' => NULL,
                'start_work' => $addStartDate,
                'end_work' => $addEndDate,
                'id_jadwal' => $idJadwal,
                "Periode" => date("Y-m")
              )
            );
            $index++;
          }
          $this->db->insert_batch("tbl_workSchedulePerson", $dataPerson);
          if ($this->db->affected_rows() < 1) {
            $this->session->set_flashdata('error', 'Gagal Membuat Schedule Person');
            redirect("workschedule/workScheduleGrup");
          }
        }
        $this->workschedule_model->addScheduleGrup($data);
        if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'Berhasil Membuat Schedule Grup');
          redirect("workschedule/workScheduleGrup");
        } else {
          $this->session->set_flashdata('error', 'Gagal Membuat Permohonan');
          redirect("workschedule/workScheduleGrup");
        }
      } else {
        $this->session->set_flashdata('error', 'Upps Schedule Melebihi Periode');
        redirect("workschedule/workScheduleGrup");
      }
    }
  }
  public function updateScheduleGrup()
  {
    check_not_login();
    $this->form_validation->set_rules("updateNameGrup", "AddNameGrup", "required");
    $this->form_validation->set_rules("updateStartDate", "AddStartDate", "required");
    $this->form_validation->set_rules("updateEndDate", "AddEndDate", "required");
    $this->form_validation->set_rules("updatejenisshift", "JenisShift", "required");
    $this->form_validation->set_rules("id_schedule", "Id_schedule", "required");
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('error', 'Input Tidak Boleh Kosong');
      redirect('workschedule/workScheduleGrup');
    } else {
      $id_scheduleGrup = html_escape(decrypt_url($this->input->post("id_schedule", TRUE)));
      $PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
      $Periodeend =  date("Y-m-d", strtotime("2021-12-20"));
      $nama_grup = html_escape($this->input->post("updateNameGrup",TRUE));
      $Grupname = $this->workschedule_model->getGrupByname($nama_grup)->row_array();
      $idGrup = $Grupname['id_grup'];
      $addStartDate = html_escape(date('Y-m-d H:i:s', strtotime(htmlspecialchars($this->input->post("updateStartDate", TRUE)))));
      $addEndDate = html_escape(date('Y-m-d H:i:s', strtotime(htmlspecialchars($this->input->post("updateEndDate", TRUE)) . "23:59:00")));
      $idJadwal = html_escape(decrypt_url($this->input->post("updatejenisshift", TRUE)));
      if (($addStartDate >= $PeriodeStart || $addStartDate <= $Periodeend) && ($addEndDate >= $Periodeend)) {
        $this->session->set_flashdata('error', 'Upps Schedule Melebihi Periode');
        redirect("workschedule/workScheduleGrup");
      } else {
        $checkChange = html_escape($this->input->post("updatePerson", TRUE));
        //Pengecekan Update Schedule Person
        if ($checkChange == "ON") {
          $checkgrup = $this->workschedule_model->getKaryawanByGrup($idGrup);
          $numRow = $checkgrup->num_rows();
          $index = 0;
          $dataPerson = array();
          if ($numRow > 0) {
            foreach ($checkgrup->result_array() as $key => $row) {
              array_push(
                $dataPerson,
                array(
                  'id_schedule'=>$id_scheduleGrup,
                  'date_update' => date("Y-m-d H:i:s"),
                  'start_work' => $addStartDate,
                  'end_work' => $addEndDate,
                  'id_jadwal' => $idJadwal,
                  "Periode" => date("Y-m")
                )
              );
              $index++;
            }
            $this->db->update_batch('tbl_workSchedulePerson', $dataPerson,'id_schedule');
            if ($this->db->affected_rows() < 1) {
              $this->session->set_flashdata('error', 'Gagal Update Schedule Person');
              redirect("workschedule/workScheduleGrup");
            }
          }
        }
        $data = array(
          "id_jadwal" => $idJadwal,
          "start_work" => $addStartDate,
          "end_work" => $addEndDate,
          "date_update" => date('Y-m-d H:i:s'),
          "Periode" => date("Y-m")
        );
        $this->workschedule_model->updateScheduleGrup($id_scheduleGrup, $data);
        if ($this->db->affected_rows() == 1) {
          $this->session->set_flashdata('success', 'Berhasil Membuat Permohonan');
          redirect("workschedule/workScheduleGrup");
        } else {
          $this->session->set_flashdata('error', 'Gagal Membuat Permohonan');
          redirect("workschedule/workScheduleGrup");
        }
      }
      // $id_scheduleGrup = html_escape(decrypt_url($this->input->post("id_schedule", TRUE)));
      // $dateNow = date("Y-m");
      // $addStartDate = html_escape(date('Y-m-d H:i:s', strtotime(htmlspecialchars($this->input->post("updateStartDate", TRUE)))));
      // $addEndDate = html_escape(date('Y-m-d H:i:s', strtotime(htmlspecialchars($this->input->post("updateEndDate", TRUE)) . "23:59:00")));
      // $idJadwal = html_escape(decrypt_url($this->input->post("updatejenisshift", TRUE)));


      // // if ($addStartDate > $dateNow || $addEndDate < $addStartDate) {
      // //   $data = array(
      // //     "id_jadwal" => $idJadwal,
      // //     "start_work" => $addStartDate,
      // //     "end_work" => $addEndDate,
      // //     "date_update" => date('Y-m-d H:i:s'),
      // //     "Periode" => date("Y-m")
      // //   );
      // //   $this->workschedule_model->updateScheduleGrup($id_scheduleGrup, $data);
      // //   if ($this->db->affected_rows() == 1) {
      // //     $this->session->set_flashdata('success', 'Berhasil Membuat Permohonan');
      // //     redirect("workschedule/workScheduleGrup");
      // //   } else {
      // //     $this->session->set_flashdata('error', 'Gagal Membuat Permohonan');
      // //     redirect("workschedule/workScheduleGrup");
      // //   }
      // // } else {
      // //   $this->session->set_flashdata('error', 'Upps Schedule Melebihi Periode');
      // //   redirect("workschedule/workScheduleGrup");
      // // }
      // // }
    }
  }
  // workschedule person
  public function workschedule_person()
  {
    check_not_login();
    $PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
    $Periodeend =  date("Y-m-d", strtotime("2021-12-20"));
    $NIK = $this->session->userdata('NIK');
    $sql = $this->app_model->getDataPribadi($NIK);
    $data['user'] = $sql;
    $data['title'] = "Page Form Work schedule Nippisun";
    $data['jadwal'] = $this->properti_model->getDataJadwal();
    $data['karyawan'] = $this->app_model->getKaryawan();
    // $this->load->view('header.php', $data);
    // $this->load->view('SchedulePerson', $data);
    // $this->load->view('footer.php', $data);
    $this->template->load('template', 'scheduleperson', $data);
  }
  public function workschedule_addperson()
  {

    check_not_login();
    $PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
    $Periodeend =  date("Y-m-d", strtotime("2021-12-20"));
    $NIK = $this->session->userdata('NIK');
    $sql = $this->app_model->getDataPribadi($NIK);
    $data['user'] = $sql;
    $data['getGrup'] = $this->workschedule_model->getGrup($PeriodeStart, $Periodeend);
    $data['title'] = "Page Form Work schedule Nippisun";
    $data['karyawan'] =  $this->app_model->getKaryawan();


    // $this->load->view('header.php', $data);
    // $this->load->view('workschedule_addperson', $data);
    // $this->load->view('footer.php', $data);
    $this->template->load('template', 'addperson', $data);
  }
  public function callPersonByGrup()
  {
    check_not_login();
    if (isset($_GET['namaGrup']) != null) {
      $namaGrup = $_GET['namaGrup'];
      $getGrup = $this->workschedule_model->getGrupByname("$namaGrup")->row_array();
      $id_grup = $getGrup['id_grup'];
      $result = $this->workschedule_model->getKaryawanByGrup($id_grup);
      $num_row = $result->num_rows();
      $users_arr = array();
      if ($num_row > 0) {
        foreach ($result->result_array() as $row => $value) {
          $NIK = $value['NIK'];
          $nama = $value['Name'];
          $departemenName = $value['DepartemenName'];
          $Enskripsi = encrypt_url($value['NIK']);
          $users_arr[] = array("NIK" => $NIK, "nama" => $nama, "DepartemenName" => $departemenName, "Enskripsi" => $Enskripsi);
        }
      }
      echo json_encode($users_arr);
      exit;
    }
  }
  public function getPersonByName()
  {
    check_not_login();
    if (isset($_GET['nama']) != null) {
      $namaKaryawan = $_GET['nama'];
      $sql = $this->app_model->getKaryawanByName($namaKaryawan);
      foreach ($sql->result_array() as $value) {
        $NIK = $value['NIK'];
        $nama = $value['Name'];
        $departemenName = $value['DepartemenName'];
        $users_arr[] = array("NIK" => $NIK, "nama" => $nama, "DepartemenName" => $departemenName);
      }
      echo json_encode($users_arr);
      exit;

      // encoding array to json format

    }
  }
  public function addPersonToGrup()
  {
    check_not_login();

    $this->form_validation->set_rules('nik', 'NIK', 'required');
    $this->form_validation->set_rules('namegrup', 'Namegrup', 'required');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('error', 'Check Kembali Input Anda/ Input Tidak Boleh Kosong');
      redirect("workschedule/workschedule_addperson");
    } else {
      $nik = html_escape(decrypt_url($this->input->post('nik', TRUE)));
      $nama_grup = html_escape($this->input->post('namegrup', TRUE));
      $getSchedulekaryawan = $this->workschedule_model->getschedulekaryawan($nik)->num_rows();

      if ($getSchedulekaryawan > 0) {
        $this->session->set_flashdata('error', 'Karyawan Sudah Ditambahkan');
        redirect("workschedule/workschedule_addperson");
      } else {
        $data = array();
        $dataPerson = array();
        $sql = $this->workschedule_model->getGrupByname($nama_grup);
        $PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
        $Periodeend =  date("Y-m-d", strtotime("2021-12-20"));
        foreach ($sql->result_array() as $key => $value) :
          $scheduleGrup = $this->workschedule_model->getscheduleGrupbyid($PeriodeStart, $Periodeend, $value['id_grup']);
          $checkRow = $scheduleGrup->num_rows();
          if ($checkRow > 0) {
            foreach ($scheduleGrup->result_array() as $key => $row) {
              $id_schedulegrup = $row['id_schedule'];
              array_push(
                $data,
                array(
                  'id_workperson' => uniqid(),
                  'NIK' => $nik,
                  'id_grup' => $value['id_grup'],
                  'id_schedule' => $id_schedulegrup,
                  'date_created' => date('Y-m-d H:i:s'),
                  'date_update' => NULL,
                  'start_work' => $row['start_work'],
                  'end_work' => $row['end_work'],
                  'id_jadwal' => $row['id_jadwal'],
                  'Periode' => date("Y-m")
                )
              );
              array_push(
                $dataPerson,
                array(
                  'NIK' => $nik,
                  'id_grup' => $value['id_grup'],
                  'date_created' => date('Y-m-d H:i:s')
                )
              );
            }
          } else {
            $this->session->set_flashdata('error', 'SSchedule Grup Belum Dibuat! Silahkan Buat Terlebih Dahulu');
            redirect("workschedule/workschedule_addperson");
          }
        endforeach;
        $this->db->insert_batch("tbl_HistoryPerson", $dataPerson);
        $this->db->insert_batch("tbl_workSchedulePerson", $data);
        if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('success', 'Schedule Person Berhasil Dibuat');
          redirect("workschedule/workschedule_addperson");
        } else {
          $this->session->set_flashdata('error', 'Schedule Person Berhasil Dibuat');
          redirect("workschedule/workschedule_addperson");
        }
      }
    }
  }
  public function deletePersonFromGrup($NIK)
  {
    check_not_login();
    $nik = decrypt_url($NIK);
    $getKaryawan = $this->app_model->getkaryawan($nik)->row_array();
    $this->workschedule_model->deletePersonFromGrup($nik);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '' . $getKaryawan['Name'] . ' Berhasil Di Hapus Dari Grup');
      redirect("workschedule/workschedule_addperson");
    } else {
      $this->session->set_flashdata('error', '' . $getKaryawan['Name'] . ' Gagal Di Hapus Dari Grup');
      redirect("workschedule/workschedule_addperson");
    }
  }
  public function getSchedulePerson()
  {
    check_not_login();
    $PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
    $sql = $this->workschedule_model->getEventPerson($PeriodeStart);
    $data = [];
    foreach ($sql->result() as $key) {
      $endDate = $key->end_work;
      $data[] = array(
        'id' => encrypt_url($key->id_workperson),
        'id_schedule'=>encrypt_url($key->id_schedule),
        'title' => $key->Nama_jadwal,
        'start' => $key->start_work,
        'end' => $endDate,
        'grup' => $key->nama_grup,
        'namaKaryawan' => $key->Name
      );
    }
    echo json_encode(array("events" => $data));
    exit;
  }
  public function updateSchedulePerson()
  {
    check_not_login();
    
    $this->form_validation->set_rules("updateNameGrup", "AddNameGrup", "required");
    $this->form_validation->set_rules("updateNameEmployee", "AddNameEmployeee", "required");
    $this->form_validation->set_rules("updateStartDate", "AddStartDate", "required");
    $this->form_validation->set_rules("updateEndDate", "AddEndDate", "required");
    $this->form_validation->set_rules("updatejenisshift", "JenisShift", "required");
    $this->form_validation->set_rules("id_schedulePerson", "Id_schedule", "required");
    $this->form_validation->set_rules("id_scheduleGrup","Id_scheduleGrup","required"); 
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('error', 'Input Tidak Boleh Kosong');
      redirect('workschedule/workschedule_person');
    } else {
      $PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
      $Periodeend =  date("Y-m-d", strtotime("2021-12-20"));
      $namaGrup = html_escape($this->input->post("updateNameGrup",True));
      $GetGrup = $this->workschedule_model->getGrupByname($namaGrup)->row_array();
      $idGrup = $GetGrup['id_grup'];
      $StartDate = html_escape(date('Y-m-d H:i:s', strtotime(htmlspecialchars($this->input->post("updateStartDate", TRUE)))));
      $data = array();
      $checkChangeGrup = html_escape($this->input->post("updatePersonByGrup",true));
      $NoEndWork = html_escape($this->input->post("updatePersonDontKnowEndWork",true));
      $idJadwal = html_escape(decrypt_url($this->input->post("updatejenisshift", TRUE)));
      $id_workPerson = html_escape(decrypt_url($this->input->post("id_schedulePerson", TRUE)));
      // pengecekan update by grup
      if($checkChangeGrup == "ON"){
       $getGrup = $this->workschedule_model->getScheduleGrupByStartWork($idGrup,$StartDate);
       $checkGrup = $getGrup->num_rows();
       $DataGrup = $getGrup->row_array();
       if($checkGrup > 0){
          $data = array(
                "id_jadwal" =>$DataGrup['id_jadwal'],
                "start_work" => $DataGrup['start_work'],
                "end_work" => $DataGrup['end_work'],
                "date_update" => date('Y-m-d'),
                
                "Periode" => date("Y-m")
          );
       }else{
        $this->session->set_flashdata('error', 'Uppss Schedule Grup Tidak Ditemukan !');
        redirect('workschedule/workschedule_person');
       }
      }
      //pengecekan update Not End Work
      else if ($NoEndWork == "ON"){
        
        $StartDate = html_escape(date('Y-m-d H:i:s', strtotime(htmlspecialchars($this->input->post("updateStartDate", TRUE)))));
        $endDate = date('Y-m-d H:i:s',strtotime("$StartDate +1 years 23 hours 0 minutes 0 seconds "));
        $data = array(
              "id_jadwal" => $idJadwal,
              "start_work" => $StartDate,
              "end_work" => $endDate,
              "date_update" => date('Y-m-d'),
              "Periode" => date("Y-m")
            );
      }else if($checkChangeGrup =="" || $checkChangeGrup =="" ){
        $EndDate = html_escape(date('Y-m-d H:i:s', strtotime(htmlspecialchars($this->input->post("updateEndDate", TRUE)) . "23:59:00")));
        $data = array(
              "id_jadwal" => $idJadwal,
              "start_work" => $StartDate,
              "end_work" => $EndDate,
              "date_update" => date('Y-m-d'),
              "Periode" => date("Y-m")
            );
      }
      else{
        $this->session->set_flashdata('error', 'Upss Terjadi Kesalahan Tolong Periksa Kembali Input Anda');
      redirect('workschedule/workschedule_person');
      }
      //pengecekan Periode
      if ($StartDate <= $PeriodeStart || $StartDate >= $Periodeend) {
        $this->session->set_flashdata('error', 'Upps Schedule Melebihi Periode');
        redirect("workschedule/workschedule_person");
      } else {
       
        $this->workschedule_model->updateSchedulePerson($id_workPerson, $data);
        if ($this->db->affected_rows() == 1) {
          $this->session->set_flashdata('success', 'Berhasil Mengubah Schedule Person');
          redirect("workschedule/workschedule_person");
        } else {
          $this->session->set_flashdata('error', 'Gagal Mengubah Schedule Person');
          redirect("workschedule/workschedule_person");
        }
      }
    }
  }
  public function workschedule_personHistory()
  {
    check_not_login();
    $PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
    $Periodeend =  date("Y-m-d", strtotime("2021-12-20"));
    $NIK = $this->session->userdata('NIK');
    $sql = $this->app_model->getDataPribadi($NIK);
    $data['user'] = $sql;
    $data['title'] = "Page Form History Schedule Nippisun";
    $data['HistoryEmployee'] = $this->workschedule_model->getHistoryPerson($PeriodeStart, $Periodeend);
    // $this->load->view('header.php', $data);
    // $this->load->view('SchedulePerson', $data);
    // $this->load->view('footer.php', $data);
    $this->template->load('template', 'HistoryPersonGrup', $data);
  }
  public function workCalendar()
  {
    $NIK = $this->session->userdata('NIK');
    $sql = $this->app_model->getDataPribadi($NIK);
    $data['user'] = $sql;
    $data['title'] = "Page Work Calender";
    $this->template->load('template', 'workcalender', $data);
  }
}
