<?php
    require_once "../../../clases/asignacion.php";

    $Asignacion = new Asignacion();

    $datos = array(
        "idAsignacion" => $_POST['idAsignacionU'],
        "idPersona" => $_POST['idPersonaU'],
        "idTipoEquipo" => $_POST['idTipoEquipoU'],
        "marca" => $_POST['marcaU'],
        "modelo" => $_POST['modeloU'],
        "color" => $_POST['colorU'],
        "descripcion" => $_POST['descripcionU'],
        "memoria" => $_POST['memoriaU'],
        "discoDuro" => $_POST['discoDuroU'],
        "procesador" => $_POST['procesadorU']
    );

    echo $Asignacion->editaAsignacion($datos);
?>
