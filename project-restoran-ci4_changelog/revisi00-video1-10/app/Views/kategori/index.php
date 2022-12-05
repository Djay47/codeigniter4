<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<h1>Display Data</h1>

<table border="1" cellpadding="10" cellspacing="0">
	<thead>
		<tr>
			<th>No</th>
			<th>Kategori</th>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach($kategori as $ktgr) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $ktgr["kategori"]; ?></td>
				<td><?= $ktgr["keterangan"]; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php $this->endSection(); ?>