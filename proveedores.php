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
<html>
<head>
    <meta charset="UTF-8">
    <title>Proveedores</title>
</head>
<body>
    <h1>Gestión de Proveedores</h1>

    <h2><?php echo ($modo == "editar") ? "Editar Proveedor" : "Agregar Proveedor"; ?></h2>
    <form method="POST" action="guardar_proveedor.php">
        <?php if ($modo == "editar") { ?>
            <input type="hidden" name="id_prov" value="<?php echo $id_prov; ?>">
        <?php } ?>
        Nombre: <input type="text" name="nom_prov" value="<?php echo $nom_prov; ?>" required><br>
        Teléfono: <input type="text" name="tel_prov" value="<?php echo $tel_prov; ?>" required><br>
        Correo: <input type="email" name="mail_prov" value="<?php echo $mail_prov; ?>" required><br>
        <input type="submit" value="<?php echo ($modo == 'editar') ? 'Actualizar' : 'Agregar'; ?>">
    </form>

    <h2>Lista de Proveedores</h2>
    <table border="1">
        <tr>
            <th>ID</th><th>Nombre</th><th>Teléfono</th><th>Correo</th><th>Acciones</th>
        </tr>
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
                <a href="proveedores.php?editar=<?php echo $fila['id_prov']; ?>">Editar</a>
                |
                <form method="POST" action="eliminar_proveedor.php" style="display:inline;" onsubmit="return confirm('¿Eliminar este proveedor?');">
                    <input type="hidden" name="id_prov" value="<?php echo $fila['id_prov']; ?>">
                    <input type="submit" value="Eliminar">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
