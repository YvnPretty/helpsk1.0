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

    public function actualizarUsuario($datos) {
        $conexion = Conexion::conectar();

        // Actualizamos primero los datos personales
        $sqlPersona = "UPDATE t_persona SET 
                        paterno = ?, 
                        materno = ?, 
                        nombre = ?, 
                        fecha_nacimiento = ?, 
                        sexo = ?, 
                        telefono = ?, 
                        correo = ? 
                       WHERE id_persona = ?";
        
        $queryPersona = $conexion->prepare($sqlPersona);
        $queryPersona->bind_param("ssssssss", 
                                    $datos['paterno'],
                                    $datos['materno'],
                                    $datos['nombre'],
                                    $datos['fechaNacimiento'],
                                    $datos['sexo'],
                                    $datos['telefono'],
                                    $datos['correo'],
                                    $datos['idPersona']);
        $respuestaPersona = $queryPersona->execute();

        // Actualizamos los datos del usuario (login)
        $sqlUsuario = "UPDATE t_usuarios SET 
                        id_rol = ?, 
                        usuario = ?, 
                        ubicacion = ? 
                       WHERE id_usuario = ?";
        
        $queryUsuario = $conexion->prepare($sqlUsuario);
        $queryUsuario->bind_param("issi", 
                                    $datos['idRol'],
                                    $datos['usuario'],
                                    $datos['ubicacion'],
                                    $datos['idUsuario']);
        $respuestaUsuario = $queryUsuario->execute();

        $queryPersona->close();
        $queryUsuario->close();

        if ($respuestaPersona && $respuestaUsuario) {
            return 1;
        } else {
            return 0;
        }
    }
}

?>