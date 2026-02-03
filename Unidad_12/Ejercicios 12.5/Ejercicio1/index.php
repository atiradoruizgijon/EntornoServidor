<?php
    $APIKEY = "ffe90291caf01cda46115f46f21cd0a4";
    include_once "ciudades.php";

    if (isset($_POST['ciudad'])) {
        $lat = $ciudades[$_POST['ciudad']][0];
        $lon = $ciudades[$_POST['ciudad']][1];
        
        $datos = file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$APIKEY");
        $datos = json_decode($datos);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Inicio</title>
</head>
<body>
    <main class="main">
        <h1 class="main__title">OpenWeatherAPI</h1>
        <form class="main__form" action="" method="post">
            <p>Escoge tu ciudad:</p>
            <select class="form__select" name="ciudad">
                <?php
                // relleno el select con las ciudades
                    foreach ($ciudades as $key => $value) {
                        echo "<option value='$key'>$key</option>";
                    }
                ?>
            </select>
            <input type="submit" class="form__submit" value="Comprobar el tiempo">
        </form>
        <?php
            if (isset($_POST['ciudad'])) {
        ?>
                <h2>El tiempo en <?= $_POST['ciudad'] ?></h2>
                <section class="main__section">
                    <h4>Descripción:</h4>
                    <p><?= $datos->weather[0]->description ?></p>
                    <h4>Temperatura:</h4>
                    <!-- La temperatura viene el kelvin, hay que restarle 273 -->
                    <p><?= $datos->main->temp - 273 ?> ºC</p>
                    <h4>Sensación térmica:</h4>
                    <p><?= $datos->main->feels_like - 273 ?> ºC</p>
                    <h4>Mínima:</h4>
                    <p><?= $datos->main->temp_min - 273 ?> ºC</p>
                    <h4>Máxima:</h4>
                    <p><?= $datos->main->temp_max - 273 ?> ºC</p>
                </section>
        <?php
        // fin de la condicional
            }
        ?>
    </main>
</body>
</html>