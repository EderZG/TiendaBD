<?php
include("conexion.php");

$sql = "SELECT * FROM cat_Clientes";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Clientes</h1>

        <h2>Agregar nuevo cliente</h2>
        <form method="POST" action="insertar_cliente.php" class="mb-5">
            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nom_cli" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Teléfono:</label>
                <input type="text" name="tel_cli" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento:</label>
                <input type="date" name="fna_cli" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Sexo (M/F):</label>
                <input type="text" name="sex_cli" maxlength="1" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
        </form>

        <h2>Lista de clientes</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Fecha de nacimiento</th>
                    <th>Sexo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($fila = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $fila["id_cli"]; ?></td>
                    <td><?php echo $fila["nom_cli"]; ?></td>
                    <td><?php echo $fila["tel_cli"]; ?></td>
                    <td><?php echo $fila["fna_cli"]; ?></td>
                    <td><?php echo $fila["sex_cli"]; ?></td>
                    <td>
                        <form method="POST" action="eliminar_cliente.php" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este cliente?');">
                            <input type="hidden" name="id_cli" value="<?php echo $fila['id_cli']; ?>">
                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                        </form>
                        <form method="GET" action="editar_cliente.php" class="d-inline">
                            <input type="hidden" name="id_cli" value="<?php echo $fila['id_cli']; ?>">
                            <input type="submit" value="Editar" class="btn btn-warning btn-sm">
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
