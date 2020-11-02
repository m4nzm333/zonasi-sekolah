<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('SiswaModel');
	}

	public function index()
	{
		$data['siswa'] = $this->SiswaModel->getSiswaAll(10, 0);
		// echo json_encode($data);
		$this->load->view('siswa', $data);
	}

	public function siswa_data()
	{
		$columns[0] = "no_peserta";
		$columns[1] = "nama";
		$columns[2] = "asal_sekolah";
		$columns[3] = "waktu_daftar";
		$columns[4] = "lat";
		$columns[5] = "lng";

		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];

		$totalData = $this->SiswaModel->countSiswaAll();
		$totalFiltered = $totalData;

		if (empty($this->input->post('search')['value'])) {
			$posts = $this->SiswaModel->getSiswaAllFilter($limit, $start, $order, $dir, NULL);
		} else {
			$search = $this->input->post('search')['value'];

			$posts = $this->SiswaModel->getSiswaAllFilter($limit, $start, $order, $dir, $search);
			$totalFiltered = $this->SiswaModel->countSiswaAll($search);
		}
		$json_data = array(
			"draw"            => intval($this->input->post('draw')),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"            => $posts
		);

		echo json_encode($json_data);
	}
}
