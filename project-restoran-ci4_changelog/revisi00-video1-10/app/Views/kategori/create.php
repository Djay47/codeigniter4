<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<h1>Insert Data</h1>

<form action="<?= base_url('admin/kategori/save') ?>" method="post">
	<table border="0" cellpadding="10" cellspacing="0">
		<tr>
			<td><label>Kategori</label></td>
			<td><input type="text" name="kategori" required></td>
		</tr>
		<tr>
			<td><label>Keterangan</label></td>
			<td><input type="text" name="keterangan" required></td>
		</tr>
		<tr>
			<td colspan="2"><button type="submit" name="simpan">Simpan</button></td>
		</tr>
	</table>
</form>

<?php $this->endSection(); ?>