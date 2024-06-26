<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD CI3</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
	<?php
	if (isset($nav)) {
		$nav = $nav;
	} else {
		$nav = true;
	}
	?>
	<?php if ($nav) : ?>
		<nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
			<div class="container">
				<a class="navbar-brand" href="<?= base_url('/') ?>">SIDAS</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?= base_url('/siswa/') ?>">Data Siswa</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#"></a>
						</li>

					</ul>

					<div class="ms-auto">
						<?php
						if (!$this->session->userdata('admin')) {
							echo '<a href="' . base_url('/auth/login') . '" class="btn btn-outline-primary">Login</a>';
						} else {
							echo '<a href="' . base_url('/auth/logout') . '" class="btn btn-outline-danger">Logout</a>';
						}
						?>
					</div>
				</div>
			</div>
		</nav>
	<?php endif ?>