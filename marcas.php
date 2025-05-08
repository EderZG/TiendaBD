<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("conexion.php");

$modo = "insertar";
$id_mark = "";
$desc_mark = "";

if (isset($_GET["editar"])) {
    $modo = "editar";
    $id_mark = $_GET["editar"];
    $sql = "SELECT * FROM cat_Marcas WHERE id_mark = $id_mark";
    $resultado = $conexion->query($sql);
    $marca = $resultado->fetch_assoc();
    $desc_mark = $marca["desc_mark"];
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Marcas</title></head>
<body>
<h1>Gestión de Marcas</h1>

<h2><?php echo ($modo == "editar") ? "Editar Marca" : "Agregar Marca"; ?></h2>
<form method="POST" action="guardar_marca.php">
    <?php if ($modo == "editar") { ?>
        <input type="hidden" name="id_mark" value="<?php echo $id_mark; ?>">
    <?php } ?>
    Descripción: <input type="text" name="desc_mark" value="<?php echo $desc_mark; ?>" required><br>
    <input type="submit" value="<?php echo ($modo == 'editar') ? 'Actualizar' : 'Agregar'; ?>">
</form>

<h2>Lista de Marcas</h2>
<table border="1">
    <tr><th>ID</th><th>Descripción</th><th>Acciones</th></tr>
    <?php
    $resultado = $conexion->query("SELECT * FROM cat_Marcas");
    while ($fila = $resultado->fetch_assoc()) {
    ?>
    <tr>
        <td><?php echo $fila["id_mark"]; ?></td>
        <td><?php echo $fila["desc_mark"]; ?></td>
        <td>
            <a href="marcas.php?editar=<?php echo $fila['id_mark']; ?>">Editar</a> |
            <form method="POST" action="eliminar_marca.php" style="display:inline;" onsubmit="return confirm('¿Eliminar esta marca?');">
                <input type="hidden" name="id_mark" value="<?php echo $fila['id_mark']; ?>">
                <input type="submit" value="Eliminar">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
