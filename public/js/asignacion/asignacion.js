$(document).ready(function () {
    $('#tablaAsignaciones').load('asignacion/tablaAsignacion.php');
});

function asignarEquipo() {
    $.ajax({
        type: "POST",
        data: $('#frmAsignaEquipo').serialize(),
        url: "../procesos/asignacion/asignar/asignar.php",
        success: function (respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#frmAsignaEquipo')[0].reset();
                $('#tablaAsignaciones').load('asignacion/tablaAsignacion.php');
                $('#modalAsignarEquipo').modal('hide');
                Swal.fire(":D", "¡Asignado con éxito!", "success");
            } else {
                Swal.fire(":(", "Fallo al asignar!", "error");
            }
        }
    });

    return false;
}

function eliminarAsignacion(idDispositivo) {
    Swal.fire({
        title: '¿Estás seguro de eliminar este registro?',
        text: "¡Una vez eliminado no podrá ser recuperado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: "idDispositivo=" + idDispositivo,
                url: "../procesos/asignacion/eliminar/eliminarAsignacion.php",
                success: function (respuesta) {
                    if (respuesta == 1) {
                        $('#tablaAsignaciones').load('asignacion/tablaAsignacion.php');
                        Swal.fire('¡Eliminado!', 'El registro fue eliminado con éxito.', 'success');
                    } else {
                        Swal.fire('¡Error!', 'No se pudo eliminar el registro.', 'error');
                    }
                }
            });
        }
    });
}

function obtenerDatosAsignacion(idDispositivo) {
    $.ajax({
        type: "POST",
        data: "idDispositivo=" + idDispositivo,
        url: "../procesos/asignacion/obtener/obtenerAsignacion.php",
        success: function (respuesta) {
            respuesta = jQuery.parseJSON(respuesta);

            if (!respuesta) {
                Swal.fire(":(", "No se encontró la asignación seleccionada", "error");
                return;
            }

            $('#idAsignacionU').val(respuesta['idDispositivo']);
            $('#idPersonaU').val(respuesta['idPersona']);
            $('#idTipoEquipoU').val(respuesta['tipo']);
            $('#marcaU').val(respuesta['marca']);
            $('#modeloU').val(respuesta['modelo']);
            $('#colorU').val(respuesta['color']);
            $('#descripcionU').val(respuesta['descripcion']);
            $('#memoriaU').val(respuesta['memoria']);
            $('#discoDuroU').val(respuesta['discoDuro']);
            $('#procesadorU').val(respuesta['procesador']);
        }
    });
}

function actualizaAsignacion() {
    $.ajax({
        type: "POST",
        data: $('#frmActualizaAsignacion').serialize(),
        url: "../procesos/asignacion/actualizar/actualizarAsignacion.php",
        success: function (respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaAsignaciones').load('asignacion/tablaAsignacion.php');
                $('#modalReasignarEquipo').modal('hide');
                Swal.fire(":D", "¡Actualizado con éxito!", "success");
            } else {
                Swal.fire(":(", "Fallo al actualizar!", "error");
            }
        }
    });

    return false;
}
