<?php
    function cartas($num) {
        $palos = ["Bastos", "Oros", "Espadas", "Copas"];
        $valores = ["As", "Dos", "Tres", "Cuatro", "Cinco", "Seis", "Siete", "Sota", "Caballo", "Rey"];
        $baraja = [];

        for ($i = 0; $i < count($palos); $i++) { 
            for ($j = 0; $j < count($valores); $j++) { 
                $baraja[] = $valores[$j]." de ".$palos[$i];
            }
        }

        $cartas = [];
        for ($i = 0; $i < $num; $i++) {
            $carta = $baraja[rand(0, 39)];
            // compruebo que este
            if (!in_array($carta, $cartas)) {
                $cartas[] = $carta;
            } else {
                $i--;
            }
        }

        return $cartas;
    }
?>