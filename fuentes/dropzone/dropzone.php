<link rel="stylesheet" href="dropzone.min.css">
<form id="dropzone-form" action="resultado.php" method="POST" enctype="multipart/form-data">
    <div class="uk-margin">
        <input class="uk-input" type="text" name="name" palceholder="Name" />
    </div>
    <div class="uk-margin">
        <input class="uk-input" type="email" name="email" palceholder="Email Address" />
    </div>
    <div id="imgProductos" class="dropzone"></div>
    <div id="pdfProductos" class="dropzone"></div>
    <div class="uk-margin-top">
        <input id="submit-dropzone" class="uk-button uk-button-primary" type="submit" name="submitDropzone" value="Submit" />
    </div>
    <input type="hidden" name="imagenes" id="imagenes">
    <input type="hidden" name="manuales" id="manuales">
</form>
<script src="dropzone.min.js"></script>
<script>
    Dropzone.autoDiscover = false;
    var misImagenes = new Dropzone("#imgProductos", {
        url: "upload.php",
        method: "POST",
        paramName: "file",
        autoProcessQueue: true,
        acceptedFiles: "image/*",
        maxFiles: 12,
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
        dictDefaultMessage: "Arrastra las imagenes aquí para subirlos"
    });

    misImagenes.on("addedfile", function(file) {
        console.log(file.name);
        var nomimg = file.name
        var valactual = document.getElementById("imagenes").value;
        document.getElementById("imagenes").value = valactual + nomimg + ',';
    });

    misImagenes.on("removedfile", function(file) {
        console.log(file.name);
        var borrar = file.name + ',';
        var valactual = document.getElementById("imagenes").value;
        var nuevoval = valactual.replace(borrar, '');
        document.getElementById("imagenes").value = nuevoval;
    });
    // Agregue más datos para enviar junto con el archivo como datos POST. (Opcional)
    misImagenes.on("sending", function(file, xhr, formData) {
        formData.append("proceso", "imgproductos");
    });
    misImagenes.on("error", function(file, response) {
        console.log(response);
    });
    /**********************************************************************/
    /********************* RUTINA CARGAR IMAGENES *************************/
    /**********************************************************************/
    var images = [
        <?php
        $conexion = mysqli_connect('localhost', 'user_database', 'password', 'database');
        if (mysqli_connect_errno()) {
            echo "Fallo la conexion MySQL " . mysqli_connect_error();
        }
        mysqli_set_charset($conexion, "utf8");
        $sqlImgMp4Pdf       = mysqli_query($conexion, "SELECT * FROM files");
        while ($fimgs        = mysqli_fetch_array($sqlImgMp4Pdf)) {
            $imagen         = $fimgs['file_name'];
            $obj["name"]    = $imagen;
            $obj["size"]    = filesize("ejemplo/" . $imagen);
            echo "
            {
                name: '" . $obj["name"] . "',
                url: 'ejemplo/" . $obj["name"] . "',
                size: '" . $obj["size"] . "'
            },";
        }
        ?>
    ]
    for (let i = 0; i < images.length; i++) {
        let img = images[i];
        var mockFile = {
            name: img.name,
            size: img.size,
            url: img.url
        };
        misImagenes.emit("addedfile", mockFile);
        misImagenes.emit("thumbnail", mockFile, img.url);
        misImagenes.emit("complete", mockFile);
        var existingFileCount = 1;
        misImagenes.options.maxFiles = misImagenes.options.maxFiles - existingFileCount;
        misImagenes.options.createImageThumbnails = true;
    }
    /**********************************************************************/
    /************ RUTINA PARA SUBIR OTRO TIPO DE ARCHIVOS *****************/
    /**********************************************************************/
    var pdfImagenes = new Dropzone("#pdfProductos", {
        url: "upload.php",
        method: "POST",
        paramName: "file",
        autoProcessQueue: true,
        acceptedFiles: "image/*,application/pdf,application/xlsx,application/csv,.mp4",
        maxFiles: 12,
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
        dictDefaultMessage: "Arrastra los PDFs aquí para subirlos"
    });
    pdfImagenes.on("addedfile", function(file) {
        console.log(file.name);
        var nomimg = file.name
        var valactual = document.getElementById("manuales").value;
        document.getElementById("manuales").value = valactual + nomimg + ',';
    });
    pdfImagenes.on("removedfile", function(file) {
        console.log(file.name);
    });
    // Agregue más datos para enviar junto con el archivo como datos POST. (Opcional)
    pdfImagenes.on("sending", function(file, xhr, formData) {
        formData.append("proceso", "pdfproductos");
    });
    pdfImagenes.on("error", function(file, response) {
        console.log(response);
    });
</script>