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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Gestión de Categorías</h1>

        <h2 class="mb-3"><?php echo ($modo == "editar") ? "Editar Categoría" : "Agregar Categoría"; ?></h2>
        <form method="POST" action="guardar_categoria.php" class="mb-5">
            <?php if ($modo == "editar") { ?>
                <input type="hidden" name="id_cat" value="<?php echo $id_cat; ?>">
            <?php } ?>
            <div class="mb-3">
                <label class="form-label">Descripción:</label>
                <input type="text" name="desc_cat" class="form-control" value="<?php echo $desc_cat; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <?php echo ($modo == 'editar') ? 'Actualizar' : 'Agregar'; ?>
            </button>
        </form>

        <h2 class="mb-3">Lista de Categorías</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resultado = $conexion->query("SELECT * FROM cat_Categorias");
                while ($fila = $resultado->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $fila["id_cat"]; ?></td>
                    <td><?php echo $fila["desc_cat"]; ?></td>
                    <td>
                        <a href="categorias.php?editar=<?php echo $fila['id_cat']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <form method="POST" action="eliminar_categoria.php" class="d-inline" onsubmit="return confirm('¿Eliminar esta categoría?');">
                            <input type="hidden" name="id_cat" value="<?php echo $fila['id_cat']; ?>">
                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <form action="index.php" method="get">
            <button type="submit" class="btn btn-secondary mt-3">Regresar al Menú Principal</button>
        </form>
    </div>
</body>
</html>
