<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1> Detail Mobil</h1>
		</div>
	</section>

	<?php foreach ($detail as $item) : ?>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-5">
						<img src="<?= base_url('assets/upload/') . $item->gambar_mobil ?>" class="img-fluid">
					</div>
					<div class="col-md-7">
						<table class="table table-responsive">
							<tr>
								<td> Tipe Mobil :
									<?php
									if ($item->kode_tipe_mobil == "SDN") {
										echo "Sedan";
									} else if ($item->kode_tipe_mobil == "HTB") {
										echo "Hatchback";
									} else if ($item->kode_tipe_mobil == "MPV") {
										echo "Multi Purpose Vechile";
									} else {
										echo "<span class='text-danger'> Tipe mobil belum terdaftar !! </span>";
									}
									?>
								</td>
							</tr>
							<tr>
								<td> Merk mobil </td>
								<td> <?= $item->merk_mobil; ?></td>
							</tr>
							<tr>
								<td> No plat mobil </td>
								<td> <?= $item->no_plat_mobil; ?></td>
							</tr>
							<tr>
								<td> Warna mobil </td>
								<td> <?= $item->warna_mobil; ?></td>
							</tr>
							<tr>
								<td> Tahun mobil </td>
								<td> <?= $item->tahun_mobil; ?></td>
							</tr>
							<tr>
								<td> Harga mobil </td>
								<td> Rp. <?= number_format($item->harga,0,',','.'); ?></td>
							</tr>
							<tr>
								<td> Denda mobil </td>
								<td> Rp. <?= number_format($item->denda,0,',','.'); ?></td>
							</tr>
							<tr>
								<td> Status mobil </td>
								<td>
									<?php if ($item->status_mobil == "0") {
										echo "<span class='badge badge-danger'> Tidak tersedia </span>";
									} else {
										echo "<span class='badge badge-primary'> Tersedia </span>";
									}
									?>
								</td>
							</tr>
							<tr>
								<td> AC Mobil </td>
								<td>
									<?php if ($item->ac == "0") {
										echo "<span class='badge badge-danger'> Tidak tersedia </span>";
									} else {
										echo "<span class='badge badge-primary'> Tersedia </span>";
									}
									?>
								</td>
							</tr>
							<tr>
								<td> Supir Mobil </td>
								<td>
									<?php if ($item->supir == "0") {
										echo "<span class='badge badge-danger'> Tidak tersedia </span>";
									} else {
										echo "<span class='badge badge-primary'> Tersedia </span>";
									}
									?>
								</td>
							</tr>
							<tr>
								<td> mp3_player Mobil </td>
								<td>
									<?php if ($item->mp3_player == "0") {
										echo "<span class='badge badge-danger'> Tidak tersedia </span>";
									} else {
										echo "<span class='badge badge-primary'> Tersedia </span>";
									}
									?>
								</td>
							</tr>
							<tr>
								<td> centra_lock Mobil </td>
								<td>
									<?php if ($item->centra_lock == "0") {
										echo "<span class='badge badge-danger'> Tidak tersedia </span>";
									} else {
										echo "<span class='badge badge-primary'> Tersedia </span>";
									}
									?>
								</td>
							</tr>
							<tr>
								<td> 
									<a href="<?= base_url('admin/data_mobil'); ?>" class="btn btn-sm btn-danger"> Kembali </a>
									<a href="<?= base_url('admin/data_mobil/update_mobil/'. $item->id_mobil); ?>" class="btn btn-sm btn-primary"> Update data </a>
								</td>
							</tr>
						</table>

					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
