<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">

	<title><?= $title ?> | Restoran</title>
</head>
<body>
	<div class="container">
		<!-- Header -->
		<div class="row my-3">
			<nav class="navbar navbar-light bg-light">
				<div class="col-md-3">
					<a class="navbar-brand ps-3" href="<?= base_url('/admin/'); ?>">Admin Page</a>
				</div>
				<div class="col-md-9">
					<div class="float-end">
						<span class="btn btn-secondary btn-sm py-0">
							<?= strtoupper(session()->get('posisi')) ?>
						</span>
						
						<a class="btn btn-outline-dark btn-sm py-0 ms-2" href="#">
							<?= strtoupper(session()->get('user')) ?>
						</a>
						
						<span class="btn btn-outline-dark btn-sm py-0 ms-2">
							<?= session()->get('email') ?>
						</span>
						
						<a href="<?= base_url('/admin/adminpage/logout') ?>" class="btn btn-outline-danger btn-sm py-0 ms-2 me-3">Logout</a>
					</div>
				</div>
			</nav>
		</div>

		<!-- Body -->
		<div class="row">
			<!-- Navigasi -->
			<div class="col-2 ps-0">
				<div class="card">
					<ul class="list-group list-group-flush">
						<?php if( session()->get('posisi') === 'admin') : ?>
							<li class="list-group-item"><a class="nav-link" href="<?= base_url('/admin/kategori'); ?>">Kategori</a></li>
							<li class="list-group-item"><a class="nav-link" href="<?= base_url('/admin/menu'); ?>">Menu</a></li>
							<li class="list-group-item"><a class="nav-link" href="<?= base_url('/admin/pelanggan'); ?>">Pelanggan</a></li>
							<li class="list-group-item"><a class="nav-link" href="<?= base_url('/admin/pesanan'); ?>">Pesanan</a></li>
							<li class="list-group-item"><a class="nav-link" href="<?= base_url('/admin/detailPesanan'); ?>">Detail Pesanan</a></li>
							<li class="list-group-item"><a class="nav-link" href="<?= base_url('/admin/user'); ?>">User</a></li>
						<?php endif; ?>

						<?php if ( session()->get('posisi') === 'koki' ) : ?>
							<li class="list-group-item"><a class="nav-link" href="<?= base_url('/admin/kategori'); ?>">Kategori</a></li>
							<li class="list-group-item"><a class="nav-link" href="<?= base_url('/admin/menu'); ?>">Menu</a></li>
							<li class="list-group-item"><a class="nav-link" href="<?= base_url('/admin/detailPesanan'); ?>">Detail Pesanan</a></li>
						<?php endif; ?>

						<?php if( session()->get('posisi') === 'kasir' ) : ?>
							<li class="list-group-item"><a class="nav-link" href="<?= base_url('/admin/pesanan'); ?>">Pesanan</a></li>
							<li class="list-group-item"><a class="nav-link" href="<?= base_url('/admin/detailPesanan'); ?>">Detail Pesanan</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			
			<!-- Content -->
			<div class="col-10 px-2">
				<?= $this->renderSection('content'); ?>
			</div>
		</div>
	</div>
</body>
</html>