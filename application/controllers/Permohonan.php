<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Permohonan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_not_login();
    ini_set('memory_limit', '256M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
    ini_set('sqlsrv.ClientBufferMaxKBSize', '524288'); // Setting to 512M
    ini_set('pdo_sqlsrv.client_buffer_max_kb_size', '524288');
    $this->load->library('form_validation', 'upload');
    $this->load->model('permohonan_model', 'app_model', 'keperluancuti_m', 'jenispermohonan_m');
    $this->load->helper(array('form', 'url'));
    $this->load->library('encryption');
  }
  /*<!--**********************************
            Permohonan Karyawan
            ***********************************-->
  */
  public function datakaryawancuti()
  {
    $NIK = $this->session->userdata('NIK');
    $id_rule = $this->session->userdata('id_rule');
    $sql = $this->app_model->getDataPribadi($NIK);
    $departemen_name = $sql['DepartemenName'];
    $PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
    $Periodeend =  date("Y-m-d", strtotime("2021-12-20"));
    if ($id_rule == 2) {
      $data['permohonanKaryawan']   = $this->permohonan_model->allDataPermohonanKaryawan($PeriodeStart, $Periodeend);
    } else {
      // $data['permohonan']   = $this->db->query("SELECT * from tbl_permintaan_cuti LEFT join tbl_karyawan on
      // tbl_permintaan_cuti.NIK=tbl_karyawan.NIK LEFT JOIN tbl_jeniskeperluancuti on tbl_permintaan_cuti.id_jeniskeperluancuti=tbl_jeniskeperluancuti.id_jeniskeperluancuti WHERE id_departemen='$id_departemen'");
      $data['permohonanKaryawan']   = $this->permohonan_model->DataPermohonanKaryawanByDepartemen($departemen_name, $PeriodeStart, $Periodeend);
    }


    // else{
    //  $data['data']      = $this->db->query("SELECT * from tbl_permintaan left join (tbl_barang,tbl_unit,tbl_puskesmas) on tbl_permintaan.id_unit=tbl_unit.id_unit and tbl_permintaan.id_barang=tbl_barang.id_barang and tbl_permintaan.id_puskesmas=tbl_puskesmas.id_puskesmas ");
    // }

    $data['user'] = $sql;
    $data['title'] = "Data Karyawan Cuti Page Nippisun";
    // $this->load->view('header', $data);
    // $this->load->view('tabel_karyawan_cuti', $data);
    // $this->load->view('footer', $data);
    $this->template->load('template', 'tabel_karyawan_cuti', $data);
  }
  /*<!--**********************************
            Permohonan Pribadi 
            ***********************************-->
  */
  public function datapribadicuti()
  {

    $NIK = $this->session->userdata('NIK');
    $data['user'] = $this->app_model->getDataPribadi($NIK);


    //   $data['datacutipribadi'] =  $this->db->query("SELECT * from tbl_permintaan_cuti FULL OUTER join tbl_karyawan on
    // tbl_permintaan_cuti.NIK=tbl_karyawan.NIK FULL OUTER join tbl_jeniskeperluancuti on tbl_permintaan_cuti.id_jeniskeperluancuti=tbl_jeniskeperluancuti.id_jeniskeperluancuti WHERE tbl_permintaan_cuti.NIK = '$id_admin'");
    $data['datacutipribadi'] = $this->permohonan_model->getDataPermohonanPribadi($NIK);

    // else{
    //  $data['data']      = $this->db->query("SELECT * from tbl_permintaan left join (tbl_barang,tbl_unit,tbl_puskesmas) on tbl_permintaan.id_unit=tbl_unit.id_unit and tbl_permintaan.id_barang=tbl_barang.id_barang and tbl_permintaan.id_puskesmas=tbl_puskesmas.id_puskesmas ");
    // }


    $data['title'] = "Data Cuti Pribadi Page Nippisun";
    // $this->load->view('header', $data);
    // $this->load->view('tabel_cuti_pribadi', $data);
    // $this->load->view('footer', $data);
    $this->template->load('template', 'tabel_cuti_pribadi', $data);
  }
  /*<!--**********************************
            Form add Permohonan
            ***********************************-->
  */
  public function form_cuti()
  {

    $NIK = $this->session->userdata('NIK');
    $data['user'] = $this->app_model->getDataPribadi($NIK);
    $data['jeniskeperluancuti'] = $this->keperluancuti_m->getkeperluancuti();
    $data['jenispermohonan'] = $this->jenispermohonan_m->getpermohonan();
    // $data['tgllibur'] = $this->permohonan_model->getKalenderKerja();
    $data['num_rows'] = $this->permohonan_model->getDataPermohonanPribadi($NIK)->num_rows();
    $data['title'] = "Page Form Cuti Nippisun";
    $this->template->load('template', 'form_cuti', $data);
  }
  /*<!--**********************************
            add Permohonan
            ***********************************-->
  */
  public function jadwalKerjaNonShift()
    {
      // Tanggalan Libur
      $libur = $this->permohonan_model->getKalenderKerja();
      foreach ($libur as $u){
        $jsonCode[] = date('d/m/Y',strtotime($u->tanggal_libur));
      }

      // Tanggalan Hari Pengganti
      $harpeng = $this->permohonan_model->getKalenderKerjaHP();
      foreach ($harpeng as $i) { $hariKP[] = date('d-m-Y',strtotime($i->tanggal_libur)); }

      $date1 = "01-01-2022";
      $date2 = "31-12-2022";
        
      $pecahTgl1 = explode("-", $date1);
        
      $tgl1 = $pecahTgl1[0];
      $bln1 = $pecahTgl1[1];
      $thn1 = $pecahTgl1[2];
        
      $i = 0;
      $sum = 0;
        
        do {
        $tanggal = date("d-m-Y", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1));
        if (date("w", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1)) == 0)
        {
            $sum++;
            $sabtu = date('d-m-Y', strtotime("-1 day", strtotime($tanggal)));
            $sabming[] = $sabtu;
            $sabming[] = $tanggal;
        }     
        $i++;
        } while ($tanggal <= $date2);

        $sabming = \array_diff($sabming, $hariKP);

        foreach($sabming as $s){ $array[] = date('d/m/Y',strtotime($s)); }

        array_unique(array_merge($array,$jsonCode), SORT_REGULAR);

        // var_dump($array);
        echo json_encode($array);
        exit;
    }
  public function addcuti()
  {

    $NIK = $this->session->userdata('NIK');
    $getKaryawan = $this->app_model->getDataPribadi($NIK);
    $this->form_validation->set_rules('jenispermohonan', 'Jenispermohonan', 'required|Trim');
    $this->form_validation->set_rules('totalHari', 'TotalHari', 'required|Trim');
    $this->form_validation->set_rules('tanggalOut', 'TanggalOut', 'required|Trim');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('error', 'Check Kembali Input Anda / Kolom Tidak Boleh Kosong!!');
      redirect('permohonan/form_cuti');
    } else {
      $nama_permohonan = html_escape($this->input->post('jenispermohonan', TRUE));
      $getJenisPermohonan  = $this->jenispermohonan_m->getpermohonanByName($nama_permohonan)->row_array();
      $id_permohonan = $getJenisPermohonan['id_jenispermohonan'];
      $tanggalOut = html_escape($this->input->post('tanggalOut', TRUE));
      $totalHari = html_escape($this->input->post('totalHari', TRUE));
      $batas_cuti = $getKaryawan['batas_cuti'];
      $keterangan = null;
      $detimeter = ",";
      $tanggalValue = explode($detimeter, $tanggalOut);
      $tanggalAwal = date("Y-m-d", strtotime($tanggalValue[0]));
      $deathPengajuan = date("Y-m-d", strtotime("+1 week"));
      $foto = null;
      // var_dump($_POST, $tanggalValue, $tanggalAwal, date("Y-m-d", strtotime("+1 day")) >= $tanggalOut, count(array($tanggalOut)) );
      // die();
      if ($nama_permohonan == "Permohonan Cuti Mendadak" || $nama_permohonan == "Permohonan Cuti Tahunan") {
        if ($totalHari > $batas_cuti) {
          $this->session->set_flashdata('error', "Maaf Batas Cuti Anda Tersisa: $batas_cuti hari");
          redirect('permohonan/form_cuti', 'refresh');
        } else {
          if ($nama_permohonan == "Permohonan Cuti Tahunan") {
            if ($tanggalAwal < $deathPengajuan) {
              $this->session->set_flashdata('error', "Pengajuan Kurang Dari Seminggu !!");
              redirect('permohonan/form_cuti', 'refresh');
            }
          }
        }
      }
      if ($nama_permohonan != "Permohonan Cuti Tahunan") {
        if ($nama_permohonan != "Permohonan Business Trip") {
          if ($nama_permohonan == "Permohonan Cuti Khusus") {
            $this->form_validation->set_rules('keperluan', 'Keperluan', 'required|Trim');
            if ($this->form_validation->run() == false) {
              $this->session->set_flashdata('error', 'Check Kembali Input Anda / Kolom Tidak Boleh Kosong!!');
              redirect('permohonan/form_cuti', 'refresh');
            } else {
              $keterangan = html_escape($this->input->post('keperluan', TRUE));
            }
          } else {
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|Trim');
            if ($this->form_validation->run() == false) {
              $this->session->set_flashdata('error', 'Check Kembali Input Anda / Kolom Tidak Boleh Kosong!!');
              redirect('permohonan/form_cuti', 'refresh');
            } else {
              $keterangan = html_escape($this->input->post('keterangan', TRUE));
            }
          }
        }
        $this->load->library('upload');
        $assets = FCPATH . './assets/picture/izin';
        $foto = $_FILES['uploadizin']['name'];
        if ($foto) {
          $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
          $config['max_size']     = '5048';
          $config['upload_path'] = $assets;
          $this->upload->initialize($config);
          if ($this->upload->do_upload('uploadizin')) {
            $foto = $this->upload->data('file_name');
          } else {
            $this->session->set_flashdata('error', 'File Hanya Boleh Image atau PDF dan tidak boleh lebih dari 5 MB!!');
            redirect('permohonan/form_cuti', 'refresh');
          }
        } else {
          $this->session->set_flashdata('error', 'Check Kembali Input Anda / Kolom Tidak Boleh Kosong!!');
          redirect('permohonan/form_cuti', 'refresh');
        }
      }
    }
    $data = array(
      'id_cuti' => uniqid(),
      'TanggalOut' => $tanggalOut,
      'id_jenispermohonan' => $id_permohonan,
      'keterangan' => $keterangan,
      'buktiLeave' => $foto,
      'totalLeave' => $totalHari,
      'status' => 0,
      'date_created' => date('Y-m-d H:i:s',now("Asia/Jakarta")),
      'date_update' => null,
      'note' => null,
      'NIK' => $NIK
    );
    $this->db->insert('tbl_permintaan_cuti', $data);
    if ($this->db->affected_rows() == 1) {
      $this->session->set_flashdata('success', 'Berhasil Membuat Permohonan');
      redirect("permohonan/datapribadicuti");
    } else {
      $this->session->set_flashdata('error', 'Gagal Membuat Permohonan');
      redirect("permohonan/form_cuti");
    }
  }
  /*<!--**********************************
            Form Update Permohonan
            ***********************************-->
  */
  public function form_updatecuti($id_permohonanleave)
  {

    $id_permohonanleave = decrypt_url($id_permohonanleave);
    $NIK = $this->session->userdata('NIK');
    $data['user'] = $this->app_model->getDataPribadi($NIK);
    $data['data_permohonanpribadi'] = $this->permohonan_model->getDataPermohonanLeave($id_permohonanleave);
    $data['num_rows'] = $this->permohonan_model->getDataPermohonanPribadi($NIK)->num_rows();
    $data['jeniskeperluancuti'] = $this->keperluancuti_m->getkeperluancuti();
    $data['getjenispermohonan'] = $this->jenispermohonan_m->getpermohonan();
    $data['title'] = "Page Form Cuti Nippisun";
    $this->template->load('template', 'edit_cutipribadi', $data);
  }
  /*<!--**********************************
            Update Permohonan
            ***********************************-->
  */
  public function updatepermohonan()
  {

    $NIK = $this->session->userdata('NIK');
    $getKaryawan = $this->app_model->getDataPribadi($NIK);
    $this->form_validation->set_rules('updatejenispermohonan', 'updateJenispermohonan', 'required|Trim');
    $this->form_validation->set_rules('updateIdPermohonan', 'ID_permohonan', 'required');
    $this->form_validation->set_rules('updatetotalHari', 'updateTotalHari', 'required|Trim');
    $this->form_validation->set_rules('updatetanggalOut', 'TanggalOut', 'required|Trim');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('error', 'Check Kembali Input Anda / Kolom Tidak Boleh Kosong!!');
      redirect('permohonan/datapribadicuti/', 'refresh');
    } else {
    	var_dump($_POST);
    	die();
      $id_permohonan = decrypt_url(html_escape($this->input->post('updateIdPermohonan', TRUE)));
      $getDataPermohonan = $this->permohonan_model->getDataPermohonanLeave($id_permohonan)->row_array();
      if ($getDataPermohonan['status'] == 0) {
        $nama_permohonan = html_escape($this->input->post('updatejenispermohonan', TRUE));
        $tanggalOut = html_escape(date("Y-m-d", strtotime($this->input->post('updatetanggalOut', TRUE))));
        $totalHari = html_escape($this->input->post('updatetotalHari', TRUE));
        $batas_cuti = $getKaryawan['batas_cuti'];
        $keterangan = null;
        $detimeter = ",";
        $tanggalValue = explode($detimeter, $tanggalOut);
        $tanggalAwal = date("Y-m-d", strtotime($tanggalValue[0]));
        $deathPengajuan = date("Y-m-d", strtotime("+1 week"));
        $foto = null;
        $userPermohonan = $this->permohonan_model->getDataPermohonanLeave($id_permohonan)->row_array();
        if ($nama_permohonan == "Permohonan Cuti Mendadak" || $nama_permohonan == "Permohonan Cuti Tahunan") {
          if ($totalHari > $batas_cuti) {
            $this->session->set_flashdata('error', "Maaf Batas Cuti Anda Tersisa: $batas_cuti hari");
            redirect("permohonan/form_updatecuti/" . encrypt_url($id_permohonan));
          } else {
            if ($nama_permohonan == "Permohonan Cuti Tahunan") {
              if ($tanggalAwal <= $deathPengajuan) {
                $this->session->set_flashdata('error', "Pengajuan Kurang Dari Seminggu !!");
                redirect("permohonan/form_updatecuti/" . encrypt_url($id_permohonan));
              }
            }
          }
        }
        if ($nama_permohonan != "Permohonan Cuti Tahunan") {
          if ($nama_permohonan != "Permohonan Business Trip") {
            if ($nama_permohonan == "Permohonan Cuti Khusus") {
              $this->form_validation->set_rules('updatekeperluan', 'updateKeperluan', 'required|Trim');
              if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('error', 'Check Kembali Input Anda / Kolom Tidak Boleh Kosong!!');
                redirect("permohonan/form_updatecuti/" . encrypt_url($id_permohonan));
              } else {
                $keterangan = html_escape($this->input->post('updatekeperluan', TRUE));
              }
            } else {
              $this->form_validation->set_rules('updateketerangan', 'updateKeterangan', 'required|Trim');
              if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('error', 'Check Kembali Input Anda / Kolom Tidak Boleh Kosong!!');
                redirect("permohonan/form_updatecuti/" . encrypt_url($id_permohonan));
              } else {
                $keterangan = html_escape($this->input->post('updateketerangan', TRUE));
              }
            }
          }
          $this->load->library('upload');
          $assets = FCPATH . './assets/picture/izin';
          $foto = $_FILES['updateuploadizin']['name'];
          if ($foto) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']     = '5048';
            $config['upload_path'] = $assets;
            $this->upload->initialize($config);
            if ($this->upload->do_upload('uploadizin')) {
              $foto = $this->upload->data('file_name');
            } else {
              $this->session->set_flashdata('error', 'File Hanya Boleh Image atau PDF dan tidak boleh lebih dari 5 MB!!');
              redirect('permohonan/form_updatecuti/' . encrypt_url($id_permohonan) . '', 'refresh');
            }
          } else {
            $foto = $userPermohonan['buktiLeave'];
          }
        }
        $data = array(
          'TanggalOut' => $tanggalOut,
          'id_jenispermohonan' => $id_permohonan,
          'keterangan' => $keterangan,
          'buktiLeave' => $foto,
          'totalLeave' => $totalHari,
          'status' => 0,
          'date_update' => date("Y-m-d H:i:s",now("Asia/Jakarta"))
        );
        $this->db->where('id_cuti', $id_permohonan);
        $this->db->update('tbl_permintaan_cuti', $data);
        if ($this->db->affected_rows() == 1) {
          $this->session->set_flashdata('success', 'Berhasil Mengubah Permohonan');
          redirect("permohonan/datapribadicuti");
        } else {
          $this->session->set_flashdata('error', 'Gagal Membuat Permohonan');
          redirect("permohonan/form_updatecuti/" . encrypt_url($id_permohonan));
        }
      }
    }
  }
  /*<!--**********************************
            Delete Permohonan
            ***********************************-->
  */
  // public function deletepermohonan($id_permohonanleave)
  // {
  //   $id_permohonanleave = decrypt_url($id_permohonanleave);
  //   $this->permohonan_model->deletePermohonanLeave($id_permohonanleave);
  //   if ($this->db->affected_rows() == 1) {
  //     $this->session->set_flashdata('success', 'Berhasil Menghapus Permohonan');
  //     redirect('permohonan/datakaryawancuti');
  //   } else {
  //     $this->session->set_flashdata('error', 'Gagal Menghapus Permohonan');
  //     redirect('permohonan/datakaryawancuti');
  //   }
  // } 
  /*
<!--**********************************
            Insert ACC Permohonan
            ***********************************-->
  */

  public function insert_acc_cuti($id_permohonanleave)
  {
    $id_permohonanleave = decrypt_url($id_permohonanleave);

    $sql = $this->permohonan_model->getDataPermohonanLeave($id_permohonanleave);

    foreach ($sql->result() as $key => $value) :
      $NIK_karyawan = $value->NIK;
      $batascuti = $value->batas_cuti;

      $totalHari = $value->totalLeave;
      $jenispermohonan = $value->Title_Permohonan;

      if ($jenispermohonan == "Permohonan Cuti Mendadak" || $jenispermohonan == "Permohonan Cuti Tahunan") {
        if ($totalHari > $batascuti) {
          $this->session->set_flashdata('error', "Maaf Batas Cuti Karyawanan Tersisa: $batascuti hari");
          redirect('permohonan/datakaryawancuti');
        } else {
          $totalcuti = $batascuti - $totalHari;
          $sisacuti = array('batas_cuti' => $totalcuti);
          $this->db->where('NIK', $NIK_karyawan);
          $this->db->update('tbl_sisacutiKaryawan', $sisacuti);
        }
      }
    // if ($jenispermohonan == "Permohonan Cuti Mendadak") {

    //   if ($totalHari > $batascuti) {
    //     $this->session->set_flashdata('error', "Maaf Batas Cuti Anda Tersisa: $batascuti hari");
    //     redirect('permohonan/datakaryawancuti');
    //   } else {
    //     $totalcuti = $batascuti - $totalHari;
    //     $sisacuti = array('batas_cuti' => $totalcuti);
    //     $this->db->where('NIK', $NIK_karyawan);
    //     $this->db->update('tbl_sisacutiKaryawan', $sisacuti);
    //     if ($this->db->affected_rows() == 1) {
    //       echo"berhasil";
    //     } else {
    //       echo"gagal";
    //     }
    //   }
    // } else if ($jenispermohonan == "Permohonan Cuti Mendadak") {
    //   if ($totalHari > $batascuti) {
    //     $this->session->set_flashdata('error', "Maaf Batas Cuti Anda Tersisa: $batascuti hari");
    //     redirect('permohonan/datakaryawancuti');
    //   } else {
    //     $totalcuti = $batascuti - $totalHari;

    //     $sisacuti = array('batas_cuti' => $totalcuti);
    //     $this->db->where('NIK', $NIK_karyawan);
    //     $this->db->update('tbl_sisacutiKaryawan', $sisacuti);
    //   }
    // }
    endforeach;
    //update status cuti
    $statuscuti = array(
      'status' => 1,
      'date_update' => date('Y-m-d')
    );
    $this->permohonan_model->updatepermohonan($id_permohonanleave, $statuscuti);
    if ($this->db->affected_rows() == 1) {
      $this->session->set_flashdata('success', 'Berhasil Menyetujui Permohonan');
      redirect('permohonan/datakaryawancuti');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menyetujui Permohonan');
      redirect('permohonan/datakaryawancuti');
    }
  }
  /*
<!--**********************************
            Insert Tolak Permohonan
            ***********************************-->
  */
  public function insert_tolak_cuti()
  {
    check_not_login();
    $id_permohonanleave = decrypt_url(html_escape($this->input->post('id_permohonan'), TRUE));
    $note = html_escape($this->input->post('note'), TRUE);
    //update status cuti
    $statuscuti = array(
      'note' => $note,
      'status' => 2,
      'date_update' => date('Y-m-d')
    );
    $this->permohonan_model->updatepermohonan($id_permohonanleave, $statuscuti);
    if ($this->db->affected_rows() == 1) {
      $this->session->set_flashdata('success', 'Berhasil Menolak Permohonan');
      redirect('permohonan/datakaryawancuti');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menolak Permohonan');
      redirect('permohonan/datakaryawancuti');
    }
  }
}
