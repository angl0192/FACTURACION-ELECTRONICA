<?php

$conexion = mysqli_connect('localhost', 'ejstorec_angl01_92', 'Lahll920121*-):D', 'ejstorec_facuracion-electronica');
if(mysqli_connect_errno()){
    echo "Falló la conexión MySQL" . mysqli_connect_error();
}
mysqli_set_charset($conexion, "utf8");
