<?php ?>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= base_url('administrator/dashboard/') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?= base_url('administrator/dashboard/userview') ?>">Data User</a>
        </li>
        <li class="breadcrumb-item active ">Detail Mata Kuliah</li>
    </ol>
    <a class="btn btn-primary mb-2 ml-2" data-toggle="modal" data-target="#tambahmakul">Tambah Data Mata Kuliah</a>
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Pilihan Mata Kuliah</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <!--<th>ID Mata Kuliah</th>-->
                            <th><?php if ($role == 2) {
                                    echo "Mata Kuliah Yang Diampu";
                                }
                                if ($role == 4) {
                                    echo "Mata Kuliah Yang Dipilih";
                                } ?></th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($user as $data) { ?>
                            <tr>
                                <td><?php foreach ($makuls as $mkl){
                                    if($data->id_makul == $mkl->id_makul){
                                        echo $mkl->nama_makul;
                                        break;
                                    }
                                }
                                ?></td>
                                <td>
                                    <!-- <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#editmodal<?= $data->id; ?>"><i class="fas fa-edit"></i></button> -->
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="<?php if ($role == 2) {
                                                                                                                echo '#deletepmakulmodal' . $data->id;
                                                                                                            }
                                                                                                            if ($role == 4) {
                                                                                                                echo '#deletepmakulmodal' . $data->id_mhs;
                                                                                                            } ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- tambah data -->
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
                <form id="myForm" action="<?php echo site_url('administrator/dashboard/tambahpilihmakul') ?>" method="post" enctype="multipart/form-data">

                    <label>Pilih Mata Kuliah yang ingin diampu</label>
                    <select name="id_makul" class="form-control">
                        <option disabled value="">-- Pilih Mata Kuliah --</option>
                        <?php foreach ($makuls as $data) : ?>
                            <option value="<?php echo $data->id_makul ?>"><?php echo $data->nama_makul ?></option>
                        <?php endforeach; ?>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
            </div>
            </form>
        </div>
    </div>
</div>

<!-- hapus data -->
<?php foreach ($user as $data) { ?>
    <div class="modal fade" id="<?php if ($role == 2) {
                                    echo 'deletepmakulmodal' . $data->id;
                                }
                                if ($role == 4) {
                                    echo 'deletepmakulmodal' . $data->id_mhs;
                                } ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?php if ($role == 2) {
                                    echo site_url('administrator/dashboard/delete_pmakul/' . $role . '/' . $data->nrp . '/' . $data->id_makul);
                                }
                                if ($role == 4) {
                                    echo site_url('administrator/dashboard/delete_pmakul/' . $role . '/' . $data->nim . '/' . $data->id_makul);
                                }
                                 ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>