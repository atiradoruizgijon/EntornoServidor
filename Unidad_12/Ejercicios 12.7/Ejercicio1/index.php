<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main class="main">

    </main>
    <?php
      if (isset($_POST['cantidad'])) {
        $url = "http://localhost/Ejerci";
        $parametros = "";
        $respuesta = @file_get_contents($url.$parametros);
        $conversion = json_decode($respuesta);

        if ($http_response_header[0] == "HTTP/1.1 200 OK") {
            echo "$convesion->cantidad_inicial $conversion->moneda_inicial ";
            echo "son ". round($conversion->resultado, 2) ."$conversion->moneda";
        } else {
            echo "Número de error: ". substr($http_response_header[0], 9, 3);
            echo "Descripción: ". substr($http_response_header[0], 13);
            echo "Respuesta completa: ". $http_response_header[0];
        }
      }
    ?>
</body>
</html>