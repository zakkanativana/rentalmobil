<?php 

class Rental_model extends CI_Model{
	public function get_data($table){
		return $this->db->get($table);
	}

	public function insert_data($tabel, $data){
		return $this->db->insert($tabel, $data);
	}

	public function get_where($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function update_data($tabel, $data, $where){
		return $this->db->update($tabel, $data, $where);
	}

	public function ambil_id_mobil($id){
		$result = $this->db->where('id_mobil', $id)->get('tbl_mobil');
		// Jika ada baris baru yang ditambah
			if($result->num_rows() > 0){
				return $result->result();
			} else {
				return FALSE;
			}
	}

	public function delete_data($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function cek_login(){
		$username = set_value('username_customer');
		$password = set_value('password_customer');

		$result = $this->db
						->where('username_customer', $username)
						->where('password_customer', md5($password))
						->limit(1)
						->get('tbl_customer');
		// Apabila data yang diambil itu ada dalam tabel customer maka pasti lebih dari 0
		if( $result->num_rows() > 0 ) { 
			return $result->row();
		} else {
			return FALSE;	
		}
	}

	public function update_password($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function downloadPembayaran($id){
		$query = $this->db->get_where('tbl_transaksi', array('id_rental' => $id));
		return $query->row_array();
	}
}

?>
