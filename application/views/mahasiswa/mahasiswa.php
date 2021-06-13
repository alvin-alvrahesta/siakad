<div class="container-fluid">


	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Mahasiswa
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<?php echo anchor('administrator/mahasiswa/tambah_matakuliah','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm fa-fw"></i>Tambah Mahasiswa</button>') ?>

	<table class="table table-striped table-hover table-bordered">
		<tr>
			<th>NO</th>
			<th>NAMA LENGKAP</th>
			<th>MATA KULIAH</th>
			<th>NILAI</th>
			<th colspan="3">AKSI</th>
		</tr>
		<?php

		$no=1;
		foreach($mhs as $data) : ?>

			<tr>
				<td><?= $no++ ?></td>
				<td><?= $data->username ?></td>
				<td><?= $data->nama_makul ?></td>
				<td><?= $data->nilai ?></td>
				<td width="20px"><?php echo anchor('administrator/mahasiswa/detail/'.$data->id,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('administrator/mahasiswa/update/'.$data->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('administrator/mahasiswa/delete/'.$data->id,'<div class="btn btn-sm btn-danger"><i class="fa  fa-trash"></i></div>') ?></td>
			</tr>

		<?php endforeach; ?>
	</table>
</div>
