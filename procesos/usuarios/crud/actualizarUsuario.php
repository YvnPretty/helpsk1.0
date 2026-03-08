<?php
    require_once "../../../clases/usuarios.php";

    $Usuarios = new Usuarios();

    $datos = array(
        "idUsuario" => $_POST['idUsuario'],
        "idPersona" => $_POST['idUsuario'], // Se asume idPersona es igual a idUsuario en el tutorial
        "paterno" => $_POST['paternoU'],
        "materno" => $_POST['maternoU'],
        "nombre" => $_POST['nombreU'],
        "fechaNacimiento" => $_POST['fechaNacimientoU'],
        "sexo" => $_POST['sexoU'],
        "telefono" => $_POST['telefonoU'],
        "correo" => $_POST['correoU'],
        "usuario" => $_POST['usuarioU'],
        "idRol" => $_POST['idRolU'],
        "ubicacion" => $_POST['ubicacionU']
    );

    echo $Usuarios->actualizarUsuario($datos);
?>
