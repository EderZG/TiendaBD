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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Marcas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Gestión de Marcas</h1>

        <h2 class="mb-3"><?php echo ($modo == "editar") ? "Editar Marca" : "Agregar Marca"; ?></h2>
        <form method="POST" action="guardar_marca.php" class="mb-5">
            <?php if ($modo == "editar") { ?>
                <input type="hidden" name="id_mark" value="<?php echo $id_mark; ?>">
            <?php } ?>
            <div class="mb-3">
                <label class="form-label">Descripción:</label>
                <input type="text" name="desc_mark" class="form-control" value="<?php echo $desc_mark; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <?php echo ($modo == 'editar') ? 'Actualizar' : 'Agregar'; ?>
            </button>
        </form>

        <h2 class="mb-3">Lista de Marcas</h2>
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
                $resultado = $conexion->query("SELECT * FROM cat_Marcas");
                while ($fila = $resultado->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $fila["id_mark"]; ?></td>
                    <td><?php echo $fila["desc_mark"]; ?></td>
                    <td>
                        <a href="marcas.php?editar=<?php echo $fila['id_mark']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <form method="POST" action="eliminar_marca.php" class="d-inline" onsubmit="return confirm('¿Eliminar esta marca?');">
                            <input type="hidden" name="id_mark" value="<?php echo $fila['id_mark']; ?>">
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

