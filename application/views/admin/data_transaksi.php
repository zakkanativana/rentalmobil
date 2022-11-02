<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1> Data Transaksi </h1>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
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
					<th> Bukti Pembayaran </th>
					<th> Action </th>
				</tr>

				<?php $no = 1;
				foreach ($transaksi as $item) :
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
						<td><?= $item->status_pengembalian?></td>
						<td><?= $item->status_rental; ?></td>
						<td>
							<center>
								<?php if (empty($item->bukti_pembayaran)) { ?>
									<button class="btn btn-sm btn-danger">
										<i class="fas fa-times-circle"></i>
										Belum mengirim bukti
									</button>
									
								<?php } else { ?>
									<a class="btn btn-sm btn-primary" href="<?= base_url('admin/transaksi/pembayaran/'.$item->id_rental); ?>"> <i class="fas fa-check-circle"></i> Sudah mengirim bukti</a>
								<?php } ?>
							</center>
						</td>
						<td>
							<?php
							if (empty($item->bukti_pembayaran)) {
								echo "-";
							} else { ?>
								<div class="row">
									<a href="<?= base_url('admin/transaksi/transaksi_selesai/'. $item->id_rental) ?>" class="btn btn-sm btn-success mr-2"> <i class="fas fa-check"></i> </a>
									<a href="<?= base_url('admin/transaksi/batal_transaksi/'. $item->id_rental) ?>" class="btn btn-sm btn-danger"> <i class="fas fa-times"></i> </a>
								</div>
							<?php } ?>

						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</section>
</div>
