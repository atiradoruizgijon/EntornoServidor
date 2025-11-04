<?php
session_start();

// numero par mayor
if (!isset($_SESSION['mayor'])) $_SESSION['mayor'] = PHP_INT_MIN;
else {
    // la condicional pregunta: si se ha llegado el num con isset, si es par, si es positivo y
    //  si es mayor que el actual par mayor
    if (isset($_REQUEST['num']) && $_REQUEST['num'] > 0 && $_REQUEST['num'] % 2 == 0 && $_SESSION['mayor'] < $_REQUEST['num']) {
        $_SESSION['mayor'] = $_REQUEST['num'];
    }
}
// suma de impares y calcular su media
if (!isset($_SESSION['impares'])) $_SESSION['impares'] = [];
else {
    if (isset($_REQUEST['num']) && $_REQUEST['num'] > 0 && $_REQUEST['num'] % 2 != 0) {
        $_SESSION['impares'][] = $_REQUEST['num'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>  
    <h3>Introduce numeros, se mostrará la suma de los impares y el mayor par introducido.</h3>
    <form action="" method="post">
        <input type="number" name="num" placeholder="Numero" autofocus>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if (isset($_REQUEST['num']) && $_REQUEST['num'] < 0) {
        if (isset($_SESSION['impares'])) {
            $media = 0;
            for ($i = 0; $i < count($_SESSION['impares']); $i++) { 
                $media += $_SESSION['impares'][$i];
            }
            $media /= count($_SESSION['impares']);
            echo "La media de los ". count($_SESSION['impares']) ." impares que has introducido es: $media";
        }
        if (isset($_SESSION['mayor'])) echo "<br>El mayor de los pares introducidos es: ".$_SESSION['mayor'];
    }
    ?>
</body>

</html>