<div class="container-fluid">

	<div class="card mb-4 border-left-primary">
		<div class="card-body">
			<i class="fas fa-university fa-fw"></i>Data Mata Kuliah yang Diampu
		</div>
	</div>

	<?php
		if ($this->session->flashdata('pesandosen')) {
			echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			echo $this->session->flashdata('pesandosen');
			echo '</div>';	
		}
		
		if ($this->session->flashdata('pesandosen2')) {
			echo '<div class="alert alert-warning alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			echo $this->session->flashdata('pesandosen2');
			echo '</div>';
		}	
		
	?>

    <?php echo $this->session->flashdata('pesan') ?>
    <a class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahmakul"><i class="fas fa-plus fa-sm fa-fw"></i>Tambah Mata Kuliah yang Diampu</a>
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>NO</th>
            <!-- <th>NRP</th>
            <th>NAMA LENGKAP</th> -->
            <th>MATA KULIAH</th>
            <th colspan="1">AKSI</th>
        </tr>
        <?php

        $no = 1;
        foreach ($dosen as $data) : if (!$data->nama_makul){break;}?>

            <tr>
                <td><?= $no++ ?></td>
                <td><a href="<?php echo base_url('dosen/dashboard/infomatakuliah/' . $data->id_makul); ?>"><?= $data->nama_makul . ' '; ?><i class="fas fa-chevron-circle-right"></i></a></td>
                <td width="20px"><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletemodal<?= $data->id; ?>"><i class="fas fa-trash"></i></button></td>
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
                                <?php foreach ($makuls as $data) : ?>
                                    <option value="<?php echo $data->id_makul ?>"><?php echo $data->nama_makul ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('id_makul', 'div class="text-danger small ml-3">', '</div>') ?>
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

<!-- Delete DATA matkul -->
<?php foreach ($dosen as $data) { ?>
    <div class="modal fade" id="deletemodal<?= $data->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin ingin menghapus <?= $data->nama_makul ?>?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?php echo site_url('dosen/dashboard/delete_makul/' . $data->id) ?>">Delete</a>
                </div>
                </form>
            </div>
            </form>
        </div>
    </div>
    </div>
<?php } ?>
</div>
