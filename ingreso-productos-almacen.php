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
        <!-- Sweet Alert-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <!-- Dropzone CSS-->
        <link href="assets/libs/dropzone/dropzone.min.css" id="app-style" rel="stylesheet" type="text/css">
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
                                    <select class="form-select" name="cod_puntoventa" id="cod_puntoventa">
                                        <?php
                                        $sqlPuntoVenta = mysqli_query($conexion, "SELECT * FROM puntos_venta WHERE estado = 'A' AND alias='ALM'");
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
                                <label for="example-text-input" class="col-md-2 col-form-label">SUBIR EXCEL CSV</label>
                                <div class="col-md-10">
                                    <div id="csvProductos" class="dropzone"></div>
                                </div>
                            </div>
                            <div class="mb-3 row">   
                                <label for="exampleDataList" class="col-md-2 col-form-label"></label>
                                <div class="col-md-10">
                                    <button type="button" class="btn btn-success waves-effect waves-light" id="benviar">
                                        <i class="ri-upload-2-line align-middle me-2"></i> SUBIR
                                    </button>
                                    <input type="hidden" name="proceso" id="proceso">
                                    <input type="hidden" name="modulo" id="modulo">
                                    <input type="hidden" name="archivocsv" id="archivocsv">
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
    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>
    <!-- app.js -->
    <script src="assets/js/app.js"></script>

    <!-- jquery dropzone-->
    <script src="assets/libs/dropzone/dropzone.min.js"></script>

    <script>
        $(function(){
            $("#benviar").click(function(){
                if($("#archivocsv").val() == ''){
                    Swal.fire({
                    title: 'Producto',
                    text: "Ingrese Archivo CSV",
                    icon: 'warning'
                    })
                    //alert("Ingresar nombre del local");
                    $("#archivocsv").focus();
                    return false;
                }
                /*************************************************/
                /*************************************************/
                //$("#proceso").val('ProductosAlmacen');
                //$("#modulo").val('Producto');
                $("#modulo").val('ProductosAlmacen');
                var datosEnviar = $("#fapps").serialize();
                alert(datosEnviar);
                $.ajax({
                    data: datosEnviar,
                    url: "config/proceso-guardar.php",
                    type: "POST",
                    dataType: "json",
                    beforeSend: function(){
                        $("#benviar").html("PROCESANDO...");
                    },
                    success: function(data){
                        var respuesta = data.respuesta;
                        if(respuesta == 'SI'){
                            alert("Se subió con éxito");
                            location.reload();
                        }else{
                            alert("Lo sentimos, no se completó el proceso");
                        }
                    }   
                });
            });
        });
        /**********************************************************************/
        /********************** DROPZONE SUBIR EXCEL CSV **********************/
        /**********************************************************************/
        var pdfImagenes = new Dropzone("#csvProductos", {
            url: "config/subir-archivos.php",
            method: "POST",
            paramName: "file",
            autoProcessQueue: true,
            acceptedFiles: "image/*,application/pdf,.xlsx,.csv,.mp4",
            maxFiles: 1,
            maxFilesize: 250, // MB
            uploadMultiple: true,
            parallelUploads: 100, // use it with uploadMultiple
            createImageThumbnails: true,
            thumbnailWidth: 120,
            thumbnailHeight: 120,
            addRemoveLinks: true,
            timeout: 180000,
            dictRemoveFileConfirmation: "¿Estas Seguro?", // ask before removing file
            dictFileTooBig: "El archivo es muy grande ({{filesize}}mb). El tamaño máximo permitido es {{maxFilesize}}mb",
            dictInvalidFileType: "Tipo de archivo invalido",
            dictCancelUpload: "Cancelar",
            dictRemoveFile: "Borrar",
            dictMaxFilesExceeded: "Solo {{maxFiles}} archivos están permitidos",
            dictDefaultMessage: "Arrastra Excel CSV aquí para subirlos"
        });
        pdfImagenes.on("addedfile", function(file) {
            console.log(file.name);
            var nomimg = file.name;
            document.getElementById("archivocsv").value = nomimg;
        });
        pdfImagenes.on("removedfile", function(file) {
            console.log(file.name);
        });
        // Agregue más datos para enviar junto con el archivo como datos POST. (Opcional)
        pdfImagenes.on("sending", function(file, xhr, formData) {
            formData.append("proceso", "stockAlmacen");
        });
        pdfImagenes.on("error", function(file, response) {
            console.log(response);
        });
    </script>
    </body>
</html>