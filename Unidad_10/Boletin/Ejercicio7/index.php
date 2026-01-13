<?php
    if (session_status() == PHP_SESSION_NONE) session_start();

    if (isset($_SESSION['carrito'])) {
        $carrito = unserialize(base64_decode($_SESSION['carrito']));
    } else {
        $carrito = [];
    }

    include_once "funciones.php";
    $conexion = conectar("tienda");
    $consulta = $conexion->query("SELECT * FROM productos");
    $conexion = null;

    $_SESSION['carrito'] = base64_encode(serialize($carrito));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Tienda</title>
</head>
<body>
    <nav>
        <a href="carrito/carrito.php" class="boton">Ir al carrito</a>
        <a href="gestionar/gestion.php" class="boton">Gestión de la tienda</a>
    </nav>
    <h1>Tiendecita</h1>
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
                    <img src="<?= $producto->imagen ?>" alt="Imagen Producto" class="figure__img">
                </figure>
            </td>
            <td><?= $producto->precio ?> €</td>
            <td>
                <form action="añadirCarrito.php" method="post">
                    <input type="hidden" value="<?= $producto->id ?>" name="comprar">
                    <input type="submit" class="boton" value="Añadir al carrito">
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