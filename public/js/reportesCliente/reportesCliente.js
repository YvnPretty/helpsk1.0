function agregarNuevoReporte() {
    $.ajax({
        type: "POST",
        data: $('#frmNuevoReporte').serialize(),
        url: "../procesos/reportes/crud/agregarReporte.php",
        success: function (respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#frmNuevoReporte')[0].reset();
                $('#modalCrearReporte').modal('hide');
                $('#tablaReportesClienteLoad').load('reportesCliente/tablaReportesCliente.php');
                Swal.fire(":D", "Agregado con éxito!", "success");
            } else {
                Swal.fire(":(", "Fallo al agregar!", "error");
            }
        }
    });

    return false;
}

$(document).ready(function () {
    $('#tablaReportesClienteLoad').load('reportesCliente/tablaReportesCliente.php');
});

function eliminarReporteCliente(idReporte) {
    Swal.fire({
        title: '¿Estás seguro de eliminar este registro?',
        text: "¡Una vez borrado no se puede recuperar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, borrar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: "idReporte=" + idReporte,
                url: "../procesos/reportes/crud/eliminarReporteCliente.php",
                success: function (respuesta) {
                    if (respuesta.trim() == 1) {
                        $('#tablaReportesClienteLoad').load('reportesCliente/tablaReportesCliente.php');
                        Swal.fire(":D", "Borrado con éxito!", "success");
                    } else {
                        Swal.fire(":(", "Fallo al borrar!", "error");
                    }
                }
            });
        }
    });
}
