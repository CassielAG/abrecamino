CREATE DATABASE casaabrecamino;
USE casaabrecamino;

CREATE TABLE admins (
id INT AUTO_INCREMENT PRIMARY KEY,
usuario VARCHAR(50) UNIQUE,
password VARCHAR(255)
);

INSERT INTO admins(usuario, password) VALUES (
'admin', MD5('caminos777')
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150),
    edad INT,
    curp VARCHAR(18),
    nss VARCHAR(11),
    familiar_responsable VARCHAR(150),
    fecha_ingreso DATETIME,
);

CREATE TABLE fam_responsable(
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    nombre VARCHAR(150),
    direccion TEXT,
    telefono VARCHAR(20),
    parentesco VARCHAR(50),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE pertenencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    descripcion TEXT,
    observaciones TEXT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE pagos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    monto DECIMAL(10,2),
    descripcion TEXT,
    fecha_pago DATETIME,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE salidas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    fecha_salida DATETIME,
    condicion_salida TEXT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);