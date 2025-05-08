<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("conexion.php");

$vta = $_POST["num_vta_det"];
$prod = $_POST["num_pro_det"];
$cant = $_POST["cantidad_prod"];

$sql = "INSERT INTO det_Ventas (num_vta_det, num_pro_det, cantidad_prod)
        VALUES ($vta, $prod, $cant)";

if ($conexion->query($sql) === TRUE) {
    header("Location: det_ventas.php");
} else {
    echo "Error al guardar: " . $conexion->error;
}
?>
