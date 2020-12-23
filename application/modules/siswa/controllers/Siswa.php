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
		$this->load->view('siswa');
	}

	public function siswa_data()
	{
		$columns[0] = "no_peserta";
		$columns[1] = "nama";
		$columns[2] = "asal_sekolah";
		$columns[3] = "waktu_daftar";
		$columns[3] = "id";

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

	public function tambah()
	{
		$siswa = array(
			'no_peserta' => $this->input->post('no'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'asal_sekolah' => $this->input->post('asal'),
			'waktu_daftar' => DateTime::createFromFormat('d-m-Y H:i:s', $this->input->post('tanggalDaftar') . ' ' . $this->input->post('waktuDaftar'))->format('Y-m-d H:i:s'),
			'id_mst_jalur' => 3,
			'pilihan1' => $this->input->post('pilihan'),
			'lat' => $this->input->post('latitude'),
			'lng' => $this->input->post('longitude')
		);
		$this->SiswaModel->insert($siswa);
		$this->session->set_flashdata('success', 'Siswa telah ditambahkan.');
		redirect('siswa');
	}
	
}
