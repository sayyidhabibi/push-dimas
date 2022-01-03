<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properti extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
		ini_set('memory_limit','256M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
        ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
        ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288');
        check_not_login();

    }   
    
    // Jenis Cuti Khusus
    public function jeniscuti()
    {
        $NIK = $this->session->userdata('NIK');
        $getPermohonan = $this->properti_model->getJenisCuti();
        $user = $this->app_model->getDataPribadi($NIK);
        $data['user'] = $user;
        $data['jcuti'] = $getPermohonan;
        $data['title'] = "Jenis Cuti";
        $this->template->load('template', 'jenis_cuti', $data);
        // var_dump($getPermohonan);
        // die();
    }
    public function tambahjc()
    {
    	$NIK = $this->session->userdata('NIK');
        $user = $this->app_model->getDataPribadi($NIK);
        $data['user'] = $user;
        $data['title'] = "Jenis Cuti";
        $this->template->load('template', 'tambah_jeniscuti', $data);
    }
    public function add_jcuti()
    {
        $table = 'tbl_jeniskeperluancuti';
    	$jcuti = $this->input->post('jcuti');
    	$durasi = $this->input->post('durasi');
    	$this->properti_model->addJenis(array(
    		'id_jeniskeperluancuti' => uniqid(),
    		'title_keperluancuti' => $jcuti,
    		'durasi' => $durasi
    	),$table);
    	redirect('properti/jeniscuti');
    }
    public function hapusjc($data)
	{
		$id = 'id_jeniskeperluancuti';
		$table = 'tbl_jeniskeperluancuti';
		$this->properti_model->deleteJenis($id, $table, $data);
		redirect('properti/jeniscuti');
	}

	// Jenis Permohonan
	public function jenispermohonan()
	{
		$NIK = $this->session->userdata('NIK');
        $getPermohonan = $this->properti_model->getJenisPermohonan();
        $user = $this->app_model->getDataPribadi($NIK);
        $data['user'] = $user;
        $data['jpermohonan'] = $getPermohonan;
        $data['title'] = "Jenis Permohonan";
        $this->template->load('template', 'jenis_permohonan', $data);	
	}
    public function add_jpermohonan()
    {
        $table = 'tbl_jenispermohonan';
        $permohonan = $this->input->post('permohonan');
        $this->properti_model->addJenis(array(
            'id_jenispermohonan' => uniqid(),
            'Title_Permohonan' => $permohonan
        ),$table);
        redirect('properti/jenispermohonan');
    }
    public function hapusjp($data)
	{
		$id = 'id_jenispermohonan';
		$table = 'tbl_jenispermohonan';
		$this->properti_model->deleteJenis($id, $table, $data);
		redirect('properti/jenispermohonan');
	}
	
	// Jadwal Kerja
	public function jadwalkerja()
	{
		$NIK = $this->session->userdata('NIK');
        $getPermohonan = $this->properti_model->getDataJadwal()->result();
        $user = $this->app_model->getDataPribadi($NIK);
        $data['user'] = $user;
        $data['jkerja'] = $getPermohonan;
        $data['title'] = "Jadwal Kerja";
        $this->template->load('template', 'jenis_jadwalkerja', $data);	
	}
	public function tambahjk()
    {
    	$NIK = $this->session->userdata('NIK');
        $user = $this->app_model->getDataPribadi($NIK);
        $data['user'] = $user;
        $data['title'] = "Jadwal Kerja";
        $this->template->load('template', 'tambah_jadwalkerja', $data);
    }
	public function add_jkerja()
    {
        $table = 'tbl_jenis_jadwal';
        $nj = $this->input->post('nj');
        $jm = $this->input->post('jm');
        $jb = $this->input->post('jb');
        $jt = $this->input->post('jt');
        $this->properti_model->addJenis(array(
            'id_jadwal' => uniqid(),
            'Nama_jadwal' => $nj,
            'jam_mulai' => $jm,
            'jam_akhir' => $jb,
            'Late_time' => $jt
        ),$table);
        redirect('properti/jadwalkerja');
    }
    public function hapusjk($data)
	{
		$id = 'id_jadwal';
		$table = 'tbl_jenis_jadwal';
		$this->properti_model->deleteJenis($id, $table, $data);
		redirect('properti/jadwalkerja');
	}
	public function ubahjk($id)
	{
		$where = array('id_jadwal' => $id);
		$data['jk'] = $this->properti_model->ubahJenis($where,'tbl_jenis_jadwal')->result();
		$NIK = $this->session->userdata('NIK');
        $user = $this->app_model->getDataPribadi($NIK);
        $data['user'] = $user;
        $data['title'] = "Jadwal Kerja";
        $this->template->load('template', 'edit_jadwalkerja', $data);
	}
	public function update_jkerja($id)
	{
        $nj = $this->input->post('nj');
        $jm = $this->input->post('jm');
        $jb = $this->input->post('jb');
        $jt = $this->input->post('jt');
        $data = array(
            'id_jadwal' => $id,
            'Nama_jadwal' => $nj,
            'jam_mulai' => $jm,
            'jam_akhir' => $jb,
            'Late_time' => $jt
        );
        $where = array('id_jadwal' => $id);
    	$this->properti_model->updateJenis($where,$data,'tbl_jenis_jadwal');
        redirect('properti/jadwalkerja');
	}
}
