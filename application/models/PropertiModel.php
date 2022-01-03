<?php
defined('BASEPATH') or exit('No direct script access allowed');
class OvertimeModel extends CI_Model
{
    public function getJenisCutiKhusus()
    {
        $q = $this->db->get("tbl_jenispermohonan");
        return $q;
    }
}
