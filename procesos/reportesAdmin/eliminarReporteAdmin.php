<?php
    require_once "../../clases/reportes.php";
    $Reportes = new Reportes();
    $idReporte = $_POST['idReporte'];
    echo $Reportes->eliminarReporte($idReporte);
?>
