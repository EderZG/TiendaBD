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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Agregar Producto</h2>
        <form method="POST" action="guardar_producto.php" class="mb-5">
            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nom_prod" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Precio de compra:</label>
                <input type="number" step="0.01" name="precio_compra_prod" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Precio de venta:</label>
                <input type="number" step="0.01" name="prec_prod" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Cantidad:</label>
                <input type="number" name="cantidad_prod" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha de caducidad:</label>
                <input type="date" name="fec_cad_prod" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Proveedor:</label>
                <select name="id_prove_prod" class="form-select" required>
                    <option value="">--Selecciona--</option>
                    <?php while($prov = $proveedores->fetch_assoc()) { ?>
                        <option value="<?php echo $prov['id_prov']; ?>">
                            <?php echo $prov['nom_prov']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Categoría:</label>
                <select name="id_cate_prod" class="form-select" required>
                    <option value="">--Selecciona--</option>
                    <?php while($cat = $categorias->fetch_assoc()) { ?>
                        <option value="<?php echo $cat['id_cat']; ?>">
                            <?php echo $cat['desc_cat']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Marca:</label>
                <select name="id_marca_prod" class="form-select" required>
                    <option value="">--Selecciona--</option>
                    <?php while($marca = $marcas->fetch_assoc()) { ?>
                        <option value="<?php echo $marca['id_mark']; ?>">
                            <?php echo $marca['desc_mark']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>

        <h2 class="mb-3">Lista de Productos</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Cantidad</th>
                    <th>Caducidad</th>
                    <th>Proveedor</th>
                    <th>Categoría</th>
                    <th>Marca</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($prod = $productos->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $prod['id_prod']; ?></td>
                    <td><?php echo $prod['nom_prod']; ?></td>
                    <td><?php echo $prod['precio_compra_prod']; ?></td>
                    <td><?php echo $prod['precio_venta_prod']; ?></td>
                    <td><?php echo $prod['cantidad_prod']; ?></td>
                    <td><?php echo $prod['fec_cad_prod']; ?></td>
                    <td><?php echo $prod['id_prove_prod']; ?></td>
                    <td><?php echo $prod['id_cate_prod']; ?></td>
                    <td><?php echo $prod['id_marca_prod']; ?></td>
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
