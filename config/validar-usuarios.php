<?php

require("conexion.php");
session_start();

if(isset($_POST['proceso'])){
    $proceso = $_POST['proceso'];
    if($proceso == 'IniciarProceso'){
        $usuario = sha1($_POST['usuario']);
        $clave = sha1($_POST['clave']);
        $sqlPersonal = mysqli_query($conexion, "SELECT * FROM personal WHERE usuario = '$usuario' AND clave = '$clave' AND estado = 'A'");
        $numPer = mysqli_num_rows($sqlPersonal);
        if($numPer > 0){
            $fpers = mysqli_fetch_array($sqlPersonal);
            $xCodPer = $fpers['cod_personal'];
            $xNombre1 = $fpers['nombre1'];
            $xNombre2 = $fpers['nombre2'];
            $xApellido1 = $fpers['apellido1'];
            $xApellido2 = $fpers['apellido2'];
            $xEmail = $fpers['email'];
            $xTienda = $fpers['cod_puntoventa'];
            $xCargo = $fpers['cargo'];
            if($fpers['imagen'] == ''){
                $xImagen = "default.png";
            }else{
                $xImagen = $fpers['imagen'];
            }
            $_SESSION['xCodPer'] = $xCodPer;
            $_SESSION['xNombre1'] = $xNombre1;
            $_SESSION['xNombre2'] = $xNombre2;
            $_SESSION['xApellido1'] = $xApellido1;
            $_SESSION['xApellido2'] = $xApellido2;
            $_SESSION['xEmail'] = $xEmail;
            $_SESSION['xTienda'] = $xTienda;
            $_SESSION['xCargo'] = $xCargo;
            $_SESSION['xImagen'] = $xImagen;
            $respuesta = "SI";
        }else{
            $respuesta = 'NO';
        }
    }    

    $salidaJson = array("respuesta" => $respuesta);
    echo json_encode($salidaJson);
}else{
    header("location:../seguridad.php");
}

