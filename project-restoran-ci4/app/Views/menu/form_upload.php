<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row">
	<h1>Upload Gambar</h1>

	<form action="<?= base_url('/admin/menu/insert') ?>" method="post" enctype="multipart/form-data">
		<table border="0" cellpadding="10" cellspacing="0">
			<tr>
				<td><label for="gambar">Gambar</label></td>
				<td>: <input type="file" name="gambar" id="gambar" required></td>
			</tr>
			<tr>
				<td colspan="2"><button class="btn btn-primary" type="submit" name="upload">Upload</button></td>
			</tr>
		</table>
	</form>

	<a href="<?= base_url('admin/kategori'); ?>">Batal</a>
</div>

<?= $this->endSection(); ?>