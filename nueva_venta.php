<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $cliente = $_POST["cliente"];
    $empleado = $_POST["empleado"];

    $conexion->query("INSERT INTO ventas (fec_vta, hor_vta, cliente_vta, empleado_vta) VALUES ('$fecha', '$hora', $cliente, $empleado)");

    header("Location: ventas.php");
    exit;
}

$clientes = $conexion->query("SELECT * FROM cat_Clientes");
$empleados = $conexion->query("SELECT * FROM cat_Empleados");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Nueva Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Registrar Nueva Venta</h2>
    <form method="POST" class="mb-4">

        <div class="mb-3">
            <label class="form-label">Fecha:</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hora:</label>
            <input type="time" name="hora" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cliente:</label>
            <select name="cliente" class="form-select" required>
                <?php while ($c = $clientes->fetch_assoc()) { ?>
                    <option value="<?= $c['id_cli'] ?>"><?= $c['nom_cli'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Empleado:</label>
            <select name="empleado" class="form-select" required>
                <?php while ($e = $empleados->fetch_assoc()) { ?>
                    <option value="<?= $e['id_emp'] ?>"><?= $e['nom_emp'] ?></option>
                <?php } ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Registrar</button>
        <a href="ventas.php" class="btn btn-secondary ms-2">Regresar a Ventas</a>
    </form>
</div>
</body>
</html>
