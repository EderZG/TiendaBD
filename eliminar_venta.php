<?php
include("conexion.php");

$id = $_POST["id_vta"];

$sql = "DELETE FROM ventas WHERE id_vta = $id";

if ($conexion->query($sql) === TRUE) {
    header("Location: ventas.php");
} else {
    echo "Error al eliminar: " . $conexion->error;
}
?>
