CREATE DATABASE hospital;
USE hospital;

CREATE TABLE usuarios (
id INT AUTO_INCREMENT PRIMARY KEY,
usuario VARCHAR(50) UNIQUE,
password VARCHAR(255)
);

INSERT INTO usuarios(usuario, password) VALUES (
'admin', MD5('caminos777')
);

CREATE TABLE pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    edad INT,
    direccion TEXT,
    telefono VARCHAR(20),
    familiar_responsable VARCHAR(100),
    telefono_familiar VARCHAR(20),
    fecha_ingreso DATETIME,
    condicion_ingreso TEXT
);

CREATE TABLE pertenencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT,
    descripcion TEXT,
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id)
);

CREATE TABLE pagos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT,
    monto DECIMAL(10,2),
    descripcion TEXT,
    fecha_pago DATETIME,
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id)
);

CREATE TABLE salidas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT,
    fecha_salida DATETIME,
    condicion_salida TEXT,
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id)
);