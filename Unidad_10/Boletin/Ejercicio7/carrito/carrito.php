<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    
    if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
        header('Location: ../index.php');
    }

    $carrito = unserialize(base64_decode($_SESSION['carrito']));
    print_r($carrito);
    $_SESSION['carrito'] = base64_encode(serialize($carrito));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Carrito</title>
</head>
<body>
    <table>
        <?php
            foreach ($carrito as $key => $producto) {
        ?>
            <tr>
                <td><?= $producto['nombre'] ?></td>
                <td><?= $producto['imagen'] ?></td>
                <td><?= $producto['descripcionCorta'] ?></td>
                <td><?= $producto['precio'] ?></td>
                <td>
                    <form action="eliminarCarrito.php" method="post">
                        <input type="hidden" name="eliminar" value="<?= $producto['id'] ?>">
                        <input class="eliminar" type="submit" value="Eliminar">
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