<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1> Form Data Customer </h1>
		</div>
	</section>

	<form method="POST" action="<?= base_url('admin/data_customer/tambah_customer_aksi'); ?>"> 
		<div class="form-group">
			<label>Nama Customer</label>	
			<input type="text" name="nama_customer" class="form-control">
			<?= form_error('nama_customer', '<span class="text-small text-danger">','</span>'); ?>
		</div>
		<div class="form-group">
			<label>Username Customer</label>	
			<input type="text" name="username_customer" class="form-control">
			<?= form_error('username_customer', '<span class="text-small text-danger">','</span>'); ?>
		</div>
		<div class="form-group">
			<label>Alamat Customer</label>	
			<input type="text" name="alamat_customer" class="form-control">
			<?= form_error('alamat_customer', '<span class="text-small text-danger">','</span>'); ?>
		</div>
		<div class="form-group">
			<label>Gender Customer</label>	
			<select name="gender_customer" id="gender_customer" class="form-control">
				<option value=""> -- Pilih Gender </option>
				<option value="laki-laki"> Laki-Laki </option>
				<option value="perempuan"> Perempuan </option>
			</select>	
			<?= form_error('gender_customer', '<span class="text-small text-danger">','</span>'); ?>
		</div>
		<div class="form-group">
			<label>no_telepon Customer</label>	
			<input type="text" name="no_telepon_customer" class="form-control">
			<?= form_error('no_telepon_customer', '<span class="text-small text-danger">','</span>'); ?>
		</div>
		<div class="form-group">
			<label>no_ktp Customer</label>	
			<input type="text" name="no_ktp_customer" class="form-control">
			<?= form_error('no_ktp_customer', '<span class="text-small text-danger">','</span>'); ?>
		</div>
		<div class="form-group">
			<label>password_ Customer</label>	
			<input type="password" name="password_customer" class="form-control">
			<?= form_error('password_customer', '<span class="text-small text-danger">','</span>'); ?>
		</div>
		<button type="submit" class="btn btn-primary"> Simpan </button>
		<button type="reset" class="btn btn-danger"> Reset </button>
 	</form> 

</div>

