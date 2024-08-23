<?php
header('Access-Control-Allow-Origin: *');
require_once 'accesoBD.php';

$objectResponse = new stdClass();
date_default_timezone_set("UTC");

if (isset($_POST['valor']) && isset($_POST['tipo'])) {
    $valor = mysqli_real_escape_string(conexion::conectar(), $_POST['valor']);
    $tipo = mysqli_real_escape_string(conexion::conectar(), $_POST['tipo']);
  
    $objectResponse = accesoBD::subirDatos($valor, $tipo);
    echo (json_encode($objectResponse));
  }else{
    $objectResponse->code = '500';
    echo (json_encode($objectResponse));
  }

?>
