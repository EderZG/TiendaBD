<?php
include("conexion.php");

$modo = "insertar";
$id_prov = "";
$nom_prov = "";
$tel_prov = "";
$mail_prov = "";

if (isset($_GET["editar"])) {
    $modo = "editar";
    $id_prov = $_GET["editar"];
    $sql = "SELECT * FROM cat_Proveedores WHERE id_prov = $id_prov";
    $resultado = $conexion->query($sql);
    $prov = $resultado->fetch_assoc();
    $nom_prov = $prov["nom_prov"];
    $tel_prov = $prov["tel_prov"];
    $mail_prov = $prov["mail_prov"];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Gestión de Proveedores</h1>

        <h2 class="mb-3"><?php echo ($modo == "editar") ? "Editar Proveedor" : "Agregar Proveedor"; ?></h2>
        <form method="POST" action="guardar_proveedor.php" class="mb-5">
            <?php if ($modo == "editar") { ?>
                <input type="hidden" name="id_prov" value="<?php echo $id_prov; ?>">
            <?php } ?>
            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nom_prov" class="form-control" value="<?php echo $nom_prov; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Teléfono:</label>
                <input type="text" name="tel_prov" class="form-control" value="<?php echo $tel_prov; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo:</label>
                <input type="email" name="mail_prov" class="form-control" value="<?php echo $mail_prov; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <?php echo ($modo == 'editar') ? 'Actualizar' : 'Agregar'; ?>
            </button>
        </form>

        <h2 class="mb-3">Lista de Proveedores</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM cat_Proveedores";
                $resultado = $conexion->query($sql);
                while($fila = $resultado->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $fila["id_prov"]; ?></td>
                    <td><?php echo $fila["nom_prov"]; ?></td>
                    <td><?php echo $fila["tel_prov"]; ?></td>
                    <td><?php echo $fila["mail_prov"]; ?></td>
                    <td>
                        <a href="proveedores.php?editar=<?php echo $fila['id_prov']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <form method="POST" action="eliminar_proveedor.php" class="d-inline" onsubmit="return confirm('¿Eliminar este proveedor?');">
                            <input type="hidden" name="id_prov" value="<?php echo $fila['id_prov']; ?>">
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
