<?php

require_once __DIR__ . "/conexion.php";

class Usuarios extends Conexion {
    public function loginUsuario($usuario, $password) {
        $conexion = Conexion::conectar();
        $passwordExistente = sha1($password);

        $sql = "SELECT * 
                FROM t_usuarios 
                WHERE usuario = '$usuario' AND password = '$passwordExistente'";
        $result = mysqli_query($conexion, $sql);
        $datos = mysqli_fetch_array($result);

        if (mysqli_num_rows($result) > 0) {
            // Iniciar sesión y guardar datos
            session_start();
            $_SESSION['usuario'] = $datos['usuario'];
            $_SESSION['id_usuario'] = $datos['id_usuario'];
            $_SESSION['rol_usuario'] = $datos['id_rol'];

            return 1; // Login exitoso
        } else {
            return 0; // Credenciales incorrectas
        }
    }
}

?>