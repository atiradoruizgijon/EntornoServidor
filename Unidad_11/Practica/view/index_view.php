<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../view/css/estilos.css">
        <title>Mantenimiento de Almacen</title>
    </head>
    <body>
        <h1>Mantenimiento de Almacen</h1>
        <div class="paginado-container">
            <form action="" method="post" class="paginado">
                <input type="submit" name="primeraPagina" value="Primera Página">
            </form>
            <form action="" method="post" class="paginado">
                <input type="submit" name="retroceder" value="Retroceder">
            </form>
            <p><?= $pagina ?> / <?= $totalPaginas ?></p>
            <form action="" method="post" class="paginado">
                <input type="submit" name="avanzar" value="Avanzar">
            </form>
            <form action="" method="post" class="paginado">
                <input type="submit" name="ultimaPagina" value="Última Página">
            </form>
        </div>
        <table>
            <tr id="cabecera">
                <td>Código</td>
                <td>Descripción</td>
                <td>Precio de Venta</td>
                <td>Precio de Compra</td>
                <td>Margen</td>
                <td>Stock</td>
                <!-- para dejar espacio para los botones: -->
                <td colspan="3">Teléfono</td>
            </tr>
            <?php
            foreach ($data['productos'] as $key => $producto) {
                ?>
                <tr>
                    <td><?= $producto->getCodigo() ?></td>
                    <td><?= $producto->getDescripcion() ?></td>
                    <td><?= $producto->getPrecioCompra() ?></td>
                    <td><?= $producto->getPrecioVenta() ?></td>
                    <td><?= $producto->getMargenPrecio() ?></td>
                    <td><?= $producto->getStock() ?></td>
                    <td><form action="../controller/eliminarProducto.php" method="post">
                        <input class="borrar botonSubmit" type="submit" value="❌ Eliminar">
                        <input name="eliminar" type="hidden" value="<?= $producto->getCodigo() ?>">
                    </form></td>
                    <td><form action="../controller/modificarProducto.php" method="post">
                        <input class="modificar botonSubmit" type="submit" value="✏️ Modificar">
                        <input name="modificar" type="hidden" value="<?= $producto->getCodigo() ?>">
                    </form></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <form action="../controller/addProducto.php" method="post">
                <td><input placeholder="Codigo" type="text" name="codigo" required></td>
                <td><input placeholder="Descripcion" type="text" name="descripcion" required></td>
                <td><input placeholder="Precio de Compra" type="number" min=1 max=10000 step="0.01" name="precioCompra" required></td>
                <td><input placeholder="Precio de Venta" type="number" min=1 max=10000 step="0.01" name="precioVenta" required></td>
                <td></td>
                <td><input placeholder="Stock" type="number" name="stock" required></td>
                <td colspan="2">
                        <input class="submit botonSubmit" type="submit" value="✅ Nuevo Producto">
                    </td>
                </form>
            </tr>
    </table>
</body>
</html>