<?php
include("conexion.php");

$id = $_POST["id_prov"];

$sql = "DELETE FROM cat_Proveedores WHERE id_prov = $id";

if ($conexion->query($sql) === TRUE) {
    header("Location: proveedores.php");
} else {
    echo "Error al eliminar: " . $conexion->error;
}
?>
