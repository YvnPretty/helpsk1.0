<?php
require_once "conexion.php";

class Reportes extends Conexion {
    public function obtenerSolucion($idReporte) {
        $conexion = Conexion::conectar();
        
        $sql = "SELECT solucion, estado FROM t_tickets WHERE id_ticket = '$idReporte'";
        $respuesta = mysqli_query($conexion, $sql);
        $reporte = mysqli_fetch_array($respuesta);

        $datos = array(
            "idReporte" => $idReporte,
            "solucion" => $reporte['solucion'],
            "estado" => $reporte['estado']
        );

        return $datos;
    }

    public function actualizarSolucion($datos) {
        $conexion = Conexion::conectar();
        
        $sql = "UPDATE t_tickets 
                SET solucion = ?, 
                    estado = ? 
                WHERE id_ticket = ?";
                
        $query = $conexion->prepare($sql);
        $query->bind_param('ssi', $datos['solucion'], $datos['estado'], $datos['idReporte']);
        $respuesta = $query->execute();
        $query->close();
        
        return $respuesta;
    }
}
?>
