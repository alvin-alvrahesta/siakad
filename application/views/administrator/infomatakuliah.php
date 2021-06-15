<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= base_url('administrator/dashboard/') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?= base_url('administrator/dashboard/makulview') ?>">Data Mata Kuliah</a>
        </li>
        <li class="breadcrumb-item active "><?php echo $nama_makul ?></li>
    </ol>
    
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Dosen</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <!--<th>ID Mata Kuliah</th>-->
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dsn as $dosen) { ?>
                            <tr>
                                <td><?php foreach ($udsn as $users) {
                                        if ($users->userid == $dosen->nrp) {
                                            echo $users->username;
                                            break;
                                        }
                                    }
                                    ?></td>
                                <td>
                                   <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusdosenmodal<?= $dosen->id; ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Mahasiswa</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <!--<th>ID Mata Kuliah</th>-->
                            <th>Nama</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($mhs as $mahasiswa) { ?>
                            <tr>
                                <td><?php foreach ($umhs as $users) {
                                        if ($users->userid == $mahasiswa->nim) {
                                            echo $users->username;
                                            break;
                                        }
                                    }
                                    ?></td>
                                <td><?php echo $mahasiswa->nilai ?></td>
                                <td>
                                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#editnilaimodal<?= $mahasiswa->id_mhs; ?>"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusmhsmodal<?= $mahasiswa->id_mhs; ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- edit -->
<?php foreach ($mhs as $mahasiswa) { ?>
    <div class="modal fade" id="editnilaimodal<?= $mahasiswa->id_mhs; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="myForm" action="<?php echo site_url('administrator/dashboard/update_mamakul') ?>" method="post" enctype="multipart/form-data">
                        <input readonly type="hidden" class="form-control" id="userid" name="userid" value="<?php echo $mahasiswa->nim; ?>">
                        <input readonly type="hidden" class="form-control" id="id_makul" name="id_makul" value="<?php echo $mahasiswa->id_makul; ?>">
                        <div class="form-group">
                            <label>Masukan Nilai</label>
                            <input type="text" class="form-control" id="nilai" name="nilai" value="<?php echo $mahasiswa->nilai; ?>">
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
    </div>
<?php } ?>

<!-- hapus data -->
<?php foreach ($mhs as $mahasiswa) { ?>
    <div class="modal fade" id="hapusmhsmodal<?= $mahasiswa->id_mhs; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?php echo site_url('administrator/dashboard/delete_makuliah/' . $mahasiswa->nim . '/' . $mahasiswa->id_makul); ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- hapus data (dosen)-->
<?php foreach ($dsn as $dosen) { ?>
    <div class="modal fade" id="hapusdosenmodal<?= $dosen->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?php echo site_url('administrator/dashboard/delete_dokuliah/' . $dosen->nrp . '/' . $dosen->id_makul); ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>