<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilos.css">
        <title>Mantenimiento de clientes</title>
    </head>
    <body>
        <h1>Mantenimiento de Clientes</h1>
        <div class="paginado-container">
            <form action="" method="post" class="paginado">
                <input type="submit" name="retroceder" value="Retroceder">
            </form>
            <p><?= $pagina ?> / <?= $totalPaginas ?></p>
            <form action="" method="post" class="paginado">
                <input type="submit" name="avanzar" value="Avanzar">
            </form>
        </div>
        <table>
            <tr id="cabecera">
                <td>DNI</td>
                <td>Nombre</td>
                <td>Dirección</td>
                <!-- para dejar espacio para los botones: -->
                <td colspan="3">Teléfono</td>
            </tr>
            <?php
            $productos = $data['productos'];
            foreach ($productos as $key=>$producto) {
                ?>
                <tr>
                    <td><?= $producto->codigo ?></td>
                    <td><?= $producto->descripcion ?></td>
                    <td><?= $producto->precioVenta ?></td>
                    <td><?= $producto->precioCompra ?></td>
                    <td><?= $producto->precioCompra - $producto->precioVenta ?></td>
                    <td><?= $producto->stock ?></td>
                    <td><form action="../controller/eliminarProducto.php" method="post">
                        <input class="borrar botonSubmit" type="submit" value="❌ Eliminar">
                        <input name="eliminar" type="hidden" value="<?= $producto->id ?>">
                    </form></td>
                    <td><form action="../controller/modificarProducto.php" method="post">
                        <input class="modificar botonSubmit" type="submit" value="✏️ Modificar">
                        <input name="modificar" type="hidden" value="<?= $producto->id ?>">
                    </form></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <form action="" method="post">
                <td><input placeholder="DNI" type="text" name="dni" required></td>
                <td><input placeholder="Nombre" type="text" name="nombre" required></td>
                <td><input placeholder="Dirección" type="text" name="direccion" required></td>
                <td><input placeholder="Teléfono" type="text" name="tlf" required></td>
                <td colspan="2">
                        <input class="submit botonSubmit" type="submit" value="✅ Nuevo Producto">
                    </td>
                </form>
            </tr>
    </table>
</body>
</html>