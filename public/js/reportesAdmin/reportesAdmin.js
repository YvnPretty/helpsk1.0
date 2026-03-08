$(document).ready(function () {
    $('#tablaReportesAdmin').load('reportes/tablaReportesAdmin.php');
});

function obtenerDatosSolucion(idReporte) {
    $('#idReporte').val(idReporte);
}

function agregarSolucion() {
    // Alerta de mentira hasta que hagamos el backend
    alert("¡Solución redactada con éxito! (Backend en desarrollo...)");
    $('#modalAgregarSolucion').modal('hide');
    $('#frmAgregarSolucion')[0].reset();
    return false;
}

function eliminarReporteAdmin(idReporte) {
    alert("¡Borrando reporte! (Backend en desarrollo...)");
}
