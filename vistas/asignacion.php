<?php include "header.php"; ?>

<h2 class="mt-4">Asignación de Dispositivos</h2>
<hr>

<div class="row">
    <div class="col-sm-12">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAsignarEquipo">
            Asignar equipo
        </button>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive" id="tablaAsignaciones">
            <!-- La tabla de hardware se carga aquí mediante asigacion.js -->
        </div>
    </div>
</div>

<?php 
    include "asignacion/modalAsignar.php";
    include "asignacion/modalReasignar.php";
    include "footer.php"; 
?>
<script src="../public/js/asignacion/asignacion.js"></script>
