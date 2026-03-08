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
        <tr>
            <td>help desk demo</td>
            <td>Laptop</td>
            <td>Dell</td>
            <td>Latitude 5400</td>
            <td>Negro</td>
            <td>16 GB</td>
            <td>512 GB SSD</td>
            <td>Core i5 8va Gen</td>
            <td>Equipo nuevo para el admin</td>
            <td>
                <button class="btn btn-sm btn-warning">
                    Reasignar
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
        $('#tablaAsignacionesDataTable').DataTable();
    });
</script>
