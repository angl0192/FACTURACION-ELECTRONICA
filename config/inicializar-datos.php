<?php
session_start();
$xCodPer = $_SESSION['xCodPer'];
$xNombre1 = $_SESSION['xNombre1'];
$xNombre2 = $_SESSION['xNombre2'];
$xApellido1 = $_SESSION['xApellido1'];
$xApellido2 = $_SESSION['xApellido2'];
$xEmail = $_SESSION['xEmail'];
$xTienda = $_SESSION['xTienda'];
$xCargo = $_SESSION['xCargo'];
$xImagen = $_SESSION['xImagen'];
/*****************************************/
/*****************************************/
if($xCodPer == '' or $xCodPer == 0){
    header("location: seguridad.php");
}
/*****************************************/
/*****************************************/