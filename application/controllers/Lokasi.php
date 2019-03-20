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

		$data['modal_tambah_lokasi'] = show_my_modal('modals/modal_tambah_lokasi','tambah-lokasi',$data);

		$this->template->views('lokasi/home', $data); 
	}

	public function tampil() {
		$data['dataLokasi'] = $this->M_lokasi->select_all();
		$this->load->view('lokasi/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_lokasi->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Lokasi Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Lokasi Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= $_POST['id'];
		$data['dataLokasi']= $this->M_lokasi->select_by_id($id);

		echo show_my_modal('modals/modal_update_lokasi', 'update-lokasi', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_lokasi->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Lokasi Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Lokasi Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_lokasi->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Kota Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Kota Gagal dihapus', '20px');
		}
	}

}

	

/* End of file lokasi.php */
/* Location: ./application/controllers/Kota.php */