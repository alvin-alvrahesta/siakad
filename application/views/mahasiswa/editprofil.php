                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('mahasiswa/mahasiswa') ?>">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="<?= base_url('mahasiswa/profil') ?>"><?php echo $profil->username ?></a>
                        </li>

                        <li class="breadcrumb-item active">Edit Profil</li>
                    </ol>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>

                    <div class="row">
                        <div class="col-lg-6">

                            <?= $this->session->flashdata('editprofil'); ?>

                            <form action="<?= base_url('mahasiswa/profil/updateprofil/'.$profil->id) ?>" method="post">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $profil->id ?>" >

                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $profil->username ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="userid">User ID</label>
                                    <input type="text" class="form-control" id="userid" name="userid" value="<?php echo $profil->userid ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>


                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->
