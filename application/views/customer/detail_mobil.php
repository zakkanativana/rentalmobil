<div class="container mt-5 my-5">
	<div class="card" style="margin-top: 200px;">
		<div class="card-body">
			<?php foreach($detail as $item) :  ?>
				<div class="row">
					<div class="col-md-6">
						<img style="width: 80%" src="<?= base_url('assets/upload/'. $item->gambar_mobil) ?>" alt="">
					</div>
					<div class="col-md-6">
						<table class="table table-responsive">
							<tr>
								<th> Merk Mobil </th>
								<td> <?= $item->merk_mobil; ?></td>
							</tr>
							<tr>
								<th> No Plat Mobil </th>
								<td> <?= $item->no_plat_mobil; ?></td>
							</tr>
							<tr>
								<th> Tahun Mobil </th>
								<td> <?= $item->tahun_mobil; ?></td>
							</tr>
							<tr>
								<th> status Mobil </th>
								<td> <?php 
								if( $item->status_mobil == '0' ) { 
									echo "Not Ready For Rental";
								 }else {
									 echo "Ready Rental";
								 }  ?>
								 </td>
							</tr>
							<tr>
								<td>
								<?php 
										if( $item->status_mobil == '0' ) { 
											echo "<span class='btn btn-danger mt-auto'> Not Available </span>";
										} else {
											echo anchor('customer/rental/tambah_rental/'. $item->id_mobil, '<button class="btn btn-success mt-auto"> Available Rental </button>');
										}
									?>
								</td>
							</tr>
						</table>
					</div>
				</div>
			<?php endforeach;  ?>
		</div>
	</div>
</div>
