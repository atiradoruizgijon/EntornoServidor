<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_REQUEST['texto'])) {
            $texto = $_REQUEST['texto'];
            $texto = trim($texto);

            $array = explode(" ", $texto);

            if ($array[0] == $array[count($array) - 1]) echo "Verdadero";
            else echo "Falso";

            // no me funciona con esto :(
            // if (str_ends_with($texto, $array[count($array) - 1])) echo "Verdadero";
            // else echo "Falso"; 
        }
    ?>
    <form action="" method="get">
        <textarea name="texto" placeholder="Introduce tu texto" cols="40" rows="5"></textarea>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>