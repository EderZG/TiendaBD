<?php
include("conexion.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Obtener el ID de la venta desde la URL
$id_vta = $_GET['id_vta'] ?? null;

if (!$id_vta) {
    echo "<p>No se ha seleccionado ninguna venta.</p>";
    exit;
}

// Obtener productos y detalles de la venta
$productos = $conexion->query("SELECT * FROM cat_Productos");

$detalles = $conexion->query("
    SELECT dv.*, p.nom_prod 
    FROM det_Ventas dv
    INNER JOIN cat_Productos p ON dv.num_pro_det = p.id_prod
    WHERE dv.num_vta_det = $id_vta
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Ventas</title>
</head>
<body>
    <h2>Agregar Producto a una Venta</h2>
    <form method="POST" action="guardar_det_venta.php">
        <input type="hidden" name="num_vta_det" value="<?php echo $id_vta; ?>">

        <label>Producto:</label>
        <select name="num_pro_det" required>
            <option value="">--Selecciona--</option>
            <?php while ($prod = $productos->fetch_assoc()) { ?>
                <option value="<?php echo $prod["id_prod"]; ?>">
                    <?php echo $prod["nom_prod"]; ?>
                </option>
            <?php } ?>
        </select>

        <label>Cantidad:</label>
        <input type="number" name="cantidad_prod" min="1" required>

        <input type="submit" value="Agregar a venta">
    </form>

    <h2>Detalle de ventas registradas</h2>
    <table border="1">
        <tr>
            <th>Venta</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = $detalles->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila["num_vta_det"]; ?></td>
                <td><?php echo $fila["nom_prod"]; ?></td>
                <td><?php echo $fila["cantidad_prod"]; ?></td>
                <td>
                    <a href="eliminar_det_venta.php?num_vta_det=<?php echo $fila['num_vta_det']; ?>&num_pro_det=<?php echo $fila['num_pro_det']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <br>
    <a href="ventas.php"><button>Regresar al Menú de Ventas</button></a>
</body>
</html>
