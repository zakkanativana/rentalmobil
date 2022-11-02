<div class="main-content">
	<div class="section">
		<div class="section-header">
			<h1> Form Update Tipe Mobil </h1>
		</div>

		<!-- Card -->
		<div class="card">
			<div class="card-body">
				<?php foreach ($tipe as $item) : ?>
					<form action="<?= base_url('admin/data_tipe/update_tipe_aksi'); ?>" method="POST">
						<div class="form-group">
							<input type="hidden" name="id_tipe" value="<?= $item->id_tipe ?>">
							<label for="kode_tipe"> Kode Tipe </label>
							<input type="text" name="kode_tipe" class="form-control" value="<?= $item->kode_tipe ?>">
							<?= form_error('kode_tipe', '<div class="text-small text-danger">', '</div>') ?>
						</div>
						<div class="form-group">
							<label for="nama_tipe"> Nama Tipe </label>
							<input type="text" name="nama_tipe" class="form-control" value="<?= $item->nama_tipe ?>">
							<?= form_error('nama_tipe', '<div class="text-small text-danger">', '</div>') ?>
						</div>

						<button class="btn btn-primary" type="submit"> Simpan </button>
						<button class="btn btn-danger" type="reset"> Reset </button>
					</form>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- End Card -->
	</div>
</div>
