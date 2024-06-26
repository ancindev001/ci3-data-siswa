<div class="container">

	<?php if ($this->session->flashdata('success_message')) { ?>
		<div class="alert alert-success"><?= $this->session->flashdata('success_message') ?></div>
	<?php } ?>




	<div class="d-flex align-items-center justify-content-between mb-3">
		<h2>Data siswa</h2>
		<a href="<?= base_url('/index.php/siswa/tambah_siswa') ?>" class="btn btn-primary">Tambah data</a>
	</div>

	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nama siswa</th>
				<th scope="col">Alamat siswa</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$num = 1;
			foreach ($siswa as $s) {
				echo "<tr>
				<th scope='row'>{$num}</th>
				<td>{$s->nama_siswa}</td>
				<td>{$s->alamat_siswa}</td>
				<td>
					<a href='" . base_url('/siswa/edit_siswa/' . $s->id) . "' class='btn btn-warning btn-sm'>Edit</a>
					<a href='" . base_url('/siswa/delete_siswa/' . $s->id) . "' class='btn btn-danger btn-sm'>Delete</a>
				</td>
				</tr>";
				$num++;
			}
			?>
		</tbody>
	</table>
</div>