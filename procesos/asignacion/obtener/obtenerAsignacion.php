<?php
    require_once "../../../clases/asignacion.php";

    $Asignacion = new Asignacion();
    $idDispositivo = $_POST['idDispositivo'];

    $datos = $Asignacion->obtenerAsignacion($idDispositivo);

    echo json_encode($datos);
?>

