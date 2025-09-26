<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     $variable = $valor1 ?? $valor2;
     // si $valor1, que es una variable, no esta definida/es null, se le da un valor
     // por defecto, en este caso $valor2, que puede ser una variable o lo que sea.

     // Ejemplo:
     // Cogemos un nombre de un formulario, puede que el nombre no se haya
     // introducido, entonces se le pondrá anónimo:
     $nombre = $_GET['nombre'] ?? "Anónimo";
    ?>
</body>
</html>