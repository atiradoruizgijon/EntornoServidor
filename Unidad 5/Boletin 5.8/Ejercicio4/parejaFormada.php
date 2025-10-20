<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 {
            font-family: sans-serif;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
      $persona1 = unserialize(base64_decode($_REQUEST['personaSelec'])); 
      $persona2 = unserialize(base64_decode($_REQUEST['parejaSelec'])); 
    ?>
    <h1>¡Felicidades <?= $persona1['nombre'] ?> y <?= $persona2['nombre'] ?> han formado una pareja!</h1>
</body>
</html>