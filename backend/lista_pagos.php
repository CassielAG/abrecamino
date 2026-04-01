<?php
include 'db_connection.php';
$result = $conn->query(query: 'SELECT `usuarios`.*, `pagos`.`monto`, `pagos`.`fecha_pago` FROM `usuarios` LEFT JOIN `pagos` ON `pagos`.`usuario_id` = `usuarios`.`id`;');
echo ' <!DOCTYPE html>
<html lang="es">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagos</title>
        <link rel="icon" type="image/x-icon" href="../assets/AbreCamino.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    </head>

    <body>
        <nav class="navbar fixed-top navbar-expand bg-body-tertiary">
            <div class="container-fluid">
                <img src="../assets/AbreCamino.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../backend/lista.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registro_entrada.html">Registrar Entrada</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registro_salida.html">Registrar Salida</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Pagos</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container text-center" style="margin-top: 80px;">
            <div class="row">
                <div class="card col-md-12 align-self-center shadow-lg bg-body rounded">
                    <div class="card-header bg-white border-0 pb-0 pt-3">
                        <h2>Registrar Pago</h2>
                    </div>
                    <hr class="my-0 border-secondary border-1 opacity-50 w-75 mx-auto">
                    <div class="card-body">
                        <form action="../backend/registrar_pago.php" method="POST">
                            <h3>Datos del pago</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="mb-2 form-control" type="date" name="fecha_pago" required>
                                </div>
                                <div class="col-md-6">
                                    <input class="mb-2 form-control" type="number" name="usuario_id" placeholder="Num de expediente" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="mb-2  form-control" type="number" step="0.01" name="monto" placeholder="Monto" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="mb-2 form-control" name="descripcion" placeholder="Descripción"></textarea>
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto mt-4 mb-3">
                                <button type="submit" class="btn btn-outline-primary">Registrar pago</button>
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Ver pagos
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<div class="modal" id="myModal">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Gestión de Pagos</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                    <div class="table-responsive mt-3">';
if ($result->num_rows > 0) {
    echo "<table class=\"table table-striped table-hover\">
            <thead class=\"table-light\">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Monto</th>
                    <th>Fecha de Pago</th>
                </tr>
            </thead>
            <tbody>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["monto"] . "</td><td>" . $row["fecha_pago"] . "</td></tr>";
    }
    echo '</table>';
} else {
    echo "0 results";
}
echo '</div>
    </div> 
    </div>
    </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
    </body>
</html>';
$conn->close();