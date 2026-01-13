<?php
include 'db_connection.php';

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$familiar = $_POST['familiar'];
$telefono_familiar = $_POST['telefono_familiar'];
$pertenencias = $_POST['pertenencias'];
$condicion = $_POST['condicion'];

$conn->query("INSERT INTO pacientes(nombre, edad, direccion, telefono, familiar_responsable, telefono_familiar, fecha_ingreso, condicion_ingreso)
VALUES ('$nombre', $edad, '$direccion', '$telefono', '$familiar', '$telefono_familiar', NOW(), '$condicion')");

$paciente_id = $conn->insert_id;

if (!empty($pertenencias)) {
    $conn->query("INSERT INTO pertenencias(paciente_id, descripcion) VALUES ($paciente_id, '$pertenencias')");
}

echo "Registro guardado";
?>