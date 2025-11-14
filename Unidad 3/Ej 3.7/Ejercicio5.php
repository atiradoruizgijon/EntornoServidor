<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cilindro</title>
    <style>
        *{
            font-family: sans-serif;
            text-align: center;
        }
        p{
            font-size: 1.6em;
        }
    </style>
</head>
<body>
    <?php
     // Lo almaceno todo en una variable para que no sea muy largo.
     // V = PI*r*r*altura
     $radio = ($_REQUEST['diametro'] / 2);
     $volumen = $_REQUEST['altura'] * $radio * $radio * M_PI;
     // 1 L = 1000 cm3
     $min = ($volumen / 1000) / $_REQUEST['caudal'];
     $horas = $min / 60;
     $horas = intval($horas);
     $min = $min % 60;
    ?>
    <p>El volumen del cilindro es de <?= $volumen ?> cm<sup>3</sup></p>
    <p>Lo que tardará en llenarse el cilindro será: <?= $horas ?> horas y <?= $min ?> minutos</p>
</body>
</html>