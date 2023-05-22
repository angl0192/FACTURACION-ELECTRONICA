<?php

/*******************************************/
/*******************************************/
$proceso = $_POST['proceso'];
/*******************************************/
/*******************************************/
switch ($proceso) {
    case 'imgproductos':
        $dest_folder = 'ejemplo/';
        break;
    case 'pdfproductos':
        $dest_folder = 'pdf/';
        break;
}
if (!empty($_FILES)) {
    if (!file_exists($dest_folder) && !is_dir($dest_folder)) mkdir($dest_folder);
    foreach ($_FILES['file']['tmp_name'] as $key => $value) {
        $tempFile = $_FILES['file']['tmp_name'][$key];
        $targetFile =  $dest_folder . $_FILES['file']['name'][$key];
        move_uploaded_file($tempFile, $targetFile);
    }
    exit();
}
