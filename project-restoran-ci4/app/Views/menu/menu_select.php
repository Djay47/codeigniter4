<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h1>Daftar Menu</h1>

<hr class="my-1">

<a class="btn btn-outline-primary btn-sm py-0 my-2" href="<?= base_url('/admin/menu/create'); ?>">Tambah</a>
<a class="btn btn-outline-dark btn-sm py-0 my-2" href="<?= base_url('/admin/menu/'); ?>">Tampilkan Semua</a>

<hr class="my-1">

<?= view_cell('\App\Controllers\Admin\Menu::option_select') ?>

<table class="table table-bordered align-middle my-2 w-100">
	<thead>
		<tr>
			<th class="text-center" style="width: 5%">No</th>
			<th class="text-center" style="width: 20%">Menu</th>
			<th class="text-center">Gambar</th>
			<th class="text-center" style="width: 20%">Harga</th>
			<th class="text-center" colspan="2">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $awalData + 1; ?>
		
		<?php foreach($menu as $mn) : ?>
			<tr>
				<td class="text-center"><?= $no++; ?></td>
				<td><?= $mn["menu"] ?></td>
				<td class="text-center"><img src="<?= base_url('/image/upload/' . $mn["gambar"])?>" alt="<?= $mn["gambar"] ?>"></td>
				<td class="text-center"><?= number_format($mn["harga"]) ?></td>
				<td class="text-center px-0" style="width: 50px">
					<a class="btn btn-outline-danger btn-sm d-inline-block p-1" href="<?= base_url('/admin/menu/delete/' . $mn["idmenu"]) ?>"?>
						<img src="<?= base_url('icon/trash.svg') ?>"> <!-- Delete -->
					</a>
				</td>
				<td class="text-center px-0" style="width: 40px">
					<a class="btn btn-outline-warning d-inline-block p-1" href="<?= base_url('/admin/menu/update/' . $mn["idmenu"]) ?>">
						<img src="<?= base_url('icon/pencil.svg') ?>"> <!-- Update -->
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?= $pager->makeLinks($posHal, $jmlDataPerHal, $jmlData, 'bs_paging'); ?> <!-- Pagination -->

<?= $this->endSection(); ?>