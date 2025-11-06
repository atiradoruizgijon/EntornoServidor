<?php
    $color = "white";
    
    if (isset($_REQUEST['selec'])) {
        $color = $_REQUEST['selec'];
        setcookie("color", $color, strtotime("+3 days"));
    } else if (isset($_COOKIE['color'])) {
        $color = $_COOKIE['color'];
    }

    if (isset($_REQUEST['borrar'])) {
        setcookie("color", "", -1);
        unset($color);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            background-color: <?=$color?>;
            border: 2px solid black;
            height: 300px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div>
        Hola buenas tardes
    </div>
    <form action="" method="post">
        Color de fondo:
        <input type="color" name="selec"> <br>
        <input type="submit" value="Enviar">
    </form>
    <form action="" method="post">
        <input type="hidden" name="borrar" value="1">
        <input type="submit" value="Borrar Cookie">
    </form>
    <?php
      if (!isset($color)) {
        echo "<p>No has seleccionado ningún color.</p>";
      }  
    ?>
</body>
</html>