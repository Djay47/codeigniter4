<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<h1>Daftar User</h1>

<hr class="my-1">

<a class="btn btn-outline-primary btn-sm py-0 my-2" href="<?= base_url('admin/user/create') ?>">Tambah</a>

<hr class="my-1">

<table class="table table-bordered align-middle my-2">
	<thead>
		<tr>
			<th class="text-center px-0">No</th>
			<th class="text-center">User</th>
			<th class="text-center">Email</th>
			<th class="text-center">Posisi</th>
			<th class="text-center">Status</th>
			<th class="text-center" colspan="2">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $awalData + 1; ?>
		
		<?php foreach($user as $usr) : ?>
			<tr>
				<td class="text-center px-0"><?= $no++; ?></td>
				<td class="text-capitalize"><?= $usr["user"]; ?></td>
				<td><?= $usr["email"]; ?></td>
				<td class="text-center"><?= strtoupper($usr["posisi"]) ?></td>
				<td class="text-center">
					<?php if( $usr["status"] == 1 ) : ?>
						<a class="btn btn-success btn-sm m-0 py-0" href="<?= base_url('admin/user/update_status/' . $usr['iduser'] . '/' . $usr['status']) ?>">AKTIF</a>
					<?php else : ?>	
						<a class="btn btn-danger btn-sm m-0 py-0" href="<?= base_url('admin/user/update_status/' . $usr['iduser']) . '/' . $usr['status'] ?>">BANNED</a>
					<?php endif; ?>
				</td>
				<td class="text-center px-0" style="width: 40px">
					<a class="btn btn-outline-warning d-inline-block p-1" href="<?= base_url() . '/admin/user/update/' . $usr["iduser"] ?>">
						<img src="<?= base_url('icon/pencil.svg') ?>"> <!-- Update -->
					</a>
				</td>
				<td class="text-center px-0" style="width: 50px">
					<a class="btn btn-outline-danger btn-sm d-inline-block p-1" href="<?= base_url('/admin/user/delete/' . $usr['iduser']) ?>"?>
						<img src="<?= base_url('icon/trash.svg') ?>">
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?= $pager->links('list', 'bs_paging'); ?>	<!-- Pagination -->

<?= $this->endSection() ?>