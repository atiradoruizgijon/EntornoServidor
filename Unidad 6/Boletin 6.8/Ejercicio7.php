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

        $texto = "Esto es un texto de prueba";
        echo "Texto: $texto";

        if (isset($_REQUEST['palabra'])) {
            $palabra = $_REQUEST['palabra'];
            $palabra = trim($palabra);

            if (esPalabra($palabra)) {
                $array = explode(" ", $texto);
                for ($i = 0 ; $i < count($array); $i++) {
                    if ($array[$i] == $palabra) {
                        echo "<p>La palabra está dentro del texto</p>";
                        // paro el for
                        $i == count($array);
                    }
                }
            } else {
                echo "No has introducido una palabra.";
            }
        }
    ?>

    <form action="" method="post">
        <input type="text" name="palabra">
        <input type="submit" value="Comprobar">
    </form>
</body>
</html>