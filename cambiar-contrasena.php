<?php
require("config/conexion.php");
require("config/inicializar-datos.php");

$sqlConsulta = mysqli_query($conexion, "SELECT cod_personal, nombre1, nombre2, apellido1, apellido2 FROM personal WHERE cod_personal = '$xCodPer'");
$fila = mysqli_fetch_array($sqlConsulta);
$cod_personal = $fila['cod_personal'];
$nombre1 = $fila['nombre1'];
$nombre2 = $fila['nombre2'];
$apellido1 = $fila['apellido1'];
$apellido2 = $fila['apellido2'];
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
                                    <h4 class="mb-sm-0">CAMBIAR CONTRASEÑA</h4>

                                    <div class="page-title-right">
                                        <div class="button-items">
                                            <a href="dashboard.php" class="btn btn-success waves-effect waves-light">
                                                <i class="mdi mdi-home-variant-outline"></i> Volver
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
                                                <label class="col-md-2 col-form-label">NOMBRE DE USUARIO</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="usuario" id="usuario" value="<?= $nombre1 ?> <?= $apellido1 ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-form-label">CONTRASEÑA ACTUAL</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="password" name="clave_actual" id="clave_actual">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-form-label">CONTRASEÑA NUEVA</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="password" name="clave" id="clave">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-form-label">CONFIRMAR CONTRASEÑA</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="password" name="clave2" id="clave2">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">   
                                                <label for="exampleDataList" class="col-md-2 col-form-label"></label>
                                                <div class="col-md-10">
                                                    <input type="button" class="btn btn-success waves-effect waves-light" value="ACTUALIZAR CONTRASEÑA" id="benviar">
                                                    <input type="hidden" name="proceso" id="proceso">
                                                    <input type="hidden" name="modulo" id="modulo">
                                                    <input type="hidden" name="cod_personal" id="cod_personal" value="<?= $cod_personal; ?>">
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

        <script src="assets/js/app.js"></script>

        <!-- Sweet Alerts js -->
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <!-- Sweet alert init js-->
        <script src="assets/js/pages/sweet-alerts.init.js"></script>

        <script>
        $(function(){
            $("#clave_actual").keypress(function(e){
                if(e.which == 13){
                    ValidarGenerarClave();
                    return false;
                }
            });
            $("#clave").keypress(function(e){
                if(e.which == 13){
                    ValidarGenerarClave();
                    return false;
                }
            });
            $("#clave2").keypress(function(e){
                if(e.which == 13){
                    ValidarGenerarClave();
                    return false;
                }
            });

            $("#benviar").click(function(){
                ValidarGenerarClave();
                return false;
            })

            function ValidarGenerarClave(){
                if($("#clave_actual").val() == ''){
                    Swal.fire({
                    title: 'Actualizar Contraseña',
                    text: "Ingrese contraseña actual",
                    icon: 'warning'
                    })
                    $("#clave_actual").focus();
                    return false;
                }

                if($("#calve").val() == '' || $("#clave").val().length < 6){
                    Swal.fire({
                    title: 'Actualizar Contraseña',
                    text: "Ingresar mínimo 6 caracteres",
                    icon: 'warning'
                    })
                    $("#clave").focus();
                    return false;
                }

                if($("#clave2").val() == '' || $("#clave2").val().length < 6){
                    Swal.fire({
                    title: 'Actualizar Contraseña',
                    text: "Confirmar Contraseña",
                    icon: 'warning'
                    })
                    //alert("Confirmar Contraseña");
                    $("#clave2").focus();
                    return false;
                }

                if($("#clave").val() != $("#clave2").val()){
                    Swal.fire({
                    title: 'Actualizar Contraseña',
                    text: "Las contraseñas deben ser iguales",
                    icon: 'warning'
                    })
                    //alert("Las contraseñas deben ser iguales");
                    $("#clave2").focus();
                    return false;
                }
                ActualizarClave();
            }

            function ActualizarClave(){
                $("#proceso").val('ActualizarClave');
                $("#modulo").val('Clave');
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
                                'Actualizar Contraseña',
                                '¡Contraseña restablecida con éxito!',
                                'success'
                                );
                                setTimeout(function(){
                                location.reload();
                                }, 3000);
                        }else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Error...',
                            text: 'Su contraseña actual no coincide',
                            });
                            setTimeout(function(){
                                location.reload();
                            }, 3000);
                        }
                    }
                })
            }
        })
        /**************************************************/
        /**************************************************/        
        </script>
    </body>

</html>
