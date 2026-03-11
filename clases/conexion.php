<?php

class Conexion {
    public static function conectar() {
        $servidor = "localhost";
        $usuario = "root"; // Reemplaza con tu usuario de MySQL
        $contrasena = "";     // Reemplaza con tu contraseña de MySQL
        $baseDeDatos = "helpdesk_db"; // Nombre de la base de datos

        $conexion = mysqli_connect($servidor, $usuario, $contrasena, $baseDeDatos);

        if (!$conexion) {
            die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }

        return $conexion;
    }
}

?>