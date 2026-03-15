# Documentación de Casos de Uso - Sistema HelpDesk v1.0

**Proyecto:** Réplica y Personalización de Sistema de Mesa de Ayuda  
**Presentado a:** Profe. Roldán Aquino Segura  
**Desarrollado por:** helpdesk-developer (prettyvatt00)  
**Fecha:** 14 de marzo de 2026

---

## 📅 Introducción
El presente documento detalla los casos de uso implementados en el sistema HelpDesk v1.0. El objetivo del sistema es centralizar la gestión de incidencias técnicas y el control de inventario de hardware dentro de una organización, asegurando la eficiencia en la respuesta y la trazabilidad de los activos.

---

## 👥 Definición de Actores
Para este sistema se han definido dos perfiles de usuario con permisos y responsabilidades específicas:

1.  **Administrador (Soporte Técnico):** Responsable de la gestión global, mantenimiento de catálogos y resolución de incidencias.
2.  **Cliente (Usuario Final):** Empleado de la organización que reporta fallos en el equipo asignado a su cargo.

---

## 🛠️ Casos de Uso Detallados

### 1. Gestión de Administración (Soporte Técnico)

#### A. Administración de Usuarios y Personal
*   **Registrar Personal:** Dar de alta a los empleados de la institución que podrán ser beneficiarios de asignaciones de hardware.
*   **Gestión de Cuentas:** Crear credenciales de acceso para nuevos usuarios, asignando roles (Admin/Cliente).
*   **Inhabilitación de Registros:** Desactivar usuarios que ya no pertenecen a la organización sin romper el historial de tickets previos.

#### B. Control de Inventario y Activos
*   **Configuración de Hardware:** Definir tipos de dispositivos (Laptop, PC, Monitor) y sus especificaciones técnicas.
*   **Asignación de Responsivas:** Vincular un dispositivo específico a un empleado, generando un registro de responsabilidad.

#### C. Operación de Mesa de Ayuda
*   **Gestión Centralizada de Tickets:** Panel de control para visualizar todos los reportes de la organización en tiempo real.
*   **Resolución Técnica:** Herramienta para ingresar diagnósticos, soluciones aplicadas y estados de reparación.
*   **Control de Estados:** Cambio de estado de tickets (Abierto, En Proceso, Resuelto).

### 2. Operación de Clientes (Usuario Final)

#### A. Autogestión de Activos
*   **Consulta de Dispositivos:** Interface donde el usuario visualiza únicamente el equipo que tiene bajo su resguardo oficial.

#### B. Reporte de Incidencias
*   **Apertura de Tickets:** Formulario para reportar fallas técnicas asociadas directamente a uno de los dispositivos asignados.

#### C. Historial y Transparencia
*   **Seguimiento de Servicios:** Consulta del avance de sus reportes y las soluciones brindadas por el equipo técnico.
*   **Exportación de Datos:** Generación de reportes históricos en formatos Excel y PDF para fines administrativos personales.

---

## 🏗️ Reglas de Operación (Negocio)
*   **Seguridad de Acceso:** Validación de sesiones mediante SHA1 para protección de datos.
*   **Jerarquía de Tickets:** Solo los clientes inician reportes; solo los administradores los resuelven.
*   **Trazabilidad:** Inserción automática de marcas de tiempo en cada movimiento (auditoría).
*   **Integridad de Datos:** Restricción de borrado físico si el registro cuenta con dependencias activas (se usa borrado lógico).

---

## 📄 Conclusión
El sistema HelpDesk v1.0 cumple con los requisitos fundamentales para una gestión profesional de soporte, integrando seguridad, control de activos y una interface moderna bajo la arquitectura actual de la organización.
