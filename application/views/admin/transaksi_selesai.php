<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1> Transaksi Selesai </h1>
		</div>
	</section>


	<div class="container">
	<?php foreach($transaksi as $item ) :?>
	<form method="POST" action="<?= base_url('admin/transaksi/transaksi_selesai_aksi'); ?>"> 
		<input type="hidden" name="id_rental" value="<?= $item->id_rental ?>">
		<input type="hidden" name="tanggal_seharusnya_kembali" value="<?= $item->tanggal_seharusnya_kembali?>">
		<input type="hidden" name="denda" value="<?= $item->denda?>">

		<div class="form-group">
			<label for=""> Tanggal Pengembalian </label>
			<input type="date" name="tanggal_pengembalian_mobil" class="form-control" value="<?=$item->tanggal_pengembalian_mobil ?>">
		</div>
		<div class="form-group">
			<label for=""> Status Pengembalian </label>
			<select name="status_pengembalian" id="" class="form-control">
				<option value="<?= $item->status_pengembalian?>"><?= $item->status_pengembalian?></option>
				<option value="Kembali"> Kembali </option>
				<option value="Belum Kembali"> Belum Kembali </option>
			</select>
		</div>
		<div class="form-group">
			<label for=""> Status Rental </label>
			<select name="status_rental" id="" class="form-control">
				<option value="<?= $item->status_rental?>"><?= $item->status_rental?></option>
				<option value="Selesai"> Selesai </option>
				<option value="Belum Selesai"> Belum Selesai </option>
			</select>
		</div>
		<button class="btn btn-sm btn-success" type="submit"> Simpan </button>
	</form> 
	<?php endforeach; ?>
	</div>
</div>
