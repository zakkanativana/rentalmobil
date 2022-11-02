<?php

class Auth extends CI_Controller
{

	public function _rules()
	{
		$this->form_validation->set_rules('username_customer', 'Username_customer', 'required');
		$this->form_validation->set_rules('password_customer', 'Password_customer', 'required');
	}

	public function login()
	{

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates_admin/header');
			$this->load->view('form_login');
			$this->load->view('templates_admin/footer');
		} else {
			$username = $this->input->POST('username_customer');
			$password = md5($this->input->POST('password_customer'));

			// Cek data ada dalam tabel atau tidak ?
			$cekData = $this->Rental_model->cek_login($username, $password);
		
			// var_dump($cekData);
			// die;

			if ($cekData == FALSE) {
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong> Username / Password salah !! </strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				  </div>'
				);
				redirect('auth/login');
			} else {
				//  Cek Role_ID
				$this->session->set_userdata('id_customer',$cekData->id_customer);
				$this->session->set_userdata('username_customer', $cekData->username);
				$this->session->set_userdata('role_id', $cekData->role_id);
				$this->session->set_userdata('nama_customer', $cekData->nama_customer);

				switch ($cekData->role_id) {
					case 1:
						redirect('admin/dashboard');
						break;
					case 2:
						redirect('customer/dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('customer/dashboard');
	}

	public function ganti_password()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('ganti_password');
		$this->load->view('templates_admin/footer');
	}

	public function ganti_password_aksi()
	{
		$pass_baru = $this->input->POST('pass_baru');
		$ulang_pass = $this->input->POST('ulang_pass');

	

		$this->form_validation->set_rules('pass_baru', 'Password baru', 'required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates_admin/header');
			$this->load->view('ganti_password');
			$this->load->view('templates_admin/footer');
		} else {
		
			$id = ['id_customer' => $this->session->userdata('id_customer')];
			$dataUpdate = ['password_customer' => md5($pass_baru)];
	
			// var_dump($dataUpdate, $id, $pass_baru, $ulang_pass);
			// die;
			
			$this->Rental_model->update_password($id, $dataUpdate, 'tbl_customer');

			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong> Password berhasil diupdate, Silahkan Login !! </strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			  </div>'
			);
			redirect('auth/login');
		}
	}
}
