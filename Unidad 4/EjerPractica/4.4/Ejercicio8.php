<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            border: solid black 4px;
            margin: auto;
        }

        td,
        tr {
            border: black solid 2px;
            padding: 10px;
        }

        * {
            font-family: sans-serif;
            font-size: 1.2rem;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Ejercicio 8
Muestra la tabla de multiplicar de un número introducido por teclado. 
El resultado se debe mostrar en una tabla (<table> en HTML). -->
    <?php
    if (!isset($_REQUEST['numero'])) {

    ?>
        <form action="Ejercicio8.php" method="get">
            <p>Introduce el número que quieres multiplicar:</p><br>
            <input type="number" name="numero" min="0" autofocus>
            <input type="submit" value="Multiplicar">
        </form>
    <?php
    } else {
    ?>
        <table>
            <tr style="background-color: lightgreen; font-weight: 900;">
                <td>Número</td>
                <td>-</td>
                <td>Multiplicador</td>
                <td>Resultado</td>
            </tr>
            <?php
            $numero = $_REQUEST['numero'];
            for ($i = 1; $i < 11; $i++) {
                if ($i % 2 != 0) {
            ?>
                    <tr>
                        <td style="font-weight: 700;"><?= $numero ?></td>
                        <td>X</td>
                        <td><?= $i ?></td>
                        <td><?= $numero * $i ?></td>
                    </tr>
                <?php
                } else {
                ?>
                    <tr>
                        <td style="font-weight: 700; background-color: lightgrey;"><?= $numero ?></td>
                        <td style="background-color: lightgrey;">X</td>
                        <td style="background-color: lightgrey;"><?= $i ?></td>
                        <td style="background-color: lightgrey;"><?= $numero * $i ?></td>
                    </tr>
        <?php
                }
            }
        }
        ?>
        </table>
</body>

</html>