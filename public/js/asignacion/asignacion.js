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
