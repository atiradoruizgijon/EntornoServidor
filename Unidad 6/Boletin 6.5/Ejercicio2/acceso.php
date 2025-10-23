<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // unset ($array[0]);
    // lo que hace es borrar el valor dentro de un array en el indice indicado

    include 'controlAcceso.php';

    $coords = unserialize(base64_decode($_REQUEST['coords']));

    if (!isset($_REQUEST['perfil'])) {
        header('location:Ejercicio2.php');
    }

    $tarjeta = dameTarjeta($_REQUEST['perfil']);

    if (compruebaClave($tarjeta, $coords, $_REQUEST['contraseña'])) {
        echo "<p>Acceso permitido</p>";
    } else {
        echo "<p>Acceso denegado</p>";
        echo "<a href='Ejercicio2.php'>Pincha aquí para volver</a>";
    }
    ?>

</body>

</html>