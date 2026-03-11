<?php
$idReporte = $_POST['idReporte'];

require_once "../../../clases/reportes.php";
$Reportes = new Reportes();

echo $Reportes->eliminarReporteCliente($idReporte);
?>
