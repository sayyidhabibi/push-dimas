<?php
defined('BASEPATH') or exit('No direct script access allowed');
class OvertimeModel extends CI_Model    
{
    private $DB2;
    public function __construct()
	{
		parent::__construct();
		$this->DB2 = $this->load->database('HRD', TRUE);
	}
    public function getDataOvertimePribadi($NIK,$periodeStart,$periodeEnd)
    {
        $q = $this->DB2->query("SELECT * FROM EmployeesMasterTbl as em INNER JOIN dbTest.[dbo].tbl_overtime as db1 ON em.NIK = db1.NIK WHERE (em.NIK = '$NIK') AND (db1.date_created >= '$periodeStart' OR db1.date_created <= '$periodeEnd')");
        return $q;
    }
    public function updateOvertimePribadi($id_lembur,$data)
    {
        $this->db->where("id_lembur",$id_lembur);
        $q = $this->db->update("tbl_overtime",$data);
        return $q;
    }
    public function getDataOvertimeKaryawanbyDepartemen($departemenName,$periodeStart,$periodeEnd)
    {
        // $StartDate = date("Y-m-d",strtotime())
        $q = $this->DB2->query("SELECT * FROM EmployeesMasterTbl as em INNER JOIN dbTest.[dbo].tbl_overtime as db1 ON em.NIK = db1.NIK WHERE em.DepartemenName = '$departemenName' or db1.date_created >='$periodeStart' or date_created >='$periodeEnd'");
        return $q;
    }
    public function getDataOvertimeKaryawan($periodeStart,$periodeEnd)
    {
        $q = $this->DB2->query("SELECT * FROM EmployeesMasterTbl as em INNER JOIN dbTest.[dbo].tbl_overtime as db1 ON em.NIK = db1.NIK WHERE (db1.status = 2 OR db1.status =1) AND (db1.date_created >='$periodeStart' OR date_created <='$periodeEnd')");
        return $q;
    }
    public function setujuOvertimeKaryawan($id_lembur,$data)
    {
        $this->db->where("id_lembur",$id_lembur);
        $q = $this->db->update("tbl_overtime",$data);
        return $q;
    }
    public function tolakOvertimeKaryawan($id_lembur,$data)
    {
        $this->db->where("id_lembur",$id_lembur);
        $q = $this->db->update("tbl_overtime",$data);
        return $q;
    }
    // public function hapusOvertimeKaryawan($id_lembur)
    // {
    //     $this->db->where("id_lembur",$id_lembur);
    //     $q = $this->db->delete("tbl_overtime");
    //     return $q;
    // }
    public function dataOvertimeByid($id_lembur)
    {
        $q = $this->DB2->query("SELECT * FROM EmployeesMasterTbl as em INNER JOIN dbTest.[dbo].tbl_overtime as db1 ON em.NIK = db1.NIK WHERE db1.id_lembur = '$id_lembur'")->row_array();
        return $q;
    }
}
