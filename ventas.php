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
</head>
<body>
    <h2>Lista de Ventas</h2>
    <a href="nueva_venta.php">Registrar nueva venta</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Cliente</th>
            <th>Empleado</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = $ventas->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila['id_vta']; ?></td>
                <td><?php echo $fila['fec_vta']; ?></td>
                <td><?php echo $fila['hor_vta']; ?></td>
                <td><?php echo $fila['cliente_vta']; ?></td>
                <td><?php echo $fila['empleado_vta']; ?></td>
                <td>
                    <a href="det_ventas.php?id_vta=<?php echo $fila['id_vta']; ?>">Detalle</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
