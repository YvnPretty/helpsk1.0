<table class="table table-sm table-bordered dt-responsive nowrap" id="tablaUsuariosDataTable" style="width:100%">
    <thead>
        <tr>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Usuario</th>
            <th>Ubicacion</th>
            <th>Sexo</th>
            <th class="none">Reset Password</th>
            <th class="none">Activar</th>
            <th class="none">Editar</th>
            <th class="none">Eliminar</th>
    <tbody>
        <?php
        require_once "../../clases/conexion.php";
        $conexion = Conexion::conectar();
        
        $sql = "SELECT 
                    p.paterno, 
                    p.materno, 
                    p.nombre, 
                    p.fecha_nacimiento, 
                    p.telefono, 
                    p.correo, 
                    u.usuario, 
                    u.ubicacion, 
                    p.sexo,
                    u.id_usuario,
                    u.activo 
                FROM t_usuarios u 
                INNER JOIN t_persona p ON u.id_persona = p.id_persona";
        
        $result = mysqli_query($conexion, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $mostrar['paterno']; ?></td>
            <td><?php echo $mostrar['materno']; ?></td>
            <td><?php echo $mostrar['nombre']; ?></td>
            <td><?php echo $mostrar['fecha_nacimiento']; ?></td>
            <td><?php echo $mostrar['telefono']; ?></td>
            <td><?php echo $mostrar['correo']; ?></td>
            <td><?php echo $mostrar['usuario']; ?></td>
            <td><?php echo $mostrar['ubicacion']; ?></td>
            <td><?php echo $mostrar['sexo']; ?></td>
            <td>
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalResetPassword" onclick="asignarIdReset('<?php echo $mostrar['id_usuario']; ?>')">
                    <span class="fas fa-retweet"></span>
                </button>
            </td>
            <td>
                <?php if ($mostrar['activo'] == 1) { ?>
                    <button class="btn btn-sm btn-info" onclick="cambioEstatusUsuario(<?php echo $mostrar['id_usuario']; ?>, 0)">
                        <span class="fas fa-power-off"></span> On
                    </button>
                <?php } else { ?>
                    <button class="btn btn-sm btn-light" onclick="cambioEstatusUsuario(<?php echo $mostrar['id_usuario']; ?>, 1)">
                        <span class="fas fa-power-off"></span> Off
                    </button>
                <?php } ?>
            </td>
            <td>
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalActualizarUsuarios">
                    Editar
                </button>
            </td>
            <td>
                <button class="btn btn-sm btn-danger">
                    Eliminar
                </button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tablaUsuariosDataTable').DataTable();
    });
</script>
