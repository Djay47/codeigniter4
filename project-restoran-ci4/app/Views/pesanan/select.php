<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<h1>Pesanan</h1>

<hr class="my-1">

<table class="table table-bordered align-middle w-75 my-2">
	<thead>
		<tr>
			<th class="text-center px-0">No.</th>
			<th class="text-center">Pelanggan</th>
			<th class="text-center">Tanggal</th>
			<th class="text-center">Total</th>
			<th class="text-center">Bayar</th>
			<th class="text-center">Kembali</th>
			<th class="text-center">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = $awalData + 1; ?>
		<?php foreach ( $vpesanan as $vpsn ) : ?>
			<tr>
				<td class="text-center"><?= $nomor++ . "." ?></td>
				<td class="text-capitalize"><?= $vpsn["pelanggan"] ?></td>
				<td><?= date("d-m-Y", strtotime($vpsn["tglpesanan"])) ?></td>
				<td><?= number_format($vpsn["total"]) ?></td>
				<td><?= number_format($vpsn["bayar"]) ?></td>
				<td><?= $vpsn["kembali"] ?></td>
				
				<td class="text-center">
					<?php if ( $vpsn["state"] == 0 ) : ?>
						<a href="<?= base_url('admin/pesanan/update/' . $vpsn['idpesanan']) ?>" class="btn btn-warning btn-sm m-0 py-0">Dibayar</a>
					<?php else: ?>
						<span class="btn btn-success btn-sm m-0 py-0">Lunas</span>
					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?= $pager->makeLinks($posHal, $jmlDataPerHal, $jmlData, 'bs_paging'); ?> <!-- Pagination -->

<?= $this->endSection() ?>