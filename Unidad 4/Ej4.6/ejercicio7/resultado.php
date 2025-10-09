<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-size: 1.1em;
            font-family: sans-serif;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            margin: auto;
            border: 1px solid black;
            box-shadow: 0px 0px 50px lightslategray;
        }

        td,
        tr {
            padding: 10px;
        }

        tr:nth-child(odd) {
            background-color: lightblue;
        }

        tr:nth-child(even) {
            background-color: lightyellow;
        }

        .acertados {
            color: greenyellow;
        }

        .fallados {
            color: red;
        }

        .nada {
            color: grey;
        }

        .noAcertados {
            color: black;
        }
    </style>
</head>

<body>
    <?php
    $numeroPremiado1 = rand(1, 50);
    $numeroPremiado2 = rand(1, 50);
    $numeroPremiado3 = rand(1, 50);
    $numeroPremiado4 = rand(1, 50);
    $numeroPremiado5 = rand(1, 50);
    $numeroPremiado6 = rand(1, 50);

    $aciertos = 0;
    if (isset($_REQUEST[$numeroPremiado1])) {
        $aciertos++;
        $acertado1 = $_REQUEST[$numeroPremiado1];
    } else {
        $acertado1 = -1;
    }
    if (isset($_REQUEST[$numeroPremiado2])) {
        $aciertos++;
        $acertado2 = $_REQUEST[$numeroPremiado2];
    } else {
        $acertado2 = -1;
    }
    if (isset($_REQUEST[$numeroPremiado3])) {
        $aciertos++;
        $acertado3 = $_REQUEST[$numeroPremiado3];
    } else {
        $acertado3 = -1;
    }
    if (isset($_REQUEST[$numeroPremiado4])) {
        $aciertos++;
        $acertado4 = $_REQUEST[$numeroPremiado4];
    } else {
        $acertado4 = -1;
    }
    if (isset($_REQUEST[$numeroPremiado5])) {
        $aciertos++;
        $acertado5 = $_REQUEST[$numeroPremiado5];
    } else {
        $acertado5 = -1;
    }
    if (isset($_REQUEST[$numeroPremiado6])) {
        $aciertos++;
        $acertado6 = $_REQUEST[$numeroPremiado6];
    } else {
        $acertado6 = -1;
    }

    $seleccionados = 0;
    for ($i = 0; $i < count($_REQUEST); $i++) {
        $seleccionados++;
    }
    if ($seleccionados > 6) {
        echo "Has hecho trampa, solo puedes seleccionar 6.";
    } else {

    ?>
        <table>
            <?php

            $total = 1;
            for ($i = 0; $i < 10; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 5; $j++) {
                    if ($total == $acertado1 || $total == $acertado2 || $total == $acertado3 || $total == $acertado4 || $total == $acertado5 || $total == $acertado6) {
                        echo '<td class="acertados">', $total, '</td>';
                    } else if ($total == 0) {
                        echo '<td class="noAcertados">', $total, '</td>';
                    } else if ($total == $numeroPremiado1 || $total == $numeroPremiado2 || $total == $numeroPremiado3 || $total == $numeroPremiado4 || $total == $numeroPremiado5 || $total == $numeroPremiado6) {
                        echo '<td class="fallados">', $total, '</td>';
                    } else {
                        echo '<td class="nada">', $total, '</td>';
                    }
                    $total++;
                }
                echo "</tr>";
            }
            ?>
        </table>
        <h2>Aciertos: <?= $aciertos ?></h2>
    <?php

        switch ($aciertos) {
            case 4:
                echo "Has conseguido tu dinero de vuelta.";
                break;
            case 5:
                echo "Has conseguido 30€.";
                break;
            case 6:
                echo "Has conseguido 100€.";
                break;
        }

        // Final del else:
    }
    ?>
</body>

</html>