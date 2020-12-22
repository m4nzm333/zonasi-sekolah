<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('SekolahModel');
	}

	public function index()
	{
		$data['sekolah'] = $this->SekolahModel->getSekolahAll();
		$this->load->view('sekolah', $data);
	}

	public function tambah()
	{
		$sekolah = array(
			'nama' => $this->input->post('nama'),
			'id_mst_daerah' => 19,
			'derajat' => 'SMA',
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon'),
			'kuota' => $this->input->post('kuota'),
			'lat' => $this->input->post('latitude'),
			'lng' => $this->input->post('longitude')
		);
		$this->SekolahModel->insert($sekolah);
		$this->session->set_flashdata('success', 'Sekolah telah ditambahkan.');
		redirect('sekolah');
	}

	public function peta()
	{
		$data['sekolah'] = $this->SekolahModel->getSekolahAll();
		$this->load->view('peta', $data);
	}

}
