<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: sans-serif;
            text-align: center;
        }
        div {
            width: fit-content;
            margin: auto;
        }
        img {
            display: block;
            width: 100%;
        }
        table {
            margin: auto;
            font-size: 2em;
        }
        td {
            padding: 10px;
            border: 1px solid black;
        }
        p {
            text-align: center;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <?php
      $personaSeleccionada = unserialize(base64_decode($_REQUEST['personaSelec'])); 
      $compatibles = unserialize(base64_decode($_REQUEST['cadenaArray']));
      $indice = $_REQUEST['parejaSelec'];
    ?>
    <h1>¡Felicidades <?= $personaSeleccionada['nombre'] ?> y <?= $compatibles[$indice]['nombre'] ?> han formado una pareja!</h1>
    <div>
        <img src="corazon.png" alt="Imagen Corazon">
    </div>

    <p>Aquí la parejita:</p>
    <table>
        <tr>
        <?php
        echo "<td>".$personaSeleccionada['nombre']."</td>";
        foreach ($personaSeleccionada as $caracteristica => $datos) {
            if ($datos == "het") echo "<td>Heterosexual</td>";
            if ($datos == "hom") echo "<td>Homosexual</td>";
            if ($datos == "bis") echo "<td>Bisexual</td>";
            if ($datos == "m") echo "<td>Mujer</td>";
            if ($datos == "h") echo "<td>Hombre</td>";
        }
        echo "</tr><tr>";
        echo "<td>".$compatibles[$indice]['nombre']."</td>";
            if ($compatibles[$indice]['sexo'] == "m") echo "<td>Mujer</td>";
            if ($compatibles[$indice]['sexo'] == "h") echo "<td>Hombre</td>";
            if ($compatibles[$indice]['orientacion']) echo "<td>Heterosexual</td>";
            if ($compatibles[$indice]['orientacion'] == "hom") echo "<td>Homosexual</td>";
            if ($compatibles[$indice]['orientacion'] == "bis") echo "<td>Bisexual</td>";
        ?>
        
        </tr>
    </table>
</body>
</html>