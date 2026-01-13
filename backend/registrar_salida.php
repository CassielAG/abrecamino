<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db_connection.php';
$paciente = $_POST['paciente_id'];
$condicion = $_POST['condicion'];
$conn->query("INSERT INTO salidas(paciente_id, fecha_salida, condicion_salida) VALUES ($paciente, NOW(), '$condicion')");
echo "Salida registrada";
?>