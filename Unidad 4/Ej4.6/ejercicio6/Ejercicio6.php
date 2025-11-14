<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- despues de unos segundos te devuelve a la pagina que tu pongas -->
    <!-- <meta http-equiv="Refresh" content="2;url=Ejercicio1.php"> -->
    <title>Document</title>
    <style>
        div {
            background-color: lightblue;
            border: 3px solid black;
            width: 160px;
            height: 160px;
        }

        body {
            text-align: center;
        }

        table {
            margin: auto;
            border-collapse: collapse;
        }

        td,
        tr {
            padding: 0px;
        }
    </style>
</head>

<body>
    <table>
        <?php
        if (isset($_REQUEST['intentos'])) {
            $intentos = $_REQUEST['intentos'];
        } else {
            $intentos = 0;
        }
        $cuadro = 0;
        for ($i = 1; $i < 4; $i++) {
            echo "<tr>";
            for ($j = 1; $j < 4; $j++) {
        ?>
                <td><a href="imagen.php?cuadro=<?= ++$cuadro ?>&intentos=<?= $intentos ?>"><div></div></a></td>
        <?php
            }
            echo "</tr>";
        }

        ?>
    </table>
    <p>Número de intentos: <?= $intentos ?></p>
    <form action="resultado.php" method="post">
        <p>Adivina la imagen: </p>
        <input type="text" name="resultado"><br>
        <input type="hidden" name="intentos" value="<?= $intentos ?>">
        <input type="submit" value="Comprobar">
    </form>
</body>

</html>