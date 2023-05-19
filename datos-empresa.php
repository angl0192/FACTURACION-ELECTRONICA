<?php
require("config/conexion.php");
require("config/inicializar-datos.php");
$sqlConsulta = mysqli_query($conexion, "SELECT * FROM empresa");
$fila = mysqli_fetch_array($sqlConsulta);
$id_empresa = $fila['id_empresa'];
$ruc = $fila['ruc'];
$razon_social = $fila['razon_social'];
$nombre_comercial = $fila['nombre_comercial'];
$direccion = $fila['direccion'];
$telefono = $fila['telefono'];
$movil = $fila['movil'];
$email = $fila['email'];
$tipo = $fila['tipo'];
$usuario_sol = $fila['usuario_sol'];
$clave_sol = $fila['clave_sol'];
$certificado = $fila['certificado'];
$clave_certificado = $fila['clave_certificado'];
$clave_borrar = $fila['clave_borrar'];
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
                                    <h4 class="mb-sm-0">DATOS DE EMPRESA</h4>

                                    <div class="page-title-right">
                                        <div class="button-items">
                                            <a href="dashboard.php" class="btn btn-success waves-effect waves-light">
                                                <i class="ri-check-line align-middle me-2"></i> Volver
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <form action="" name="fapps" id="fapps" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                            <div class="mb-3 row">
                                                <label for="ruc" class="col-md-2 col-form-label">RUC</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="ruc" id="ruc" value="<?= $ruc ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="razon_social" class="col-md-2 col-form-label">RAZÓN SOCIAL</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="razon_social" id="razon_social" value="<?= $razon_social ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="nombre_comercial" class="col-md-2 col-form-label">NOMBRE COMERCIAL</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="nombre_comercial" id="nombre_comercial" value="<?= $nombre_comercial ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="direccion" class="col-md-2 col-form-label">DIRECCIÓN</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="direccion" id="direccion" value="<?= $direccion ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="telefono" class="col-md-2 col-form-label">TELÉFONO</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="telefono" id="telefono" value="<?= $telefono ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="movil" class="col-md-2 col-form-label">MÓVIL</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="movil" id="movil" value="<?= $movil ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="email" class="col-md-2 col-form-label">EMAIL</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="email" id="email" value="<?= $email ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-form-label">TIPO</label>
                                                <div class="col-md-10">
                                                    <input <?php if($tipo == '1'){
                                                                echo 'checked=\"checked\"';
                                                            } ?> type="radio" name="tipo" value="1"> PRODUCCIÓN
                                                    <input <?php if($tipo == '3'){
                                                                echo 'checked=\"checked\"';
                                                            } ?>  type="radio" name="tipo" value="3"> BETA
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="usuario_sol" class="col-md-2 col-form-label">USUARIO SOL</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="usuario_sol" id="usuario_sol" value="<?= $usuario_sol ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="clave_sol" class="col-md-2 col-form-label">CLAVE SOL</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="password" name="clave_sol" id="clave_sol" value="<?= $clave_sol ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="certificado" class="col-md-2 col-form-label">CERTIFICADO PFX</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="certificado" id="certificado" value="<?= $certificado ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="clave_certificado" class="col-md-2 col-form-label">CLAVE CERTIFICADO</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="password" name="clave_certificado" id="clave_certificado" value="<?= $clave_certificado ?>"> 
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="email" class="col-md-2 col-form-label">CLAVE BORRAR</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="clave_borrar" id="clave_borrar" value="<?= $clave_borrar ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">   
                                                <label for="exampleDataList" class="col-md-2 col-form-label"></label>
                                                <div class="col-md-10">
                                                    <button type="button" class="btn btn-success waves-effect waves-light" id="benviar">
                                                        <i class="ri-check-line align-middle me-2"></i> GUARDAR CAMBIOS
                                                    </button>
                                                    <input type="hidden" name="id_empresa" id="id_empresa" value= "<?= $id_empresa ?>">
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
                $("#benviar").click(function(){
                    $("#proceso").val('ActualizarEmpresa');
                    $("#modulo").val('Empresa');
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
                                'Datos de Empresa',
                                '¡Actualización Exitosa!',
                                'success'
                                );
                                setTimeout(function(){
                                    location.reload();
                                }, 3000);
                            }
                        }
                    });
                });
            });
            /**************************************************/
            /**************************************************/        
        </script>
    </body>

</html>
