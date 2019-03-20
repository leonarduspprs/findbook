<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lokasi extends CI_Model {
 	public function select_all() {
		$this->db->select('*');
		$this->db->from('tb_lokasi');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {

		$data = $this->db->query("select * from tb_lokasi where id_lokasi = '".$id."'   ");

		return $data->row();
	}

	public function insert($data) {

		
		$this->db->insert('tb_lokasi', $data);



		return $this->db->affected_rows();

	}

	public function insert_batch($data) {
		$this->db->insert_batch('tb_lokasi', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE tb_lokasi SET lokasi='" .$data['lokasi'] ."' WHERE id_lokasi ='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM tb_lokasi WHERE id_lokasi='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	

}



/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */