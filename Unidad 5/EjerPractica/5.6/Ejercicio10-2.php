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
    
    $barajaEscogida = [];

    for ($i = 0; $i < 10; $i++) {
        # tambien: $palos[rand(0, 3)], me da un indice aleatorio
        $cartaEscogida = $cartas[rand(0, 9)];
        $paloEscogido = $palos[rand(0, 3)];

        $carta = "$cartaEscogida de $paloEscogido";
        
        if (!in_array($carta, $barajaEscogida)) {
            # no pongo $i, se añade directamente al array
            $barajaEscogida[] = $carta;
        } else {
            $i--;
        }
    }
    
    ?>
</body>

</html>