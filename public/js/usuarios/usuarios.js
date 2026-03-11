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

function asignarIdReset(idUsuario) {
    $('#idUsuarioReset').val(idUsuario);
}

function resetPassword() {
    $.ajax({
        type: "POST",
        data: $('#frmActualizarPassword').serialize(),
        url: "../procesos/usuarios/extras/reset_password.php",
        success: function (respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#modalResetPassword').modal('hide');
                $('#frmActualizarPassword')[0].reset();
                Swal.fire(":D", "Password actualizado con éxito", "success");
            } else {
                Swal.fire(":(", "Error al actualizar password", "error");
            }
        }
    });

    return false;
}

function cambioEstatusUsuario(idUsuario, estatus) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario + "&estatus=" + estatus,
        url: "../procesos/usuarios/crud/cambioEstatus.php",
        success: function (respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuarios').load('usuarios/tablaUsuarios.php');
                Swal.fire(":D", "Estatus cambiado con éxito!", "success");
            } else {
                Swal.fire(":(", "Fallo al cambiar estatus!", "error");
            }
        }
    });
}
