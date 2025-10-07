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
    <?php
    if (isset($_REQUEST['intentos'])) {
        $intentos = $_REQUEST['intentos'];
    } else {
        $intentos = 0;
    }
    ?>
    <table>
        <tr>
            <td><a href="imagen.php?cuadro=1&intentos=<?= $intentos ?>">
                    <div></div>
                </a></td>
            <td><a href="imagen.php?cuadro=2&intentos=<?= $intentos ?>">
                    <div></div>
                </a></td>
            <td><a href="imagen.php?cuadro=3&intentos=<?= $intentos ?>">
                    <div></div>
                </a></td>
        </tr>
        <tr>
            <td><a href="imagen.php?cuadro=4&intentos=<?= $intentos ?>">
                    <div></div>
                </a></td>
            <td><a href="imagen.php?cuadro=5&intentos=<?= $intentos ?>">
                    <div></div>
                </a></td>
            <td><a href="imagen.php?cuadro=6&intentos=<?= $intentos ?>">
                    <div></div>
                </a></td>
        </tr>
        <tr>
            <td><a href="imagen.php?cuadro=7&intentos=<?= $intentos ?>">
                    <div></div>
                </a></td>
            <td><a href="imagen.php?cuadro=8&intentos=<?= $intentos ?>">
                    <div></div>
                </a></td>
            <td><a href="imagen.php?cuadro=9&intentos=<?= $intentos ?>">
                    <div></div>
                </a></td>
        </tr>
    </table>
    <p>Número de intentos: <?= $intentos ?></p>
    <form action="resultado.php" method="get">
        <p>Adivina la imagen: </p>
        <input type="text" name="resultado"><br>
        <input type="hidden" name="intentos" value="<?= $intentos ?>">
        <input type="submit" value="Comprobar">
    </form>
</body>

</html>