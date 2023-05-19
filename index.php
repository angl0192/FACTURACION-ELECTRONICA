<?php require("config/conexion.php");
session_start();
session_destroy();
$_SESSION = array();
if(ini_get('session.use_cookies')){
    $params = session_get_cookie_params();
    setcookie(session_name(),'', time() - 42000, $params['domain'], $params['secure'], $params['httponly']);
}
?>
<!doctype html>
<html lang="es">
    <head>
        
        <?php require("config/header-web.php"); ?>
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <!-- Sweet Alert-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

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
                                    <h4 class="font-size-18 text-muted mt-2 mt-2-login text-center">SISTEMA DE VENTAS Y FACTURACIÓN ELECTRÓNICA</h4>
                                    <form class="form-horizontal" action="" id="fapps">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="usuario">USUARIO</label>
                                                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese Usuario">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="clave">CONTRASEÑA</label>
                                                    <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingrese Contraseña">
                                                </div>
                                                <div class="d-grid mt-4">
                                                    <input type="button" class="btn btn-primary waves-effect waves-light" value="INICIAR SESIÓN" id="bingresa">
                                                    <input type="hidden" name="proceso" id="proceso">
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
        <!-- Sweet Alerts js -->
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <!-- Sweet alert init js-->
        <script src="assets/js/pages/sweet-alerts.init.js"></script>
        <!-- Apps -->
        <script src="assets/js/app.js"></script>
        <!-- Config -->
        <script src="assets/js/config.js"></script>

    </body>
</html>
