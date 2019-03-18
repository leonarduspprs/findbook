<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lokasi extends CI_Model {
 	public function select_all() {
		$this->db->select('*');
		$this->db->from('tb_lokasi');

		$data = $this->db->get();

		return $data->result();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */