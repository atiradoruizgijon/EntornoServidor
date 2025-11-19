<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once "Factura.php";

        $factura1 = new Factura("11/12/2025");

        $factura1->añadeProducto("Steam Controller", 119.99, 1);
        $factura1->añadeProducto("Monitor", 599, 1);
        $factura1->añadeProducto("Raton", 60, 2);

        echo $factura1->imprimeFactura();
    ?>
</body>
</html>