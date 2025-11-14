<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    $a = new SplFixedArray(10);
    $a[0] = 843;
    $a[2] = 11;
    $a[6] = 1372;
    // Los valores del array que no se han inicializado son NULL
    // haciendolo como si fuera Java
    foreach ($a as $elemento) {
        var_dump($elemento);
        echo "<br>";
    }
    ?>
</body>

</html>