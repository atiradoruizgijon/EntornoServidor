<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Ejercicio 3
    Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle do-while. -->
    <?php
    $i = 0;
    do {
        echo ($i += 5)." ";
    } while ($i <= 95);
    ?>
</body>
</html>