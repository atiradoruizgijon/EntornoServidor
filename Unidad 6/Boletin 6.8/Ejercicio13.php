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
        
        // comprobar que termina en un punto
        if ($texto[strlen($texto) - 1] != ".") {
            echo "Tiene que terminar en un punto '.'";
        } else {
            $texto = trim($texto);
            $texto = explode(" ", $texto);
            // datos que me piden:
            $palabraLarga = "";
            $palCon3a = 0;

            for ($i = 0; $i < count($texto); $i++) {
                if (strlen($texto[$i]) > strlen($palabraLarga)) $palabraLarga = $texto[$i];
                
                // inicio el contador de vocales y lo reinicio en cada iteracion
                $contA = 0;
                for ($j = 0; $j < strlen($texto[$i]); $j++) { 
                    if ($texto[$i][$j] == "a" || $texto[$i][$j] == "A") $contA++;
                }
                if (strlen($texto[$i]) >= 8 && strlen($texto[$i])  <= 16 && $contA > 3 ) $palCon3a++;
            }

            echo "<p>La palabra más larga es de ".strlen($palabraLarga)." letras, siendo esta: $palabraLarga.</p>";
            echo "<p>Hay $palCon3a palabras de entre 8 y 16 carácteres con más de 3 'a'.</p>";
        }
    }
    ?>
</body>

</html>