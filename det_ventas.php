<?php
include("conexion.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);

$id_vta = $_GET['id_vta'] ?? null;

if (!$id_vta) {
    echo "<div class='alert alert-danger'>No se ha seleccionado ninguna venta.</div>";
    exit;
}

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Agregar Producto a Venta #<?php echo $id_vta; ?></h2>
    
    <form method="POST" action="guardar_det_venta.php" class="mb-5">
        <input type="hidden" name="num_vta_det" value="<?php echo $id_vta; ?>">

        <div class="mb-3">
            <label class="form-label">Producto:</label>
            <select name="num_pro_det" class="form-select" required>
                <option value="">--Selecciona--</option>
                <?php while ($prod = $productos->fetch_assoc()) { ?>
                    <option value="<?php echo $prod["id_prod"]; ?>">
                        <?php echo $prod["nom_prod"]; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Cantidad:</label>
            <input type="number" name="cantidad_prod" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Agregar a venta</button>
    </form>

    <h2 class="mb-3">Detalle de productos agregados</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Venta</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($fila = $detalles->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila["num_vta_det"]; ?></td>
                <td><?php echo $fila["nom_prod"]; ?></td>
                <td><?php echo $fila["cantidad_prod"]; ?></td>
                <td>
                    <a href="eliminar_det_venta.php?num_vta_det=<?php echo $fila['num_vta_det']; ?>&num_pro_det=<?php echo $fila['num_pro_det']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <a href="ventas.php" class="btn btn-secondary mt-3">Regresar al Menú de Ventas</a>
</div>
</body>
</html>
