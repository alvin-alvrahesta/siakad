<div class="container-fluid">


	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Dosen
	</div>

	<?php echo $this->session->flashdata('pesan') ?>
    <a class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahmakul"><i class="fas fa-plus fa-sm fa-fw"></i>Tambah Mata Kuliah yang Diampu</a>
	<table class="table table-striped table-hover table-bordered">
		<tr>
			<th>NO</th>
			<th>NRP</th>
			<th>NAMA LENGKAP</th>
			<th>MATA KULIAH</th>
			<th colspan="3">AKSI</th>
		</tr>
		<?php

		$no=1;
		foreach($dosen as $data) : ?>

			<tr>
				<td><?= $no++ ?></td>
				<td><?= $data->nrp ?></td>
				<td><?= $data->username ?></td>
				<td><?= $data->nama_makul ?></td>
				<td width="20px"><?php echo anchor('dosen/dosen/detail/'.$data->id,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('dosen/dosen/update/'.$data->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('dosen/dosen/delete/'.$data->id,'<div class="btn btn-sm btn-danger"><i class="fa  fa-trash"></i></div>') ?></td>
			</tr>

		<?php endforeach; ?>
	</table>

    <!-- Modal add Mata KUliah-->
<div class="modal fade" id="tambahmakul" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Mata Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="<?php echo site_url('dosen/dashboard/insert_makul') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <input type="hidden" class="form-control" id="nrp" name="nrp" placeholder="<?= $data->nrp ?>" value="<?= $data->nrp ?>">
                    </div> 
                <div class="form-group">
                        <label>Pilih Mata Kuliah yang ingin diampu</label>
                        <select name="id_makul" class="form-control">
                        <option value="">-- Pilih Program Studi --</option>
                        <?php foreach($makuls as $data) : ?>
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


<!-- EDIT DATA matkul -->
<?php foreach ($dosen as $data) { ?>
    <div class="modal fade" id="editmodal<?= $data->id_makul; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Mata Kuliah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="myForm" action="<?php echo site_url('administrator/dashboard/update_makul') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id_makul" name="id_makul" value="<?= $data->id_makul; ?>">
                        <div class=" form-group">
                            <label for="nama_makul">Nama Mata Kuliah*</label>
                            <input type="text" class="form-control" id="nama_makul" name="nama_makul" value="<?= $data->nama_makul; ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                </div>
                </form>
            </div>
            </form>
        </div>
    </div>
    </div>
<?php } ?>


<?php foreach ($dosen as $data) { ?>
    <div class="modal fade" id="deletemodal<?= $data->id_makul; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?php echo site_url('administrator/dashboard/delete_makul/' . $data->id_makul) ?>">Delete</a>
                </div>
            </div>
            <?php } ?>
</div>
