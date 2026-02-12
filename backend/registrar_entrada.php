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

$conn->query("INSERT INTO pacientes(nombre, edad, curp, nss, direccion, familiar, telefono_familiar, fecha_ingreso, condicion)
VALUES ('$nombre', $edad, '$curp', '$nss', '$direccion', '$familiar', '$telefono_familiar', NOW(), '$condicion')");

$paciente_id = $conn->insert_id;

if (!empty($pertenencias)) {
    $conn->query("INSERT INTO pertenencias(paciente_id, descripcion) VALUES ($paciente_id, '$pertenencias')");
}

echo "Registro guardado";
?>