<?php include "header.php"; ?>

<?php 
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
$idUsuario = $_SESSION['id_usuario'];
$rol = ($_SESSION['rol_usuario'] == 1) ? "Administrador" : "Cliente";

require_once "../clases/conexion.php";
$conexion = Conexion::conectar();
$sql = "SELECT p.paterno, p.materno, p.nombre, p.fecha_nacimiento, p.telefono, p.correo 
        FROM t_usuarios u 
        INNER JOIN t_persona p ON u.id_persona = p.id_persona 
        WHERE u.id_usuario = '$idUsuario'";
$result = mysqli_query($conexion, $sql);
$datos = mysqli_fetch_array($result);

$paterno = isset($datos['paterno']) ? $datos['paterno'] : "";
$materno = isset($datos['materno']) ? $datos['materno'] : "";
$nombre = isset($datos['nombre']) ? $datos['nombre'] : "";
$telefono = isset($datos['telefono']) ? $datos['telefono'] : "";
$correo = isset($datos['correo']) ? $datos['correo'] : "";
$edad = isset($datos['fecha_nacimiento']) ? $datos['fecha_nacimiento'] : "";
?>


    <div class="container pb-3 pt-3">
        <h1 style="font-size: 2.5rem; color: #333;" class="mb-5">Bienvenido <?php echo strtolower($rol); ?></h1>
        
        <div class="row" style="font-size: 14px; color: #444;">
            <div class="col-md-4">
                <p>Apellido paterno: <?php echo $paterno; ?></p>
                <p>Telefono: <?php echo $telefono; ?></p>
            </div>
            <div class="col-md-4">
                <p>Apellido materno: <?php echo $materno; ?></p>
                <p>Correo: <?php echo $correo; ?></p>
            </div>
            <div class="col-md-4">
                <p>Nombre: <?php echo $nombre; ?></p>
                <p>Edad: <?php echo $edad; ?></p>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
