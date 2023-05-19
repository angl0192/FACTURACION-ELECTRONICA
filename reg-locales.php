<?php
require("config/conexion.php");
require("config/inicializar-datos.php");
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
                                <label for="example-text-input" class="col-md-2 col-form-label">PUNTO DE VENTA</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="nombre_sucursal" id="nombre_sucursal">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">ALIAS</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="alias" id="alias">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">DIRECCIÓN</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="direccion" id="direccion">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">TELÉFONO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="telefono" id="telefono">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">EMAIL</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="email" id="email">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">ESTADO</label>
                                <div class="col-md-10">
                                    <input type="radio" name="estado" value="A" checked> ACTIVO
                                    <input type="radio" name="estado" value="I"> INACTIVO
                                </div>
                            </div>
                            <div class="mb-3 row">   
                                <label for="exampleDataList" class="col-md-2 col-form-label"></label>
                                <div class="col-md-10">
                                    <button type="button" class="btn btn-success waves-effect waves-light" id="benviar">
                                        <i class="mdi mdi-content-save align-middle me-2"></i> REGISTRAR
                                    </button>
                                    <input type="hidden" name="proceso" id="proceso">
                                    <input type="hidden" name="modulo" id="modulo">
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
                if($("#nombre_sucursal").val() == ''){
                    Swal.fire({
                    title: 'Punto de Venta',
                    text: "Ingrese nombre del Punto de Venta",
                    icon: 'warning'
                    })
                    //alert("Ingresar nombre del local");
                    $("#nombre_sucursal").focus();
                    return false;
                }
                if($("#alias").val() == ''){
                    Swal.fire({
                    title: 'Punto de Venta',
                    text: "Ingrese Alias del Punto de Venta",
                    icon: 'warning'
                    })
                    //alert("Ingresar alias del local");
                    $("#alias").focus();
                    return false;
                }
                /*************************************************/
                /*************************************************/
                $("#proceso").val('RegistrarPuntoVenta');
                $("#modulo").val('PuntoVenta');
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
                            'Punto de Venta',
                            '¡Se registró con éxito!',
                            'success'
                            );
                            setTimeout(function(){
                                location.reload();
                            }, 3000);
                        }else{
                            Swal.fire({
                            title: 'Punto de Venta',
                            text: "El nombre del Punto de Venta ya existe",
                            icon: 'error'
                            });
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