<?php
// key de la API: ffe90291caf01cda46115f46f21cd0a4
    $APIKEY = "ffe90291caf01cda46115f46f21cd0a4";
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prueba de la API</title>
    </head>
    <body>
    <main>
        <!-- Utrera 37.18727781171898, -5.778502849091468 -->
        <h1>Tiempo en Utrera:</h1>
        <hr>
        <?php
            $lat = 37.18727781171898;
            $lon = -5.778502849091468;
            $datos = file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=37.18727781171898&lon=-5.778502849091468&appid=$APIKEY");
            echo "<h2>Datos en bruto (JSON):</h2><br>";
            echo "<pre>";print_r($datos);echo "</pre>";
            echo "<br><hr>";
            echo "<h2>Datos:</h2>";

            $datos = json_decode($datos);
            print_r($datos);

            echo "<p>".$datos->coord->lon."</p>";
            echo "<p>".$datos->coord->lat."</p>";
            echo "<p>".$datos->weather[0]->description."</p>";
            echo "<p>".$datos->main->temp."</p>";
            echo "<p>".$datos->main->feels_like."</p>";
            echo "<p>".$datos->main->temp_min."</p>";
            echo "<p>".$datos->main->temp_max."</p>";
            echo "<p>".$datos->name."</p>";
            echo "<p>".$datos->sys->country."</p>";
        ?>
    </main>
</body>
</html>