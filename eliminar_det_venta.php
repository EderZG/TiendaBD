<?php
include("conexion.php");

$num_vta = $_GET['num_vta_det'] ?? null;
$num_pro = $_GET['num_pro_det'] ?? null;

if ($num_vta === null || $num_pro === null) {
    echo "Error: datos faltantes.";
    exit;
}

$sql = "DELETE FROM det_Ventas WHERE num_vta_det = $num_vta AND num_pro_det = $num_pro";
$conexion->query($sql);

header("Location: det_ventas.php?id_vta=$num_vta");
exit;
?>
