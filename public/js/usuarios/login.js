$(document).ready(function() {
    $('#frmLogin').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            data: $('#frmLogin').serialize(),
            url: "procesos/usuarios/login/loginUsuario.php",
            success: function(respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    window.location = "vistas/inicio.php";
                } else {
                    Swal.fire("Error", "Fallo al entrar!", "error");
                }
            }
        });
    });
});
