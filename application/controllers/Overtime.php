<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Overtime extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('memory_limit', '256M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
        ini_set('sqlsrv.ClientBufferMaxKBSize', '524288'); // Setting to 512M
        ini_set('pdo_sqlsrv.client_buffer_max_kb_size', '524288');
        check_not_login();
    }

    public function form_overtime()
    {
    	$PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
        $Periodeend =  date("Y-m-d", strtotime("2021-12-20"));
        $NIK = $this->session->userdata('NIK');
        $data['user'] = $this->app_model->getDataPribadi($NIK);
        $data['num_rows'] = $this->overtimemodel->getDataOvertimePribadi($NIK,$PeriodeStart,$Periodeend)->num_rows();
        $data['title'] = "Page Form Cuti Nippisun";
        $this->template->load('template', 'FormOvertime', $data);
    }
    public function add_formulirlembur()
    {


        $this->form_validation->set_rules('keterangan_lembur', 'Keterangan_Lembur', 'required|Trim');
        $this->form_validation->set_rules('tanggallembur', 'Tanggallembur', 'required|Trim');
        $this->form_validation->set_rules('jamStartLembur', 'JamStartLembur', 'required|Trim');
        $this->form_validation->set_rules('jamEndLembur', 'JamEndLembur', 'required|Trim');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Check Kembali Input !!');
            redirect('overtime/form_overtime');
        } else {
            $datenow = date("Y-m-d");
            $nik = $this->session->userdata('NIK');
            $keperluanlembur = html_escape($this->input->post('keterangan_lembur', TRUE));
            $tanggallembur = date("Y-m-d", strtotime($this->input->post('tanggallembur', TRUE)));
            $starttime = date("H:i:s", strtotime(html_escape($this->input->post('jamStartLembur', TRUE))));
            $endtime = date("H:i:s", strtotime(html_escape($this->input->post('jamEndLembur', TRUE))));

            if ($tanggallembur <= $datenow) {
                $this->session->set_flashdata('error', 'Pengajuan Overtime H-1');
                redirect('overtime/form_overtime');
            } else if ($starttime >= $endtime) {
            	$this->session->set_flashdata('error', 'Maaf waktu in dan out tidak sesuai');
                redirect('overtime/form_overtime');
            } else {
                $data = array(
                    'id_lembur' => uniqid(),
                    'keperluan' => $keperluanlembur,
                    'start_ot' => $starttime,
                    'end_ot' => $endtime,
                    'NIK' => $nik,
                    'tanggal_lembur' => $tanggallembur,
                    'date_created' => date('Y-m-d'),
                    'status' => 0,
                    'date_update' => NULL
                );
                $this->db->insert('tbl_overtime', $data);
                if ($this->db->affected_rows() == 1) {
                    $this->session->set_flashdata('success', 'Overtime Berhasil Dibuat');
                    redirect('overtime/overtimePribadi');
                } else {
                    $this->session->set_flashdata('error', 'Overtime Gagal Dibuat');
                    redirect('overtime/overtimePribadi');
                };
            }
        }
    }
    public function overtimePribadi()
    {
     
        $NIK = $this->session->userdata('NIK');
        $PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
        $Periodeend =  date("Y-m-d", strtotime("2021-12-20"));
        $data['user'] = $this->app_model->getDataPribadi($NIK);
        $data['dataOvertimePribadi'] = $this->overtimemodel->getDataOvertimePribadi($NIK, $PeriodeStart, $Periodeend);
        $data['title'] = "Page Form Cuti Nippisun";
        $this->template->load('template', 'datapribadiovertime', $data);
    }
    public function updateOvertimePribadi()
    {
       
        $id_lembur = decrypt_url(html_escape($this->input->post("id_lembur", TRUE)));
        $getOvertime = $this->overtimemodel->dataOvertimeByid($id_lembur);
        if ($getOvertime['status'] <= 0) {
            $this->form_validation->set_rules('updateketerangan_lembur', 'Keterangan_Lembur', 'required|Trim');
            $this->form_validation->set_rules('updatetanggallembur', 'Tanggallembur', 'required|Trim');
            $this->form_validation->set_rules('updatejamStartLembur', 'JamStartLembur', 'required|Trim');
            $this->form_validation->set_rules('updatejamEndLembur', 'JamEndLembur', 'required|Trim');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('error', 'Check Kembali Input !!');
                redirect('overtime/form_overtime');
            } else {
                $datenow = date("Y-m-d");
                $id_lembur = decrypt_url(html_escape($this->input->post("id_lembur", TRUE)));
                $keperluanlembur = html_escape($this->input->post('updateketerangan_lembur', TRUE));
                $starttime = date("H:i:s", strtotime(html_escape($this->input->post('updatejamStartLembur', TRUE))));
                $tanggallembur = date("Y-m-d", strtotime($this->input->post('updatetanggallembur', TRUE)));
                $endtime = date("H:i:s", strtotime(html_escape($this->input->post('updatejamEndLembur', TRUE))));
                if ($datenow >= $tanggallembur) {
                    $this->session->set_flashdata('error', 'Pengajuan Overtime H-1');
                    redirect('overtime/overtimePribadi');
                    // var_dump($datenow, $tanggallembur, $datenow <= $tanggallembur);
                    // die();
                } else if ($starttime >= $endtime){
                	$this->session->set_flashdata('error', 'Maaf waktu in dan out tidak sesuai');
                    redirect('overtime/overtimePribadi');
                } else {
                    $data = array(
                        'tanggal_lembur' => $tanggallembur,
                        'keperluan' => $keperluanlembur,
                        'start_ot' => $starttime,
                        'end_ot' => $endtime,
                        'date_update' => date("Y-m-d")
                    );

                    $this->overtimemodel->updateOvertimePribadi($id_lembur, $data);
                }
                if ($this->db->affected_rows() == 1) {
                    $this->session->set_flashdata('success', 'Overtime Berhasil Diubah');
                    redirect('overtime/overtimePribadi');
                } else {
                    $this->session->set_flashdata('error', 'Overtime Gagal Diubah');
                    redirect('overtime/overtimePribadi');
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Upss Status Sudah Berubah');
            redirect('overtime/overtimePribadi');
        }
    }
    public function overtimeKaryawan()
    {
        $PeriodeStart =  date("Y-m-d", strtotime("2021-11-21"));
        $Periodeend =  date("Y-m-d", strtotime("2021-12-20"));
        $NIK = $this->session->userdata('NIK');
        $id_rule = $this->session->userdata('id_rule');
        $user = $this->app_model->getDataPribadi($NIK);
        $departemenName = $user['DepartemenName'];
        $data['user'] = $user;

        if ($id_rule == 1) {
            $data['overtimeKaryawan']   = $this->overtimemodel->getDataOvertimeKaryawanbyDepartemen($departemenName, $PeriodeStart, $Periodeend);
        } else {
            $data['overtimeKaryawan']   = $this->overtimemodel->getDataOvertimeKaryawan($PeriodeStart, $Periodeend);
        }

        $data['title'] = "Data Karyawan overtime Page Nippisun";
        // $this->load->view('header', $data);
        // $this->load->view('datakaryawan_overtime', $data);
        // $this->load->view('footer', $data);
        $this->template->load('template', 'datakaryawanOvertime', $data);
    }
    public function insert_acc_lembur($id_lembur)
    {
        $id_lembur = decrypt_url($id_lembur);
        $data = array(
            'status' => 1,
            'date_update' => date('Y-m-d')
        );
        $this->overtimemodel->setujuOvertimeKaryawan($id_lembur, $data);
        if ($this->db->affected_rows() >= 1) {
            $this->session->set_flashdata('success', '
      Permintaan overtime Berhasil Disetujui
      ');
            redirect('overtime/overtimeKaryawan');
        } else {
            $this->session->set_flashdata('error', '
      Permintaan overtime Gagal Disetujui
      </div>');
            redirect('overtime/overtimeKaryawan');
        }
    }
    public function insert_tolak_lembur($id_lembur)
    {
        $id_lembur = decrypt_url($id_lembur);
        $data = array(
            'status' => 2,
            'date_update' => date('Y-m-d')
        );
        $this->overtimemodel->tolakOvertimeKaryawan($id_lembur, $data);
        if ($this->db->affected_rows() >= 1) {
            $this->session->set_flashdata('success', '
      Permintaan overtime Berhasil Ditolak
      ');
            redirect('overtime/overtimeKaryawan');
        } else {
            $this->session->set_flashdata('error', '
      Permintaan overtime Gagal Ditolak
      ');
            redirect('overtime/overtimeKaryawan');
        }
    }
    /*
<!--**********************************
            Delete overtime
            ***********************************-->
  */
    // public function delete_overtime($id_lembur)
    // {
    //     $id_lembur = decrypt_url($id_lembur);
    //     $this->overtimemodel->hapusOvertimeKaryawan($id_lembur);
    //     if ($this->db->affected_rows() >= 1) {
    //         $this->session->set_flashdata('success', '
    //               Permintaan overtime Berhasil DiHapus
    //               ');
    //         redirect('overtime/overtimeKaryawan');
    //     } else {
    //         $this->session->set_flashdata('error', '
    //               Permintaan overtime Gagal Dihapus
    //               ');
    //         redirect('overtime/overtimeKaryawan');
    //     }
    // }
}
