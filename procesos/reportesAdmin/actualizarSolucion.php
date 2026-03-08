<?php
session_start();
require_once "../../clases/reportes.php";
$Reportes = new Reportes();

$datos = array(
    'idReporte' => $_POST['idReporte'],
    'solucion' => $_POST['solucion'],
    'estado' => $_POST['estado']
);

echo $Reportes->actualizarSolucion($datos);
?>
