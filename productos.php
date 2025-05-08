<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("conexion.php");

$marcas = $conexion->query("SELECT * FROM cat_Marcas");
$categorias = $conexion->query("SELECT * FROM cat_Categorias");
$proveedores = $conexion->query("SELECT * FROM cat_Proveedores");
$productos = $conexion->query("SELECT * FROM cat_Productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
</head>
<body>
    <h2>Agregar Producto</h2>
    <form method="POST" action="guardar_producto.php">
        Nombre:
        <input type="text" name="nom_prod" required><br>

        Precio de compra:
        <input type="number" step="0.01" name="precio_compra_prod" required><br>

        Precio de venta:
        <input type="number" step="0.01" name="prec_prod" required><br>

        Cantidad:
        <input type="number" name="cantidad_prod" required><br>

        Fecha de caducidad:
        <input type="date" name="fec_cad_prod" required><br>

        Proveedor:
        <select name="id_prove_prod" required>
            <option value="">--Selecciona--</option>
            <?php while($prov = $proveedores->fetch_assoc()) { ?>
                <option value="<?php echo $prov['id_prov']; ?>">
                    <?php echo $prov['nom_prov']; ?>
                </option>
            <?php } ?>
        </select><br>

        Categoría:
        <select name="id_cate_prod" required>
            <option value="">--Selecciona--</option>
            <?php while($cat = $categorias->fetch_assoc()) { ?>
                <option value="<?php echo $cat['id_cat']; ?>">
                    <?php echo $cat['desc_cat']; ?>
                </option>
            <?php } ?>
        </select><br>

        Marca:
        <select name="id_marca_prod" required>
            <option value="">--Selecciona--</option>
            <?php while($marca = $marcas->fetch_assoc()) { ?>
                <option value="<?php echo $marca['id_mark']; ?>">
                    <?php echo $marca['desc_mark']; ?>
                </option>
            <?php } ?>
        </select><br>

        <input type="submit" value="Agregar">
    </form>

    <h2>Lista de Productos</h2>
    <table border="1">
        <tr>
            <th>ID</th><th>Nombre</th><th>Precio Compra</th><th>Precio Venta</th><th>Cantidad</th><th>Caducidad</th><th>Proveedor</th><th>Categoría</th><th>Marca</th>
        </tr>
        <?php
        while ($prod = $productos->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$prod['id_prod']}</td>";
            echo "<td>{$prod['nom_prod']}</td>";
            echo "<td>{$prod['precio_compra_prod']}</td>";
            echo "<td>{$prod['precio_venta_prod']}</td>";
            echo "<td>{$prod['cantidad_prod']}</td>";
            echo "<td>{$prod['fec_cad_prod']}</td>";
            echo "<td>{$prod['id_prove_prod']}</td>";
            echo "<td>{$prod['id_cate_prod']}</td>";
            echo "<td>{$prod['id_marca_prod']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

