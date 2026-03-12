<?php include "header.php"; ?>

<div class="container-fluid mt-4 content-page">
    <div class="card mt-4">
        <div class="card-body">
            <h2 class="card-title">Gestionar reportes de usuarios</h2>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive" id="tablaReportesAdmin">
                        <!-- La tabla general de reportes (admin) carga acá -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include "reportes/modalAgregarSolucion.php";
    include "footer.php"; 
?>
<script src="../public/js/reportesAdmin/reportesAdmin.js"></script>
