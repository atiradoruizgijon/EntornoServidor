<?php
function esCapicua($n)
{
    $nR = strrev(strval($n));

    if ($n == $nR) {
        return true;
    }
    return false;
}

function esPrimo($n)
{
    $esPrimo = true;
    for ($i = 2; $i < $n; $i++) {
        if ($n % $i == 0) {
            $esPrimo = false;
        }
    }
    // El 0 y el 1 no se consideran primos
    if (($n == 0) || ($n == 1)) {
        $esPrimo = false;
    }
    return $esPrimo;
}

function siguientePrimo($n) {
    do {
        $n++;
    } while (!esPrimo($n));

    return $n;
}

function potencia(){
    
}