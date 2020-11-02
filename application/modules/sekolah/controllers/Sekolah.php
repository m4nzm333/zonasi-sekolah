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

}
