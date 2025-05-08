<?php
include("conexion.php");

$id = $_GET["id_cli"];

$sql = "SELECT * FROM cat_Clientes WHERE id_cli = $id";
$resultado = $conexion->query($sql);
$cliente = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form method="POST" action="actualizar_cliente.php">
        <input type="hidden" name="id_cli" value="<?php echo $cliente['id_cli']; ?>">
        Nombre: <input type="text" name="nom_cli" value="<?php echo $cliente['nom_cli']; ?>" required><br>
        Teléfono: <input type="text" name="tel_cli" value="<?php echo $cliente['tel_cli']; ?>" required><br>
        Fecha de nacimiento: <input type="date" name="fna_cli" value="<?php echo $cliente['fna_cli']; ?>" required><br>
        Sexo (M/F): <input type="text" name="sex_cli" value="<?php echo $cliente['sex_cli']; ?>" maxlength="1" required><br>
        <input type="submit" value="Actualizar">
    </form>
    <br>
    <a href="clientes.php">← Volver</a>
</body>
</html>
