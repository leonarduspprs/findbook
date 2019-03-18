<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_lokasi');
	}

	public function index() {
		$data['userdata']	= $this->userdata;
		$data['datalokasi']	= $this->M_lokasi->select_all();

		$data['page']		= "lokasi";
		$data['judul']		= "Data Lokasi";
		$data['deskripsi']	= "Manage Data Lokasi";


		$this->template->views('lokasi/home', $data);
	}

	public function tampil() {
		$data['dataLokasi'] = $this->M_lokasi->select_all();
		$this->load->view('lokasi/list_data', $data);
	}







}

/* End of file lokasi.php */
/* Location: ./application/controllers/Kota.php */