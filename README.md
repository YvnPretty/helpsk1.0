# Sistema HelpDesk v1.0 

Bienvenido al repositorio del Sistema de Mesa de Ayuda (HelpDesk). Este proyecto está siendo desarrollado con PHP y MySQL.

// Justificación del Proyecto
Este sistema está pensado para negocios u oficinas donde los usuarios requieren soporte técnico constante para sus equipos de cómputo o dispositivos digitales. 

Actualmente, muchos de estos procesos se llevan en papel, lo que ocasiona:
Pérdida de reportes.
Olvido de tareas por parte de sistemas.
Dificultad para generar reportes de rendimiento o justifyicar el tiempo de trabajo.
Falta de seguimiento para el cliente.

// Características Principales
El sistema contará con dos tipos de perfiles principales:

Administrador (Soporte Técnico)
Inicio de sesión seguro.
**Gestión de Usuarios:** Crear, habilitar o inhabilitar (no eliminar si ya tienen historial).
**Asignación de Dispositivos:** Asignar hardware (PC, laptops, monitores, etc.) a los usuarios, detallando sus características (RAM, Disco Duro) e incluso adjuntando fotografías para auditorías.
**Gestión de Tickets:** Revisar, dar solución y cerrar los reportes levantados por los clientes.

Cliente (Usuario Final)
Inicio de sesión.
**Perfil:** Ver y actualizar su información personal de contacto y ubicación (oficina/piso).
**Mis Dispositivos:** Visualizar el equipo de cómputo que tiene a su cargo.
**Soporte Técnico:** Levantar nuevos tickets de soporte técnico seleccionando un dispositivo específico o la opción "Otros" (para pedir hardware nuevo, por ejemplo).
**Historial:** Hacer seguimiento del estado de sus tickets (Abierto/Cerrado) y exportar sus reportes en formato PDF o Excel.

// Tecnologías a utilizar
**Backend:** PHP
**Frontend:** HTML5, CSS3, Bootstrap 4, jQuery
**Base de Datos:** MySQL
