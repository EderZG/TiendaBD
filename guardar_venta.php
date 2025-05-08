<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("conexion.php");

$fec = $_POST["fec_vta"];
$hor = $_POST["hor_vta"];
$cli = $_POST["cliente_vta"];
$emp = $_POST["empleado_vta"];

if (isset($_POST["id_vta"])) {
    $id = $_POST["id_vta"];
    $sql = "UPDATE ventas SET fec_vta='$fec', hor_vta='$hor', cliente_vta=$cli, empleado_vta=$emp WHERE id_vta=$id";
} else {
    $sql = "INSERT INTO ventas (fec_vta, hor_vta, cliente_vta, empleado_vta) VALUES ('$fec', '$hor', $cli, $emp)";
}

if ($conexion->query($sql) === TRUE) {
    header("Location: ventas.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
