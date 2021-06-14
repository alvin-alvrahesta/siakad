<div class="container-fluid">


	<div class="alert alert-success" role="alert">
		<i class="fas fa-university"></i> Mahasiswa
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Selamat Datang</h4>
        <p>Selamat Datang <strong> <?php echo $myuser['username']; ?></strong> Sistem Informasi Akademik Universitas xxx, Anda Login sebagai <strong> <?php echo $myuser['username']; ?></strong></p>
        <hr>
        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-cogs"></i> Control Panel
        </button>

    </div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i> Control Panel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 text-info text-center">
                            <a href="<?php echo base_url(); ?>dosen/dashboard/dosenview">
                                <p class="nav-link small text-info">INPUT NILAI</p>
                            </a>
                            <i class="fas fa-3x fa-sort-numeric-down"></i>
                        </div>

                        <div class="col-md-3 text-info text-center">
                            <a href="<?php echo base_url(); ?>dosen/dashboard/inputnilaiview">
                                <p class="nav-link small text-info">IDENTITAS</p>
                            </a>
                            <i class="fas fa-3x fa-id-card-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>