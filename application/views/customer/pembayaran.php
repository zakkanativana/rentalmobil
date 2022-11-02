<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-8">
			<div class="card" style="margin-top: 150px; ">
				<div class="card-header alert alert-success">
					Invoice Pembayaran Anda
				</div>
				<div class="card-body">
					<table class="table">
						<?php foreach ($transaksi as $item) : ?>
							<tr>
								<th> Merk Mobil </th>
								<td> : </td>
								<td> <?= $item->merk_mobil; ?></td>
							</tr>
							<tr>
								<th> Tanggal Rental </th>
								<td> : </td>
								<td> <?= $item->tanggal_rental; ?></td>
							</tr>
							<tr>
								<th> Tanggal Seharusnya Kembali </th>
								<td> : </td>
								<td> <?= $item->tanggal_seharusnya_kembali; ?></td>
							</tr>
							<tr>
								<th> Biaya Sewa / Hari </th>
								<td> : </td>
								<td> Rp. <?= number_format($item->harga, 0, ',', '.'); ?></td>
							</tr>
							<tr>
								<?php
								$x = strtotime($item->tanggal_seharusnya_kembali);
								$y = strtotime($item->tanggal_rental);
								$jmlHari = abs(($x - $y) / (60 * 60 * 24));
								?>
								<th> Jumlah Hari Sewa </th>
								<td> : </td>
								<td> <?= $jmlHari; ?> Hari </td>
							</tr>
							<tr class="text-success">
								<th> Jumlah Pembayaran </th>
								<td> : </td>
								<td> <button class="btn btn-sm btn-success"> Rp. <?= number_format($item->harga * $jmlHari, 0, ',', '.') ?> </button> </td>
							</tr>
							<tr class="text-success">
								<th></th>
								<td></td>
								<td> <a href="<?= base_url('customer/transaksi/cetak_invoice/'. $item->id_rental) ?>" class="btn btn-sm btn-secondary"> Print Invoice </a> </td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="margin-top: 150px; margin-bottom: 150px;">
				<div class="card-header alert alert-primary">
					Informasi Pembayaran
				</div>
				<div class="card-body">
					<p class="text-success mb-2"> Silahkan melakukan pembayaran melalui No.Rekening dibawah ini </p>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"> Mandiri : 08469512347 </li>
						<li class="list-group-item"> BCA : 1546587</li>
						<li class="list-group-item"> BNI : 1469793</li>
					</ul>

					<?php if (empty($item->bukti_pembayaran)) { ?>
						<!-- Button trigger modal -->
						<button style="width: 100%;" type="button" class="btn btn-sm btn-danger mt-3" data-toggle="modal" data-target="#exampleModal">
							Upload Bukti Pembayaran
						</button>
					<?php } else if ($item->status_pembayaran == '0') { ?>
						<button class="btn btn-sm btn-warning" style="width: 100%;"> <i class="fa fa-clock-o"></i> Menunggu Konfirmasi </button>
					<?php } else if ($item->status_pembayaran == '1') { ?>
						<button class="btn btn-sm btn-success" style="width: 100%;"> <i class="fa fa-check"></i> Pembayaran Selesai </button>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran Anda</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="<?= base_url('customer/transaksi/pembayaran_aksi'); ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for=""> Upload Bukti pembayaran </label>
						<input type="hidden" name="id_rental" value="<?= $item->id_rental ?>" class="form-control">
						<input type="file" name="bukti_pembayaran" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-sm btn-success"> Upload </button>
				</div>
			</form>
		</div>
	</div>
</div>
