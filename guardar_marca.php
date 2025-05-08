<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("conexion.php");

$desc = $_POST["desc_mark"];

if (isset($_POST["id_mark"])) {
    $id = $_POST["id_mark"];
    $sql = "UPDATE cat_Marcas SET desc_mark='$desc' WHERE id_mark=$id";
} else {
    $sql = "INSERT INTO cat_Marcas (desc_mark) VALUES ('$desc')";
}

if ($conexion->query($sql) === TRUE) {
    header("Location: marcas.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
