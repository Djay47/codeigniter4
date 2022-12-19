<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h2>Update Data User</h2>

<hr class="my-1">

<a class="btn btn-outline-dark btn-sm py-0 my-2" href="<?= base_url('admin/user') ?>">Kembali</a>

<hr class="my-1">

<?php if( !empty( session()->getFlashData('errorInfo') ) ) : ?>
	<?php foreach( session()->getFlashData('errorInfo') as $errorInfo ) : ?>
		<div class="alert alert-danger rounded-0 p-1 my-1" role="alert">
			<?= $errorInfo; ?>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<form class="w-50 my-3" action="<?= base_url('admin/user/save') ?>" method="post">
	<!-- iduser -->
	<input type="hidden" name="iduser" value="<?= $user['iduser'] ?>">

	<table class="table table-borderless table-sm">
		<!-- User -->
		<tr class="form-group">
			<td><label for="user">User</label></td>
			<td><input class="form-control" type="text" name="user" id="user" value="<?= $user["user"] ?>" autofocus></td>
		</tr>
		
		<!-- Email -->
		<tr class="form-group">
			<td><label for="email">Email</label></td>
			<td><input class="form-control" type="email" name="email" id="email" value="<?= $user["email"] ?>"></td>
		</tr>

		<!-- Password -->
		<tr class="form-group">
			<td><label for="password">Password</label></td>
			<td><input class="form-control" type="password" name="password" id="password" value="<?= $user["password"] ?>" readonly></td>
		</tr>

		<!-- Posisi -->
		<tr class="form-group">
			<td><label for="posisi">Posisi</label></td>
			<td>
				<select name="posisi" id="posisi">
					<?php foreach($posisi as $ps) : ?>
						<option value="<?= $ps ?>" <?= ($user['posisi'] == $ps )? "selected" : "" ?> >
							<?= strtoupper($ps) ?>
						</option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		
		<!-- Tombol Submit -->
		<tr class="form-group">
			<td colspan="2">
				<button type="submit" name="simpan" class="btn btn-outline-primary btn-sm py-0">Simpan</button>
			</td>
		</tr>
	</table>
</form>

<?= $this->endSection(); ?>