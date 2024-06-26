<div class="container">
	<div class="row">
		<div class="col-6">
			<?= $_SERVER['REQUEST_METHOD'] == 'POST' ? validation_errors('<div class="alert alert-danger">', '</div>') : '' ?>
			<?php if ($this->session->flashdata('error_message')) { ?>
				<div class="alert alert-danger"><?= $this->session->flashdata('error_message') ?></div>
			<?php } ?>
			<h3>Login</h3>
			<form action="<?= base_url('/auth/dologin') ?>" method="post">
				<div class="form-group mb-3">
					<label class="mb-1" for="username">Username</label>
					<input type="text" class="form-control" name="username" id="username" tabindex="1">
				</div>
				<div class="form-group mb-3">
					<label class="mb-1" for="">Password</label>
					<input type="text" class="form-control" name="password" id="password" tabindex="2">
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>
	</div>
</div>