<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("conexion.php");

$nom = $_POST["nom_cli"];
$tel = $_POST["tel_cli"];
$fna = $_POST["fna_cli"];
$sex = $_POST["sex_cli"];

$sql = "INSERT INTO cat_Clientes (nom_cli, tel_cli, fna_cli, sex_cli)
        VALUES ('$nom', '$tel', '$fna', '$sex')";

if ($conexion->query($sql) === TRUE) {
    header("Location: clientes.php");
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}
?>
