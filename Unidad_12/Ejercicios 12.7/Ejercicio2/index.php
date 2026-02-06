<?php
    if (isset($_POST['num'])) {
        $url = "http://localhost/Ejercicios_PHP_Libro/Unidad_12/Ejercicios%2012.7/Ejercicio2/api.php";
        $parametro = "?num=". $_REQUEST['num'];
        $cartas = @file_get_contents($url.$parametro);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: sans-serif;
        }
    </style>
    <title>Cartas</title>
</head>
<body>
    <main class="main">
        <h1>Elige la cantidad de cartas que quieres.</h1>
        <form action="" method="post" class="main__form">
            <input type="number" name="num" class="form__input">
            <input type="submit" value="Enviar" class="form__submit">
        </form>
        <section class="main__section">
            <?php
                if ($http_response_header[0] == "HTTP/1.1 200 OK") {
                    if (isset($_POST['num'])) {
                        $cartas = json_decode($cartas);
                        echo "<h2 class='section__title'>Cartas</h2>";
                        foreach ($cartas as $key => $carta) {
                            echo "<p>$carta</p>";
                        }
                    }
                } else {
                    echo "Número de error: ". substr($http_response_header[0], 9, 3);
                    echo "<br>Descripción: ". substr($http_response_header[0], 13);
                    echo "<br>Respuesta completa: ". $http_response_header[0];
                }
            ?>
        </section>
    </main>
</body>
</html>