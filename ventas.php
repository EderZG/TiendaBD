<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("conexion.php");

$ventas = $conexion->query("SELECT * FROM ventas");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Lista de Ventas</h2>
        <a href="nueva_venta.php" class="btn btn-success mb-3">Registrar nueva venta</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Cliente</th>
                    <th>Empleado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $ventas->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila['id_vta']; ?></td>
                        <td><?php echo $fila['fec_vta']; ?></td>
                        <td><?php echo $fila['hor_vta']; ?></td>
                        <td><?php echo $fila['cliente_vta']; ?></td>
                        <td><?php echo $fila['empleado_vta']; ?></td>
                        <td>
                            <a href="det_ventas.php?id_vta=<?php echo $fila['id_vta']; ?>" class="btn btn-info btn-sm">Detalle</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <form action="index.php" method="get">
            <button type="submit" class="btn btn-secondary mt-3">Regresar al Menú Principal</button>
        </form>
    </div>
</body>
</html>

