DROP DATABASE IF EXISTS helpdesk_db;
CREATE DATABASE helpdesk_db;
USE helpdesk_db;-- 1. Tabla de Personas (información personal)
CREATE TABLE t_persona (
    id_persona INT AUTO_INCREMENT PRIMARY KEY,
    paterno VARCHAR(255) NOT NULL,
    materno VARCHAR(255),
    nombre VARCHAR(255) NOT NULL,
    fecha_nacimiento DATE,
    sexo VARCHAR(50),
    telefono VARCHAR(50),
    correo VARCHAR(255),
    fechaInsert DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 2. Catálogo de Roles (admin, cliente, etc)
CREATE TABLE t_cat_roles (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    fechaInsert DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 3. Tabla de Usuarios (Credenciales de login)
CREATE TABLE t_usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    id_rol INT NOT NULL,
    id_persona INT NOT NULL,
    usuario VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    ubicacion TEXT,
    activo INT DEFAULT 1,
    fecha_insert DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_usuario_rol
        FOREIGN KEY (id_rol) 
        REFERENCES t_cat_roles(id_rol)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,
    CONSTRAINT fk_usuario_persona
        FOREIGN KEY (id_persona) 
        REFERENCES t_persona(id_persona)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 4. Dispositivos (Asignados a una persona)
CREATE TABLE t_dispositivos (
    id_dispositivo INT AUTO_INCREMENT PRIMARY KEY,
    id_persona INT,
    tipo VARCHAR(255),
    marca VARCHAR(255),
    modelo VARCHAR(255),
    color VARCHAR(255),
    descripcion TEXT,
    memoria VARCHAR(255),
    disco_duro VARCHAR(255),
    procesador VARCHAR(255),
    imagen VARCHAR(255),
    CONSTRAINT fk_dispositivo_persona
        FOREIGN KEY (id_persona) 
        REFERENCES t_persona(id_persona)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- 5. Tickets (De una persona sobre un dispositivo)
CREATE TABLE t_tickets (
    id_ticket INT AUTO_INCREMENT PRIMARY KEY,
    id_persona INT,
    id_dispositivo INT,
    descripcion_problema TEXT,
    solucion TEXT,
    estado VARCHAR(50) DEFAULT 'abierto',
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_ticket_persona
        FOREIGN KEY (id_persona) 
        REFERENCES t_persona(id_persona)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_ticket_dispositivo
        FOREIGN KEY (id_dispositivo) 
        REFERENCES t_dispositivos(id_dispositivo)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- =====================================
-- INSERCIÓN DE DATOS POR DEFECTO 
-- =====================================

-- Añadir roles predeterminados
INSERT INTO t_cat_roles (nombre, descripcion) VALUES ('admin', 'Administrador del sistema HelpDesk');
INSERT INTO t_cat_roles (nombre, descripcion) VALUES ('cliente', 'Cliente que solicita soporte técnico');

-- Añadir un usuario administrador por defecto
INSERT INTO t_persona (paterno, materno, nombre, fecha_nacimiento, sexo, telefono, correo) 
VALUES ('Admin', 'Root', 'Administrador', '1990-01-01', 'Masculino', '555-0000', 'admin@helpdesk.com');

-- Contraseña será 'admin123' encriptada en SHA1 que es: f865b53623b121fd34ee5426c792e5c33af8c227
-- Se asume id_rol = 1 (admin) e id_persona = 1 (la recién creada)
INSERT INTO t_usuarios (id_rol, id_persona, usuario, password, ubicacion)
VALUES (1, 1, 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Oficina Central IT');
