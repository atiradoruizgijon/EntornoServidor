<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo-loteria.css">
    <title>Document</title>
</head>

<body>
    <?php
    // Lo paso como referencia para cambiarlo en vez de devolver un array
    function combinacion(&$array)
    {
        foreach ($array as $key => $value) {
            if ($array[$key] == "") {
                $array[$key] == rand(1, 49);
            }
        }
    }

    function imprimeApuesta($array, $cadena = "Combinación generada para la Primitiva") {
        echo "<table>";
        echo "<tr><td colspan='6'>$cadena</td></tr>";
        echo "<tr>";
        foreach ($array as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
        echo "</table>";
    }

    // Recojo los numeros introducidos
    $numElegidos = $_REQUEST['numEle'];

    print_r($numElegidos);
    
    combinacion($numElegidos);
    
    print_r($numElegidos);
    // Generar un numero de serie si no se ha introducido ninguno
    if ($_REQUEST['numSerie'] == "") $numSerie = rand(1, 999);
    else $numSerie = $_REQUEST['numSerie'];

    if ($_REQUEST['titulo'] == "") imprimeApuesta($numElegidos);
    else imprimeApuesta($numElegidos, $_REQUEST['titulo']);

    echo "<p>Nº Serie: $numSerie</p>";
    ?>
</body>

</html>