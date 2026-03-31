<?php
include 'db_connection.php';
$result = $conn->query(query: "SELECT `usuarios`.*, `fam_responsable`.`nombre` AS `familiar`, `fam_responsable`.`direccion`, `fam_responsable`.`telefono`, `salidas`.`fecha_salida` FROM `usuarios` LEFT JOIN `fam_responsable` ON `fam_responsable`.`usuario_id` = `usuarios`.`id` LEFT JOIN `salidas` ON `salidas`.`usuario_id` = `usuarios`.`id`;");
echo '<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestión de Usuarios</title>
        <link rel="icon" type="image/x-icon" href="./assets/AbreCamino.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>

    <body>
        <nav class="navbar fixed-top navbar-expand bg-body-tertiary">
            <div class="container-fluid">
                <img src="../assets/AbreCamino.ico" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/registro_entrada.html">Registrar Entrada</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/registro_salida.html">Registrar Salida</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/pagos.html">Pagos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/reportes.html">Reportes</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container text-center" style="margin-top: 80px;">
            <div class="row">
                <div class="card col-md-12 align-self-center shadow-lg bg-body rounded">
                    <div class="card-header bg-white border-0 pb-0 pt-3">
                        <h3>Lista de Usuarios</h3>
                    </div>
                    <div class="card-body">
                        <p>Aquí puedes ver los usuarios del sistema.</p>
                        <div class="table-responsive mt-3">';
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
        echo "<tr><td>".$row["id"]."</td><td>".$row["nombre"]."</td><td>".$row["edad"]."</td><td>".$row["curp"]."</td><td>".$row["nss"]."</td><td>".$row["fecha_ingreso"]."</td><td>".$row["fecha_salida"]."</td><td>".$row["telefono"]."</td><td>".$row["direccion"]."</td><td>".$row["familiar"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo '</div>
                    </div>
                </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous">
        </script>
    </body>

</html>';
$conn->close();
?>