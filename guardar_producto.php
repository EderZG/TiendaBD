<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("conexion.php");

$nom = $_POST["nom_prod"];
$precio_compra = $_POST["precio_compra_prod"];
$precio_venta = $_POST["prec_prod"]; // ← este ya corregido
$cantidad = $_POST["cantidad_prod"];
$fecha = $_POST["fec_cad_prod"];
$proveedor = $_POST["id_prove_prod"];
$categoria = $_POST["id_cate_prod"];
$marca = $_POST["id_marca_prod"];

if (isset($_POST["id_prod"])) {
    $id = $_POST["id_prod"];
    $sql = "UPDATE cat_Productos SET 
                nom_prod='$nom', 
                precio_compra_prod=$precio_compra, 
                precio_venta_prod=$precio_venta,
                cantidad_prod=$cantidad,
                fec_cad_prod='$fecha',
                id_prove_prod=$proveedor,
                id_cate_prod=$categoria,
                id_marca_prod=$marca
            WHERE id_prod = $id";
} else {
    $sql = "INSERT INTO cat_Productos (
                nom_prod, 
                precio_compra_prod, 
                precio_venta_prod, 
                cantidad_prod, 
                fec_cad_prod, 
                id_prove_prod, 
                id_cate_prod, 
                id_marca_prod
            ) VALUES (
                '$nom', 
                $precio_compra, 
                $precio_venta, 
                $cantidad, 
                '$fecha', 
                $proveedor, 
                $categoria, 
                $marca
            )";
}

if ($conexion->query($sql) === TRUE) {
    header("Location: productos.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
