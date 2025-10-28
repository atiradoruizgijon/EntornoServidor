<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            font-family: sans-serif;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <p>Introduce un texto para invertirlo.</p>
    <form action="" method="post">
        <input type="text" name="texto" placeholder="Texto a invertir">
        <input type="submit" value="Invertir">
    </form>
    <?php
        if (isset($_REQUEST['texto'])) {
            $texto = $_REQUEST['texto'];
            echo "<p>Texto invertido:</p>";
            echo "<p>".strrev($texto)."</p>";
        }
    ?>
</body>
</html>