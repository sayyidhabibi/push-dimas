<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properti_Model extends CI_Model
{
	public $DB2;
	public function __construct()
	{
		parent::__construct();
		$this->DB2 = $this->load->database('HRD', TRUE);	
	}
	public function getDataJadwal()
	{
		$q = $this->db->get("tbl_jenis_jadwal");
		return $q;
	}
	public function getDataJadwalByName($namaJadwal){
		$q = $this->db->get("tbl_jenis_jadwal",array("Nama_jadwal"=>$namaJadwal));
		return $q;
	}
	public function getJenisCuti()
	{
		$q = $this->db->query("select * from tbl_jeniskeperluancuti");
		return $q->result();
	}
	public function getJenisPermohonan()
	{
		$q = $this->db->query("select * from tbl_jenispermohonan");
		return $q->result();
	}

	// add data
	public function addJenis($data,$table)
	{
		$insert = $this->db->insert($table,$data);
		return $insert;
	}
	// delete data
	public function deleteJenis($id, $table, $where)
	{
		$this->db->where($id,$where);
		return $this->db->delete($table);
	}
	// update data
	function ubahJenis ($where,$table)
    {
        return $this->db->get_where($table,$where);
    }
    function updateJenis ($where,$data,$table)
    {

        $this->db->where($where);
        $this->db->update($table,$data);
    }
}
