<?php
include("conexion.php");

$vta = $_POST["num_vta_det"];
$prod = $_POST["num_pro_det"];

$sql = "DELETE FROM det_Ventas WHERE num_vta_det = $vta AND num_pro_det = $prod";

if ($conexion->query($sql) === TRUE) {
    header("Location: det_ventas.php");
} else {
    echo "Error al eliminar: " . $conexion->error;
}
?>
