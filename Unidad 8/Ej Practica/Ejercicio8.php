<?php

  if (isset($_REQUEST['linea'])) {
    $fichero = fopen(__DIR__."/archivos/lineas.txt", "a");
    fputs($fichero, $_REQUEST['linea']. PHP_EOL);
    fclose($fichero);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            text-align: center;
            font-size: 1.2em;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="linea" autofocus>
        <input type="submit" value="Añadir línea.">
    </form>
    <a href="archivos/lineas.txt">Terminar</a>
</body>
</html>