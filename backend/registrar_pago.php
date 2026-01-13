<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db_connection.php';
$paciente = $_POST['paciente_id'];
$monto = $_POST['monto'];
$descripcion = $_POST['descripcion'];
$conn->query("INSERT INTO pagos(paciente_id, monto, descripcion, fecha_pago) VALUES ($paciente, $monto, '$descripcion', NOW())");
echo "Pago registrado";
?>