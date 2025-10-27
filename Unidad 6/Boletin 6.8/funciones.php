<?php
function contarPalabras($texto)
{
    $texto = trim($texto);
    $palabras = 0;

    do {
        $palabras++;
        $texto = trim(strstr($texto, " "));
    } while ($texto != "");

    return $palabras;
}

function esPalabra($palabra) {
    if (contarPalabras($palabra) != 1) return true;
    return false;
}
