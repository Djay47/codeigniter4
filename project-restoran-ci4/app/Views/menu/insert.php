<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h2>Insert Menu</h2>

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

<form action="<?= base_url('/admin/menu/insert') ?>" method="post" enctype="multipart/form-data" class="my-1">
	<table class="table table-borderless align-middle w-50">
		<!-- Pilih Kategori -->
		<tr class="form-group">
			<td colspan="2">
				<select name="idkategori" id="idkategori">
					<option selected>Pilih Kategori</option>
					<?php foreach ($kategori as $key => $ktgr) : ?>
						<option value="<?= $ktgr["idkategori"] ?>"><?= $ktgr["kategori"] ?></option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		
		<!-- Insert nama menu -->
		<tr class="form-group">
			<td class="w-25"><label for="menu">Menu</label></td>
			<td><input class="form-control" type="text" name="menu" id="menu" required></td>
		</tr>
		
		<!-- Insert harga menu -->
		<tr class="form-group">
			<td class="w-25"><label for="harga">Harga</label></td>
			<td><input class="form-control" type="text" name="harga" id="harga" required></td>
		</tr>
		
		<!-- Upload Gambar -->
		<tr class="form-group">
			<td><label for="gambar">Gambar</label></td>
			<td><input type="file" name="gambar" id="gambar" class="btn btn-outline-secondary" required></td>
		</tr>
		
		<!-- Tombol Submit -->
		<tr class="form-group">
			<td colspan="2">
				<button class="btn btn-outline-primary btn-sm py-0 m-1" type="submit" name="simpan">Simpan</button>
			</td>
		</tr>
	</table>
</form>

<?= $this->endSection(); ?>