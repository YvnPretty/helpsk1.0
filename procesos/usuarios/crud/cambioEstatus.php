<?php
session_start();
$datos = array(
    "idUsuario" => $_POST['idUsuario'],
    "estatus" => $_POST['estatus']
);

require_once "../../../clases/usuarios.php";
$Usuarios = new Usuarios();

echo $Usuarios->cambioEstatusUsuario($datos);
?>
