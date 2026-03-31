<?php $conn = new mysqli(hostname: "localhost:3306", username: "root", password: "112358132134", database: "casaabrecamino");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} 