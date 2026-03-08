<table class="table table-sm table-bordered dt-responsive nowrap" id="tablaReportesAdminDataTable" style="width:100%">
    <thead>
        <tr>
            <th>Persona</th>
            <th>Dispositivo</th>
            <th>Fecha</th>
            <th>Descripción del problema</th>
            <th>Estado</th>
            <th>Solución</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>cliente</td>
            <td>Laptop Dell</td>
            <td>2021-08-10</td>
            <td>No enciende la pantalla</td>
            <td><span class="badge badge-warning">Abierto</span></td>
            <td>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalAgregarSolucion" onclick="obtenerDatosSolucion(1)">
                    <i class="fas fa-pencil-alt"></i> Escribir
                </button>
            </td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="eliminarReporteAdmin(1)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        </tr>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tablaReportesAdminDataTable').DataTable();
    });
</script>
