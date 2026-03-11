<?php

require_once __DIR__ . "/conexion.php";

class Reportes extends Conexion {

    public function agregarReporte($datos) {
        $conexion = Conexion::conectar();
        
        // Buscamos quién es la persona que está levantando el ticket
        $idUsuario = $datos['idUsuario'];
        $sqlPersona = "SELECT id_persona FROM t_usuarios WHERE id_usuario = '$idUsuario'";
        $resultPersona = mysqli_query($conexion, $sqlPersona);
        $idPersona = mysqli_fetch_row($resultPersona)[0];

        $sql = "INSERT INTO t_tickets (id_dispositivo, id_persona, descripcion_problema, estado) 
                VALUES (?, ?, ?, 'abierto')";
        
        $query = $conexion->prepare($sql);
        $query->bind_param("iis", $datos['idDispositivo'], $idPersona, $datos['descripcionProblema']);
        $respuesta = $query->execute();
        $query->close();

        return $respuesta ? 1 : 0;
    }
}
?>
