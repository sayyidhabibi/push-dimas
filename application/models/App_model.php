<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App_model extends CI_Model
{
	public $DB2;
	public function __construct()
	{
		parent::__construct();
		$this->DB2 = $this->load->database('HRD', TRUE);
	}
	public function getDataPribadi($username)
	{
		$q = $this->DB2->query("SELECT * FROM EmployeesMasterTbl INNER JOIN dbTest.[dbo].tbl_user as db1 ON EmployeesMasterTbl.NIK = db1.NIK INNER JOIN dbTest.[dbo].tbl_sisacutiKaryawan AS db2 on EmployeesMasterTbl.NIK  = db2.NIK WHERE db1.NIK = '$username'");
		$result2 = $q->row_array();
		return $result2;
	}
	public function getKaryawan($NIK=NULL,$Name=NULL)
	{
		if($NIK == NULL && $Name == NULL){
		$q = $this->DB2->get("EmployeesMasterTbl");
		}else if ($Name != NULL){
			$q = $this->DB2->get_where("EmployeesMasterTbl",array("Name" =>$Name));
		}else{
			$q = $this->DB2->get_where("EmployeesMasterTbl",array("NIK" =>$NIK));
		}
		return $q;
	}
	
	// public function getAllKaryawan(){
	// 	$q = $this->DB2->query("SELECT * ")
	// }
}
