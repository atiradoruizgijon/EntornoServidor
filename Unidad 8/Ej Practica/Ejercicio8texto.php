<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            text-align: center;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <?php
        $fichero = fopen(__DIR__."/archivos/lineas.txt", "r");
        while (!feof($fichero)) {
            echo fgets($fichero). "<br>";
        }
        fclose($fichero);
    ?>
</body>
</html>