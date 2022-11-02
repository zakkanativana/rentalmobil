<?php 

class Data_tipe extends CI_Controller{
	public function _rules(){
		$this->form_validation->set_rules('kode_tipe', 'Kode_Tipe', 'required');
		$this->form_validation->set_rules('nama_tipe', 'Nama_tipe', 'required');
	}

    public function index(){
		$data['tipe'] = $this->Rental_model->get_data('tbl_tipe')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_tipe', $data);
        $this->load->view('templates_admin/footer');
    }

	public function tambah_tipe(){
		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_tipe');
        $this->load->view('templates_admin/footer');
	}

	public function tambah_tipe_aksi(){
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->tambah_tipe();
		} else {
			$kode_tipe = $this->input->POST('kode_tipe');
			$nama_tipe = $this->input->POST('nama_tipe');
			$dataInsert = array(
				'kode_tipe' => $kode_tipe,
				'nama_tipe' => $nama_tipe
			);
			$this->Rental_model->insert_data('tbl_tipe', $dataInsert);
			$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong> Data tipe berhasil ditambahkan !! </strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			redirect('admin/data_tipe');
		}
	}

	public function update_tipe($id){
		$dataWhere = array('id_tipe' => $id);
		$data['tipe'] = $this->db->query("SELECT * FROM tbl_tipe WHERE id_tipe = '$id'")->result();
		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_tipe', $data);
        $this->load->view('templates_admin/footer');
	}

	public function update_tipe_aksi(){
		$this->_rules();
		if( $this->form_validation->run() == FALSE ) { 
			$id = $this->input->POST('id_tipe');
			$this->update_tipe($id);
		} else {
			$id = $this->input->POST('id_tipe');
			$kode_tipe = $this->input->POST('kode_tipe');
			$nama_tipe = $this->input->POST('nama_tipe');
			$dataUpdate = array(
				'kode_tipe' => $kode_tipe,
				'nama_tipe' => $nama_tipe
			);
			$dataWhere = array(
				'id_tipe' => $id
			);
			$this->Rental_model->update_data('tbl_tipe',$dataUpdate, $dataWhere);
			$this->session->set_flashdata('pesan', 
			'<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong> Data tipe berhasil diupdate !! </strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('admin/data_tipe');
		 }
	}

	public function delete_tipe($id){
		$dataWhere = array('id_tipe' => $id);
		$this->Rental_model->delete_data($dataWhere, 'tbl_tipe');
		$this->session->set_flashdata('pesan', 
		'<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong> Data tipe berhasil dihapus !! </strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
		redirect('admin/data_tipe');
	}
}
