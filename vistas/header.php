<?php 
session_start(); 
if (!isset($_SESSION['usuario'])) {
    header("location:../index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help-Desk</title>

    <!-- Dependencias CSS -->
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/sweetalert2/sweetalert2.min.css">
    
    <!-- Usamos CDN para FontAwesome y DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
    
   
    <link rel="stylesheet" href="plantilla.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center" id="nav-helpdesk">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    
                <a class="navbar-brand" href="inicio.php">
                        <img src="../public/img/logo.png" alt="Help-Desk" style="width: 80px;">
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="inicio.php">Inicio</a>
                </li>
                
                <?php if(isset($_SESSION['rol_usuario']) && $_SESSION['rol_usuario'] == 1) { ?>
                <!-- Menú del Administrador -->
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="asignacion.php">Asignacion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reportes.php">Reportes</a>
                </li>

                <?php } else if(isset($_SESSION['rol_usuario']) && $_SESSION['rol_usuario'] == 2) { ?>
                <!-- Menú del Cliente -->
                <li class="nav-item">
                    <a class="nav-link" href="misDispositivos.php">Mis dispositivos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="misReportes.php">Reportes Soporte</a>
                </li>
                <?php } ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUsuario" role="button" data-toggle="dropdown" aria-expanded="false" style="color: red;">
                        Usuario: <?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado'; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownUsuario">
                        <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">
                            <i class="fas fa-sign-out-alt"></i> Salir
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenedor principal de vistas -->
    <div class="container-fluid mt-4 content-page">
