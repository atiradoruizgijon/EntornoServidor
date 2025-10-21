<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: sans-serif;
            font-size: 1.1em;
        }

        table {
            border-collapse: collapse;
            margin: auto;
        }

        td {
            padding: 10px;
            border: 1px solid black;
        }

        tr:nth-child(odd) {
            background-color: whitesmoke;
        }

        a {
            color: burlywood;
            text-shadow: 1px 1px black;
            text-decoration: underline;
        }

        a:hover {
            color: blue;
            background-color: cyan;
            cursor: pointer;
        }

        h1 {
            text-align: center;
        }

        div {
            width: 20%;
            margin: auto;
        }

        span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php

    $arrayCV = unserialize(base64_decode($_REQUEST['cadenaCV']));

    if (empty($arrayCV)) {
        echo "<p>No has introducido ningún DNI.</p>";
        echo "<a href='Ejercicio6.php'>Volver</a>";
    } else {

        $arrayCV = unserialize(base64_decode($_REQUEST['cadenaCV']));

        $cadenaCV = base64_encode(serialize($arrayCV));

        if (isset($_REQUEST['dni'])) {

            $dni = $_REQUEST['dni'];
            echo "<h1>Curriculum del DNI: $dni</h1>";

            echo "<div>";
            foreach ($arrayCV[$dni] as $titulo => $valor) {
                echo "<p><span>$titulo</span>: $valor</p>";
            }
            echo "</div>";
        } else {
            # code...
    ?>
            <h1>Lista de Curriculums, selecciona un DNI para ver el Curriculum</h1>
            <table>
            <?php
            $contador = 1;

            foreach ($arrayCV as $dni => $datos) {
                if ($contador % 10 == 0 || $contador == 1) echo "<tr>";

                echo "<td><a href='listaCV.php?dni=$dni&cadenaCV=$cadenaCV'>$dni</a></td>";

                if ($contador % 10 == 0) echo "</tr>";
                $contador++;
            }
        }
            ?>
            </table>
        <?php
    // Final del else
    }

        ?>

</body>

</html>