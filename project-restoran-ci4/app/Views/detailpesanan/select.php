<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<h1>Detail Pesanan</h1>

<hr class="my-1">

<!-- Pencarian berdasarkan tanggal -->
<form action="<?= base_url('admin/detailpesanan/cari') ?>" method="get" class="w-50">
	<table class="table table-sm table-borderless my-2">
		<tr>
			<td>
				<input type="date" name="tglAwal" required>
				<span class="mx-2">-</span>
				<input type="date" name="tglAkhir" required>
				<button type="submit" class="btn btn-outline-primary btn-sm py-0 ms-2">Cari</button>
			</td>
		</tr>
	</table>
</form>

<hr class="my-1">

<table class="table table-bordered w-100 my-2">
	<thead>
		<tr>
			<th class="text-center">No.</th>
			<th class="text-center">Pelanggan</th>
			<th class="text-center">Tanggal</th>
			<th class="text-center">Pesanan</th>
			<th class="text-center">Harga</th>
			<th class="text-center">Jumlah</th>
			<th class="text-center">Total</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$nomor = 1;
			$total = 0;
		?>
		
		<?php foreach ( $detailpesanan as $dpsn ) : ?>
			<tr>
				<td class="text-center"><?= $nomor++ . "." ?></td>
				<td class="text-capitalize"><?= $dpsn["pelanggan"] ?></td>
				<td><?= date('d-m-Y', strtotime($dpsn["tglpesanan"])) ?></td>
				<td><?= $dpsn["menu"] ?></td>
				<td><?= $dpsn["harga"] ?></td>
				<td><?= $dpsn["jumlah"] ?></td>
				<td><?= $dpsn["harga"] * $dpsn["jumlah"] ?></td>
			</tr>
			<?php $total += $dpsn["harga"] * $dpsn["jumlah"] ?>
		<?php endforeach; ?>
		
		<tr>
			<th colspan="6">Total Keseluruhan</th>
			<td><?= $total ?></td>
		</tr>
	</tbody>
</table>

<?= $this->endSection() ?>