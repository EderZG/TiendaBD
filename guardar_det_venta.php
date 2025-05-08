<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("conexion.php");

// Verifica que se hayan enviado los datos del formulario
if (isset($_POST['num_vta_det'], $_POST['num_pro_det'], $_POST['cantidad_prod'])) {
    $venta = $_POST['num_vta_det'];
    $producto = $_POST['num_pro_det'];
    $cantidad = $_POST['cantidad_prod'];

    // Validación básica
    if (is_numeric($venta) && is_numeric($producto) && is_numeric($cantidad) && $cantidad > 0) {
        $sql = "INSERT INTO det_Ventas (num_vta_det, num_pro_det, cantidad_prod)
                VALUES ($venta, $producto, $cantidad)";

        if ($conexion->query($sql) === TRUE) {
            header("Location: det_ventas.php?id_vta=$venta");
            exit();
        } else {
            echo "Error al insertar: " . $conexion->error;
        }
    } else {
        echo "Los datos no son válidos.";
    }
} else {
    echo "No se recibieron todos los campos requeridos.<br>";
    echo "num_vta_det: " . ($_POST['num_vta_det'] ?? 'NULO') . "<br>";
    echo "num_pro_det: " . ($_POST['num_pro_det'] ?? 'NULO') . "<br>";
    echo "cantidad_prod: " . ($_POST['cantidad_prod'] ?? 'NULO') . "<br>";
}
?>

