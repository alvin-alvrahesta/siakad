<div class="card shadow mb-2">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Data User</h4>

    </div>

    <div class="card-body">
        <a href="<?php echo site_url('barang/create') ?>" class="btn btn-primary mb-1" data-toggle="modal" data-target="#tambahbaru">Tambah User Baru</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>User Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($alluser as $usr) { ?>
                        <tr>
                            <td><?= $usr->id ?></td>
                            <td><?= $usr->userid ?></td>
                            <td><?= $usr->useren ?></td>
                            <td>
                                <button class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletemodal"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
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
                <form id="myForm" action="<?php echo site_url('Admin/save_user') ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="username">Username*</label>
                        <input type="username" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                    </div>

                    <div class="form-group">
                        <label for="password">Password*</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                    </div>

                    <div class="form-group">
                        <label for="role_id">Role ID*</label>
                        <select required name="role_id" id="role_id" class="form-control">
                            <option value="">Pilih Role ID</option>
                            <?php foreach ($role_id as $a) { ?>
                                <option value="<?= $a->id; ?>"><?= $a->role; ?></option>
                            <?php } ?>
                        </select>
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