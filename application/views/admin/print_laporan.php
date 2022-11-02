<h3 style="text-align: center;"> Laporan Transaksi Rental Mobil </h3>
<table>
	<tr>
		<td> Dari Tanggal </td>
		<td> : </td>
		<td> <?= date('d-M-Y', strtotime($_GET['dari'])); ?> </td>
	</tr>
	<tr>
		<td> Sampai Tanggal </td>
		<td> : </td>
		<td> <?= date('d-M-Y', strtotime($_GET['sampai'])); ?> </td>
	</tr>
</table>

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

<script>
	window.print();
</script>
