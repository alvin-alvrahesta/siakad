<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= base_url('administrator/dashboard/') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active ">Data User</li>
    </ol>
    <a class="btn btn-primary mb-2 ml-2" data-toggle="modal" data-target="#tambahbaru">Tambah User Baru</a>
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Dosen</h4>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama</th>
                            <th>User ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($users as $u) {
                            if ($u->userrole == 2) { ?>
                                <tr>
                                    <td><?= $u->username; ?></td>
                                    <td><?= $u->userid; ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#editmodal<?= $u->id; ?>"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletemodal<?= $u->id; ?>"><i class="fas fa-trash"></i></button>
                                        <a href="<?php echo site_url('administrator/dashboard/ampu_makul/'); ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h4>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama</th>
                            <th>User ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($users as $u) {
                            if ($u->userrole == 4) { ?>
                                <tr>
                                    <td><?= $u->username; ?></td>
                                    <td><?= $u->userid; ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#editmodal<?= $u->id; ?>"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletemodal<?= $u->id; ?>"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal add User-->
    <div class="modal fade" id="tambahbaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah User Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="myForm" action="<?php echo site_url('administrator/dashboard/insert') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Nama*</label>
                            <input type="username" class="form-control" id="nama" name="username" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label for="userid">Username*</label>
                            <input type="userid" class="form-control" id="userid" name="userid" placeholder="Masukkan NIM/NRP">
                        </div>
                        <div class="form-group">
                            <label for="password">Password*</label>
                            <input type="password" class="form-control" id="password" name="userpass" placeholder="Masukkan Password">
                        </div>
                        <div class="form-group">
                            <label for="username">Jenis Akun*</label>
                            <select class="custom-select" name="jenisakun">
                                <option selected disabled>Jenis Akun</option>
                                <option value="1">Admin</option>
                                <option value="2">Dosen</option>
                                <option value="3">Mahasiswa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Aktifkan Akun*</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioaktif" id="radioaktif1" value="Ya">
                                <label class="form-check-label" for="radioaktif1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioaktif" id="radioaktif2" value="Tidak">
                                <label class="form-check-label" for="radioaktif2">
                                    Tidak
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioaktif" id="radioaktif2" value="Selalu">
                                <label class="form-check-label" for="radioaktif2">
                                    Selalu
                                </label>
                            </div>
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

    <!-- EDIT DATA USER -->
    <?php foreach ($users as $u) { ?>
        <div class="modal fade" id="editmodal<?= $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" action="<?php echo site_url('administrator/dashboard/update') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $u->id; ?>">
                            <div class="form-group">
                                <label for="username">Nama*</label>
                                <input type="username" class="form-control" id="nama" name="username" value="<?= $u->username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="userid">Username*</label>
                                <input type="userid" class="form-control" id="userid" name="userid" value="<?= $u->userid; ?>">
                            </div>
                            <div class=" form-group">
                                <label for="password">Password*</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti password">
                            </div>
                            <div class="form-group">
                                <label for="username">Jenis Akun*</label>
                                <select class="custom-select" name="jenisakun">
                                    <!--<option selected disabled>Jenis Akun</option>-->
                                    <option <?php if ($u->userrole == 1) { ?> selected <?php } ?>value="1">Admin</option>
                                    <option <?php if ($u->userrole == 2) { ?> selected <?php } ?>value="2">Dosen</option>
                                    <option <?php if ($u->userrole == 4) { ?> selected <?php } ?>value="3">Mahasiswa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="username">Aktifkan Akun*</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radioaktif" id="radioaktif1" value="Ya" <?php if ($u->useren == 'Y') { ?> checked <?php } ?>>
                                    <label class="form-check-label" for="radioaktif1">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radioaktif" id="radioaktif2" value="Tidak" <?php if ($u->useren == 'N') { ?> checked <?php } ?>>
                                    <label class="form-check-label" for="radioaktif2">
                                        Tidak
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radioaktif" id="radioaktif2" value="Selalu" <?php if ($u->useren == 'A') { ?> checked <?php } ?>>
                                    <label class="form-check-label" for="radioaktif2">
                                        Selalu
                                    </label>
                                </div>
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
    <?php } ?>


    <!-- DELETE USER -->
    <?php foreach ($users as $u) { ?>
        <div class="modal fade" id="deletemodal<?= $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a id="btn-delete" class="btn btn-danger" href="<?php echo site_url('administrator/dashboard/delete/' . $u->id) ?>">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>