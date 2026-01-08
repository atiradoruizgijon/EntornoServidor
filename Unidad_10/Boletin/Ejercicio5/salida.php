<?php
    if (isset($_POST['ind'])) {
        include_once "conectar.php";
        $conexion = conectar();

        $conexion->exec("UPDATE productos SET stock=stock-$_POST[numero] WHERE codigo='$_POST[ind]'");
        $conexion = null;
        header('Location: index.php');
    }
    
    if (!isset($_POST['salida'])) {
        header('Location: index.php');
    }
    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/modificar.css">
        <title>Salida de mercancía</title>
    </head>
    <body>
        <h1>Salida de mercancía</h1>
        <hr>
        <h2>¿Cuántas unidades van a salir? (Se restarán al stock actual)</h2>
        <form action="" method="post">
            <input type="number" name="numero" min=1 max=1000 step="1" required>
            <input type="hidden" name="ind" value="<?= $_POST['salida'] ?>">
            <input type="submit" value="Sacar mercancía">
        </form>
        <a href="index.php">Volver al inicio</a>
    </body>
    </html>