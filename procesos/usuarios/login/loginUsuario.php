<?php

require_once "../../clases/usuarios.php";

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$obj = new Usuarios();
echo $obj->loginUsuario($usuario, $password);

?>