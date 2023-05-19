<?php
require("config/conexion.php");
require("config/inicializar-datos.php");
$cod_marca = $_REQUEST['cod_marca'];
$sqlConsulta = mysqli_query($conexion, "SELECT * FROM marcas WHERE cod_marca = '$cod_marca'");
$fcons = mysqli_fetch_array($sqlConsulta);
$cod_marca = $fcons['cod_marca'];
$marca = $fcons['marca'];
$estado = $fcons['estado'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php require("config/header-web.php"); ?>
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
    </head>
    <body>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" name="fapps" id="fapps">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">MARCA</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="marca" id="marca" value="<?=$marca?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">ESTADO</label>
                                <div class="col-md-10">
                                    <input <?php if($estado == 'A'){
                                                echo 'checked=\"checked\"';
                                            } ?> type="radio" name="estado" value="A"> ACTIVO
                                    <input <?php if($estado == 'I'){
                                                echo 'checked=\"checked\"';
                                            } ?> type="radio" name="estado" value="I"> INACTIVO
                                </div>
                            </div>
                            <div class="mb-3 row">   
                                <label for="exampleDataList" class="col-md-2 col-form-label"></label>
                                <div class="col-md-10">
                                    <button type="button" class="btn btn-success waves-effect waves-light" id="benviar">
                                        <i class="mdi mdi-content-save align-middle me-2"></i> ACTUALIZAR
                                    </button>
                                    <input type="hidden" name="proceso" id="proceso">
                                    <input type="hidden" name="modulo" id="modulo">
                                    <input type="hidden" name="cod_marca" id="cod_marca" value="<?= $cod_marca ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </p>
    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts js -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- jquery.vectormap map -->
    <script src="assets/libs/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="assets/js/pages/dashboard.init.js"></script>
    <!-- app.js -->
    <script src="assets/js/app.js"></script>

    <script>
        $(function(){
            $("#benviar").click(function(){
                if($("#marca").val() == ''){
                    Swal.fire({
                    title: 'Marca',
                    text: "Ingresar Marca",
                    icon: 'warning'
                    });
                    $("#marca").focus();
                    return false;
                }
                /*************************************************/
                /*************************************************/
                $("#proceso").val('ActualizarMarca');
                $("#modulo").val('Marca');
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
                            'Marca',
                            '¡Se actualizó con éxito!',
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