<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1> Filter Laporan Transaksi </h1>
		</div>
	</section>

	<form method="POST" action="<?= base_url('admin/laporan') ?>">
		<div class="form-group">
			<label for=""> Dari Tanggal </label>
			<input type="date" name="dari" class="form-control">
			<?= form_error('dari', '<span class="text-small text-danger">', '</span>'); ?>
		</div>
		<div class="form-group">
			<label for=""> Sampai Tanggal </label>
			<input type="date" name="sampai" class="form-control">
			<?= form_error('sampai', '<span class="text-small text-danger">', '</span>'); ?>
		</div>
		<button type="submit" class="btn btn-sm btn-primary"> <i class="fas fa-eye"></i> Tampilkan Data </button>
	</form>

	<div class="btn-group mt-5">
		<a href="<?= base_url(). 'admin/laporan/print_laporan/?dari='. set_value('dari'). '&sampai='. set_value('sampai'); ?>" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-print"></i> Print </a>
	</div>

	<div class="table-responsive mt-3">
		<table class="table table-bordered table-striped">
			<hr>
			<tr>
				<th> No. </th>
				<th> Nama Customer </th>
				<th> Mobil </th>
				<th> Tanggal Rental </th>
				<th> Tanggal Seharusnya Kembali </th>
				<th> Harga / Hari </th>
				<th> Denda / Hari </th>
				<th> Tanggal Pengembalian </th>
				<th> Total Denda </th>
				<th> Status Dikembalikan </th>
				<th> Status Rental </th>
			</tr>

			<?php $no = 1;
			foreach ($laporan as $item) :
			?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $item->nama_customer; ?></td>
					<td><?= $item->merk_mobil; ?></td>
					<td><?= date('d/m/Y', strtotime($item->tanggal_rental)); ?></td>
					<td><?= date('d/m/Y', strtotime($item->tanggal_seharusnya_kembali)); ?></td>
					<td>Rp.<?= number_format($item->harga, 0, ',', '.'); ?></td>
					<td>Rp.<?= number_format($item->denda, 0, ',', '.'); ?></td>
					<td>
						<?php
						if ($item->tanggal_pengembalian_mobil == "0000-00-00") {
							echo "-";
						} else {
							echo date('d/m/Y', strtotime($item->tanggal_pengembalian_mobil));
						}
						?>
					</td>
					<td>Rp.<?= number_format($item->total_denda, 0, ',', '.'); ?></td>
					<td><?= $item->status_pengembalian ?></td>
					<td><?= $item->status_rental; ?></td>

				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
