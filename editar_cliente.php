<?php
include("conexion.php");

$id = $_GET["id_cli"];

$sql = "SELECT * FROM cat_Clientes WHERE id_cli = $id";
$resultado = $conexion->query($sql);
$cliente = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Editar Cliente</h1>
        <form method="POST" action="actualizar_cliente.php">
            <input type="hidden" name="id_cli" value="<?php echo $cliente['id_cli']; ?>">

            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nom_cli" class="form-control" value="<?php echo $cliente['nom_cli']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Teléfono:</label>
                <input type="text" name="tel_cli" class="form-control" value="<?php echo $cliente['tel_cli']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento:</label>
                <input type="date" name="fna_cli" class="form-control" value="<?php echo $cliente['fna_cli']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Sexo (M/F):</label>
                <input type="text" name="sex_cli" class="form-control" maxlength="1" value="<?php echo $cliente['sex_cli']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="clientes.php" class="btn btn-secondary ms-2">Volver</a>
        </form>
    </div>
</body>
</html>
