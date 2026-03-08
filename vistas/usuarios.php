<?php include "header.php"; ?>

<h2 class="mt-4">Usuarios</h2>
<p class="text-muted">Gestión general de roles y permisos.</p>
<hr>

<div class="row">
    <div class="col-sm-12">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuarios">
            Agregar usuario
        </button>
        <hr>
        <div id="tablaUsuarios"></div>
    </div>
</div>

<?php 
    include "usuarios/modalAgregar.php";
    include "footer.php"; 
?>
<script src="../public/js/usuarios/usuarios.js"></script>
