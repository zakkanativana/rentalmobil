<?php 

class Transaksi extends CI_Controller{
	public function index(){
		$data['transaksi'] = $this->db->query("SELECT * FROM tbl_transaksi tr, tbl_mobil mb, tbl_customer cs WHERE tr.id_mobil = mb.id_mobil AND tr.id_customer = cs.id_customer")->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_transaksi', $data);
		$this->load->view('templates_admin/footer');
	}

	public function pembayaran($id){
		$dataWhere = array(
			'id_rental' => $id
		);
		$data['pembayaran'] = $this->db->query("SELECT * FROM tbl_transaksi WHERE id_rental='$id'")->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/konfirmasi_pembayaran', $data);
		$this->load->view('templates_admin/footer');

	}

	public function cek_pembayaran(){
		$id = $this->input->POST('id_rental');
		$status_pembayaran = $this->input->POST('status_pembayaran');
		$data = array(
			'status_pembayaran' => $status_pembayaran
		);
		$where = array(
			'id_rental' => $id
		);
		$this->Rental_model->update_data('tbl_transaksi', $data, $where);
		redirect('admin/transaksi');
	}

	public function download_pembayaran($id){
		$this->load->helper('download');

		// Query data mana yang akan kita download
		$filePembayaran = $this->Rental_model->downloadPembayaran($id);
		$file = 'assets/upload/'. $filePembayaran['bukti_pembayaran'];
		force_download($file, NULL);
	}

	public function transaksi_selesai($id){
		$where = array(
			'id_rental' => $id
		);
		$data['transaksi'] = $this->db->query("SELECT * FROM tbl_transaksi WHERE id_rental = '$id'")->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/transaksi_selesai', $data);
		$this->load->view('templates_admin/footer');
	}

	public function transaksi_selesai_aksi(){
		$id = $this->input->POST('id_rental');
		$tanggal_pengembalian_mobil = $this->input->POST('tanggal_pengembalian_mobil');
		$status_rental = $this->input->POST('status_rental');
		$status_pengembalian = $this->input->POST('status_pengembalian');
		$tanggal_seharusnya_kembali = $this->input->POST('tanggal_seharusnya_kembali');
		$denda = $this->input->POST('denda');

		$x = strtotime($tanggal_pengembalian_mobil);
		$y = strtotime($tanggal_seharusnya_kembali);
		// Total Denda
		$selisih = abs($x - $y)/(60*60*24);
		// var_dump($selisih);
		// die;
		$total_denda = $selisih * $denda;

		$data = array(
			'tanggal_pengembalian_mobil' => $tanggal_pengembalian_mobil,
			'status_rental' => $status_rental,
			'status_pengembalian' => $status_pengembalian,
			'total_denda' => $total_denda 
		);
		$dataWhere = array(
			'id_rental' => $id
		);
		$this->Rental_model->update_data('tbl_transaksi', $data, $dataWhere);
		$this->session->set_flashdata('pesan', 
		'<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong> Transaksi berhasil diupdate !! </strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
		redirect('admin/transaksi');
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
		redirect('admin/transaksi');
	}
}

?>
