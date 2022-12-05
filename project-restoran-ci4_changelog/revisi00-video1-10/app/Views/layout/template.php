<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?= $title ?></title>
</head>
<body>
	<div>
		<a href="<?= base_url('admin/kategori') ?>">Select</a> |
		<a href="<?= base_url('admin/kategori/create') ?>">Insert</a> |
		<a href="<?= base_url('admin/kategori/update/1') ?>">Update</a>
	</div>
	<hr>

	<?= $this->renderSection('content'); ?>
</body>
</html>