<?php

require("conexion.php");
require("inicializar-datos.php");

$modulo = $_POST['modulo'];
/************************************************************/
/***************** BORRAR PUNTOS DE VENTA *******************/
if($modulo == 'PuntoVenta'){
    $cod_puntoventa = $_POST['cod_puntoventa'];
    $sqlEliminar = mysqli_query($conexion, "DELETE FROM puntos_venta WHERE cod_puntoventa = '$cod_puntoventa'");
    $resultado = "SI";
    $salidaJson = array("resultado" => $resultado);
    echo json_encode($salidaJson);
}
/************************************************************/
/********************* BORRAR PERSONAL **********************/
if($modulo == 'Personal'){
    $cod_personal = $_POST['cod_personal'];
    $sqlEliminar = mysqli_query($conexion, "DELETE FROM personal WHERE cod_personal = '$cod_personal'");
    $resultado = "SI";
    $salidaJson = array("resultado" => $resultado);
    echo json_encode($salidaJson);
}
/************************************************************/
/********************* BORRAR CATEGORÍA **********************/
if($modulo == 'Categoria'){
    $cod_categoria = $_POST['cod_categoria'];
    $sqlEliminar = mysqli_query($conexion, "DELETE FROM categoria_productos WHERE cod_categoria = '$cod_categoria'");
    $resultado = "SI";
    $salidaJson = array("resultado" => $resultado);
    echo json_encode($salidaJson);
}
/************************************************************/
/********************** BORRAR MARCA ************************/
if($modulo == 'Marca'){
    $cod_marca = $_POST['cod_marca'];
    $sqlEliminar = mysqli_query($conexion, "DELETE FROM marcas WHERE cod_marca = '$cod_marca'");
    $resultado = "SI";
    $salidaJson = array("resultado" => $resultado);
    echo json_encode($salidaJson);
}
/************************************************************/
/******************** BORRAR PRODUCTOS **********************/
if($modulo == 'Productos'){
    $cod_producto = $_POST['cod_producto'];
    $sqlEliminar = mysqli_query($conexion, "DELETE FROM productos WHERE cod_producto = '$cod_producto'");
    $resultado = "SI";
    $salidaJson = array("resultado" => $resultado);
    echo json_encode($salidaJson);
}