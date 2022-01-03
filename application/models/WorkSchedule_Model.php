<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WorkSchedule_Model extends CI_Model
{
	public $DB2;

	public function __construct()
	{
		parent::__construct();
		$this->DB2 = $this->load->database('HRD', TRUE);
	}
	public function getGrup($PeriodeStart, $PeriodeEnd)
	{
		$q = $this->db->query("SELECT * FROM tbl_grup WHERE date_Created >= '$PeriodeStart' AND date_Created <= '$PeriodeEnd'");
		return $q;
	}
	public function insertGrup($data)
	{
		$q = $this->db->insert("tbl_grup", $data);
		return $q;
	}
	public function getGrupByname($name)
	{
		$q = $this->db->get_where("tbl_grup", array("nama_grup" => $name));
		return $q;
	}
	public function addScheduleGrup($data)
	{
		$q = $this->db->insert("tbl_workschedule", $data);
		return $q;
	}
	public function updateScheduleGrup($id_schedule, $data)
	{
		$this->db->where("id_schedule", $id_schedule);
		$q = $this->db->update("tbl_workschedule", $data);
		return $q;
	}
	public function getKaryawanByGrup($id_grup)
	{
		$q = $this->DB2->query("SELECT db1.NIK,db1.Name,db1.DepartemenName FROM EmployeesMasterTbl as db1 JOIN dbTest.dbo.tbl_workSchedulePerson as db2 ON db2.NIK = db1.NIK WHERE db2.id_grup = '$id_grup' group by db1.NIK,db1.Name,db1.DepartemenName");
		return $q;
	}
	public function getEventGrup($periodeStart, $periodeEnd)
	{
		$q = $this->db->query("SELECT * FROM tbl_workschedule JOIN tbl_jenis_jadwal ON tbl_jenis_jadwal.id_jadwal = tbl_workschedule.id_jadwal JOIN tbl_grup ON tbl_grup.id_grup = tbl_workschedule.id_grup WHERE tbl_workschedule.start_work >='$periodeStart' AND tbl_workschedule.end_work <='$periodeEnd' ");
		return $q;
	}
	public function getscheduleGrupbyid($periodeStart, $periodeEnd, $idGrup)
	{
		$q = $this->db->query("SELECT * FROM tbl_workschedule JOIN tbl_jenis_jadwal ON tbl_jenis_jadwal.id_jadwal = tbl_workschedule.id_jadwal JOIN tbl_grup ON tbl_grup.id_grup = tbl_workschedule.id_grup WHERE tbl_workschedule.start_work >='$periodeStart' AND tbl_workschedule.end_work <='$periodeEnd' AND tbl_workschedule.id_grup='$idGrup'");
		return $q;
	}
	public function getSchedulekaryawan($NIK)
	{
		$q = $this->DB2->query("SELECT db1.NIK FROM EmployeesMasterTbl as db2 INNER JOIN dbTest.[dbo].tbl_workSchedulePerson AS db1 on db2.NIK = db1.NIK WHERE db1.NIK ='$NIK' ");
		return $q;
	}
	public function deletePersonFromGrup($NIK)
	{
		$q = $this->db->delete("tbl_workschedulePerson", array("NIK" => $NIK));
		return $q;
	}
	public function getEventPerson($periodeStart)
	{
		$q = $this->DB2->query("SELECT * FROM EmployeesMasterTbl as db2 INNER JOIN dbTest.[dbo].tbl_workSchedulePerson AS db1 on db2.NIK = db1.NIK INNER JOIN dbTest.[dbo].tbl_jenis_jadwal ON tbl_jenis_jadwal.id_jadwal = db1.id_jadwal INNER JOIN dbTest.[dbo].tbl_grup ON tbl_grup.id_grup = db1.id_grup WHERE db1.start_work >='$periodeStart'   ");
		return $q;
	}
	public function updateSchedulePerson($id_workpersonSchedule,$data){
		$this->db->where("id_workperson", $id_workpersonSchedule);
		$q = $this->db->update("tbl_workSchedulePerson", $data);
		return $q;
	}
	public function getHistoryPerson($periodeStart,$periodeEnd){
		$q = $this->DB2->query("SELECT * FROM EmployeesMasterTbl AS db2 INNER JOIN dbTest.[dbo].tbl_HistoryPerson AS db1 on db2.NIK = db1.NIK INNER JOIN dbTest.[dbo].tbl_grup AS grup on db1.id_grup = grup.id_grup WHERE db1.date_created >= '$periodeStart' AND db1.date_created <= '$periodeEnd' ");
		return $q;
	}
	public function getScheduleGrupByStartWork($id_grup,$startwork){
		$q = $this->db->query("SELECT * FROM tbl_workschedule WHERE id_grup ='$id_grup' AND start_work='$startwork'");
		return $q;
	}
}
