<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {
	public function select_all_pegawai() {
		$data = $this->db->get('tb_contact');

		return $data->result();

		// $sql = "SELECT * FROM tb_contact";

		// $data = $this->db->query($sql);

		// return $data->result();
	}

	// public function select_all() {
	// 	$sql = " SELECT tb_contact.id AS id, tb_contact.nama AS nama, tb_contact.nohp AS telp, tb_contact.email AS email, tb_contact.divisi AS divisi, tb_contact.ext AS ext, tb_contact.status_id AS status_id, tb_contact.input AS input, tb_contact.upd AS upd, tb_lokasi.id_lokasi AS lokasi FROM tb_contact, tb_lokasi WHERE tb_contact.id_lokasi = tb_lokasi.id";

	// 	$data = $this->db->query($sql);

	// 	return $data->result();
	// }


	public function select_all() {
		$sql = " SELECT * FROM tb_contact where id";

		$data = $this->db->query($sql);

		return $data->result();
	}


	public function select_by_id($id) {
	 	// $sql = "SELECT * from tb_contact where id = '{$id}'";

		$data = $this->db->query("SELECT * FROM tb_contact where id ='".$id."' ");

	 	return $data->row();
	 }

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM tb_contact WHERE input";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM tb_contact WHERE id_lokasi = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	// public function update($data) {
	// 	$sql = "UPDATE pegawai SET nama='" .$data['nama'] ."', telp='" .$data['telp'] ."', id_kota=" .$data['kota'] .", id_kelamin=" .$data['jk'] .", id_posisi=" .$data['posisi'] ." WHERE id='" .$data['id'] ."'";

	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }

	public function update($data) {
		$sql = "UPDATE tb_contact SET 
		nama='" .$data['nama'] ."', 
		email='" .$data['email'] ."', 
		divisi=" .$data['divisi'] .", 
		nohp=" .$data['nohp'] .", 
		status_id=" .$data['status_id'] .", 
		input=" .$data['input'] .", 
		tanggal=" .$data['tanggal'] .", 
		jam=" .$data['jam'] .", 
		upd=" .$data['upd'] .", 
		tglup=" .$data['tglup'] .", 
		id_lokasi=" .$data['lokasi'] ." 
		WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


	public function delete($id) {
		$sql = "DELETE FROM tb_contact WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO id_contact VALUES('{$id}','" .$data['nama'] ."','" .$data['email'] ."'," .$data['divisi'] ."," .$data['nohp'] ."," .$data['ext'] ."," .$data['status_id'] ."," .$data['input'] ."," .$data['tanggal'] ."," .$data['jam'] ."," .$data['upd'] ."," .$data['tglup'] ."," .$data['id_lokasi'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('tb_contact', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('tb_contact');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('tb_contact');

		return $data->num_rows();
	}
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */