<?php
include("conexion.php");

$id = $_POST["id_cli"];

$sql = "DELETE FROM cat_Clientes WHERE id_cli = $id";

if ($conexion->query($sql) === TRUE) {
    header("Location: clientes.php");
} else {
    echo "Error al eliminar: " . $conexion->error;
}
?>
