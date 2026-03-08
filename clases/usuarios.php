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

    public function agregarNuevoUsuario($datos) {
        $conexion = Conexion::conectar();
        
        // Iniciamos transacción porque necesitamos insertar en 2 tablas relacionadas
        mysqli_begin_transaction($conexion);

        try {
            $sqlPersona = "INSERT INTO t_persona (paterno, materno, nombre, fecha_nacimiento, sexo, telefono, correo) 
                           VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            $queryPersona = $conexion->prepare($sqlPersona);
            $queryPersona->bind_param("sssssss", 
                                        $datos['paterno'],
                                        $datos['materno'],
                                        $datos['nombre'],
                                        $datos['fechaNacimiento'],
                                        $datos['sexo'],
                                        $datos['telefono'],
                                        $datos['correo']);
            $queryPersona->execute();
            
            // Obtenemos el ID de la persona que acabamos de insertar
            $idPersona = mysqli_insert_id($conexion);
            
            $sqlUsuario = "INSERT INTO t_usuarios (id_rol, id_persona, usuario, password, ubicacion) 
                           VALUES (?, ?, ?, ?, ?)";
            
            $queryUsuario = $conexion->prepare($sqlUsuario);
            $queryUsuario->bind_param("iisss", 
                                        $datos['idRol'],
                                        $idPersona,
                                        $datos['usuario'],
                                        $datos['password'],
                                        $datos['ubicacion']);
            $queryUsuario->execute();

            $queryPersona->close();
            $queryUsuario->close();

            // Si todo salió bien, confirmamos los cambios
            mysqli_commit($conexion);
            return 1;
        } catch (Exception $e) {
            // Si hubo algún error (ej. usuario duplicado), revertimos todo
            mysqli_rollback($conexion);
            return 0;
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