<?php
include("conexion.php");

$id = $_POST["id_emp"];

$sql = "DELETE FROM cat_Empleados WHERE id_emp = $id";

if ($conexion->query($sql) === TRUE) {
    header("Location: empleados.php");
} else {
    echo "Error al eliminar: " . $conexion->error;
}
?>
