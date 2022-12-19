<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h1>Daftar Kategori</h1>

<hr class="my-1">

<a class="btn btn-outline-primary btn-sm py-0 my-2" href="<?= base_url('/admin/kategori/create'); ?>">Tambah</a>

<hr class="my-1">

<table class="table table-bordered align-middle my-2">
	<thead>
		<tr>
			<th class="text-center px-0">No</th>
			<th class="text-center w-25">Kategori</th>
			<th class="text-center">Keterangan</th>
			<th class="text-center" colspan="2">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $awalData + 1; ?>
		
		<?php foreach($kategori as $ktgr) : ?>
			<tr>
				<td class="text-center px-0"><?= $no++; ?></td>
				
				<td class="w-25"><?= $ktgr["kategori"]; ?></td>
				
				<td><?= $ktgr["keterangan"]; ?></td>
				
				<td class="text-center px-0" style="width: 50px">
					<a class="btn btn-outline-danger btn-sm d-inline-block p-1" href="<?= base_url() . '/admin/kategori/delete/' . $ktgr["idkategori"] ?>"?>
						<img src="<?= base_url('icon/trash.svg') ?>"> <!-- Delete -->
					</a>
				</td>
				
				<td class="text-center px-0" style="width: 40px">
					<a class="btn btn-outline-warning d-inline-block p-1" href="<?= base_url() . '/admin/kategori/update/' . $ktgr["idkategori"] ?>">
						<img src="<?= base_url('icon/pencil.svg') ?>"> <!-- Update -->
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?= $pager->links('list', 'bs_paging'); ?> <!-- Pagination -->

<?= $this->endSection(); ?>