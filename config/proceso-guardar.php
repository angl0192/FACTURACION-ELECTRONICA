<?php

require("conexion.php");
require("inicializar-datos.php");

date_default_timezone_set('America/Lima');

$modulo = $_POST['modulo'];
/*************************************************************/
/************************** MI PERFIL ************************/
if($modulo == 'Perfil'){
    $cod_personal = $_POST['cod_personal'];
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $cod_tipodoc = $_POST['cod_tipodoc'];
    $num_documento = $_POST['num_documento'];
    $email = $_POST['email'];
    $movil = $_POST['movil'];
    $proceso = $_POST['proceso'];
    if($proceso == 'ActualizarPerfil'){
        $sqlActualizar = mysqli_query($conexion, "UPDATE personal SET
        cod_personal = '$cod_personal',
        nombre1 = '$nombre1',
        nombre2 = '$nombre2',
        apellido1 = '$apellido1',
        apellido2 = '$apellido2',
        cod_tipodoc = '$cod_tipodoc',
        num_documento = '$num_documento',
        email = '$email',
        movil = '$movil' WHERE cod_personal = '$cod_personal'");
        $respuesta = 'SI';
    }
    /*************************************************************/
    /************** CONFIGURAR JSON DE RESPUESTA *****************/
    $salidaJson = array("respuesta" => $respuesta);
    echo json_encode($salidaJson);
}

/*************************************************************/
/******************** CAMBIAR CONTRASEÑA**********************/
if($modulo == 'Clave'){
    $cod_personal = $_POST['cod_personal'];
    $clave_actual = sha1($_POST['clave_actual']);
    $clave = sha1($_POST['clave']);
    $proceso = $_POST['proceso'];
    if($proceso == 'ActualizarClave'){
        $sqlVerificar = mysqli_query($conexion, "SELECT cod_personal FROM personal WHERE clave = '$clave_actual' AND cod_personal = '$cod_personal'");
        $numres = mysqli_num_rows($sqlVerificar);
        if($numres > 0){
            $sqlActualizar = mysqli_query($conexion, "UPDATE personal SET
            clave = '$clave' WHERE cod_personal = '$cod_personal'");
            $respuesta = 'SI';
        }else{
            $respuesta = 'NO';
        }
        
    }
    $salidaJson = array("respuesta" => $respuesta);
    echo json_encode($salidaJson);
}

/*************************************************************/
/******************** ACTUALIZAR EMPRESA *********************/
if($modulo == 'Empresa'){
    $id_empresa = $_POST['id_empresa'];
    $ruc = $_POST['ruc'];
    $razon_social = $_POST['razon_social'];
    $nombre_comercial = $_POST['nombre_comercial'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $movil = $_POST['movil'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];
    $usuario_sol = $_POST['usuario_sol'];
    $clave_sol = $_POST['clave_sol'];
    $certificado = $_POST['certificado'];
    $clave_certificado = $_POST['clave_certificado'];
    $clave_borrar = $_POST['clave_borrar'];
    $proceso = $_POST['proceso'];

    if($proceso == 'ActualizarEmpresa'){
      $sqlActualizar = mysqli_query($conexion, "UPDATE empresa SET
      id_empresa = '$id_empresa',
      ruc = '$ruc',
      razon_social = '$razon_social',
      nombre_comercial = '$nombre_comercial',
      direccion = '$direccion',
      telefono = '$telefono',
      movil = '$movil',
      email = '$email',
      tipo = '$tipo',
      usuario_sol = '$usuario_sol',
      clave_sol = '$clave_sol',
      certificado = '$certificado',
      clave_certificado = '$clave_certificado',
      clave_borrar = '$clave_borrar'WHERE id_empresa = '$id_empresa'");
      $respuesta = 'SI';
    }
    $salidaJson = array("respuesta" => $respuesta);
    echo json_encode($salidaJson);
}

/*************************************************************/
/********************** PUNTOS DE VENTA **********************/
if($modulo == 'PuntoVenta'){
    $cod_puntoventa = $_POST['cod_puntoventa'];
    $fecha_creacion = date('Y-m-d H:i:s');
    $nombre_sucursal = $_POST['nombre_sucursal'];
    $alias = $_POST['alias'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    $proceso = $_POST['proceso'];
    if($proceso == 'RegistrarPuntoVenta'){
        $sqlVerificar = mysqli_query($conexion, "SELECT cod_puntoventa FROM puntos_venta WHERE nombre_sucursal = '$nombre_sucursal'");
        $numres = mysqli_num_rows($sqlVerificar);
        if($numres == 0){
            $sqlInsertar = mysqli_query($conexion, "INSERT INTO puntos_venta (
            fecha_creacion,
            nombre_sucursal,
            alias,
            direccion,
            telefono,
            email,
            estado
            ) VALUES (
            '$fecha_creacion',
            '$nombre_sucursal',
            '$alias',
            '$direccion',
            '$telefono',
            '$email',
            '$estado')");
            $respuesta = 'SI';
        }else{
            $respuesta = 'NO';
        }
    }
    if($proceso == 'ActualizarPuntoVenta'){
        $sqlActualizar = mysqli_query($conexion, "UPDATE puntos_venta SET
        cod_puntoventa = '$cod_puntoventa',
        nombre_sucursal = '$nombre_sucursal',
        alias = '$alias',
        direccion = '$direccion',
        telefono = '$telefono',
        email = '$email',
        estado = '$estado' WHERE cod_puntoventa = '$cod_puntoventa'");
        $respuesta = 'SI';
    }
    /*************************************************************/
    /************** CONFIGURAR JSON DE RESPUESTA *****************/
    $salidaJson = array("respuesta" => $respuesta);
    echo json_encode($salidaJson);
}
/*************************************************************/
/************************ PERSONAL ***************************/
if($modulo == 'Personal'){
    $cod_personal = $_POST['cod_personal'];
    $fecha_creacion = date('Y-m-d H:i:s');
    $fecha_actualizacion = date('Y-m-d H:i:s');
    $cod_puntoventa = $_POST['cod_puntoventa'];
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $cod_tipodoc = $_POST['cod_tipodoc'];
    $num_documento = $_POST['num_documento'];
    $email = $_POST['email'];
    $movil = $_POST['movil'];
    $cargo = $_POST['cargo'];
    $area_trabajo = $_POST['area_trabajo'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $usuario = sha1($_POST['usuario']);
    $clave = sha1($_POST['clave']);
    $accesos = $_POST['accesos'];
    $estado = $_POST['estado'];
    $proceso = $_POST['proceso'];
    if($proceso == 'RegistrarPersonal'){
        $sqlVerificar = mysqli_query($conexion, "SELECT cod_personal FROM personal WHERE num_documento = '$num_documento'");
        $numres = mysqli_num_rows($sqlVerificar);
        if($numres == 0){
            $sqlInsertar = mysqli_query($conexion, "INSERT INTO personal (
            fecha_creacion,
            fecha_actualizacion,
            cod_puntoventa,
            nombre1,
            nombre2,
            apellido1,
            apellido2,
            cod_tipodoc,
            num_documento,
            email,
            movil,
            cargo,
            area_trabajo,
            fecha_ingreso,
            usuario,
            clave,
            accesos,
            estado
            ) VALUES (
            '$fecha_creacion',
            '$fecha_actualizacion',
            '$cod_puntoventa',
            '$nombre1',
            '$nombre2',
            '$apellido1',
            '$apellido2',
            '$cod_tipodoc',
            '$num_documento',
            '$email',
            '$movil',
            '$cargo',
            '$area_trabajo',
            '$fecha_ingreso',
            '$usuario',
            '$clave',
            '$accesos',
            '$estado')");
            $respuesta = 'SI';
        }else{
            $respuesta = 'NO';
        }
    }
    if($proceso == 'ActualizarPersonal'){
        $sqlActualizar = mysqli_query($conexion, "UPDATE personal SET
        cod_personal = '$cod_personal',
        fecha_actualizacion = '$fecha_actualizacion',
        cod_puntoventa = '$cod_puntoventa',
        nombre1 = '$nombre1',
        nombre2 = '$nombre2',
        apellido1 = '$apellido1',
        apellido2 = '$apellido2',
        cod_tipodoc = '$cod_tipodoc',
        num_documento = '$num_documento',
        email = '$email',
        movil = '$movil',
        cargo = '$cargo',
        area_trabajo = '$area_trabajo',
        fecha_ingreso = '$fecha_ingreso',
        accesos = '$accesos',
        estado = '$estado' WHERE cod_personal = '$cod_personal'");
        $respuesta = 'SI';
    }
    /*************************************************************/
    /************** CONFIGURAR JSON DE RESPUESTA *****************/
    $salidaJson = array("respuesta" => $respuesta);
    echo json_encode($salidaJson);
}
/*************************************************************/
/************************ CATEGORÍA ***************************/
if($modulo == 'Categoria'){
    $cod_categoria = $_POST['cod_categoria'];
    $categoria = $_POST['categoria'];
    $estado = $_POST['estado'];
    $proceso = $_POST['proceso'];
    if($proceso == 'RegistrarCategoria'){
        $sqlVerificar = mysqli_query($conexion, "SELECT cod_categoria FROM categoria_productos WHERE categoria = '$categoria'");
        $numres = mysqli_num_rows($sqlVerificar);
        if($numres == 0){
            $sqlInsertar = mysqli_query($conexion, "INSERT INTO categoria_productos (
            categoria,
            estado
            ) VALUES (
            '$categoria',
            '$estado')");
            $respuesta = 'SI';
        }else{
            $respuesta = 'NO';
        }
    }
    if($proceso == 'ActualizarCategoria'){
        $sqlActualizar = mysqli_query($conexion, "UPDATE categoria_productos SET
        cod_categoria = '$cod_categoria',
        categoria = '$categoria',
        estado = '$estado' WHERE cod_categoria = '$cod_categoria'");
        $respuesta = 'SI';
    }
    /*************************************************************/
    /************** CONFIGURAR JSON DE RESPUESTA *****************/
    $salidaJson = array("respuesta" => $respuesta);
    echo json_encode($salidaJson);
}
/*************************************************************/
/************************** MARCA ****************************/
if($modulo == 'Marca'){
    $cod_marca = $_POST['cod_marca'];
    $marca = $_POST['marca'];
    $estado = $_POST['estado'];
    $proceso = $_POST['proceso'];
    if($proceso == 'RegistrarMarca'){
        $sqlVerificar = mysqli_query($conexion, "SELECT cod_marca FROM marcas WHERE marca = '$marca'");
        $numres = mysqli_num_rows($sqlVerificar);
        if($numres == 0){
            $sqlInsertar = mysqli_query($conexion, "INSERT INTO marcas (
            marca,
            estado
            ) VALUES (
            '$marca',
            '$estado')");
            $respuesta = 'SI';
        }else{
            $respuesta = 'NO';
        }
    }
    if($proceso == 'ActualizarMarca'){
        $sqlActualizar = mysqli_query($conexion, "UPDATE marcas SET
        cod_marca = '$cod_marca',
        marca = '$marca',
        estado = '$estado' WHERE cod_marca = '$cod_marca'");
        $respuesta = 'SI';
    }
    /*************************************************************/
    /************** CONFIGURAR JSON DE RESPUESTA *****************/
    $salidaJson = array("respuesta" => $respuesta);
    echo json_encode($salidaJson);
}
/*************************************************************/
/************************ PRODUCTO ***************************/
if($modulo == 'Producto'){
    $cod_producto = $_POST['cod_producto'];
    $fecha_creacion = date('Y-m-d H:i:s');
    $fecha_actualizacion = date('Y-m-d H:i:s');
    $cod_categoria = $_POST['cod_categoria'];
    $cod_marca = $_POST['cod_marca'];
    $cod_personal = $xCodPer;
    $codigo = $_POST['codigo'];
    $nombre_producto = $_POST['nombre_producto'];
    $unidad_medida = $_POST['unidad_medida'];
    $stock_actual = $_POST['stock_actual'];
    $stock_minimo = $_POST['stock_minimo'];
    $precio_unitario = $_POST['precio_unitario'];
    $precio_cuarto = $_POST['precio_cuarto'];
    $precio_mayor = $_POST['precio_mayor'];
    $estado = $_POST['estado'];
    $proceso = $_POST['proceso'];
    if($proceso == 'RegistrarProducto'){
        $sqlVerificar = mysqli_query($conexion, "SELECT cod_producto FROM productos WHERE codigo = '$codigo'");
        $numres = mysqli_num_rows($sqlVerificar);
        if($numres == 0){
            $sqlInsertar = mysqli_query($conexion, "INSERT INTO productos (
            fecha_creacion,
            fecha_actualizacion,
            cod_categoria,
            cod_marca,
            cod_personal,
            codigo,
            nombre_producto,
            unidad_medida,
            stock_actual,
            stock_minimo,
            precio_unitario,
            precio_cuarto,
            precio_mayor,
            estado
            ) VALUES (
            '$fecha_creacion',
            '$fecha_actualizacion',
            '$cod_categoria',
            '$cod_marca',
            '$cod_personal',
            '$codigo',
            '$nombre_producto',
            '$unidad_medida',
            '$stock_actual',
            '$stock_minimo',
            '$precio_unitario',
            '$precio_cuarto',
            '$precio_mayor',
            '$estado')");
            $respuesta = 'SI';
        }else{
            $respuesta = 'NO';
        }
    }
    if($proceso == 'ActualizarProducto'){
        $sqlActualizar = mysqli_query($conexion, "UPDATE productos SET
        cod_producto = '$cod_producto',
        fecha_actualizacion = '$fecha_actualizacion',
        cod_categoria = '$cod_categoria',
        cod_marca = '$cod_marca',
        cod_personal = '$cod_personal',
        codigo = '$codigo',
        nombre_producto = '$nombre_producto',
        unidad_medida = '$unidad_medida',
        stock_actual = '$stock_actual',
        stock_minimo = '$stock_minimo',
        precio_unitario = '$precio_unitario',
        precio_cuarto = '$precio_cuarto',
        precio_mayor = '$precio_mayor',
        estado = '$estado' WHERE cod_producto = '$cod_producto'");
        $respuesta = 'SI';
    }
    /*************************************************************/
    /************** CONFIGURAR JSON DE RESPUESTA *****************/
    $salidaJson = array("respuesta" => $respuesta);
    echo json_encode($salidaJson);
}