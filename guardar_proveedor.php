<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include("conexion.php");

$nom = $_POST["nom_prov"];
$tel = $_POST["tel_prov"];
$mail = $_POST["mail_prov"];

if (isset($_POST["id_prov"])) {
    $id = $_POST["id_prov"];
    $sql = "UPDATE cat_Proveedores SET nom_prov='$nom', tel_prov='$tel', mail_prov='$mail' WHERE id_prov=$id";
} else {
    $sql = "INSERT INTO cat_Proveedores (nom_prov, tel_prov, mail_prov) VALUES ('$nom', '$tel', '$mail')";
}

if ($conexion->query($sql) === TRUE) {
    header("Location: proveedores.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
