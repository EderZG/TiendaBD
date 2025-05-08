<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include("conexion.php");

$nom = $_POST["nom_emp"];
$tel = $_POST["tel_emp"];
$usr = $_POST["usr_emp"];
$pas = $_POST["pas_emp"];

if (isset($_POST["id_emp"])) {
    // Modo edición
    $id = $_POST["id_emp"];
    $sql = "UPDATE cat_Empleados SET nom_emp='$nom', tel_emp='$tel', usr_emp='$usr', pas_emp='$pas' WHERE id_emp=$id";
} else {
    // Modo inserción
    $sql = "INSERT INTO cat_Empleados (nom_emp, tel_emp, usr_emp, pas_emp) VALUES ('$nom', '$tel', '$usr', '$pas')";
}

if ($conexion->query($sql) === TRUE) {
    header("Location: empleados.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
