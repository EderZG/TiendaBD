<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("conexion.php");

$modo = "insertar";
$id_cat = "";
$desc_cat = "";

if (isset($_GET["editar"])) {
    $modo = "editar";
    $id_cat = $_GET["editar"];
    $sql = "SELECT * FROM cat_Categorias WHERE id_cat = $id_cat";
    $resultado = $conexion->query($sql);
    $cat = $resultado->fetch_assoc();
    $desc_cat = $cat["desc_cat"];
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Categorías</title></head>
<body>
<h1>Gestión de Categorías</h1>

<h2><?php echo ($modo == "editar") ? "Editar Categoría" : "Agregar Categoría"; ?></h2>
<form method="POST" action="guardar_categoria.php">
    <?php if ($modo == "editar") { ?>
        <input type="hidden" name="id_cat" value="<?php echo $id_cat; ?>">
    <?php } ?>
    Descripción: <input type="text" name="desc_cat" value="<?php echo $desc_cat; ?>" required><br>
    <input type="submit" value="<?php echo ($modo == 'editar') ? 'Actualizar' : 'Agregar'; ?>">
</form>

<h2>Lista de Categorías</h2>
<table border="1">
    <tr><th>ID</th><th>Descripción</th><th>Acciones</th></tr>
    <?php
    $resultado = $conexion->query("SELECT * FROM cat_Categorias");
    while ($fila = $resultado->fetch_assoc()) {
    ?>
    <tr>
        <td><?php echo $fila["id_cat"]; ?></td>
        <td><?php echo $fila["desc_cat"]; ?></td>
        <td>
            <a href="categorias.php?editar=<?php echo $fila['id_cat']; ?>">Editar</a> |
            <form method="POST" action="eliminar_categoria.php" style="display:inline;" onsubmit="return confirm('¿Eliminar esta categoría?');">
                <input type="hidden" name="id_cat" value="<?php echo $fila['id_cat']; ?>">
                <input type="submit" value="Eliminar">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
