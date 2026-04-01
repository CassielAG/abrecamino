<?php $conn = new mysqli("localhost:3306", "root", "", "casaabrecamino");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}