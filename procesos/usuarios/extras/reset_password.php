<?php
session_start();
$datos = array(
    "idUsuario" => $_POST['idUsuarioReset'],
    "password" => sha1($_POST['passwordReset'])
);

require_once "../../../clases/usuarios.php";
$Usuarios = new Usuarios();

echo $Usuarios->resetPassword($datos);
?>
