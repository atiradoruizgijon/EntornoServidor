<?php
    include_once "../funciones.php";
    $conexion = conectar("tienda");

    $consulta = $conexion->query("SELECT * FROM productos");

    $conexion = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Gestión</title>
</head>
<body>
    <h1>Gestion</h1>
    <table>
        <tr>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Imagen</td>
            <td>Precio</td>
            <td>Añadir al carrito</td>
        </tr>
    <?php
        while ($producto = $consulta->fetchObject()) {
    ?>
        <tr>
            <td><?= $producto->nombre ?></td>
            <td><?= $producto->descripcionCorta ?></td>
            <td>
                <figure class="table__figure">
                    <img src="../<?= $producto->imagen ?>" alt="Imagen Producto" class="figure__img">
                </figure>
            </td>
            <td><?= $producto->precio ?>€</td>
            <td>
                <form action="modificar.php" method="post">
                    <input type="hidden" value="<?= $producto->id ?>" name="modificar">
                    <input type="submit" class="boton modificar" value="Añadir al carrito">
                </form>
            </td>
            <td>
                <form action="eliminar.php" method="post">
                    <input type="hidden" value="<?= $producto->id ?>" name="eliminar">
                    <input type="submit" class="boton eliminar" value="Eliminar">
                </form>
            </td>
        </tr>        
    <?php
    // termina el while
        }
    ?>
    </table>
</body>
</html>