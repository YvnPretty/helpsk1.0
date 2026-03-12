<?php
    require_once "../../clases/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();

    $sql = "SELECT 
                reporte.id_ticket as idReporte,
                persona.nombre as nombrePersona,
                persona.paterno as paternoPersona,
                persona.materno as maternoPersona,
                reporte.id_dispositivo as idDispositivo,
                dispositivo.tipo as nombreDispositivo,
                reporte.fecha_creacion as fechaReporte,
                reporte.descripcion_problema as problema,
                reporte.estado as estatus,
                reporte.solucion as solucion
            FROM
                t_tickets AS reporte
                    INNER JOIN
                t_persona AS persona ON reporte.id_persona = persona.id_persona
                    INNER JOIN
                t_dispositivos AS dispositivo ON reporte.id_dispositivo = dispositivo.id_dispositivo
            ORDER BY reporte.fecha_creacion DESC";
    $result = mysqli_query($conexion, $sql);
?>

<table class="table table-sm table-bordered dt-responsive nowrap" id="tablaReportesAdminDataTable" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Persona</th>
            <th>Dispositivo</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Estatus</th>
            <th>Solucion</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php while($mostrar = mysqli_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $mostrar['idReporte']; ?></td>
            <td><?php echo $mostrar['nombrePersona'] . " " . $mostrar['paternoPersona'] . " " . $mostrar['maternoPersona']; ?></td>
            <td><?php echo $mostrar['nombreDispositivo']; ?></td>
            <td><?php echo $mostrar['fechaReporte']; ?></td>
            <td><?php echo $mostrar['problema']; ?></td>
            <td>
                <?php if ($mostrar['estatus'] == 'abierto') { ?>
                    <span class="badge badge-warning">Abierto</span>
                <?php } else { ?>
                    <span class="badge badge-success">Cerrado</span>
                <?php } ?>
            </td>
            <td>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalAgregarSolucion" 
                    onclick="obtenerDatosSolucion('<?php echo $mostrar['idReporte']; ?>')">
                    <i class="fas fa-edit"></i> Solucion
                </button>
                <?php echo $mostrar['solucion']; ?>
            </td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="eliminarReporteAdmin('<?php echo $mostrar['idReporte']; ?>')">
                    <i class="fas fa-trash-alt"></i> Eliminar
                </button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tablaReportesAdminDataTable').DataTable({
            responsive: true,
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            pageLength: 10,
            dom: '<"row"<"col-sm-12 col-md-8"B><"col-sm-12 col-md-4"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            buttons: [
                {
                    extend: 'copyHtml5',
                    text: '<i class="fas fa-copy"></i> Copiar',
                    className: 'btn btn-outline-info'
                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="fas fa-file-csv"></i> CSV',
                    className: 'btn btn-primary'
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    className: 'btn btn-outline-success'
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    className: 'btn btn-outline-danger'
                }
            ]
        });
    });
</script>
