<?php
    include_once "Zona.php";
    if (session_status() == PHP_SESSION_NONE) session_start();

    if (!isset($_SESSION['zonas'])) {
        $zonas = [
            new Zona("Zona Principal", 1000, 20),
            new Zona("Zona Compra-Venta", 200, 35),
            new Zona("Zona VIP", 25, 50)
        ];
    } else {
        $zonas = unserialize(base64_decode($_SESSION['zonas']));
    }

    if (isset($_REQUEST['comprar']) && $_REQUEST['comprar'] != "") {
        $zonas[$_REQUEST['indice']]->vender($_REQUEST['comprar']);
    }

    $_SESSION['zonas'] = base64_encode(serialize($zonas));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Número de entradas vendidas: <?= Zona::getTotalVendidas() ?></h1>
        <table>
            <tr>
                <td>Zona</td>
                <td>Entradas disponibles</td>
                <td>Precio</td>
                <td>Comprar</td>
            </tr>
            <?php
                foreach ($zonas as $key => $value) {
                    ?>
                    <tr>
                        <td><?= $value->getNombre() ?></td>
                        <td><?= $value->getEntradas() ?></td>
                        <td><?= $value->getPrecio() ?> €</td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="indice" value="<?= $key ?>">
                                <input type="number" name="comprar" placeholder="Nº de entradas" min=1 max="<?= $value->getEntradas() ?>">
                                <input type="submit" value="Comprar">
                            </form>
                        </td>
                    </tr>
                    <?php
                    // final del foreach
                }
            ?>
        </table>
    </main>
</body>
</html>