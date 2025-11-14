<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <textarea name="texto" placeholder="Texto aquí" cols="40" rows="5"></textarea>
        <input type="submit" value="Enviar">
    </form>

    <?php
    include "funciones.php";

    if (isset($_REQUEST['texto'])) {
        $texto = $_REQUEST['texto'];
        $texto = trim($texto);

        // comprobar que termina en un punto
        if ($texto[strlen($texto) - 1] != ".") {
            echo "Tiene que terminar en un punto '.'";
        } else {
            $vocales = ["a", "e", "i", "o", "u"];
            
            $datos = ['Numero de vocales' => 0, 'Numero de palabras con más de 10 letras' => 0, 'Numero de espacios' => 0];

            // recorro todo el texto buscando los espacios y las vocales
            for ($i = 0; $i < strlen($texto); $i++) {
                if ($texto[$i] == " ") $datos['Numero de espacios']++;
                // recorro el array de vocales y compruebo tanto si es mayus o minus
                for ($j = 0; $j < count($vocales); $j++) {
                    if ($texto[$i] == $vocales[$j] || $texto[$i] == strtoupper($vocales[$j])) $datos['Numero de vocales']++;
                }
            }
            $texto = explode(" ", $texto);
            // compruebo cada palabra
            $letras = 0;
            for ($i = 0; $i < count($texto); $i++) {
                if (strlen($texto[$i]) > 10) $datos['Numero de palabras con más de 10 letras']++;
            }

            foreach ($datos as $dato => $valor) {
                echo "<p>$dato: $valor</p>";
            }
        }
    }
    ?>
</body>

</html>