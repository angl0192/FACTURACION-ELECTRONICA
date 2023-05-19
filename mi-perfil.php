<?php
require("config/conexion.php");
require("config/inicializar-datos.php");
/**************************************************/
/***************** CONSULTA DE DATOS **************/
/**************************************************/
$sqlConsulta = mysqli_query($conexion, "SELECT cod_personal, nombre1, nombre2, apellido1, apellido2, cod_tipodoc, num_documento, email, movil FROM personal WHERE cod_personal = '$xCodPer'");
$fpersonal = mysqli_fetch_array($sqlConsulta);
$cod_personal = $fpersonal['cod_personal'];
$nombre1 = $fpersonal['nombre1'];
$nombre2 = $fpersonal['nombre2'];
$apellido1 = $fpersonal['apellido1'];
$apellido2 = $fpersonal['apellido2'];
$cod_tipodoc = $fpersonal['cod_tipodoc'];
$num_documento = $fpersonal['num_documento'];
$email = $fpersonal['email'];
$movil = $fpersonal['movil'];
?>
<!doctype html>
<html lang="es">

    <head>
        
        <?php require("config/header-web.php"); ?>
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <!-- Sweet Alert-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <style>
            h4 {
                text-transform: uppercase;
            }
        </style>

    </head>

    <body data-sidebar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <!-- HEADER -->
            <?php require("config/header.php"); ?>

            <!-- ========== MENU ========== -->
            <?php require("config/menu.php"); ?>            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">¡Bienvenido a tu perfil <?= $xNombre1 ?> <?= $xNombre2 ?>!</h4>

                                    <div class="page-title-right">
                                        <div class="button-items">
                                            <a href="dashboard.php" class="btn btn-success waves-effect waves-light">
                                                <i class="mdi mdi-home-variant-outline"></i> VOLVER
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <form action="" name="fapps" id="fapps" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-form-label">PRIMER NOMBRE</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="nombre1" id="nombre1" value="<?= $nombre1; ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-form-label">SEGUNDO NOMBRE</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="nombre2" id="nombre2" value="<?= $nombre2; ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-form-label">APELLIDO PATERNO</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="apellido1" id="apellido1" value="<?= $apellido1; ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-form-label">APELLIDO MATERNO</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="apellido2" id="apellido2" value="<?= $apellido2; ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-form-label">TIPO DE DOCUMENTO</label>
                                                <div class="col-md-10">
                                                    <select class="form-select" name="cod_tipodoc" id="cod_tipodoc">
                                                        <?php
                                                        if($cod_tipodoc == 0 or $cod_tipodoc == ''){
                                                            echo "<option value='0'>SELECCIONAR TIPO DOCUMENTO</option>";
                                                            $sqlDocs = mysqli_query($conexion, "SELECT * FROM tipos_documentos_identidad");
                                                            while($fdoc = mysqli_fetch_array($sqlDocs)){
                                                                $xcod_tipodoc = $fdoc['cod_tipodoc'];
                                                                $descripcion = $fdoc['descripcion'];
                                                                echo "<option value='$xcod_tipodoc'>$descripcion</option>";
                                                            }
                                                        }else{
                                                            $sqlDocs = mysqli_query($conexion, "SELECT * FROM tipos_documentos_identidad WHERE cod_tipodoc = '$cod_tipodoc'");
                                                            while($fdoc = mysqli_fetch_array($sqlDocs)){
                                                                $cod_tipodoc = $fdoc['cod_tipodoc'];
                                                                $descripcion = $fdoc['descripcion'];
                                                                echo "<option value='$cod_tipodoc'>$descripcion</option>";
                                                            }
                                                            $sqlDocs = mysqli_query($conexion, "SELECT * FROM tipos_documentos_identidad WHERE cod_tipodoc != '$cod_tipodoc'");
                                                            while($fdoc = mysqli_fetch_array($sqlDocs)){
                                                                $cod_tipodoc = $fdoc['cod_tipodoc'];
                                                                $descripcion = $fdoc['descripcion'];
                                                                echo "<option value='$cod_tipodoc'>$descripcion</option>";
                                                            }
                                                        }
                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-form-label">NÚMERO DOCUMENTO</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="num_documento" id="num_documento" value="<?= $num_documento; ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-form-label">EMAIL</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="email" id="email" value="<?= $email; ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-form-label">TELÉFONO</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="movil" id="movil" value="<?= $movil; ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">   
                                                <label for="exampleDataList" class="col-md-2 col-form-label"></label>
                                                <div class="col-md-10">
                                                    <input type="button" class="btn btn-success waves-effect waves-light" value="ACTUALIZAR PERFIL" id="benviar">
                                                    <input type="hidden" name="cod_personal" value="<?= $cod_personal; ?>">
                                                    <input type="hidden" name="proceso" id="proceso">
                                                    <input type="hidden" name="modulo" id="modulo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                        </form>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
                <!-- FOOTER -->
                <?php require("config/footer.php"); ?>
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->  

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
        <!-- app.js -->
        <script src="assets/js/app.js"></script>
        <script>
        $(function(){
            /**************************************************/
            /************* ENVIAR ACTUALIZAR *****************/
            $("#benviar").click(function(){
                $("#proceso").val("ActualizarPerfil");
                $("#modulo").val("Perfil");
                var datosEnviar = $("#fapps").serialize();
                $.ajax({
                    data: datosEnviar,
                    url: "config/proceso-guardar.php",
                    type: "POST",
                    dataType: "json",
                    success: function(data){
                        var respuesta = data.respuesta;
                        if(respuesta == 'SI'){
                            Swal.fire(
                            'Mi Perfil',
                            '¡Actualización Exitosa!',
                            'success'
                            );
                            setTimeout(function(){
                                location.reload();
                            }, 3000);
                        }
                    }
                })
            })
        })
        /**************************************************/
        /**************************************************/        
        </script>
    </body>

</html>
