<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $fichero = fopen("/archivos/lineas.txt", "r");
        while (!feof($fichero)) {
            echo fgets($fichero). "<br>";
        }
        fclose($fichero);
    ?>
</body>
</html>