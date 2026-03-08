$(document).ready(function () {
    $('#tablaUsuarios').load('usuarios/tablaUsuarios.php');
});

function agregarNuevoUsuario() {
    $.ajax({
        type: "POST",
        data: $('#frmAgregarUsuario').serialize(),
        url: "../procesos/usuarios/crud/agregarNuevoUsuario.php",
        success: function (respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuarios').load('usuarios/tablaUsuarios.php');
                $('#frmAgregarUsuario')[0].reset();
                $('#modalAgregarUsuarios').modal('hide');
                Swal.fire(":D", "Agregado con éxito!", "success");
            } else {
                Swal.fire(":(", "Fallo al agregar!", "error");
            }
        }
    });

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
