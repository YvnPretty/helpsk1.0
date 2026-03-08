$(document).ready(function () {
    $('#tablaReportesAdmin').load('reportes/tablaReportesAdmin.php');
});

function obtenerDatosSolucion(idReporte) {
    $.ajax({
        type: "POST",
        data: "idReporte=" + idReporte,
        url: "../procesos/reportesAdmin/obtenerSolucion.php",
        success: function (respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#idReporte').val(respuesta['idReporte']);
            $('#solucion').val(respuesta['solucion']);
            $('#estado').val(respuesta['estado']);
        }
    });
}

function agregarSolucion() {
    $.ajax({
        type: "POST",
        data: $('#frmAgregarSolucion').serialize(),
        url: "../procesos/reportesAdmin/actualizarSolucion.php",
        success: function (respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                Swal.fire(":D", "Agregado con éxito!", "success");
                $('#tablaReportesAdmin').load('reportes/tablaReportesAdmin.php');
                $('#modalAgregarSolucion').modal('hide');
                $('#frmAgregarSolucion')[0].reset();
            } else {
                Swal.fire(":(", "Error al agregar! " + respuesta, "error");
            }
        }
    });
    return false;
}

function eliminarReporteAdmin(idReporte) {
    alert("¡Borrando reporte! (Backend en desarrollo...)");
}
