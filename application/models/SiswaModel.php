<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model {
	public function getSiswaAll($limit, $start)
	{
        $this->db->where('lat is not NULL');
        return $this->db->get('siswa', $limit, $start)->result_array();
    }

    public function getSiswaAllFilter($limit, $start, $order, $dir, $search=NULL)
	{
        if($search){
            $this->db->where("(
                nama LIKE '%$search%' ESCAPE '!' OR 
                no_peserta LIKE '%$search%' ESCAPE '!' OR
                asal_sekolah LIKE '%$search%' ESCAPE '!'
            )");
        }
        $this->db->where('lat is not NULL');
        $this->db->order_by($order, $dir);
        return $this->db->get('siswa', $limit, $start)->result_array();
    }
    
    public function countSiswaAll($search=NULL)
	{
        
        if($search){
            $this->db->where("(
                nama LIKE '%$search%' ESCAPE '!' OR 
                no_peserta LIKE '%$search%' ESCAPE '!' OR
                asal_sekolah LIKE '%$search%' ESCAPE '!'
            )");
        }
        $this->db->where('lat is not NULL');
        
        return $this->db->get('siswa')->num_rows();
	}
}