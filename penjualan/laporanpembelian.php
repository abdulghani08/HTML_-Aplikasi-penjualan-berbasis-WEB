<?php  
	
?>
<div class="row">
	<div class="col-md-12">
		<h2>Laporan Pembelian</h2>
	</div>
	<br/><br/>
	<hr/>
	<br/>
	<div class="col-md-12">
		<form method="POST" class="form-inline">
			<div class="form-group">
				<input type="date" id="tgl1" class="form-control" name="tgl1">
			</div>
			<div class="form-group">
				<label>  Sampai  </label>
				<input type="date" id="tgl2" class="form-control" name="tgl2">
			</div>
			<div class="form-group">
				<button id="formbtn" name="prosess" class="btn btn-primary"><i class="fa fa-play-circle-o"></i> Prosess</button>
				<button class="btn btn-success" name="semua"><i class="fa fa-play-circle-o"></i> Semua Data</button>
			</div>
		</form>
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading" align="center">
				<?php if (isset($_POST['prosess'])): ?>
					<a href="laporan/cetaklaporanpembelian.php?tgl1=<?php echo $_POST['tgl1']; ?>&tgl2=<?php echo $_POST['tgl2']; ?>" target="_BLANK" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
				<?php endif ?>
				<?php if (isset($_POST['semua'])): ?>
					<a href="laporan/cetaklaporanpembelian.php?semua" target="_BLANK" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
				<?php endif ?>
				<?php if (!isset($_POST['prosess']) && !isset($_POST['semua'])): ?>
					<a href="#" class="btn btn-info" disabled="disabled"><i class="fa fa-print"></i> Cetak</a>
				<?php endif ?>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr class="active">
							<th>No</th>
							<th>Kode Pembelian</th>
							<th>Tgl Pembelian</th>
							<th>Supplier</th>
							<th>Barang</th>
							<th>Satuan</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
					<?php  
						if (isset($_POST['prosess'])) {
							$total = $laporan->hitung_total_pembelian_bulan($_POST['tgl1'],$_POST['tgl2']);
							$cek = $laporan->cek_penjualan_bulan($_POST['tgl1'],$_POST['tgl2']);
							if ($cek === false) {
								echo "<tr><td colspan='8' align='center'>Data Kososng</td></tr>";
							}
							else{
							$lapbl = $laporan->tampil_pembelian_bulan($_POST['tgl1'],$_POST['tgl2']);
							foreach ($lapbl as $index => $data) {
					?>
						<tr>
							<td><?php echo $index + 1; ?></td>
							<td><?php echo $data['kd_pembelian']; ?></td>
							<td><?php echo date_format(date_create($data['tgl_pembelian']),'d-m-Y'); ?></td>
							<td><?php echo $data['nama_supplier']; ?></td>
							<td><?php echo $data['nama_barang_beli']; ?></td>
							<td><?php echo $data['satuan']; ?></td>
							<td><?php echo $data['jumlah']; ?></td>
							<td>Rp. <?php echo number_format($data['harga_beli']); ?></td>
							<td>Rp. <?php echo number_format($data['subtotal']); ?></td>
						</tr>
					<?php
						}
					?>
					<?php
						}?>
						<tr>
							<td colspan="8" align="center">TOTAL</td>
							<td>Rp. <?php echo number_format($total); ?></td>
						</tr>
					<?php
					}
						elseif (isset($_POST['semua'])) {
							$total = $laporan->hitung_total_pembelian();
							$cek = $laporan->cek_pembelian();
							if ($cek === false) {
								echo "<tr><td colspan='8' align='center'>Data Kososng</td></tr>";
							}
							else{
							$lap = $laporan->tampil_pembelian();
							foreach ($lap as $index => $data) {
					?>
						<tr>
							<td><?php echo $index + 1; ?></td>
							<td><?php echo $data['kd_pembelian']; ?></td>
							<td><?php echo date_format(date_create($data['tgl_pembelian']),'d-m-Y'); ?></td>
							<td><?php echo $data['nama_supplier']; ?></td>
							<td><?php echo $data['nama_barang_beli']; ?></td>
							<td><?php echo $data['satuan']; ?></td>
							<td><?php echo $data['jumlah']; ?></td>
							<td>Rp. <?php echo number_format($data['harga_beli']); ?></td>
							<td>Rp. <?php echo number_format($data['subtotal']); ?></td>
						</tr>
					<?php
						}
					?>
					<?php
						}?>
						<tr>
							<td colspan="8" align="center">TOTAL</td>
							<td>Rp. <?php echo number_format($total); ?></td>
						</tr>
					<?php
						}
						else{
					?>
						<tr>
							<td colspan="9" align="center">Pilih Opsi Tampil</td>
						</tr>
						<tr>
							<td colspan="8" align="center">TOTAL</td>
							<td></td>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>