<?php include "header.php"; ?>


    <h2 class="mt-4">Administrar Usuarios</h2>
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
</div>

<?php 
    include "usuarios/modalAgregar.php";
    include "usuarios/modalActualizar.php";
    include "usuarios/modal_reset_password.php";
    include "footer.php";  
?>
<script src="../public/js/usuarios/usuarios.js"></script>
