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
        img{
            width: 200px;
            height: auto;
        }
        p{
            font-size: 1.6em;
        }
    </style>
</head>
<body>
    <h2>Cálculo del volumen de un cilindro.</h2>
    <img src="imagenes/cilindro.png" alt="cilindro">
    <?php
     // Lo almaceno todo en una variable para que no sea muy largo.
     // V = PI*r*r*altura
     $radio = ($_REQUEST['diametro'] / 2);
     $volumen = $_REQUEST['altura'] * $radio * $radio * M_PI; 
     
    ?>
    <p>El volumen del cilindro es de <?= $volumen ?></p>
</body>
</html>