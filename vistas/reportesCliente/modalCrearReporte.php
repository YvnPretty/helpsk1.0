<!-- Modal para Levantar un Nuevo Reporte -->
<form id="frmNuevoReporte" method="POST" onsubmit="return agregarNuevoReporte()">
    <div class="modal fade" id="modalCrearReporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Reporte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="idDispositivo">Selecciona el Dispositivo a Reportar</label>
                        <select class="form-control" id="idDispositivo" name="idDispositivo" required>
                            <option value="">-- Selecciona un equipo --</option>
                            <?php
                            // Cargar los equipos asignados únicamente a este usuario
                            require_once "../clases/conexion.php";
                            $conexion = Conexion::conectar();
                            $idUsuarioActual = $_SESSION['id_usuario'];
                            
                            $sql = "SELECT id_dispositivo, CONCAT(tipo, ' - ', marca) AS nombre_equipo 
                                    FROM t_dispositivos 
                                    WHERE id_persona = (SELECT id_persona FROM t_usuarios WHERE id_usuario = '$idUsuarioActual')";
                            $result = mysqli_query($conexion, $sql);
                            
                            while ($mostrar = mysqli_fetch_array($result)) {
                                echo '<option value="' . $mostrar['id_dispositivo'] . '">' . $mostrar['nombre_equipo'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="descripcionProblema">Descripción Corta del Problema</label>
                        <textarea class="form-control" id="descripcionProblema" name="descripcionProblema" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear Ticket</button>
                </div>
            </div>
        </div>
    </div>
</form>
