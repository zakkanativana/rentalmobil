<?php 

class Register extends CI_Controller{
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
		$this->_rules();

		if( $this->form_validation->run() == FALSE ) { 			
			$this->load->view('templates_admin/header');
			$this->load->view('register_form');
			$this->load->view('templates_admin/footer');
		} else {
			$nama_customer = $this->input->post('nama_customer');
			$username_customer = $this->input->post('username_customer');
			$alamat_customer = $this->input->post('alamat_customer');
			$gender_customer = $this->input->post('gender_customer');
			$no_telepon_customer = $this->input->post('no_telepon_customer');
			$no_ktp_customer = $this->input->post('no_ktp_customer');
			$password_customer = md5($this->input->post('password_customer'));
			$role_id = '2';

			$dataInsert = array(
				'nama_customer' => $nama_customer,
				'username_customer' => $username_customer,
				'alamat_customer' => $alamat_customer,
				'gender_customer' => $gender_customer,
				'no_telepon_customer' => $no_telepon_customer,
				'no_ktp_customer' => $no_ktp_customer,
				'password_customer' => $password_customer,
				'role_id' => $role_id
			);

			$this->Rental_model->insert_data('tbl_customer', $dataInsert);
			$this->session->set_flashdata('pesan', 
			   '<div class="alert alert-success alert-dismissible fade show" role="alert">
				   <strong> Berhasil daftar, Silahkan login !! </strong> 
				   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				   <span aria-hidden="true">&times;</span>
				   </button>
				 </div>');
			   redirect('auth/login');
		}

	}
}
