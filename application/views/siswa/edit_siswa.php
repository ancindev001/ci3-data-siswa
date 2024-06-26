<div class="container">
	<h3>Edit Siswa</h3>

	<div class="row">
		<div class="col-6">
			<?= $_SERVER['REQUEST_METHOD'] == 'POST' ? validation_errors('<div class="alert alert-danger">', '</div>') : '' ?>
			<form method="post" action=" <?= base_url('/index.php/siswa/update_siswa/' . $siswa->id) ?>">
				<div class="form-group mb-2">
					<label class="mb-1" for="">Nama</label>
					<input type="text" class="form-control" name="nama_siswa" value="<?= $_SERVER['REQUEST_METHOD'] == 'POST' ? set_value('nama_siswa') : $siswa->nama_siswa ?>">
				</div>
				<div class=" form-group mb-2">
					<label class="mb-1" for="">Alamat</label>
					<input type="text" class="form-control" name="alamat_siswa" value="<?= $_SERVER['REQUEST_METHOD'] == 'POST' ? set_value('alamat_siswa') : $siswa->alamat_siswa ?>">
				</div>
				<input type="submit" value="Update siswa" class="btn btn-warning">
			</form>
		</div>
	</div>
</div>