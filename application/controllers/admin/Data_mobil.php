<?php 

class Data_mobil extends CI_Controller{
	public function index(){
		$data['mobil'] = $this->Rental_model->get_data('tbl_mobil')->result();
		$data['tipe'] =  $this->Rental_model->get_data('tbl_tipe')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_mobil', $data);
		$this->load->view('templates_admin/footer');
	}

	public function _rules(){
		$this->form_validation->set_rules('kode_tipe_mobil', 'Kode_Tipe_mobil', 'required');
		$this->form_validation->set_rules('merk_mobil', 'Merk_Mobil', 'required');
		$this->form_validation->set_rules('no_plat_mobil', 'no_plat_mobil', 'required');
		$this->form_validation->set_rules('warna_mobil', 'warna_mobil', 'required');
		$this->form_validation->set_rules('tahun_mobil', 'tahun_mobil', 'required');
		$this->form_validation->set_rules('status_mobil', 'status_mobil', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');
		$this->form_validation->set_rules('denda', 'denda', 'required');
		$this->form_validation->set_rules('ac', 'ac', 'required');
		$this->form_validation->set_rules('supir', 'supir', 'required');
		$this->form_validation->set_rules('mp3_player', 'mp3_player', 'required');
		$this->form_validation->set_rules('centra_lock', 'centra_lock', 'required');
	}

	public function tambah_mobil(){
		$data['tipe'] =  $this->Rental_model->get_data('tbl_tipe')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_mobil', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_mobil_aksi(){
			$this->_rules();
			if($this->form_validation->run() == FALSE){
				$this->tambah_mobil();
			} else {
				$kode_tipe_mobil = $this->input->POST('kode_tipe_mobil');
				$merk_mobil = $this->input->POST('merk_mobil');
				$no_plat_mobil = $this->input->POST('no_plat_mobil');			
				$warna_mobil = $this->input->POST('warna_mobil');			
				$tahun_mobil = $this->input->POST('tahun_mobil');			
				$status_mobil = $this->input->POST('status_mobil');			
				$harga = $this->input->POST('harga');			
				$denda = $this->input->POST('denda');			
				$ac = $this->input->POST('ac');			
				$supir = $this->input->POST('supir');			
				$mp3_player = $this->input->POST('mp3_player');			
				$centra_lock = $this->input->POST('centra_lock');			
				$gambar_mobil = $_FILES['gambar_mobil'];	
				if($gambar_mobil == ''){
				

				} else {
					$config['upload_path'] = './assets/upload';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$this->load->library('upload', $config);
					// Apabila gagal diupload
						if(!$this->upload->do_upload('gambar_mobil')){
							echo "Gambar Mobil Gagal di Upload";
						} else {
							$gambar_mobil = $this->upload->data('file_name');
						}
				}
				$dataInsert = array(
					'kode_tipe_mobil' => $kode_tipe_mobil,
					'no_plat_mobil' => $no_plat_mobil,
					'merk_mobil' => $merk_mobil,
					'warna_mobil' => $warna_mobil,
					'tahun_mobil' => $tahun_mobil,
					'status_mobil' => $status_mobil,
					'harga' => $harga,
					'denda' => $denda,
					'ac' => $ac,
					'supir' => $supir,
					'mp3_player' => $mp3_player,
					'centra_lock' => $centra_lock,
					'gambar_mobil' => $gambar_mobil,
				);
				$this->Rental_model->insert_data('tbl_mobil', $dataInsert);
				$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong> Data mobil berhasil ditambahkan !! </strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			  	</div>');
				redirect('admin/data_mobil');
			}		
	}

	public function update_mobil($id){
		$where = array('id_mobil' => $id);
		$data['mobil'] = $this->db->query("SELECT * FROM tbl_mobil mb, tbl_tipe tp WHERE mb.kode_tipe_mobil = tp.kode_tipe AND mb.id_mobil = '$id'")->result();
		$data['tipe'] = $this->Rental_model->get_data('tbl_tipe')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_mobil', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update_mobil_aksi(){
		$this->_rules();
			if( $this->form_validation->run() == FALSE ) { 
				$id = $this->input->POST('id_mobil');
				$this->update_mobil($id);
			} else {
				$id = $this->input->POST('id_mobil');
				$kode_tipe_mobil = $this->input->POST('kode_tipe_mobil');
				$merk_mobil = $this->input->POST('merk_mobil');
				$no_plat_mobil = $this->input->POST('no_plat_mobil');			
				$warna_mobil = $this->input->POST('warna_mobil');			
				$tahun_mobil = $this->input->POST('tahun_mobil');			
				$status_mobil = $this->input->POST('status_mobil');	
				$harga = $this->input->POST('harga');			
				$denda = $this->input->POST('denda');			
				$ac = $this->input->POST('ac');			
				$supir = $this->input->POST('supir');			
				$mp3_player = $this->input->POST('mp3_player');			
				$centra_lock = $this->input->POST('centra_lock');			
				$gambar_mobil = $_FILES['gambar_mobil'];	
				if($gambar_mobil){
					$config['upload_path'] = './assets/upload';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$this->load->library('upload', $config);
					if($this->upload->do_upload('gambar_mobil')){
						$gambar_mobil = $this->upload->data('file_name');
						$this->db->set('gambar_mobil', $gambar_mobil);
					} else {
						echo $this->upload->display_errors();
					}
				}
				$dataUpdate = array(
					'kode_tipe_mobil' => $kode_tipe_mobil,
					'no_plat_mobil' => $no_plat_mobil,
					'merk_mobil' => $merk_mobil,
					'warna_mobil' => $warna_mobil,
					'tahun_mobil' => $tahun_mobil,
					'status_mobil' => $status_mobil,
					'harga' => $harga,
					'denda' => $denda,
					'ac' => $ac,
					'supir' => $supir,
					'mp3_player' => $mp3_player,
					'centra_lock' => $centra_lock,
				);
				$dataWhere = array('id_mobil' => $id);
				$this->Rental_model->update_data('tbl_mobil', $dataUpdate, $dataWhere);
				$this->session->set_flashdata('pesan', 
				'<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong> Data mobil berhasil diupdate !! </strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			  	</div>');
				redirect('admin/data_mobil');
			 }
	}

	public function detail_mobil($id){
		$data['detail'] = $this->Rental_model->ambil_id_mobil($id);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_mobil', $data);
		$this->load->view('templates_admin/footer');
	}

	public function delete_mobil($id){
		$where = array('id_mobil' => $id);
		$this->Rental_model->delete_data($where, 'tbl_mobil');
		$this->session->set_flashdata('pesan', 
		'<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong> Data mobil berhasil dihapus !! </strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		redirect('admin/data_mobil');

	}
}
