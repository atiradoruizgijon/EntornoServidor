<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    $estatura = ["Rosa" => 168, "Ignacio" => 175, "Daniel" => 172, "Rubén" => 182];

    # Aqui imprimo los indices del array aunque sean textos.
    foreach ($estatura as $nombre => $altura) {
        echo "$nombre: $altura <br>";
    }
    ?>

</body>

</html>