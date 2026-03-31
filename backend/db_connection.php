<?php $conn = new mysqli("localhost:3306", "pma", 'Ca$$aC4mino$', "casaabrecamino");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}