<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      function contarPalabras($texto) {
            $texto = trim($texto);
            $palabras = 0;

            do {
                $palabras++;
                $texto = trim(strstr($texto, " "));
            } while ($texto != "");

            return $palabras;
        }

        $parrafo = "Hola buenas tardes. Como estamos";

        $parrafo = explode(".", $parrafo);

        echo "La primera frase del párrafo tiene: ".contarPalabras($parrafo[0]);
        echo "<br>";
        echo "La segunda frase del párrafo tiene: ".contarPalabras($parrafo[1]);
    ?>
</body>
</html>