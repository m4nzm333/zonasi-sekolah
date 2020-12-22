<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SekolahModel extends CI_Model {

	public function getAll()
	{
        $this->db->where('derajat', 'SMA');
        $this->db->where('id_mst_daerah', '19');
        return $this->db->get('sekolah')->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('sekolah', $data);
        return $this->db->insert_id();
    }

    public function getById($idSekolah)
    {
        $this->db->where('id', $idSekolah);
        return $this->db->get('sekolah')->row_array();
    }

    public function updateById($idSekolah, $data)
    {
        $this->db->where('id', $idSekolah);
        $this->db->update('sekolah', $data);
        return $this->db->affected_rows();
    }

    public function deleteById($idSekolah)
    {
        $this->db->where('id', $idSekolah);
        $this->db->delete('sekolah');
        return $this->db->affected_rows();
    }

}