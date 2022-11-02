<?php

class Transaksi extends CI_Controller
{
	public function index()
	{
		$customer = $this->session->userdata('id_customer');

		$data['transaksi'] = $this->db->query("SELECT * FROM tbl_transaksi tr, tbl_mobil mb, tbl_customer cs WHERE tr.id_mobil = mb.id_mobil AND tr.id_customer = cs.id_customer AND cs.id_customer='$customer' ORDER BY id_rental DESC")->result();
		$this->load->view('templates_customer/header');
		$this->load->view('customer/transaksi', $data);
		$this->load->view('templates_customer/footer');
	}

	public function pembayaran($id)
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM tbl_transaksi tr, tbl_mobil mb, tbl_customer cs WHERE tr.id_mobil = mb.id_mobil AND tr.id_customer = cs.id_customer AND tr.id_rental='$id' ORDER BY id_rental DESC")->result();
		$this->load->view('templates_customer/header');
		$this->load->view('customer/pembayaran', $data);
		$this->load->view('templates_customer/footer');
	}

	public function pembayaran_aksi()
	{
		$id = $this->input->POST('id_rental');
		$bukti_pembayaran = $_FILES['bukti_pembayaran'];
		if ($bukti_pembayaran) {
			$config['upload_path'] = './assets/upload';
			$config['allowed_types'] = 'pdf|jpg|png|jpeg';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('bukti_pembayaran')) {
				$bukti_pembayaran = $this->upload->data('file_name');
				$this->db->set('bukti_pembayaran', $bukti_pembayaran);
			} else {
				echo $this->upload->display_errors();
			}
		}
		$dataUpdate = array(
			'bukti_pembayaran' => $bukti_pembayaran
		);
		$dataWhere = array(
			'id_rental' => $id
		);
		$this->Rental_model->update_data('tbl_transaksi', $dataUpdate, $dataWhere);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong> Bukti Pembayaran Berhasil Di Upload !! </strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		  </div>'
		);
		redirect('customer/transaksi');
	}

	public function cetak_invoice($id){
		$data['transaksi'] = $this->db->query("SELECT * FROM tbl_transaksi tr, tbl_mobil mb, tbl_customer cs WHERE tr.id_mobil = mb.id_mobil AND tr.id_customer = cs.id_customer AND tr.id_rental='$id'")->result();
		$this->load->view('customer/cetak_invoice', $data);
	}

	public function batal_transaksi($id){
		$where = array('id_rental' => $id);
		$data = $this->Rental_model->get_where($where, 'tbl_transaksi')->row();

		// Ambil id mobil
		$whereId = array(
			'id_mobil' => $data->id_mobil
		);
		
		$dataStatus = array(
			'status_mobil' => '1'
		);
		$this->Rental_model->update_data('tbl_mobil', $dataStatus, $whereId);
		
		// Menghapus data yang ada dalam tbl_transaksi, ketika sebuah transaksi batal maka data nya harus dihapus dari tbl_transaksi
		$this->Rental_model->delete_data($where, 'tbl_transaksi');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong> Transaksi berhasil dibatalkan !! </strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		  </div>'
		);
		redirect('customer/transaksi');
	}
}
