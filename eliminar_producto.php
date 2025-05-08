<?php
include("conexion.php");

$id = $_POST["id_prod"];

$sql = "DELETE FROM cat_Productos WHERE id_prod = $id";

if ($conexion->query($sql) === TRUE) {
    header("Location: productos.php");
} else {
    echo "Error al eliminar: " . $conexion->error;
}
?>
