<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= base_url('administrator/dashboard/') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active ">Data Mata Kuliah</li>
    </ol>
    <a class="btn btn-primary mb-2 ml-2" data-toggle="modal" data-target="#tambahmakul">Tambah Data Mata Kuliah</a>
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Mata Kuliah</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <!--<th>ID Mata Kuliah</th>-->
                            <th>Mata Kuliah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($makuls as $mkl) { ?>
                            <tr>
                                <!--<td><?= $mkl->id_makul; ?></td>-->

                                <td><a href="<?php echo base_url('/dashboard/infomahasiswa/' . $mkl->id_makul); ?>"><?= $mkl->nama_makul; ?></a></td>

                                <td>
                                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#editmodal<?= $mkl->id_makul; ?>"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletemodal<?= $mkl->id_makul; ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


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
                    <form id="myForm" action="<?php echo site_url('administrator/dashboard/insert_makul') ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="userid">ID Mata Kuliah*</label>
                            <input type="userid" class="form-control" id="id_makul" name="id_makul" placeholder="Masukkan ID Mata Kuliah">
                        </div>
                        <div class=" form-group">
                            <label for="username">Nama Mata Kuliah*</label>
                            <input type="username" class="form-control" id="nama_makul" name="nama_makul" placeholder="Masukkan Nama Mata Kuliah">
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
    <?php foreach ($makuls as $mkl) { ?>
        <div class="modal fade" id="editmodal<?= $mkl->id_makul; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <input type="hidden" class="form-control" id="id_makul" name="id_makul" value="<?= $mkl->id_makul; ?>">
                            <div class=" form-group">
                                <label for="username">Nama Mata Kuliah*</label>
                                <input type="text" class="form-control" id="nama_makul" name="nama_makul" value="<?= $mkl->nama_makul; ?>">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                    </div>
                    </form>
                </div>
            </div>
            </form>
        </div>
</div>
</div>
<?php } ?>


<?php foreach ($makuls as $mkl) { ?>
    <div class="modal fade" id="deletemodal<?= $mkl->id_makul; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?php echo site_url('administrator/dashboard/delete_makul/' . $mkl->id_makul) ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>