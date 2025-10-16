<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <h2>Aquí tienes tu pedido:</h2>
    <?php
        $pedido = unserialize(base64_decode($_REQUEST['pedido']));

        foreach ($pedido as $value) {
            foreach ($value as $value) {
                echo "$value ";
            }
            echo "<br>";
        }
    ?>
</body>
</html>