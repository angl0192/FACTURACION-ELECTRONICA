<!doctype html>
<html lang="es">

    <head>
        
        <?php require("config/header-web.php"); ?>
        <meta http-equiv="refresh" content="3;url=index.php">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-pattern">
        <div class="bg-overlay"></div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="">
                                    <div class="text-center">
                                        <div class="logo-login">
                                            <img src="assets/images/logo-dark3.png" alt="" height="50" class="auth-logo logo-dark mx-auto">
                                            <img src="assets/images/logo-light3.png" alt="" height="50" class="auth-logo logo-light mx-auto">
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <h4 class="font-size-18 text-muted mt-2 mt-2-login text-center">EL USUARIO O LA CONTRASEÑA NO COINCIDE</h4>
                                    <form class="form-horizontal" action="">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="user-thumb text-center m-b-30">
                                                    <img src="assets/images/error.svg" class="mx-auto d-block avatar-xxl" alt="thumbnail">
                                                </div>
                                                <div class="d-grid mt-4">
                                                    <a href="index.php" class="btn btn-primary waves-effect waves-light">VOLVER A INGRESAR</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <?php require("config/footer-externo.php"); ?>

                        </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>