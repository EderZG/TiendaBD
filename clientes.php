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
</head>
<body>
    <h1>Clientes</h1>

    <h2>Agregar nuevo cliente</h2>
    <form method="POST" action="insertar_cliente.php">
        Nombre: <input type="text" name="nom_cli" required><br>
        Teléfono: <input type="text" name="tel_cli" required><br>
        Fecha de nacimiento: <input type="date" name="fna_cli" required><br>
        Sexo (M/F): <input type="text" name="sex_cli" maxlength="1" required><br>
        <input type="submit" value="Agregar">
    </form>

    <h2>Lista de clientes</h2>
<table border="1">
    <tr>
        <th>ID</th><th>Nombre</th><th>Teléfono</th><th>Fecha de nacimiento</th><th>Sexo</th><th>Acciones</th>
    </tr>
    <?php while($fila = $resultado->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $fila["id_cli"]; ?></td>
        <td><?php echo $fila["nom_cli"]; ?></td>
        <td><?php echo $fila["tel_cli"]; ?></td>
        <td><?php echo $fila["fna_cli"]; ?></td>
        <td><?php echo $fila["sex_cli"]; ?></td>
        <td>
        <form method="POST" action="eliminar_cliente.php" onsubmit="return confirm('¿Seguro que deseas eliminar este cliente?');">
       		 <input type="hidden" name="id_cli" value="<?php echo $fila['id_cli']; ?>">
                 <input type="submit" value="Eliminar">
        </form>
       	<form method="GET" action="editar_cliente.php">
   		 <input type="hidden" name="id_cli" value="<?php echo $fila['id_cli']; ?>">
   		 <input type="submit" value="Editar">
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
