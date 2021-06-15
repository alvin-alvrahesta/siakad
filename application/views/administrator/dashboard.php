<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="fas fa-tachometer-alt"></i> <a href="<?= base_url('administrator/dashboard/index') ?>">Dashboard /</a>
        </li>
    </ol>
    <!-- <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i> Dashboard
    </div> -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h4 class="m-0 font-weight-bold text-primary">Selamat Datang</h4>
				</div>
				<div class="card-body">
					<p>Selamat Datang <strong> <?php echo $myuser['username']; ?></strong> di Sistem Informasi Akademik Universitas Jurang Belimbing, Anda Login sebagai <strong> <?php echo $myuser['username']; ?></strong></p>
					<hr>
					<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fas fa-cogs"></i> Control Panel
					</button>
				</div>
			</div>
		</div>
	</div>	
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i> Control Panel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 text-info text-center">
                            <a href="<?php echo base_url('/administrator/dashboard/userview'); ?>">
                                <p class="nav-link small text-info">Data User</p>
                            </a>
                            <i class="fas fa-3x fa-user-graduate"></i>
                        </div>

                        <div class="col-md-6 text-info text-center">
                            <a href="<?php echo base_url('/administrator/dashboard/makulview'); ?>">
                                <p class="nav-link small text-info">Data Matkul</p>
                            </a>
                            <i class="fas fa-3x fa-calendar-alt"></i>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JOINNN TABLE -->
