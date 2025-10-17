<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a {
            display: block;
            width: 60px;
            height: 60px;
            background-color: cadetblue;
            border: 1px solid black;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            background-size: cover;
            background-image: url("kebab.jpg");
        }

        td {
            padding: 0px;
        }

        form {
            text-align: center;
            margin-top: 1em;
        }

        .mostrar {
            background-color: transparent;
            border: 1px solid rgb(255, 255, 255, 0);
        }
    </style>
</head>

<body>
    <table>
        <?php
        if (isset($_REQUEST['palabra'])) {
            if ($_REQUEST['palabra'] == "kebab") {
                echo "<table>";
                echo "<h1 style='text-align: center;'>Has ganado, era un kebab</h1>";
                for ($i = 1; $i <= 100; $i++) {
                    if ($i == 1) echo "<tr>";

                    echo "<td><a class='mostrar' href='Ejercicio4.php'></a></td>";

                    if ($i % 10 == 0) echo "</tr>";
                    if ($i % 10 == 0) echo "<tr>";
                }
                echo "</table>";
            }
        }
        if (isset($_REQUEST['intentos']) && $_REQUEST['intentos'] == 1) {
            echo "Has perdido te quedaste sin intentos.    :(";
        } else {
            // Si la palabra no se ha mandado o si se ha mandado, que no sea la acertada
            if (!isset($_REQUEST['palabra']) || $_REQUEST['palabra'] != "kebab") {
                if (isset($_REQUEST['palabra'])) echo "<h1>No has acertado</h1>";

                if (!isset($posiciones)) {
                    $posiciones = array_fill(0, 101, 0);
                    $intentos = 10;
                }
                if (isset($_REQUEST['cadenaArray'])) {
                    $posiciones = unserialize(base64_decode($_REQUEST['cadenaArray']));
                    if (isset($_REQUEST['posicion'])) {
                        $posiciones[$_REQUEST['posicion']] = 1;
                    }
                    $intentos = $_REQUEST['intentos'];
                    $intentos--;
                }

                $cadenaArray = base64_encode(serialize($posiciones));

                echo "Te quedan $intentos intentos.";

                for ($i = 1; $i <= 100; $i++) {
                    if ($i == 1) echo "<tr>";

                    if ($posiciones[$i] == 0) echo "<td><a href='Ejercicio4.php?intentos=$intentos&posicion=$i&cadenaArray=$cadenaArray'></a></td>";
                    if ($posiciones[$i] == 1) echo "<td><a class='mostrar' href=''></a></td>";

                    if ($i % 10 == 0) echo "</tr>";
                    if ($i % 10 == 0) echo "<tr>";
                }
            }
        ?>
    </table>
    <form action="" method="get">
        <label for="palabra">Adivina la imagen:</label>
        <input type="text" name="palabra">
        <input type="hidden" name="cadenaArray" value="<?= $cadenaArray ?>">
        <input type="hidden" name="intentos" value="<?= $intentos ?>">
        <input type="submit" value="Comprobar">
    </form>
<?php
        // final del else que comprueba los intentos
        }
?>
</body>

</html>