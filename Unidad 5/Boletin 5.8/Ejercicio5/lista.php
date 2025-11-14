<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html {
            font-family: sans-serif;
            font-size: 20px;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            text-align: center;
        }

        td {
            border: 1px solid black;
            padding: 10px;
        }

        tr:first-child {
            background-color: lightblue;
        }

        .rojo {
            color: red;
        }
    </style>
</head>

<body>
    <table>
        <?php

        $lista = unserialize(base64_decode($_REQUEST['cadenaArray']));

        // Si el array esta vacio
        if (count($lista) == 0) {
            echo "No has introducido ningún dato. Introduce primero datos.<br>";
            echo "<a href='Ejercicio5.php'>Volver</a>";
        } else {
            // Primera fila
            echo "<tr>
            <td>Nombre</td>
            <td>Edad</td>
            <td>Años de experiencia</td>
            <td>Correo electrónico</td>
            </tr>";

            for ($i = 0; $i < count($lista); $i++) {
                if ($lista[$i]['edad'] > 29) echo "<tr class='rojo'>";
                else echo "<tr>";
                foreach ($lista[$i] as $persona => $dato) {
                    echo "<td>$dato</td>";
                }
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>

</html>