<?php 

class Rental extends CI_Controller{
	public function tambah_rental($id){
		$data['detail'] = $this->Rental_model->ambil_id_mobil($id);
		$this->load->view('templates_customer/header');
		$this->load->view('customer/tambah_rental', $data);
		$this->load->view('templates_customer/footer');
	}

	public function tambah_rental_aksi(){
		$id_customer = $this->session->userdata('id_customer');
		$id_mobil = $this->input->POST('id_mobil');
		$tanggal_rental = $this->input->POST('tanggal_rental');
		$tanggal_seharusnya_kembali = $this->input->POST('tanggal_seharusnya_kembali');
		$denda = $this->input->POST('denda');
		$harga = $this->input->POST('harga');
		
		$data = array(
			'id_customer' => $id_customer,
			'id_mobil' => $id_mobil,
			'tanggal_rental' => $tanggal_rental,
			'tanggal_seharusnya_kembali' => $tanggal_seharusnya_kembali,
			'denda' => $denda,
			'harga' => $harga,
			'tanggal_pengembalian_mobil' => '-',
			'status_rental' => 'Belum Selesai',
			'status_pengembalian' => 'Belum Kembali',
			'total_denda' => '0'
		);
		$this->Rental_model->insert_data('tbl_transaksi', $data);
		$status = array(
			'status_mobil' => 0
		);
		$id = array(
			'id_mobil' => $id_mobil
		);
		$this->Rental_model->update_data('tbl_mobil', $status, $id);
		$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong> Transaksi Berhasil Silahkan Checkout !! </strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			  	</div>');
		redirect('customer/data_mobil');
	}
}	

?>
