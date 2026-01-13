<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db_connection.php';
$usuario = $_POST['usuario'];
$password = md5($_POST['password']);
$q = $conn->query("SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'");
if ($q->num_rows > 0) {
    header("Location: ../index.html");
    exit();
} else {
    echo "Credenciales incorrectas";
} 
?>