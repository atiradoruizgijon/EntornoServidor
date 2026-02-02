<?php
// key de la API: ffe90291caf01cda46115f46f21cd0a4
    $APIKEY = "ffe90291caf01cda46115f46f21cd0a4";
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
    </head>
    <body>
    <main>
        <!-- Utrera 37.18727781171898, -5.778502849091468 -->
        <h1>Tiempo en Utrera:</h1>
        <hr>
        <?php
            $lat = 37.18727781171898;
            $lon = -5.778502849091468;
            $datos = file_get_contents("https://api.openweathermap.org/data/3.0/onecall?lat=37.18727781171898&lon=-5.778502849091468&appid=$APIKEY");
            echo "<h2>Datos en bruto (JSON):</h2><br>";
            echo "$datos";
            echo "<br><hr>";
            echo "<h2>Datos:</h2>";

            $datos = json_decode($datos);
            foreach ($datos as $key => $value) {
                echo "<p>$value</p>";
            }
        ?>
    </main>
</body>
</html>