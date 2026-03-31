<?php
include 'db_connection.php';

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$curp = $_POST['curp'];
$nss = $_POST['nss'];
$direccion = $_POST['direccion'];
$familiar = $_POST['familiar'];
$telefono_familiar = $_POST['telefono_familiar'];
$pertenencias = $_POST['pertenencias'];
$condicion = $_POST['condicion'];

$conn->query(query: "INSERT INTO usuarios(nombre, edad, curp, nss, fecha_ingreso)
VALUES ('$nombre', $edad, '$curp', '$nss', NOW())");
$usuario_id = $conn->insert_id;

$conn->query(query:"INSERT INTO fam_responsable(usuario_id, nombre, direccion, telefono) VALUES ($usuario_id, '$familiar', '$direccion', '$telefono_familiar')");


if (!empty($pertenencias)) {
    $conn->query(query: "INSERT INTO pertenencias(usuario_id, descripcion, observaciones) VALUES ($usuario_id, '$pertenencias', '$condicion')");
}

echo "Registro guardado";
