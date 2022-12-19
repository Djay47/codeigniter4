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
			<div class="row">
				<nav class="navbar navbar-light bg-light">
					<h1 class="ps-3">Login</h1>
				</nav>
			</div>
			
			<div class="row border-top border-bottom border-5">
				<div class="col-md-4 mx-auto">
					<table class="table table-borderless table-sm mx-auto my-3">
						<form action="<?= base_url('/admin/adminpage/login') ?>" method="post">
							<!-- Email Label -->
							<tr class="form-group">
								<th><label for="email">Email:</label></th>
							</tr>

							<!-- Email Input -->
							<tr class="form-group">
								<td><input class="form-control" type="email" name="email" id="email" placeholder="Masukkan Email" required autofocus></td>
							</tr>
							
							<!-- Password Label -->
							<tr class="form-group">
								<th><label for="password">Password:</label></th>
							</tr>

							<!-- Password Inpt -->
							<tr class="form-group">
								<td><input class="form-control" type="password" name="password" id="password" placeholder="Masukkan Password" required></td>
							</tr>

							<!-- Login Button -->
							<tr class="form-group">
								<td class="text-center"><button type="submit" name="login" class="btn btn-outline-primary my-2 py-0">Login</button></td>
							</tr>
						</form>
					</table>
				</div>
			</div>

			<div class="row">
				<!-- Jika $loginError bernilai 1, alret akan muncul. $loginError bernilai 1 karena email atau password tidak sesuai dengan database -->
				<?php if( $loginError == 1 ) : ?>
					<div class="alert alert-danger rounded-0 p-1 my-1 text-center" role="alert">
						Login Gagal!<br>Email atau Password Salah
					</div>
				<?php endif; ?>
			</div>
		</div>
	</body>
</html>