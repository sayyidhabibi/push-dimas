<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan_Model extends CI_Model
{
	public $DB2, $DB1;

	public function __construct()
	{
		parent::__construct();
		$this->DB2 = $this->load->database('HRD', TRUE);
	}


	public function getDataPermohonanPribadi($NIK)
	{
		$q = $this->DB2->query("SELECT * FROM EmployeesMasterTbl as em INNER JOIN dbTest.[dbo].tbl_permintaan_cuti as db1 ON em.NIK = db1.NIK INNER JOIN dbTest.[dbo].tbl_jenispermohonan as db2 on db1.id_jenispermohonan = db2.id_jenispermohonan  WHERE db1.NIK = '$NIK'");

		// $this->DB2->select('*');
		// $this->DB2->from('EmployeesMasterTbl as db2');
		// $this->DB2->join('dbTest.[dbo].tbl_permintaan_cuti as db1','db2.NIK = db1.NIK','INNER');
		// $result2= $this->DB2->get();
		// $result2= $q->result_array();

		return $q;
	}
	public function DataPermohonanKaryawanByDepartemen($Departemen_Name,$periodeStart, $periodeEnd)
	{
		$q = $this->DB2->query("SELECT * FROM EmployeesMasterTbl as em INNER JOIN dbTest.[dbo].tbl_permintaan_cuti as db1 ON em.NIK = db1.NIK INNER JOIN dbTest.[dbo].tbl_jenispermohonan as db2 on db1.id_jenispermohonan = db2.id_jenispermohonan INNER JOIN dbTest.[dbo].tbl_sisacutiKaryawan as db3 on em.NIK= db3.NIK WHERE (em.DepartemenName = '$Departemen_Name') AND (db1.date_created >='$periodeStart' OR db1.date_created <= '$periodeEnd')");

		// $this->DB2->select('*');
		// $this->DB2->from('EmployeesMasterTbl as db2');
		// $join = $this->DB2->join($this->db->database.'.tbl_permintaan_cuti as db1','db2.NIK = db1.NIK','inner');
		// $result2= $join->get();

		return $q;
	}
	public function allDataPermohonanKaryawan($periodeStart, $periodeEnd)
	{
		$q = $this->DB2->query("SELECT * FROM EmployeesMasterTbl as em INNER JOIN dbTest.[dbo].tbl_permintaan_cuti as db1 ON em.NIK = db1.NIK INNER JOIN dbTest.[dbo].tbl_jenispermohonan as db2 on db1.id_jenispermohonan = db2.id_jenispermohonan INNER JOIN dbTest.[dbo].tbl_sisacutiKaryawan as db3 on em.NIK= db3.NIK WHERE (db1.status = 2 OR db1.status =1) AND (db1.date_created >='$periodeStart' OR db1.date_created <= '$periodeEnd')");

		// $this->DB2->select('*');
		// $this->DB2->from('EmployeesMasterTbl as db2');
		// $join = $this->DB2->join($this->db->database.'.tbl_permintaan_cuti as db1','db2.NIK = db1.NIK','inner');
		// $result2= $join->get();

		return $q;
	}
	public function getDataPermohonanLeave($id_permohonanLeave)
	{
		$q = $this->DB2->query("SELECT * FROM EmployeesMasterTbl as em INNER JOIN dbTest.[dbo].tbl_permintaan_cuti as db1 ON em.NIK = db1.NIK INNER JOIN dbTest.[dbo].tbl_jenispermohonan as db2 on db1.id_jenispermohonan = db2.id_jenispermohonan INNER JOIN dbTest.[dbo].tbl_sisacutiKaryawan as db3 on em.NIK= db3.NIK WHERE db1.id_cuti = '$id_permohonanLeave'");

		return $q;
	}
	public function deletePermohonanLeave($id_permohonanLeave)
	{
		$q = $this->db->query("DELETE FROM tbl_permintaan_cuti where id_cuti='$id_permohonanLeave'");
		return $q;
	}
	public function updatePermohonan($id_permohonanLeave, $data)
	{
		$this->db->where('id_cuti', $id_permohonanLeave);
		$q = $this->db->update('tbl_permintaan_cuti', $data);
		return $q;
	}
	public function getKalenderKerja()
	{
		$q = $this->db->query("SELECT * FROM tbl_kalenderkerja where status_jadwal != 'hari kerja pengganti'");
		return $q->result();
	}
	public function getKalenderKerjaHP()
	{
		$q = $this->db->query("SELECT * FROM tbl_kalenderkerja where status_jadwal = 'hari kerja pengganti'");
		return $q->result();
	}
}
