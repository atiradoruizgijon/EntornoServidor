<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    
    if (!isset($_SESSION['carrito'])) {
        header('Location: ../index.php');
        exit();
    }
        
    $carrito = unserialize(base64_decode($_SESSION['carrito']));
    if (empty($carrito)) {
        header('Location: ../index.php');
        exit();
    }    

    $_SESSION['carrito'] = base64_encode(serialize($carrito));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <style>
        .eliminar {
            background-color: red;
        }
    </style>
    <title>Carrito</title>
</head>
<body>
    <table>
        <tr>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Imagen</td>
            <td>Precio</td>
            <td>Añadir al carrito</td>
        </tr>
        <?php
            foreach ($carrito as $key => $producto) {
        ?>
            <tr>
                <td><?= $producto['nombre'] ?></td>
                <td>
                    <figure class="table__figure">
                        <img src="../<?= $producto['imagen'] ?>" alt="Imagen" class="figure__img">
                    </figure>
                </td>
                <td><?= $producto['descripcionCorta'] ?></td>
                <td><?= $producto['precio'] ?>€</td>
                <td>
                    <form action="eliminarCarrito.php" method="post">
                        <input type="hidden" name="eliminar" value="<?= $key ?>">
                        <input class="boton eliminar" type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php
        // fin del bucle   
            }
        ?>
    </table>
</body>
</html>