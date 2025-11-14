<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "funciones.php";
        // pongo varios espacios para comprobar que funciona correctamente
        $parrafo = "Hola      buenas      tardes    .     Como      estamos";

        $parrafo = explode(".", $parrafo);

        // funcion cogida del ejercicio 1, puesta en 'funciones.php'
        echo "La primera frase del párrafo tiene: ".contarPalabras($parrafo[0]);
        echo "<br>";
        echo "La segunda frase del párrafo tiene: ".contarPalabras($parrafo[1]);
    ?>
</body>
</html>