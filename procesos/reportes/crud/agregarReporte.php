<?php
session_start();
$datos = array(
    "idDispositivo" => $_POST['idDispositivo'],
    "descripcionProblema" => $_POST['descripcionProblema'],
    "idUsuario" => $_SESSION['id_usuario']
);

require_once "../../../clases/reportes.php";
$Reportes = new Reportes();

echo $Reportes->agregarReporte($datos);
?>
