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

                        <li class="breadcrumb-item active">Ganti Password</li>
                    </ol>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>

                    <div class="row">
                        <div class="col-lg-6">

                            <?= $this->session->flashdata('message'); ?>

                            <form action="<?= base_url('administrator/dashboard/updatepassword') ?>" method="post">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $myuser['id']; ?>">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="cur_pass">
                                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="new_pass1">New Password</label>
                                    <input type="text" class="form-control" id="new_pass1" name="new_pass1">
                                    <?= form_error('new_pass1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="new_pass2">Repeat Password</label>
                                    <input type="password" class="form-control" id="new_pass2" name="new_pass2">
                                    <?= form_error('new_pass2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>


                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->