<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hello World</title>
</head>
<body>
    <hr>
    <?php
     echo "Hello World";
     echo "<p style=\"color: red;\">Hola</p>";
    ?>
    <hr>
    <h5>adios</h5>

    <?php
    // Comentario de una linea
    /* 
    Comentario de varias lineas
    */

    //  Variables, se inicializan con $
    $x = 24;
    $animal = "conejo";
    echo $x, "<br>", $animal;

    // Si hacemos $int + $string y el string empiece por un numero, 
    // ignorara los caracteres y se hara la suma
    $entero = 5;
    $cadena = "4hola";
    echo $entero + $cadena;

    // En apuntes explica:
    print_r(get_defined_vars());
    ?>
</body>
</html>