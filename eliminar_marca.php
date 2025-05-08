<?php
include("conexion.php");

$id = $_POST["id_mark"];
$sql = "DELETE FROM cat_Marcas WHERE id_mark = $id";

if ($conexion->query($sql) === TRUE) {
    header("Location: marcas.php");
} else {
    echo "Error al eliminar: " . $conexion->error;
}
?>
