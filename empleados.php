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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Gestión de Empleados</h1>

        <h2 class="mb-3"><?php echo ($modo == "editar") ? "Editar Empleado" : "Agregar Empleado"; ?></h2>
        <form method="POST" action="guardar_empleado.php" class="mb-5">
            <?php if ($modo == "editar") { ?>
                <input type="hidden" name="id_emp" value="<?php echo $id_emp; ?>">
            <?php } ?>
            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nom_emp" class="form-control" value="<?php echo $nom_emp; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Teléfono:</label>
                <input type="text" name="tel_emp" class="form-control" value="<?php echo $tel_emp; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Usuario:</label>
                <input type="text" name="usr_emp" class="form-control" value="<?php echo $usr_emp; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña:</label>
                <input type="number" name="pas_emp" class="form-control" value="<?php echo $pas_emp; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <?php echo ($modo == 'editar') ? 'Actualizar' : 'Agregar'; ?>
            </button>
        </form>

        <h2 class="mb-3">Lista de Empleados</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
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
                        <a href="empleados.php?editar=<?php echo $fila['id_emp']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <form method="POST" action="eliminar_empleado.php" class="d-inline" onsubmit="return confirm('¿Eliminar este empleado?');">
                            <input type="hidden" name="id_emp" value="<?php echo $fila['id_emp']; ?>">
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
