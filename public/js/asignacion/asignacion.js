$(document).ready(function () {
    $('#tablaAsignaciones').load('asignacion/tablaAsignacion.php');
});

function asignarEquipo() {
    alert("Proceso de asignar hardware / equipo en desarrollo...");
    $('#frmAsignaEquipo')[0].reset();
    return false;
}
