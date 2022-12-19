<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h2>Update Menu</h2>

<hr class="my-1">

<a class="btn btn-outline-dark btn-sm py-0 m-1" href="<?= base_url('admin/menu'); ?>">Kembali</a>

<hr class="my-1">

<?php if( !empty( session()->getFlashData('errorInfo') ) ) : ?>
	<?php foreach( session()->getFlashData('errorInfo') as $errorInfo ) : ?>
		<div class="alert alert-danger rounded-0 p-1 my-1" role="alert">
			<?= $errorInfo; ?>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<form action="<?= base_url('/admin/menu/save') ?>" method="post" enctype="multipart/form-data" class="my-1">
	<!-- idmenu -->
	<input type="hidden" name="idmenu" value="<?= $menu["idmenu"] ?>">
	
	<!-- gambar -->
	<input type="hidden" name="gambar" value="<?= $menu["gambar"] ?>">
	
	<table class="table table-borderless align-middle w-50">
		<!-- Insert nama menu -->
		<tr class="form-group">
			<td class="w-25"><label for="menu">Menu</label></td>
			<td><input class="form-control" type="text" id="menu" name="menu" value="<?= $menu["menu"] ?>"></td>
		</tr>
		
		<!-- Insert harga menu -->
		<tr class="form-group">
			<td class="w-25"><label for="harga">Harga</label></td>
			<td><input class="form-control" type="text" id="harga" name="harga" value="<?= $menu["harga"] ?>"></td>
		</tr>

		<!-- Display Gambar -->
		<tr>
			<td></td>
			<td><img src="<?= base_url('/image/upload/' . $menu["gambar"]) ?>"></td>
		</tr>
		
		<!-- Upload Gambar -->
		<tr class="form-group">
			<td><label for="gambar">Gambar</label></td>
			<td><input type="file" name="gambar" id="gambar" class="btn btn-outline-secondary"></td>
		</tr>
		
		<!-- Tombol Submit -->
		<tr class="form-group">
			<td colspan="2">
				<button class="btn btn-outline-primary btn-sm py-0 m-1" type="submit" name="update">Update</button>
			</td>
		</tr>
	</table>
</form>

<?= $this->endSection(); ?>