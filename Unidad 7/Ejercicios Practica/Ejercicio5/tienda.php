<?php
session_start();

$productos = [
    ["Milan P1", 1, "css/img/boliAzul1.png"],
    ["Bic Negro", 0.5, "css/img/boliNegro1.png"],
    ["Pilot G-2 Rojo", 1.2, "css/img/boliRojo1.png"],
    ["Vball Azul", 0.8, "css/img/boliAzul2.png"],
    ["Bic Verde", 0.6, "css/img/boliVerde1.png"]
];
// indice para, con unset, quitar el producto del carrito
if (isset($_REQUEST['quitar'])) {
    unset($_SESSION['carrito'][$_REQUEST['quitar']]);
    if (empty($_SESSION['carrito'])) {
        session_destroy();
    }
}
if (isset($_REQUEST['indice'])) {
    $escogido = $productos[$_REQUEST['indice']];

    if (isset($_SESSION['carrito'])) {
        // busco en el carrito el producto por el nombre, si está
        // guarda en una variable el indice.
        $carrito = $_SESSION['carrito'];
        foreach ($carrito as $key => $value) {
            if ($value[0] == $escogido[0]) $encontrado = $key;
        }
    }

    // si ya esta en el carrito le añado una unidad en el carrito
    if (!empty($_SESSION['carrito']) && isset($encontrado)) {
        // añado una unidad al carrito
        $_SESSION['carrito'][$encontrado][3]++;
    } else {
        $_SESSION['carrito'][] = [$escogido[0], $escogido[1], $escogido[2], 1];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Tienda Bolígrafos</title>
</head>

<body>
    <?php
    // lista con los productos para comprar
    echo "<ul> <li>Productos</li>";
    foreach ($productos as $ind => $producto) {
        echo "<li>";
    ?>
        <img src="<?= $producto[2] ?>" alt="Bolígrafo">
        <p><?= $producto[0] ?></p>
        <p>Precio: <?= $producto[1] ?> €</p>
        <form action="" method="post">
            <input type="hidden" name="indice" value="<?= $ind ?>">
            <input type="submit" value="Comprar">
        </form>
        <?php
    }
    echo "</li>";
    echo "</ul>";

    // carrito
    if (isset($_SESSION['carrito'])) {
        $carrito = $_SESSION['carrito'];

        echo "<ul> <li>Carrito</li>";
        foreach ($carrito as $ind => $producto) {
            echo "<li>";
        ?>
            <img src="<?= $producto[2] ?>" alt="Bolígrafo">
            <p><?= $producto[0] ?></p>
            <p>Precio: <?= $producto[1] ?> €</p>
            <p>Unidades: <?= $producto[3] ?></p>
            <form action="" method="post">
                <input type="hidden" name="quitar" value="<?= $ind ?>">
                <input type="submit" value="Quitar">
            </form>
    <?php
            echo "</li>";
        }
        echo "</ul>";
    }

    ?>
</body>

</html>