<?php include "header.php"; ?>

<h2 class="mt-4">Reportes Generales</h2>
<hr>

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive" id="tablaReportesAdmin">
            <!-- La tabla general de reportes (admin) carga acá -->
        </div>
    </div>
</div>

<?php 
    include "reportes/modalAgregarSolucion.php";
    include "footer.php"; 
?>
<script src="../public/js/reportesAdmin/reportesAdmin.js"></script>
