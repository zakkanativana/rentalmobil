<table style="width: 60%;">
	<h2> Invoice Pembayaran Anda </h2>
	<?php foreach ($transaksi as $item) : ?>
		<tr>
			<td> Nama Customer </td>
			<td> : </td>
			<td> <?= $item->nama_customer; ?></td>
		</tr>
		<tr>
			<td> Tanggal Rental </td>
			<td> : </td>
			<td> <?= $item->tanggal_rental; ?></td>
		</tr>
		<tr>
			<td> Tanggal Seharusnya Kembali </td>
			<td> : </td>
			<td> <?= $item->tanggal_seharusnya_kembali; ?></td>
		</tr>
		<tr>
			<td> Biaya Sewa / Hari </td>
			<td> : </td>
			<td> Rp. <?= number_format($item->harga, 0, ',', '.'); ?></td>
		</tr>
		<tr>
			<?php
			$x = strtotime($item->tanggal_seharusnya_kembali);
			$y = strtotime($item->tanggal_rental);
			$jmlHari = abs(($x - $y) / (60 * 60 * 24));
			?>
			<td> Jumlah Hari Sewa </td>
			<td> : </td>
			<td> <?= $jmlHari; ?> Hari </td>
		</tr>
		<tr>
			<td> Status Pembayaran </td>
			<td> : </td>
			<td>
				<?php if ($item->status_pembayaran == "0") {
					echo "Belum Lunas";
				} else {
					echo "Lunas";
				}
				?>
			</td>
		</tr>
		<tr style="font-weight: bold; color:red;">
			<td> Jumlah Pembayaran </td>
			<td> : </td>
			<td> Rp. <?= number_format($item->harga * $jmlHari, 0, ',', '.') ?> </td>
		</tr>
		<tr>
			<td> Rekening Pembayaran </td>
			<td> : </td>
			<td>
				<ul>
					<li> Mandiri : 08469512347 </li>
					<li> BCA : 1546587 </li>
					<li> BNI : 1469793 </li>
				</ul>
			</td>
		</tr>
		<tr class="text-success">
			<td></td>
			<td></td>
			<td> <a href="<?= base_url('customer/transaksi/cetak_invoice/' . $item->id_rental) ?>" class="btn btn-sm btn-secondary"> Print Invoice </a> </td>
		</tr>
	<?php endforeach; ?>
</table>

<script>
	window.print();
</script>