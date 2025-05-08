\<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("conexion.php");

// Obtener datos para selects
$ventas = $conexion->query("SELECT * FROM ventas");
$productos = $conexion->query("SELECT * FROM cat_Productos");

// Obtener id_vta de GET o POST de forma segura
$id_vta = $_GET["id_vta"] ?? null;

if ($id_vta === null) {
    echo "No se ha seleccionado ninguna venta";
    exit;
}

// Consultar detalles existentes de la venta
$detalle = $conexion->query("SELECT dv.*, v.fec_vta, p.nom_prod FROM det_Ventas dv
                            JOIN ventas v ON dv.num_vta_det = v.id_vta
                            JOIN cat_Productos p ON dv.num_pro_det = p.id_prod
                            WHERE dv.num_vta_det = $id_vta");
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
        Venta:
        <select name="id_vta" required>
            <option value="">--Selecciona--</option>
            <?php while($vta = $ventas->fetch_assoc()) { ?>
                <option value="<?php echo $vta['id_vta']; ?>" <?php if ($vta['id_vta'] == $id_vta) echo "selected"; ?>>
                    <?php echo $vta['id_vta'] . " - " . $vta['fec_vta']; ?>
                </option>
            <?php } ?>
        </select><br>

        Producto:
        <select name="id_prod" required>
            <option value="">--Selecciona--</option>
            <?php while($prod = $productos->fetch_assoc()) { ?>
                <option value="<?php echo $prod['id_prod']; ?>">
                    <?php echo $prod['nom_prod']; ?>
                </option>
            <?php } ?>
        </select><br>

        Cantidad:
        <input type="number" name="cantidad" required><br>

        <input type="submit" value="Agregar a venta">
    </form>

    <h2>Detalle de ventas registradas</h2>
    <table border="1">
        <tr>
            <th>Venta</th><th>Producto</th><th>Cantidad</th><th>Acciones</th>
        </tr>
        <?php while($fila = $detalle->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila['fec_vta']; ?></td>
            <td><?php echo $fila['nom_prod']; ?></td>
            <td><?php echo $fila['cantidad_prod']; ?></td>
            <td>
                <a href="eliminar_det_venta.php?id_vta=<?php echo $fila['num_vta_det']; ?>&id_prod=<?php echo $fila['num_pro_det']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

