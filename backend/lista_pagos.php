<?php
include 'db_connection.php';
$result = $conn->query(query: "SELECT `usuarios`.*, `pagos`.`monto`, `pagos`.`fecha_pago` FROM `usuarios` LEFT JOIN `pagos` ON `pagos`.`usuario_id` = `usuarios`.`id`;");
echo '<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestión de Pagos</title>
        <link rel="icon" type="image/x-icon" href="./assets/AbreCamino.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
            
                    <div class="modal-body">
                        <h1 class="mt-4">Gestión de Pagos</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Fecha de Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                        </table>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>    
                </div>
            </div>
        </div>';
// output data of each row
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["monto"] . "</td><td>" . $row["fecha_pago"] . "</td></tr>";
}
echo "
        </div>
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js\"
            integrity=\"sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB\"
            crossorigin=\"anonymous\"></script>
    </body>
</html>";
?>