<?php

require_once "conexion.php";

class Asignacion extends Conexion {
    
    public function agregarAsignacion($datos) {
        $conexion = Conexion::conectar();
        
        $sql = "INSERT INTO t_dispositivos (id_persona, tipo, marca, modelo, color, descripcion, memoria, disco_duro, procesador) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $conexion->prepare($sql);
        $query->bind_param("issssssss", 
                            $datos['idPersona'],
                            $datos['idTipoEquipo'],
                            $datos['marca'],
                            $datos['modelo'],
                            $datos['color'],
                            $datos['descripcion'],
                            $datos['memoria'],
                            $datos['discoDuro'],
                            $datos['procesador']);
        
        $respuesta = $query->execute();
        $query->close();
        
        return $respuesta ? 1 : 0;
    }

    public function eliminarAsignacion($idDispositivo) {
        $conexion = Conexion::conectar();
        
        $sql = "DELETE FROM t_dispositivos WHERE id_dispositivo = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("i", $idDispositivo);
        
        $respuesta = $query->execute();
        $query->close();
        
        return $respuesta ? 1 : 0;
    }
}

?>
