<?php 

class Data_customer extends CI_Controller{
	public function _rules(){
		$this->form_validation->set_rules('nama_customer', 'nama_customer', 'required');
		$this->form_validation->set_rules('username_customer', 'username_customer', 'required');
		$this->form_validation->set_rules('alamat_customer', 'alamat_customer', 'required');
		$this->form_validation->set_rules('gender_customer', 'gender_customer', 'required');
		$this->form_validation->set_rules('no_telepon_customer', 'no_telepon_customer', 'required');
		$this->form_validation->set_rules('no_ktp_customer', 'no_ktp_customer', 'required');
		$this->form_validation->set_rules('password_customer', 'password_customer', 'required');
	}

	public function index(){
		$data['customer'] = $this->Rental_model->get_data('tbl_customer')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_customer', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_customer(){
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_customer');
		$this->load->view('templates_admin/footer');
	}

	public function tambah_customer_aksi(){
		$this->_rules();
		if( $this->form_validation->run() == FALSE ) { 
			$this->tambah_customer();
		 } else {
			 $nama_customer = $this->input->post('nama_customer');
			 $username_customer = $this->input->post('username_customer');
			 $alamat_customer = $this->input->post('alamat_customer');
			 $gender_customer = $this->input->post('gender_customer');
			 $no_telepon_customer = $this->input->post('no_telepon_customer');
			 $no_ktp_customer = $this->input->post('no_ktp_customer');
			 $password_customer = md5($this->input->post('password_customer'));

			 $dataInsert = array(
				 'nama_customer' => $nama_customer,
				 'username_customer' => $username_customer,
				 'alamat_customer' => $alamat_customer,
				 'gender_customer' => $gender_customer,
				 'no_telepon_customer' => $no_telepon_customer,
				 'no_ktp_customer' => $no_ktp_customer,
				 'password_customer' => $password_customer
			 );
			 $this->Rental_model->insert_data('tbl_customer', $dataInsert);
			 $this->session->set_flashdata('pesan', 
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong> Data Customer berhasil ditambahkan !! </strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			  	</div>');
				redirect('admin/data_customer');
		 }
	}

	public function update_customer($id){
		$dataWhere = array('id_customer' => $id);
		$data['customer'] = $this->db->query("SELECT * FROM tbl_customer WHERE id_customer = '$id'")->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_customer', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update_customer_aksi(){
		$this->_rules();
		if( $this->form_validation->run() == FALSE ) { 
			$id = $this->input->POST('id_customer');
			$this->update_customer($id);
		 } else {
			$id = $this->input->POST('id_customer');

			$nama_customer = $this->input->post('nama_customer');
			$username_customer = $this->input->post('username_customer');
			$alamat_customer = $this->input->post('alamat_customer');
			$gender_customer = $this->input->post('gender_customer');
			$no_telepon_customer = $this->input->post('no_telepon_customer');
			$no_ktp_customer = $this->input->post('no_ktp_customer');
			$password_customer = md5($this->input->post('password_customer'));

			$dataUpdate = array(
				'nama_customer' => $nama_customer,
				'username_customer' => $username_customer,
				'alamat_customer' => $alamat_customer,
				'gender_customer' => $gender_customer,
				'no_telepon_customer' => $no_telepon_customer,
				'no_ktp_customer' => $no_ktp_customer,
				'password_customer' => $password_customer
			);
			$where = array(
				'id_customer' => $id
			);
			$this->Rental_model->update_data('tbl_customer',$dataUpdate, $where);
			$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong> Data Customer berhasil diupdate !! </strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			redirect('admin/data_customer');
		 }
	}
	
	public function delete_customer($id){
		$dataWhere = array('id_customer' => $id);
		$this->Rental_model->delete_data($dataWhere, 'tbl_customer');
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong> Data Customer berhasil dihapus !! </strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			redirect('admin/data_customer');
	}
}

?>
