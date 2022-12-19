<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<h2>Insert Kategori</h2>

<hr class="my-1">

<a class="btn btn-outline-dark btn-sm py-0 m-1" href="<?= base_url('admin/kategori'); ?>">Kembali</a>

<hr class="my-1">

<?php if( !empty( session()->getFlashData('errorInfo') ) ) : ?>
	<div class="alert alert-danger rounded-0 p-1 my-1" role="alert">
		<?= session()->getFlashData('errorInfo') ?>
	</div>
<?php endif; ?>

<form action="<?= base_url('/admin/kategori/insert') ?>" method="post" class="my-1">
	<table class="table table-borderless align-middle w-50">
		<tr class="form-group">
			<td class="w-25"><label for="kategori">Kategori</label></td>
			<td><input class="form-control" type="text" name="kategori" id="kategori" autofocus></td>
		</tr>
		<tr class="form-group">
			<td class="w-25"><label for="keterangan">Keterangan</label></td>
			<td><input class="form-control" type="text" name="keterangan" id="keterangan"></td>
		</tr>
		<tr class="form-group">
			<td colspan="2">
				<button class="btn btn-outline-primary btn-sm py-0 m-1" type="submit" name="simpan">Simpan</button>
			</td>
		</tr>
	</table>
</form>

<?= $this->endSection(); ?>