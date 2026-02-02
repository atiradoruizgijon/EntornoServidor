<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/pandelAdmin.css">
    <title>Administración</title>
</head>
<body>
    <main class="main-admin">
        <nav class="main__nav-admin">
            <a class="nav__btt-admin" href="../Controller/addProducto.php">Añadir Producto</a>
        </nav>
        <table class="table-admin">
            <thead class="table__header-admin">
                <tr>
                    <th class="thead__th">Nombre</th>
                    <th class="thead__th">Imagen</th>
                    <th class="thead__th">Descripción</th>
                    <th class="thead__th">Precio</th>
                </tr>
                <tbody class="table__body-admin">
                    <?php
                        foreach ($data['productos'] as $key => $producto) {
                    ?>
                        <tr class="tbody__tr-admin">
                            <td><?= $producto->getNombre() ?></td>
                            <td>
                                <figure class="td__figure">
                                    <img class="figure__img" src="<?= $producto->getImagen() ?>" alt="Imagen de <?= $producto->getNombre() ?>">
                                </figure>
                            </td>
                            <td><?= $producto->getDescripcionCorta() ?></td>
                            <td><?= $producto->getPrecio() ?> €</td>
                            <td>
                                <form class="td__form" action="../Controller/eliminarProducto.php" method="post">
                                    <input type="hidden" name="eliminar" value="<?= $producto->getId() ?>">
                                    <input class="td__btt" type="submit" value="Eliminar">
                                </form>
                                <form class="td__form" action="../Controller/modificarProducto.php" method="post">
                                    <input type="hidden" name="modificar" value="<?= $producto->getId() ?>">
                                    <input class="td__btt" type="submit" value="Modificar">
                                </form>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>    
                </tbody>
            </thead>
        </table>
    </main>
</body>
</html>