<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lokasi extends CI_Model {
 	public function select_all() {
		$this->db->select('*');
		$this->db->from('tb_lokasi');

		$data = $this->db->get();

		return $data->result();
	}
	public function insert() {

		$sql = "INSERT INTO tb_lokasi VALUES('','" .$data['kota'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();

	}

	public function insert_batch($data) {
		$this->db->insert_batch('tb_lokasi', $data);
		
		return $this->db->affected_rows();
	}

}



/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */