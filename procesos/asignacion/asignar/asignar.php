<?php
    require_once "../../../clases/asignacion.php";

    $Asignacion = new Asignacion();

    $datos = array(
        "idPersona" => $_POST['idPersona'],
        "idTipoEquipo" => $_POST['idTipoEquipo'],
        "marca" => $_POST['marca'],
        "modelo" => $_POST['modelo'],
        "color" => $_POST['color'],
        "descripcion" => $_POST['descripcion'],
        "memoria" => $_POST['memoria'],
        "discoDuro" => $_POST['discoDuro'],
        "procesador" => $_POST['procesador']
    );

    echo $Asignacion->agregarAsignacion($datos);
?>
