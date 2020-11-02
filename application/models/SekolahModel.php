<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SekolahModel extends CI_Model {
	public function getSekolahAll()
	{
        $this->db->where('derajat', 'SMA');
        $this->db->where('id_mst_daerah', '19');
        return $this->db->get('sekolah')->result_array();
    }
}