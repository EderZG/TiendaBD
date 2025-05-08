<?php
include("conexion.php");

$id = $_POST["id_cli"];
$nom = $_POST["nom_cli"];
$tel = $_POST["tel_cli"];
$fna = $_POST["fna_cli"];
$sex = $_POST["sex_cli"];

$sql = "UPDATE cat_Clientes SET nom_cli='$nom', tel_cli='$tel', fna_cli='$fna', sex_cli='$sex' WHERE id_cli=$id";

if ($conexion->query($sql) === TRUE) {
    header("Location: clientes.php");
} else {
    echo "Error al actualizar: " . $conexion->error;
}
?>
