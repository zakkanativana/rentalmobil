<div class="main-content">
	<div class="section">
		<div class="section-header">
			<h1> Form tambah tipe </h1>
		</div>

		<form action="<?= base_url('admin/Data_tipe/tambah_tipe_aksi') ?>" method="POST">
			<div class="form-group">
				<label for="kode_tipe"> Kode Tipe </label>
				<input type="text" name="kode_tipe" class="form-control">
				<?= form_error('kode_tipe', '<div class="text-small text-danger">', '</div>') ?>
			</div>
			<div class="form-group">		
				<label for="nama_tipe"> Nama Tipe </label>
				<input type="text" name="nama_tipe" class="form-control">
				<?= form_error('nama_tipe', '<div class="text-small text-danger">', '</div>') ?>
			</div>
			<button class="btn btn-primary" type="submit"> Simpan </button>
			<button class="btn btn-danger" type="reset"> Reset </button>
		</form>
	</div>
</div>
