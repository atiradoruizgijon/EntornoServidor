<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            margin: auto;
            font-size: 1.6em;
            border-collapse: collapse;
        }

        td,
        tr {
            border: 2px solid black;
            padding: 10px;
        }

        * {
            font-family: sans-serif;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_REQUEST['bloque']) && isset($_REQUEST['piso'])) {
        $bloque = $_REQUEST['bloque'];
        $piso = $_REQUEST['piso'];
        
        echo "<h2>Has llamado al piso $piso del bloque $bloque</h2>";
    }
    ?>
    <table>
        <tr>
            <td>Nº de Bloque</td>
            <td>Nº de Piso</td>
            <td>Llamar</td>
        </tr>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 7; $j++) {
        ?>
                <form action="" method="post">
                    <tr>
                        <td>Bloque <?= $i ?></td>
                        <td>Piso <?= $j ?></td>
                        <td><input type="submit" value="Llamar"></td>
                    </tr>
                    <input type="hidden" name="bloque" value="<?= $i ?>">
                    <input type="hidden" name="piso" value="<?= $j ?>">
                </form>
        <?php
            }
        }

        ?>
    </table>
</body>

</html>