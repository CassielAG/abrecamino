<?php
include 'db_connection.php';
$result = $conn->query("SELECT * FROM pacientes");
while ($row = $result->fetch_assoc()) {
    echo "Paciente: " . $row['nombre'] . "<br>";
    echo "Ingreso: " . $row['fecha_ingreso'] . "<br><br>";
    //echo "Salida: " . $row['fecha_salida'] . "<br><br>";
}
if ($result->num_rows > 0) {
    echo "<table class=\"table table-striped table-hover\">
            <thead class=\"table-light\">
                <tr>
                    <th>Numero Expediente</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>CURP</th>
                    <th>NSS</th>
                    <th>Fecha de Ingreso</th>
                    <th>Fecha de Egreso</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Familiar Responsable</th>
                </tr>
            </thead>
            <tbody>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["firstname"] . " " . $row["lastname"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>