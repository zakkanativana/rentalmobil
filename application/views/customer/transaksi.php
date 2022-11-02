<div class="container ">
	<div class="card mx-auto" style="margin-top: 180px;">
		<div class="card-header">
			Data Transaksi Anda
		</div>
		<span class="mt-2 p-2"> <?= $this->session->flashdata('pesan'); ?> </span>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<tr>
					<th> No. </th>
					<th> Nama Customer </th>
					<th> Merk Mobil </th>
					<th> No.Plat </th>
					<th> Harga Sewa </th>
					<th> Action </th>
					<th> Batal </th>
				</tr>
				<?php $no = 1;
				foreach ($transaksi as $item) : ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $item->nama_customer; ?></td>
						<td><?= $item->merk_mobil; ?></td>
						<td><?= $item->no_plat_mobil; ?></td>
						<td> Rp. <?= number_format($item->harga, 0, ',', '.'); ?></td>
						<td>
							<?php if ($item->status_rental == "Selesai") { ?>
								<button class="btn btn-sm btn-danger"> Rental Selesai </button>
							<?php } else { ?>
								<a href="<?= base_url('customer/transaksi/pembayaran/' . $item->id_rental); ?>" class="btn btn-sm btn-success"> Cek Pembayaran </a>
							<?php } ?>
						</td>
						<td>
							<?php if ($item->status_rental == "Belum Selesai") { ?>
								<a onclick="return confirm('Yakin nih ngebatalin ??')" href="<?= base_url('customer/transaksi/batal_transaksi/' . $item->id_rental); ?>" class="btn btn-sm btn-danger">
									Batal
								</a>
							<?php } else { ?>
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
									Batal Transaksi
								</button>
							<?php } ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Informasi Batal Transaksi </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Maaf, Transaksi ini sudah selesai dan tidak bisa dibatalkan !!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal"> Ok </button>
      </div>
    </div>
  </div>
</div>
