<?php
function dameTarjeta($perfil)
{
    $arrayAdmin = [
        [111, 222, 333, 444, 555],
        [666, 777, 888, 999, 121],
        [212, 313, 131, 414, 141],
        [151, 515, 616, 161, 717],
        [171, 181, 818, 191, 919]
    ];
    $arrayUser = [
        [333, 111, 444, 666, 784],
        [313, 999, 543, 777, 222],
        [414, 121, 141, 131, 161],
        [212, 717, 151, 919, 616],
        [515, 171, 191, 818, 181]
    ];

    if ($perfil == "admin") {
        return $arrayAdmin;
    } else if ($perfil == "user") {

        return $arrayUser;
    }
}

function compruebaClave($array, $coords, $valor)
{
    for ($i = 0; $i < count($array); $i++) {
        for ($j = 0; $j < count($array[$i]); $j++) {
            if ($valor == $array[$i][$j] && $coords == [$i, $j]) {
                return true;
            }
        }
    }
    return false;
}

function imprimeTarjeta($tarjeta) {
    $tabla = "<table>
    <tr>
    <td></td>
    <td>A</td>
    <td>B</td>
    <td>C</td>
    <td>D</td>
    <td>E</td>
    </tr>";
    foreach ($tarjeta as $key => $value) {
        $tabla .= "<tr><td>".($key + 1)."</td>";
        foreach ($value as $key => $numeros) {
            $tabla .= "<td>$numeros</td>";
        }
        $tabla .= "</>";
    }
    return $tabla;
}
