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

    public function eliminarReporte($idReporte) {
        $conexion = Conexion::conectar();
        
        $sql = "DELETE FROM t_tickets WHERE id_ticket = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("i", $idReporte);
        $respuesta = $query->execute();
        $query->close();

        return $respuesta ? 1 : 0;
    }

    public function eliminarReporteCliente($idReporte) {
        return $this->eliminarReporte($idReporte);
    }

    public function obtenerSolucion($idReporte) {
        $conexion = Conexion::conectar();
        
        $sql = "SELECT id_ticket, solucion, estado FROM t_tickets WHERE id_ticket = '$idReporte'";
        $result = mysqli_query($conexion, $sql);
        $datos = mysqli_fetch_array($result);

        $respuesta = array(
            "idReporte" => $datos['id_ticket'],
            "solucion" => $datos['solucion'],
            "estado" => $datos['estado']
        );

        return $respuesta;
    }

    public function actualizarSolucion($datos) {
        $conexion = Conexion::conectar();
        
        $sql = "UPDATE t_tickets SET solucion = ?, estado = ? WHERE id_ticket = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("ssi", $datos['solucion'], $datos['estado'], $datos['idReporte']);
        $respuesta = $query->execute();
        $query->close();

        return $respuesta ? 1 : 0;
    }
}
?>
