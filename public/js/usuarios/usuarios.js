$(document).ready(function () {
    $('#tablaUsuarios').load('usuarios/tablaUsuarios.php');
});

function agregarNuevoUsuario() {
    alert("Esta funcionando");
    return false;
}

function actualizarUsuario() {
    $.ajax({
        type: "POST",
        data: $('#frmActualizarUsuario').serialize(),
        url: "../procesos/usuarios/crud/actualizarUsuario.php",
        success: function (respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuarios').load('usuarios/tablaUsuarios.php');
                $('#modalActualizarUsuarios').modal('hide');
                Swal.fire(":D", "Actualizado con éxito!", "success");
            } else {
                Swal.fire(":(", "Fallo al actualizar!", "error");
            }
        }
    });

    return false;
}
