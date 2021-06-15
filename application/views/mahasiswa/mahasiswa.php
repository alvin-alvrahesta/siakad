<div class="container-fluid">


	<!-- <div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Mahasiswa
	</div> -->
	<div class="card mb-4 border-left-primary">
		<div class="card-body">
			<i class="fas fa-university fa-fw"></i>Mahasiswa
		</div>
	</div>

	<?php
		if ($this->session->flashdata('pesanmhs')) {
			echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			echo $this->session->flashdata('pesanmhs');
			echo '</div>';	
		}
		
		if ($this->session->flashdata('pesanmhs2')) {
			echo '<div class="alert alert-warning alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			echo $this->session->flashdata('pesanmhs2');
			echo '</div>';
		}	
			// echo validation_errors('<div class="alert alert-danger alert-dismissible">
			// <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');
		
	?>
	

	<div>
		<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#ModalTambah"><i class="fas fa-plus fa-sm fa-fw"></i>Tambah Mata Kuliah</button>
	</div>

	<table class="table table-striped table-hover table-bordered">
		<tr>
			<th>NO</th>
			<th>MATA KULIAH</th>
			<th>NILAI</th>
			<th colspan="3">AKSI</th>
		</tr>
		<?php

		$no=1;
		foreach($mhs as $data) : if (!$data->nama_makul){break;}?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $data->nama_makul ?></td>
				<td><?= $data->nilai ?></td>
				<td>
					<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalHapus<?= $data->id_mhs ?>"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>

	<!-- Modal Tambah Makul -->
	<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Mata Kuliah</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>				
				<div class="modal-body">
					
					<form id="myForm" action="<?php echo site_url('mahasiswa/mahasiswa/insert_makul') ?>" method="post" enctype="multipart/form-data">

					<input type="hidden" class="form-control" id="nim" name="nim" value="<?= $userid ?>" readonly>

					<div class="form-group">
							<label>Pilih Mata Kuliah yang Ingin Diambil</label>
							<select name="id_makul" class="form-control" required>
							<option value="">-- Pilih Program Studi --</option>
							<?php foreach($makul as $data) : ?>
							<option value="<?php echo $data->id_makul ?>"><?php echo $data->nama_makul ?></option>
							<?php endforeach; ?>
							</select>
						<?php echo form_error('id_makul','div class="text-danger small ml-3">','</div>') ?>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
					<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Hapus Makul -->
	<?php foreach ($mhs as $data) :?>
	<div class="modal fade" id="ModalHapus<?= $data->id_mhs; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?php echo site_url('mahasiswa/mahasiswa/delete_makul/' . $data->id_mhs) ?>">Delete</a>
                </div>
            </div>
		</div>
	</div>
	<?php endforeach ?>
</div>
