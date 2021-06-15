<?php echo var_dump($mhs); ?>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= base_url('administrator/dashboard/') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?= base_url('administrator/dashboard/makulview') ?>">Data Mata Kuliah</a>
        </li>
        <li class="breadcrumb-item active ">Info Mahasiswa</li>
    </ol>
    <div class="card shadow mb-4" style=" max-width: 540px;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mahasiswa Pengambil Matkul</h6>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><i class="fas fa-chevron-circle-right"></i> An item</li>
                <li class="list-group-item"><i class="fas fa-chevron-circle-right"></i> A second item</li>
                <li class="list-group-item"><i class="fas fa-chevron-circle-right"></i> A third item</li>
                <li class="list-group-item"><i class="fas fa-chevron-circle-right"></i> A fourth item</li>
                <li class="list-group-item"><i class="fas fa-chevron-circle-right"></i> And a fifth one</li>
            </ul>
        </div>
    </div>

</div>