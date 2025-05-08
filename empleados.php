<?php
include("conexion.php");

$modo = "insertar";
$id_emp = "";
$nom_emp = "";
$tel_emp = "";
$usr_emp = "";
$pas_emp = "";

if (isset($_GET["editar"])) {
    $modo = "editar";
    $id_emp = $_GET["editar"];
    $sql = "SELECT * FROM cat_Empleados WHERE id_emp = $id_emp";
    $resultado = $conexion->query($sql);
    $empleado = $resultado->fetch_assoc();
    $nom_emp = $empleado["nom_emp"];
    $tel_emp = $empleado["tel_emp"];
    $usr_emp = $empleado["usr_emp"];
    $pas_emp = $empleado["pas_emp"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Empleados</title>
</head>
<body>
    <h1>Gestión de Empleados</h1>

    <h2><?php echo ($modo == "editar") ? "Editar Empleado" : "Agregar Empleado"; ?></h2>
    <form method="POST" action="guardar_empleado.php">
        <?php if ($modo == "editar") { ?>
            <input type="hidden" name="id_emp" value="<?php echo $id_emp; ?>">
        <?php } ?>
        Nombre: <input type="text" name="nom_emp" value="<?php echo $nom_emp; ?>" required><br>
        Teléfono: <input type="text" name="tel_emp" value="<?php echo $tel_emp; ?>" required><br>
        Usuario: <input type="text" name="usr_emp" value="<?php echo $usr_emp; ?>" required><br>
        Contraseña: <input type="number" name="pas_emp" value="<?php echo $pas_emp; ?>" required><br>
        <input type="submit" value="<?php echo ($modo == 'editar') ? 'Actualizar' : 'Agregar'; ?>">
    </form>

    <h2>Lista de Empleados</h2>
    <table border="1">
        <tr>
            <th>ID</th><th>Nombre</th><th>Teléfono</th><th>Usuario</th><th>Contraseña</th><th>Acciones</th>
        </tr>
        <?php
        $sql = "SELECT * FROM cat_Empleados";
        $resultado = $conexion->query($sql);
        while($fila = $resultado->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $fila["id_emp"]; ?></td>
            <td><?php echo $fila["nom_emp"]; ?></td>
            <td><?php echo $fila["tel_emp"]; ?></td>
            <td><?php echo $fila["usr_emp"]; ?></td>
            <td><?php echo $fila["pas_emp"]; ?></td>
            <td>
                <a href="empleados.php?editar=<?php echo $fila['id_emp']; ?>">Editar</a>
                |
                <form method="POST" action="eliminar_empleado.php" style="display:inline;" onsubmit="return confirm('¿Eliminar este empleado?');">
                    <input type="hidden" name="id_emp" value="<?php echo $fila['id_emp']; ?>">
                    <input type="submit" value="Eliminar">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
<form action="index.php" method="get">
    <button type="submit">Regresar al Menú Principal</button>
</form>
</body>
</html>
