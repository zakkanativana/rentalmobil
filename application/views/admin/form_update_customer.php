<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1> Form Update Customer </h1>
		</div>
	</section>

	
	<?php foreach($customer as $item) : ?>
		<form method="POST" action="<?= base_url('admin/data_customer/update_customer_aksi'); ?>"> 

			<input type="hidden" name="id_customer" value="<?= $item->id_customer ?>">

			<div class="form-group">
				<label>Nama Customer</label>	
				<input type="text" name="nama_customer" class="form-control" value="<?= $item->nama_customer ?>">
				<?= form_error('nama_customer', '<span class="text-small text-danger">','</span>'); ?>
			</div>
			<div class="form-group">
				<label>Username Customer</label>	
				<input type="text" name="username_customer" class="form-control" value="<?= $item->username_customer ?>">
				<?= form_error('username_customer', '<span class="text-small text-danger">','</span>'); ?>
			</div>
			<div class="form-group">
				<label>Alamat Customer</label>	
				<input type="text" name="alamat_customer" class="form-control" value="<?= $item->alamat_customer ?>">
				<?= form_error('alamat_customer', '<span class="text-small text-danger">','</span>'); ?>
			</div>
			<div class="form-group">
				<label>Gender Customer</label>	
				<select name="gender_customer" id="gender_customer" class="form-control">
					<option value="<?= $item->gender_customer ?>"> <?= $item->gender_customer ?> </option>
					<option value="laki-laki"> Laki-Laki </option>
					<option value="perempuan"> Perempuan </option>
				</select>	
				<?= form_error('gender_customer', '<span class="text-small text-danger">','</span>'); ?>
			</div>
			<div class="form-group">
				<label>no_telepon Customer</label>	
				<input type="text" name="no_telepon_customer" class="form-control" value="<?= $item->no_telepon_customer ?>">
				<?= form_error('no_telepon_customer', '<span class="text-small text-danger">','</span>'); ?>
			</div>
			<div class="form-group">
				<label>no_ktp Customer</label>	
				<input type="text" name="no_ktp_customer" class="form-control" value="<?= $item->no_ktp_customer ?>">
				<?= form_error('no_ktp_customer', '<span class="text-small text-danger">','</span>'); ?>
			</div>
			<div class="form-group">
				<label>password_ Customer</label>	
				<input type="password" name="password_customer" class="form-control" value="<?= $item->password_customer ?>">
				<?= form_error('password_customer', '<span class="text-small text-danger">','</span>'); ?>
			</div>
			<button type="submit" class="btn btn-primary"> Simpan </button>
			<button type="reset" class="btn btn-danger"> Reset </button>
		</form> 
	<?php endforeach; ?>
</div>
