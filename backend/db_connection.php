<?php $conn = new mysqli("localhost:3306", "root", "112358132134", "AbriendoCaminos");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} ?>