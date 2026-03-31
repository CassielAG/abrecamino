<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db_connection.php';
$usuario_id = $_POST['usuario_id'];
$condicion = $_POST['condicion'];

$conn->query(query: "INSERT INTO salidas(usuario_id, fecha_salida, condicion_salida) VALUES ($usuario_id, NOW(), '$condicion')");
echo "Salida registrada";
?>