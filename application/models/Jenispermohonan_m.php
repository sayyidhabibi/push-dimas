<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenispermohonan_m extends CI_Model
{

	public function getpermohonanByName($Name)
	{
		$q = $this->db->query("SELECT * FROM tbl_jenispermohonan WHERE Title_Permohonan = '$Name'");
		return $q;
	}
	public function getpermohonan()
	{
		
		return $this->db->get("tbl_jenispermohonan");
	}
	
}
