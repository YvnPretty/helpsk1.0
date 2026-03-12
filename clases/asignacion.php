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

    public function editaAsignacion($datos) {
        $conexion = Conexion::conectar();
        
        $sql = "UPDATE t_dispositivos SET 
                    id_persona = ?, 
                    tipo = ?, 
                    marca = ?, 
                    modelo = ?, 
                    color = ?, 
                    descripcion = ?, 
                    memoria = ?, 
                    disco_duro = ?, 
                    procesador = ? 
                WHERE id_dispositivo = ?";
        
        $query = $conexion->prepare($sql);
        $query->bind_param("issssssssi", 
                            $datos['idPersona'],
                            $datos['idTipoEquipo'],
                            $datos['marca'],
                            $datos['modelo'],
                            $datos['color'],
                            $datos['descripcion'],
                            $datos['memoria'],
                            $datos['discoDuro'],
                            $datos['procesador'],
                            $datos['idAsignacion']);
        
        $respuesta = $query->execute();
        $query->close();
        
        return $respuesta ? 1 : 0;
    }

    public function obtenerAsignacion($idDispositivo) {
        $conexion = Conexion::conectar();

        $sql = "SELECT 
                    id_dispositivo,
                    id_persona,
                    tipo,
                    marca,
                    modelo,
                    color,
                    descripcion,
                    memoria,
                    disco_duro,
                    procesador
                FROM t_dispositivos
                WHERE id_dispositivo = ?";

        $query = $conexion->prepare($sql);
        $query->bind_param("i", $idDispositivo);
        $query->execute();
        $resultado = $query->get_result();
        $datos = $resultado->fetch_assoc();
        $query->close();

        if (!$datos) {
            return null;
        }

        return array(
            "idDispositivo" => $datos['id_dispositivo'],
            "idPersona" => $datos['id_persona'],
            "tipo" => $datos['tipo'],
            "marca" => $datos['marca'],
            "modelo" => $datos['modelo'],
            "color" => $datos['color'],
            "descripcion" => $datos['descripcion'],
            "memoria" => $datos['memoria'],
            "discoDuro" => $datos['disco_duro'],
            "procesador" => $datos['procesador']
        );
    }
}

?>
