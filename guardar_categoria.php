<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("conexion.php");

$desc = $_POST["desc_cat"];

if (isset($_POST["id_cat"])) {
    $id = $_POST["id_cat"];
    $sql = "UPDATE cat_Categorias SET desc_cat='$desc' WHERE id_cat=$id";
} else {
    $sql = "INSERT INTO cat_Categorias (desc_cat) VALUES ('$desc')";
}

if ($conexion->query($sql) === TRUE) {
    header("Location: categorias.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
