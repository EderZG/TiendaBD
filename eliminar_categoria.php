<?php
include("conexion.php");

$id = $_POST["id_cat"];
$sql = "DELETE FROM cat_Categorias WHERE id_cat = $id";

if ($conexion->query($sql) === TRUE) {
    header("Location: categorias.php");
} else {
    echo "Error al eliminar: " . $conexion->error;
}
?>

