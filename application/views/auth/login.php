<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!--<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
                            <div class="col-lg-12">
                                <div class="p-5">
									<div class="text-center">
                                        <img src="<?php echo base_url() ?>assets/img/logoujb24.png">
                                    </div>
                                    <div class="text-center">
										<br><h1 class="h4 text-gray-900 mb-4">Sistem Informasi Akademik</h1>
                                    </div>
                                    <form method="post" action="<?php base_url('auth')?>" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" name="username" aria-describedby="userHelp"
                                                placeholder="Masukan Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Masukan Password...">
                                        </div>
                                        <!--<div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>-->
                                        <button class="btn btn-primary btn-user btn-block">Login</button>
                                        <!--<a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a>-->
                                        <!--<hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>-->
                                    </form>
                                    <hr>
									<?php echo $this->session->flashdata('message'); ?>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
