<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="<?= base_url('mahasiswa/mahasiswa') ?>">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">My Profil</li>
</ol>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>

<div class="row">
	<div class="col-lg-8">
		<?= $this->session->flashdata('message'); ?>
	</div>
</div>

<div class="card mb-3" style="max-width: 540px;">

	<div class="row no-gutters">

		<div class="col-md-8">
			<div class="card-body">
				<h5 class="card-title font-weight-bold text-primary"><?= $profil->username ?></h5>
				<p class="card-text"><?= $profil->userid ?></p>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4 py-3 border-left-secondary " style="max-width: 540px;">
	<div class="card-body">
		<div>
			<a href="<?php echo base_url("mahasiswa/profil/editprofil") ?>" class="small-box-footer">Edit Profil <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>

<div class="card mb-4 py-3 border-left-secondary" style="max-width: 540px;">
	<div class="card-body">
		<div>
			<a href="<?php echo base_url("mahasiswa/changepassword") ?>" class="small-box-footer">Ganti Password <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>
