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
