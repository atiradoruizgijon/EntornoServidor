<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $puntuacion = [
        "As" => "11 puntos",
        "3" => "10 puntos",
        "Rey" => "4 puntos",
        "Caballo" => "3 puntos",
        "Sota" => "2 puntos",
    ];
    $cartas = ["As", "Rey", "Caballo", "Sota", "7", "6", "5", "4", "3", "2"];
    $palos = ["Oros", "Bastos", "Espadas", "Copas"];

    for ($i = 0; $i < 10; $i++) {
        if (!isset($barajaEscogidas)) {
            $barajaEscogida = [array_rand($cartas, 1), array_rand($palos, 1)];
        }
        $cartaEscogida = array_rand($cartas, 1);
        $paloEscogido = array_rand($palos, 1);
        if (in_array($cartaEscogida, $barajaEscogida) && in_array($paloEscogido, $barajaEscogida)) {
            $i--;
        } else {
            $barajaEscogida = [$cartaEscogida, $paloEscogido];
        }
    }
    ?>
</body>

</html>