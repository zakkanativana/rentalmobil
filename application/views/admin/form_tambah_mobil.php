<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Tambah Data Mobil</h1>
		</div>
		<!-- Card -->
		<div class="card">
			<div class="card-body">
				<form action="<?= base_url('admin/data_mobil/tambah_mobil_aksi'); ?>" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="tipe_mobil"> Type Mobil </label>
								<select name="kode_tipe_mobil" id="tipe_mobil" class="form-control">
									<option value=""> -- Pilih Tipe Mobil </option>
									<?php foreach ($tipe as $item) : ?>
										<option value="<?= $item->kode_tipe ?>"> <?= $item->nama_tipe ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('kode_tipe', '<div class="text-small text-danger">' , '</div>') ?>
							</div>
							<div class="form-group">
								<label for="merk"> Merk Mobil </label>
								<input type="text" name="merk_mobil" class="form-control">
								<?= form_error('merk_mobil', '<div class="text-small text-danger">' , '</div>') ?>
							</div>
							<div class="form-group">
								<label for="no_plat"> No Plat Mobil </label>
								<input type="text" name="no_plat_mobil" class="form-control">
								<?= form_error('no_plat_mobil', '<div class="text-small text-danger">' , '</div>') ?>
							</div>
							<div class="form-group">
								<label for="warna"> Warna Mobil </label>
								<input type="text" name="warna_mobil" class="form-control">
								<?= form_error('warna_mobil', '<div class="text-small text-danger">' , '</div>') ?>
							</div>
							<div class="form-group">
								<label for="warna"> AC Mobil </label>
								<select name="ac" class="form-control">
									<option value="1"> Tersedia </option>
									<option value="0"> Tidak Tersedia </option>
									<?= form_error('ac', '<div class="text-small text-danger">' , '</div>') ?>
								</select>
							</div>
							<div class="form-group">
								<label for="warna"> Supir Mobil </label>
								<select name="supir" class="form-control">
									<option value="1"> Tersedia </option>
									<option value="0"> Tidak Tersedia </option>
									<?= form_error('supir', '<div class="text-small text-danger">' , '</div>') ?>
								</select>
							</div>
							<div class="form-group">
								<label for="warna"> mp3 player </label>
								<select name="mp3_player" class="form-control">
									<option value="1"> Tersedia </option>
									<option value="0"> Tidak Tersedia </option>
									<?= form_error('mp3_player', '<div class="text-small text-danger">' , '</div>') ?>
								</select>
							</div>
							<div class="form-group">
								<label for="warna"> Centra Lock </label>
								<select name="centra_lock" class="form-control">
									<option value="1"> Tersedia </option>
									<option value="0"> Tidak Tersedia </option>
									<?= form_error('centra_lock', '<div class="text-small text-danger">' , '</div>') ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tahun"> Harga Sewa/Hari </label>
								<input type="number" name="harga" class="form-control">
								<?= form_error('tahun_mobil', '<div class="text-small text-danger">' , '</div>') ?>
							</div>
							<div class="form-group">
								<label for="tahun"> Denda </label>
								<input type="number" name="denda" class="form-control">
								<?= form_error('tahun_mobil', '<div class="text-small text-danger">' , '</div>') ?>
							</div>
							<div class="form-group">
								<label for="tahun"> Tahun Mobil </label>
								<input type="text" name="tahun_mobil" class="form-control">
								<?= form_error('tahun_mobil', '<div class="text-small text-danger">' , '</div>') ?>
							</div>
							<div class="form-group">
								<label for="tahun"> Status Mobil </label>
								<select name="status_mobil" id="status" class="form-control">
									<option value=""> --Pilih Status </option>
									<option value="1"> Tersedia </option>
									<option value="0"> Tidak tersedia </option>
								</select>
								<?= form_error('status_mobil', '<div class="text-small text-danger">' , '</div>') ?>
							</div>
							<div class="form-group">
								<label for="gambar"> Gambar Mobil </label>
								<input type="file" name="gambar_mobil" class="form-control">
							</div>
							<button type="submit" class="btn btn-primary mt-4"> Simpan </button>
							<button type="reset" class="btn btn-danger mt-4"> Reset Data </button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- End Card -->
	</section>
</div>
