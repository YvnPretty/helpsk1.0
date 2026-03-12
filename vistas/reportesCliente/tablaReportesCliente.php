<table class="table table-sm table-bordered dt-responsive nowrap" id="tablaReportesClienteDataTable" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Persona</th>
            <th>Dispositivo</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Estatus</th>
            <!-- Las columnas de abajo las podemos ocultar u organizar para que DataTables las mande debajo al expandir -->
            <th>Solucion</th>
            <th class="none">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        session_start();
        require_once "../../clases/conexion.php";
        $conexion = Conexion::conectar();
        $idUsuario = $_SESSION['id_usuario'];
        $sql = "SELECT 
                    t.id_ticket,
                    CONCAT(p.nombre, ' ', p.paterno, ' ', p.materno) AS persona,
                    CONCAT(d.tipo, ' ', d.marca) AS dispositivo,
                    t.fecha_creacion,
                    t.descripcion_problema,
                    t.estado,
                    t.solucion
                FROM t_tickets t
                INNER JOIN t_dispositivos d ON t.id_dispositivo = d.id_dispositivo
                INNER JOIN t_persona p ON t.id_persona = p.id_persona
                WHERE t.id_persona = (SELECT id_persona FROM t_usuarios WHERE id_usuario = '$idUsuario')";
        $result = mysqli_query($conexion, $sql);
        $contador = 1;
        while($mostrar = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $contador++; ?></td>
            <td><?php echo $mostrar['persona']; ?></td>
            <td><?php echo $mostrar['dispositivo']; ?></td>
            <td><?php echo $mostrar['fecha_creacion']; ?></td>
            <td><?php echo $mostrar['descripcion_problema']; ?></td>
            <td>
                <?php 
                if($mostrar['estado'] == 'abierto') {
                    echo '<span class="badge badge-info">Abierto</span>';
                } else {
                    echo '<span class="badge badge-success">Cerrado</span>';
                }
                ?>
            </td>
            <td><?php echo $mostrar['solucion']; ?></td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="eliminarReporteCliente(<?php echo $mostrar['id_ticket']; ?>)">
                    <span class="fas fa-trash-alt"></span> Eliminar
                </button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tablaReportesClienteDataTable').DataTable({
            responsive: true,
            lengthMenu: [10, 25, 50, 100],
            pageLength: 10
        });
    });
</script>
