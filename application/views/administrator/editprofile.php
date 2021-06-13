                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('administrator') ?>">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="<?= base_url('administrator/dashboard/profile') ?>"><?php echo $myuser['username']; ?></a>
                        </li>

                        <li class="breadcrumb-item active">Edit Profil</li>
                    </ol>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>

                    <div class="row">
                        <div class="col-lg-6">

                            <?= $this->session->flashdata('message'); ?>

                            <form action="<?= base_url('administrator/dashboard/updateprofile') ?>" method="post">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $myuser['id']; ?>">
                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="username" value="<?php echo $myuser['username']; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="userid">User ID</label>
                                    <input type="text" class="form-control" id="userid" name="userid" value="<?php echo $myuser['userid']; ?>">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>


                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->