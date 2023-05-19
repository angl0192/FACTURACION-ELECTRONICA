<?php
require("config/conexion.php");
require("config/inicializar-datos.php");
$cod_personal = $_REQUEST['cod_personal'];
$sqlConsulta = mysqli_query($conexion, "SELECT * FROM personal WHERE cod_personal = '$cod_personal'");
$fcons = mysqli_fetch_array($sqlConsulta);
$cod_personal = $fcons['cod_personal'];
$cod_puntoventa = $fcons['cod_puntoventa'];
$nombre1 = $fcons['nombre1'];
$nombre2 = $fcons['nombre2'];
$apellido1 = $fcons['apellido1'];
$apellido2 = $fcons['apellido2'];
$cod_tipodoc = $fcons['cod_tipodoc'];
$num_documento = $fcons['num_documento'];
$email = $fcons['email'];
$movil = $fcons['movil'];
$cargo = $fcons['cargo'];
$area_trabajo = $fcons['area_trabajo'];
$fecha_ingreso = $fcons['fecha_ingreso'];
$accesos = $fcons['accesos'];
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
                                <label class="col-md-2 col-form-label">PUNTO DE VENTA</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="cod_puntoventa" id="cod_puntoventa">                                        
                                        <?php
                                        if($cod_puntoventa == 0 || $cod_puntoventa == ''){
                                            echo "<option value = '0'>SELECCIONAR PUNTO VENTA</option>";
                                            $sqlPuntoVenta = mysqli_query($conexion, "SELECT * FROM puntos_venta WHERE estado = 'A'");
                                            while($pventa = mysqli_fetch_array($sqlPuntoVenta)){
                                                $xcod_puntoventa = $pventa['cod_puntoventa'];
                                                $nombre_sucursal = $pventa['nombre_sucursal'];
                                                echo "<option value = '$xcod_puntoventa'>$nombre_sucursal</option>";
                                            }
                                        }else{
                                            $sqlPuntoVenta = mysqli_query($conexion, "SELECT * FROM puntos_venta WHERE cod_puntoventa = '$cod_puntoventa'");
                                            while($pventa = mysqli_fetch_array($sqlPuntoVenta)){
                                                $xcod_puntoventa = $pventa['cod_puntoventa'];
                                                $nombre_sucursal = $pventa['nombre_sucursal'];
                                                echo "<option value = '$xcod_puntoventa'>$nombre_sucursal</option>";
                                            }
                                            /********************/
                                            $sqlPuntoVenta = mysqli_query($conexion, "SELECT * FROM puntos_venta WHERE cod_puntoventa != '$cod_puntoventa'");
                                            while($pventa = mysqli_fetch_array($sqlPuntoVenta)){
                                                $xcod_puntoventa = $pventa['cod_puntoventa'];
                                                $nombre_sucursal = $pventa['nombre_sucursal'];
                                                echo "<option value = '$xcod_puntoventa'>$nombre_sucursal</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">PRIMER NOMBRE</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="nombre1" id="nombre1" value="<?= $nombre1 ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">SEGUNDO NOMBRE</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="nombre2" id="nombre2" value="<?= $nombre2 ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">APELLIDO PATERNO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="apellido1" id="apellido1" value="<?= $apellido1 ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">APELLIDO MATERNO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="apellido2" id="apellido2" value="<?= $apellido2 ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">TIPO DE DOCUMENTO</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="cod_tipodoc" id="cod_tipodoc">                                        
                                        <?php
                                        if($cod_tipodoc == 0 || $cod_tipodoc == ''){
                                            echo "<option value = '0'>SELECCIONAR TIPO DOCUMENTO</option>";
                                            $sqlTipoDoc = mysqli_query($conexion, "SELECT * FROM tipos_documentos_identidad");
                                            while($tdoc = mysqli_fetch_array($sqlTipoDoc)){
                                                $xcod_tipodoc = $tdoc['cod_tipodoc'];
                                                $descripcion = $tdoc['descripcion'];
                                                echo "<option value = '$xcod_tipodoc'>$descripcion</option>";
                                            }
                                        }else{
                                            $sqlTipoDoc = mysqli_query($conexion, "SELECT * FROM tipos_documentos_identidad WHERE cod_tipodoc = '$cod_tipodoc'");
                                            while($tdoc = mysqli_fetch_array($sqlTipoDoc)){
                                                $xcod_tipodoc = $tdoc['cod_tipodoc'];
                                                $descripcion = $tdoc['descripcion'];
                                                echo "<option value = '$xcod_tipodoc'>$descripcion</option>";
                                            }
                                            /********************/
                                            $sqlTipoDoc = mysqli_query($conexion, "SELECT * FROM tipos_documentos_identidad WHERE cod_tipodoc != '$cod_tipodoc'");
                                            while($tdoc = mysqli_fetch_array($sqlTipoDoc)){
                                                $xcod_tipodoc = $tdoc['cod_tipodoc'];
                                                $descripcion = $tdoc['descripcion'];
                                                echo "<option value = '$xcod_tipodoc'>$descripcion</option>";
                                            }
                                        }                                        
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">N° DOCUMENTO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="num_documento" id="num_documento" value="<?= $num_documento ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">EMAIL</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="email" id="email" value="<?= $email ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">TELÉFONO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="movil" id="movil" value="<?= $movil ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">CARGO</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="cargo" id="cargo">                                        
                                        <?php
                                        if($cargo == 0 || $cargo == ''){
                                            echo "<option value = '0'>SELECCIONAR CARGO</option>";
                                            $sqlCargos = mysqli_query($conexion, "SELECT * FROM cargos_personal WHERE estado = 'A'");
                                            while($fcargo = mysqli_fetch_array($sqlCargos)){
                                                $xcargo = $fcargo['cargo'];
                                                echo "<option value = '$xcargo'>$xcargo</option>";
                                            }
                                        }else{
                                            $sqlCargos = mysqli_query($conexion, "SELECT * FROM cargos_personal WHERE cargo = '$cargo'");
                                            while($fcargo = mysqli_fetch_array($sqlCargos)){
                                                $xcargo = $fcargo['cargo'];
                                                echo "<option value = '$xcargo'>$xcargo</option>";
                                            }
                                            /*************************/
                                            $sqlCargos = mysqli_query($conexion, "SELECT * FROM cargos_personal WHERE cargo != '$cargo'");
                                            while($fcargo = mysqli_fetch_array($sqlCargos)){
                                                $xcargo = $fcargo['cargo'];
                                                echo "<option value = '$xcargo'>$xcargo</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">ÁREA TRABAJO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="area_trabajo" id="area_trabajo" value="<?= $area_trabajo ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">FECHA INGRESO</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="date" name="fecha_ingreso" id="fecha_ingreso" value="<?= $fecha_ingreso ?>">
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
                                    <input <?php if($accesos == 'SI'){
                                                echo 'checked=\"checked\"';
                                            } ?> type="radio" name="accesos" value="SI"> SÍ
                                    <input <?php if($accesos == 'NO'){
                                                echo 'checked=\"checked\"';
                                            } ?> type="radio" name="accesos" value="NO"> NO
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
                                    <input type="hidden" name="cod_personal" id="cod_personal" value="<?= $cod_personal ?>">
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
                $("#proceso").val('ActualizarPersonal');
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
                            'Personal',
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