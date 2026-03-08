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
            <th class="none">Solucion</th>
            <th class="none">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>help desk demo</td>
            <td>Laptop</td>
            <td>2021-08-13 14:17:22</td>
            <td>Mi laptop se calienta mucho y se apaga despues</td>
            <td><span class="badge badge-success">Abierto</span></td>
            <td><span class="bg-primary text-white px-2 py-1 rounded d-inline-block">Vamos a cambiar pasta termica y limpiar el equipo</span></td>
            <td>
                <button class="btn btn-primary btn-sm">
                    Eliminar
                </button>
            </td>
        </tr>
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
