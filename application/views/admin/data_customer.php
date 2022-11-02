<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1> Data Customer </h1>
		</div>
		<a href="<?= base_url('admin/data_customer/tambah_customer'); ?>" class="btn btn-primary mb-3"> Tambah Data Customer </a>

		<!-- Pesan -->
		<?= $this->session->flashdata('pesan') ?>
		<table class="table table-striped table-responsive table-bordered">
			<tr>
				<th> No. </th>
				<th> Nama </th>
				<th> Username </th>
				<th> Alamat </th>
				<th> Gender </th>
				<th> No.Telepon </th>
				<th> No.KTP </th>
				<th> Password </th>
				<th> Aksi </th>
			</tr>
			<?php
				$no = 1; 
				foreach($customer as $item) : 
			?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $item->nama_customer; ?></td>
					<td><?= $item->username_customer; ?></td>
					<td><?= $item->alamat_customer; ?></td>
					<td><?= $item->gender_customer; ?></td>
					<td><?= $item->no_telepon_customer; ?></td>
					<td><?= $item->no_ktp_customer; ?></td>
					<td><?= $item->password_customer; ?></td>
					<td>
						<div class="row">

							<a href="<?= base_url('admin/data_customer/delete_customer/'. $item->id_customer)?>" class="btn btn-sm btn-danger mr-2"> <i class="fas fa-trash"></i></a>

							<a href="<?= base_url('admin/data_customer/update_customer/'). $item->id_customer; ?>" class="btn btn-sm btn-warning"> <i class="fas fa-edit"></i></a>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</section>
</div>
