<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $texto = "hola";
        
        $cambiado = $texto;
        echo $texto.", ";
    do {
        /*
        para entenderlo mejor.
        en la primera iteracion del while de "hola"
        obtiene "ola" y lo concatena con el primer caracter
        que en este caso es "h".
        
        En la siguiente iteracion hara lo mismo pero esta vez
        con "lah" y "o"
        */
        $cambiado = substr($cambiado, 1) . $cambiado[0];
        echo $cambiado.", ";
    } while ($cambiado !== $texto);

    ?>
</body>
</html>