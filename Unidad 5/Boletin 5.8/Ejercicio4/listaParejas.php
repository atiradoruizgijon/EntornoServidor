<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html {
            font-family: sans-serif;
            font-size: 20px
        }

        ul {
            list-style-type: none;
            border: 2px solid #000;
            padding: 15px;
            width: fit-content
        }

        form {
            display: block;
            width: fit-content
        }

        ul li {
            margin: 10px 5px
        }

        table {
            font-size: 1em;
            border-collapse: collapse
        }

        td {
            border: 2px solid #000;
            padding: 10px
        }
        tr:nth-child(odd) {
            background-color: lightblue;
        }

        main>div {
            width: fit-content;
            display: flex;
            gap: 20px;
            flex-direction: column
        }

        main {
            width: fit-content;
            display: flex;
            gap: 20px;
            justify-content: center;
            margin: auto;
        }

        tr:first-child {
            background-color: #d3d3d3
        }

        .terminar__input {
            padding: 20px;
            font-size: 1.5em
        }

        .terminar {
            display: block;
            width: 100%;
            text-align: center
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Lista de parejas</h2>
    <main>
        <?php
        $personas = unserialize(base64_decode($_REQUEST['cadenaArray']));

        $cadenaArray = base64_encode(serialize($personas));

        // Si no se ha seleccionado a una persona mostramos la tabla normal.
        if (!isset($_REQUEST['personaSelec'])) {
            echo "<table>";
            echo "<tr>
            <td>Nombre</td>
            <td>Sexo</td>
            <td>Orientación</td>
            </tr>";
            for ($i = 0; $i < count($personas); $i++) {
                echo "<tr>";
                foreach ($personas[$i] as $persona => $datos) {
                    if ($datos == "het") echo "<td>Heterosexual</td>";
                    else if ($datos == "hom") echo "<td>Homosexual</td>";
                    else if ($datos == "bis") echo "<td>Bisexual</td>";
                    else if ($datos == "m") echo "<td>Mujer</td>";
                    else if ($datos == "h") echo "<td>Hombre</td>";
                    else echo "<td>$datos</td>";
                }
                $personaSelec = base64_encode(serialize($personas[$i]));
                echo "<td>
                <form action='' method='post'>
                    <input type='hidden' name='cadenaArray' value='<?= $cadenaArray ?>'>
                    <input type='hidden' name='personaSelec' value='<?= " . $personaSelec . " ?>'>
                    <input type='submit' value='Parejas'>
                </form>
                </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            $personaSeleccionada = unserialize(base64_decode($_REQUEST['personaSelec']));

            echo "<table>";
            echo "<tr>
            <td>Nombre</td>
            <td>Sexo</td>
            <td>Orientación</td>
            </tr>";

            for ($i = 0; $i < count($personas); $i++) {
                // Para pintar de rojo:
                if ($personaSeleccionada == $personas[$i]) {
                    echo "<tr style='color: red;'>";
                } else {
                    echo "<tr>";
                }
                
                foreach ($personas[$i] as $persona => $datos) {
                    if ($datos == "het") echo "<td>Heterosexual</td>";
                    else if ($datos == "hom") echo "<td>Homosexual</td>";
                    else if ($datos == "bis") echo "<td>Bisexual</td>";
                    else if ($datos == "m") echo "<td>Mujer</td>";
                    else if ($datos == "h") echo "<td>Hombre</td>";
                    else echo "<td>$datos</td>";
                }
                $personaSelec = base64_encode(serialize($personas[$i]));
                echo "<td>
                <form action='' method='post'>
                    <input type='hidden' name='cadenaArray' value='<?= $cadenaArray ?>'>
                    <input type='hidden' name='personaSelec' value='<?= " . $personaSelec . " ?>'>
                    <input type='submit' value='Parejas'>
                </form>
                </td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>

    </main>
</body>

</html>