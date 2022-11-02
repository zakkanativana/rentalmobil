<div class="main-content">
	<div class="section">
		<div class="section-header">
			<h1> Data Tipe Mobil </h1>
		</div>
		<a href="<?= base_url('admin/Data_tipe/tambah_tipe'); ?>" class="btn btn-primary mb-3"> Tambah Tipe Mobil </a>

		<!-- Pesan -->
		<?= $this->session->flashdata('pesan') ?>
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th width="20px"> No. </th>
					<th> Kode Tipe </th>
					<th> Nama Tipe </th>
					<th> Aksi </th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($tipe as $item) : ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $item->kode_tipe ?></td>
						<td><?= $item->nama_tipe ?></td>
						<td>
							<a href="<?= base_url('admin/data_tipe/delete_tipe/'). $item->id_tipe; ?>" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i></a>
							<a href="<?= base_url('admin/data_tipe/update_tipe/'). $item->id_tipe; ?>" class="btn btn-sm btn-warning"> <i class="fas fa-edit"></i></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
