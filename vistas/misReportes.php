<?php include "header.php"; ?>

<div class="card mt-4">
    <div class="card-body">
        <h2 class="card-title">Reportes de cliente</h2>
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalCrearReporte">
            Crear Reporte
        </button>

        <div class="table-responsive" id="tablaReportesClienteLoad">
            <!-- La tabla general de reportes (cliente) carga acá -->
        </div>
    </div>
</div>

<?php 
    include "reportesCliente/modalCrearReporte.php";
    include "footer.php"; 
?>
<script src="../public/js/reportesCliente/reportesCliente.js"></script>
