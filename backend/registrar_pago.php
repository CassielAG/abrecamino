<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db_connection.php';
$fecha_pago = $_POST['fecha_pago'];
$usuario = $_POST['usuario_id'];
$monto = $_POST['monto'];
$descripcion = $_POST['descripcion'];

$conn->query(query: "INSERT INTO pagos(usuario_id, monto, descripcion, fecha_pago) VALUES ($usuario, $monto, '$descripcion', '$fecha_pago');");
echo "Pago registrado";
?>