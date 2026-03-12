<?php
    require_once __DIR__ . "/../../clases/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();

    $sql = "SELECT 
                d.id_dispositivo     AS idDispositivo,
                p.nombre             AS nombrePersona,
                p.paterno            AS paternoPersona,
                p.materno            AS maternoPersona,
                d.tipo               AS tipoEquipo,
                d.marca,
                d.modelo,
                d.color,
                d.memoria,
                d.disco_duro         AS discoDuro,
                d.procesador,
                d.descripcion
            FROM t_dispositivos AS d
            INNER JOIN t_persona AS p ON d.id_persona = p.id_persona";

    $result = mysqli_query($conexion, $sql);
?>

<table class="table table-sm table-bordered dt-responsive nowrap" id="tablaAsignacionesDataTable" style="width:100%">
    <thead>
        <tr>
            <th>Persona</th>
            <th>Tipo equipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Color</th>
            <th>Memoria</th>
            <th>Disco duro</th>
            <th>Procesador</th>
            <th>Descripción</th>
            <th class="none">Reasignar</th>
            <th class="none">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($mostrar = mysqli_fetch_array($result)) { ?>
            <tr>
                <td>
                    <?php echo $mostrar['nombrePersona'] . ' ' . $mostrar['paternoPersona'] . ' ' . $mostrar['maternoPersona']; ?>
                </td>
                <td><?php echo $mostrar['tipoEquipo']; ?></td>
                <td><?php echo $mostrar['marca']; ?></td>
                <td><?php echo $mostrar['modelo']; ?></td>
                <td><?php echo $mostrar['color']; ?></td>
                <td><?php echo $mostrar['memoria']; ?></td>
                <td><?php echo $mostrar['discoDuro']; ?></td>
                <td><?php echo $mostrar['procesador']; ?></td>
                <td><?php echo $mostrar['descripcion']; ?></td>
                <td>
                    <button class="btn btn-sm btn-warning"
                            data-toggle="modal"
                            data-target="#modalReasignarEquipo"
                            onclick="obtenerDatosAsignacion('<?php echo $mostrar['idDispositivo']; ?>')">
                        Reasignar
                    </button>
                </td>
                <td>
                    <button class="btn btn-sm btn-danger"
                            onclick="eliminarAsignacion('<?php echo $mostrar['idDispositivo']; ?>')">
                        Eliminar
                    </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tablaAsignacionesDataTable').DataTable();
    });
</script>
