<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<h2>Pembayaran Pesanan</h2>

<a class="btn btn-outline-dark btn-sm py-0 m-1" href="<?= base_url('admin/pesanan') ?>">Kembali</a>

<hr class="my-1">

<!-- Informasi Pelanggan -->
<table cellpadding="5px">
	<tr>
		<td class="border-end border-2 text-capitalize">
			Pelanggan: <?= $vdetailpesanan[0]['pelanggan'] ?>
		</td>
		<td>
			Tanggal : <?= date("d-m-Y", strtotime($vdetailpesanan[0]["tglpesanan"])) ?>
		</td>
	</tr>
</table>

<!-- Form memperbarui pembayaran -->
<form action="<?= base_url('admin/pesanan/save') ?>" method="post">
	<input type="hidden" name="idpesanan" value="<?= $vpesanan[0]["idpesanan"] ?>">
	<table class="table table-borderless align-middle w-75">
		<tr class="form-group">
			<th class="w-50"><label for="total">Total</label></th>
			<th class="w-50"><label class="mt-2" for="bayar">Dibayar</label></th>
			<td class="border-start border-3" rowspan="2">
				<button class="btn btn-outline-primary btn-sm py-0 m-1" type="submit" name="simpan">Simpan</button>
			</td>
		</tr>
		<tr class="form-group">
			<td>
				Rp: <input type="text" name="total" value="<?= $vpesanan[0]["total"] ?>" readonly>
			</td>
			<td>
				Rp: <input type="text" name="bayar" value="<?= $vpesanan[0]["bayar"] ?>">
			</td>
		</tr>
	</table>
</form>

<!-- alert info -->
<?php if ( session()->getFlashdata('pesan') ) : ?>
	<div class="alert alert-danger" role="alert">
	  <?= session()->getFlashdata('pesan'); ?>
	</div>
<?php endif; ?>

<hr class="my-2">

<!-- Detail pesanan -->
<h3>Detail Pesanan</h3>

<table class="table table-bordered align-middle w-75 my-2">
	<thead>
		<tr>
			<th class="text-center px-0">No.</th>
			<th class="text-center">Pesanan</th>
			<th class="text-center">Harga</th>
			<th class="text-center">Jumlah</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php foreach ( $vdetailpesanan as $vdpsn ) : ?>
			<tr>
				<td class="text-center"><?= $nomor++ ?></td>
				<td><?= $vdpsn["menu"] ?></td>
				<td><?= number_format($vdpsn["hargajual"]) ?></td>
				<td class="text-center"><?= $vdpsn["jumlah"] ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?= $this->endSection() ?>