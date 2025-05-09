<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include("conexion.php");

$id = $_POST["id_mark"];
$sql = "DELETE FROM cat_Marcas WHERE id_mark = $id";

if ($conexion->query($sql) === TRUE) {
    header("Location: marcas.php");
} else {
    echo "Error al eliminar: " . $conexion->error;
}
?>
