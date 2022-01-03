<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public $DB2;
	public function __construct()
	{
		parent::__construct();
		$this->DB2 = $this->load->database('HRD', TRUE);
	}
    public function login($post)
    {
        $NIK = $post['nik'];
        $pwd = $post['pwd'];
        $q = $this->db->query("SELECT * FROM tbl_user  WHERE NIK = '$NIK' AND password='$pwd'");
        return $q;
        // $this->db->select('*');
        // $this->db->from('tbl_user');
        // $this->db->where('NIK', $post['NIK']);
        // $this->db->where('password', $post['pwd']); ///'sesuai db', 'sesuai name'
        // $query = $this->db->get();
        // return $query;
    }
    
    
    
}
