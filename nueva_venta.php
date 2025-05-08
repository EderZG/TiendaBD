<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $cliente = $_POST["cliente"];
    $empleado = $_POST["empleado"];

    $conexion->query("INSERT INTO ventas (fec_vta, hor_vta, cliente_vta, empleado_vta) VALUES ('$fecha', '$hora', $cliente, $empleado)");

    header("Location: ventas.php");
}

$clientes = $conexion->query("SELECT * FROM cat_Clientes");
$empleados = $conexion->query("SELECT * FROM cat_Empleados");
?>

<h2>Registrar Nueva Venta</h2>
<form method="POST">
    Fecha: <input type="date" name="fecha"><br>
    Hora: <input type="time" name="hora"><br>
    Cliente:
    <select name="cliente">
        <?php while ($c = $clientes->fetch_assoc()) { ?>
            <option value="<?= $c['id_cli'] ?>"><?= $c['nom_cli'] ?></option>
        <?php } ?>
    </select><br>
    Empleado:
    <select name="empleado">
        <?php while ($e = $empleados->fetch_assoc()) { ?>
            <option value="<?= $e['id_emp'] ?>"><?= $e['nom_emp'] ?></option>
        <?php } ?>
    </select><br>
    <input type="submit" value="Registrar">
</form>
<form action="ventas.php" method="get">
    <button type="submit">Regresar a Ventas</button>
</form>
