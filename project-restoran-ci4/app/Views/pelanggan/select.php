<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h1>Daftar Pelanggan</h1>

<hr class="my-1">

<table class="table table-bordered align-middle my-2">
	<thead>
		<tr>
			<th class="text-center px-0">No</th>
			<th class="text-center">Pelanggan</th>
			<th class="text-center">Alamat</th>
			<th class="text-center">No. Telepon</th>
			<th class="text-center">Email</th>
			<th class="text-center">Status</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $awalData + 1; ?>
		
		<?php foreach($pelanggan as $plgn) : ?>
			<tr>
				<td class="text-center px-0"><?= $no++; ?></td>
				<td class="text-capitalize"><?= $plgn["pelanggan"]; ?></td>				
				<td><?= $plgn["alamat"]; ?></td>
				<td><?= $plgn["telepon"]; ?></td>
				<td><?= $plgn["email"]; ?></td>
				
				<td class="text-center">
					<?php if( $plgn["status"] == 1 ) : ?>
						<a href="<?= base_url('admin/pelanggan/update_status/' . $plgn["idpelanggan"] . '/' . $plgn["status"]) ?>" class="btn btn-success btn-sm m-0 py-0">
							AKTIF
						</a>
					<?php else : ?>
						<a href="<?= base_url('admin/pelanggan/update_status/' . $plgn["idpelanggan"] . '/' . $plgn["status"]) ?>" class="btn btn-danger btn-sm m-0 py-0">
							TIDAK AKTIF
						</a>
					<?php endif; ?>
				</td>				
				
				<td class="text-center px-0" style="width: 50px">
					<a class="btn btn-outline-danger btn-sm d-inline-block p-1" href="<?= base_url() . '/admin/pelanggan/delete/' . $plgn["idpelanggan"] ?>"?>
						<img src="<?= base_url('icon/trash.svg') ?>"> <!-- Delete -->
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?= $pager->links('list', 'bs_paging'); ?> <!-- Pagination -->

<?= $this->endSection(); ?>