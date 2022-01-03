<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keperluancuti_M extends CI_Model
{

	public function getkeperluanCutiByName($Name)
	{
		$q = $this->db->query("SELECT * FROM tbl_jeniskeperluancuti WHERE title_keperluancuti = '$Name'");
		$result2 = $q->row_array();
		return $result2;
	}
	public function getkeperluanCuti()
	{
	
		return $this->db->get("tbl_jeniskeperluancuti");;
	}
	
}
