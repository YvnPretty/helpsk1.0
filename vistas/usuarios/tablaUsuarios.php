<table class="table table-sm table-bordered dt-responsive nowrap" id="tablaUsuariosDataTable" style="width:100%">
    <thead>
        <tr>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Usuario</th>
            <th>Ubicacion</th>
            <th>Reset Password</th>
            <th>Activar</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>help</td>
            <td>desk</td>
            <td>demo</td>
            <td>2021-08-09</td> <!-- Esta sería la edad, pero en la captura muestra fecha directa por ahora -->
            <td>M</td>
            <td>56895623</td>
            <td>helpdesk@gmail.com</td>
            <td>admin</td>
            <td>Modulo 1</td>
            <td>
                <button class="btn btn-sm btn-success">
                    Cambiar password
                </button>
            </td>
            <td>
                <button class="btn btn-sm btn-info">
                    Activo
                </button>
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
        <tr>
            <td>help</td>
            <td>desk</td>
            <td>demo</td>
            <td>2021-08-09</td>
            <td>M</td>
            <td>56895623</td>
            <td>helpdesk@gmail.com</td>
            <td>cliente</td>
            <td>Modulo 1</td>
            <td>
                <button class="btn btn-sm btn-success">
                    Cambiar password
                </button>
            </td>
            <td>
                <button class="btn btn-sm btn-info">
                    Activo
                </button>
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
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tablaUsuariosDataTable').DataTable();
    });
</script>
