<?php
    require_once "../../../clases/asignacion.php";

    $Asignacion = new Asignacion();
    $idDispositivo = $_POST['idDispositivo'];

    echo $Asignacion->eliminarAsignacion($idDispositivo);
?>
