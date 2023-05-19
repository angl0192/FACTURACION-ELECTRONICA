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
                                <label class="col-md-2 col-form-label">PUNTO DE VENTA</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="cod_puntoventa" id="cod_puntoventa">
                                        <option value = "0">SELECCIONAR PUNTO VENTA</option>
                                        <?php
                                        $sqlPuntoVenta = mysqli_query($conexion, "SELECT * FROM puntos_venta WHERE estado = 'A'");
                                        while($pventa = mysqli_fetch_array($sqlPuntoVenta)){
                                            $cod_puntoventa = $pventa['cod_puntoventa'];
                                            $nombre_sucursal = $pventa['nombre_sucursal'];
                                            echo "<option value = '$cod_puntoventa'>$nombre_sucursal</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">PRIMER NOMBRE</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="nombre1" id="nombre1">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">SEGUNDO NOMBRE</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="nombre2" id="nombre2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">APELLIDO PATERNO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="apellido1" id="apellido1">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">APELLIDO MATERNO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="apellido2" id="apellido2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">TIPO DE DOCUMENTO</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="cod_tipodoc" id="cod_tipodoc">
                                        <option value = "0">SELECCIONAR TIPO DOCUMENTO</option>
                                        <?php
                                        $sqlTipoDoc = mysqli_query($conexion, "SELECT * FROM tipos_documentos_identidad");
                                        while($tdoc = mysqli_fetch_array($sqlTipoDoc)){
                                            $cod_tipodoc = $tdoc['cod_tipodoc'];
                                            $descripcion = $tdoc['descripcion'];
                                            echo "<option value = '$cod_tipodoc'>$descripcion</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">N° DOCUMENTO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="num_documento" id="num_documento">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">EMAIL</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="email" id="email">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">TELÉFONO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="movil" id="movil">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">CARGO</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="cargo" id="cargo">
                                        <option value = "0">SELECCIONAR CARGO</option>
                                        <?php
                                        $sqlCargos = mysqli_query($conexion, "SELECT * FROM cargos_personal WHERE estado = 'A'");
                                        while($fcargo = mysqli_fetch_array($sqlCargos)){
                                            $cargo = $fcargo['cargo'];
                                            echo "<option value = '$cargo'>$cargo</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">ÁREA TRABAJO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="area_trabajo" id="area_trabajo">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">FECHA INGRESO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="date" name="fecha_ingreso" id="fecha_ingreso">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">USUARIO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="usuario" id="usuario">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">CONTRASEÑA</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="password" name="clave" id="clave">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">ACCESOS</label>
                                <div class="col-md-10">
                                    <input type="radio" name="accesos" value="SI" checked> SÍ
                                    <input type="radio" name="accesos" value="NO"> NO
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
                if($("#cod_puntoventa").val() == 0){
                    Swal.fire({
                    title: 'Personal',
                    text: "Seleccionar Punto de Venta",
                    icon: 'warning'
                    });
                    $("#cod_puntoventa").focus();
                    return false;
                }
                if($("#nombre1").val() == ''){
                    Swal.fire({
                    title: 'Personal',
                    text: "Ingresar por lo menos Primer Nombre",
                    icon: 'warning'
                    });
                    $("#nombre1").focus();
                    return false;
                }
                if($("#apellido1").val() == ''){
                    Swal.fire({
                    title: 'Personal',
                    text: "Ingresar por lo menos Apellido Paterno",
                    icon: 'warning'
                    });
                    $("#apellido1").focus();
                    return false;
                }
                if($("#cod_tipodoc").val() == 0){
                    Swal.fire({
                    title: 'Personal',
                    text: "Seleccionar Tipo Documento",
                    icon: 'warning'
                    });
                    $("#cod_tipodoc").focus();
                    return false;
                }
                if($("#num_documento").val() == ''){
                    Swal.fire({
                    title: 'Personal',
                    text: "Ingresar N° Documento",
                    icon: 'warning'
                    });
                    $("#num_documento").focus();
                    return false;
                }
                if($("#email").val() == ''){
                    Swal.fire({
                    title: 'Personal',
                    text: "Ingresar Email",
                    icon: 'warning'
                    });
                    $("#email").focus();
                    return false;
                }
                if($("#cargo").val() == 0){
                    Swal.fire({
                    title: 'Personal',
                    text: "Ingresar Cargo",
                    icon: 'warning'
                    });
                    $("#cargo").focus();
                    return false;
                }
                /*************************************************/
                /*************************************************/
                $("#proceso").val('RegistrarPersonal');
                $("#modulo").val('Personal');
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
                            text: "El Personal ya existe",
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