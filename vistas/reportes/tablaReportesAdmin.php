<table class="table table-sm table-bordered dt-responsive nowrap" id="tablaReportesAdminDataTable" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Persona</th>
            <th>Dispositivo</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Estatus</th>
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
            <td><span class="badge badge-success">Cerrado</span></td>
            <td>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalAgregarSolucion" onclick="obtenerDatosSolucion(1)">
                    Solucion
                </button>
                Vamos a cambiar pasta termica y limpiar el equipo, se entrego exitosamente al cliente.
            </td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="eliminarReporteAdmin(1)">
                    Eliminar
                </button>
            </td>
        </tr>
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
