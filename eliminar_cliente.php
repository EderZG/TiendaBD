<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
include("conexion.php");


include("conexion.php");

$id = $_POST["id_cli"];

$sql = "DELETE FROM cat_Clientes WHERE id_cli = $id";

if ($conexion->query($sql) === TRUE) {
    header("Location: clientes.php");
} else {
    echo "Error al eliminar: " . $conexion->error;
}
?>
