<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align: center;
            font-size: 1.6rem;
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
            margin: auto;
        }

        td,
        tr {
            border: solid 1px black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <h2>Lotería, escoge tus números:</h2>
    <form action="resultado.php" method="post">
        <table>
        <?php
        $total = 1;
        for ($i = 0; $i < 10; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 5; $j++) {
                ?>
            <td><input type="checkbox" name="<?= $total ?>" value="<?= $total ?>"><?= $total++ ?></td>
        <?php
            }
            echo "</tr>";
        }
        ?>
        </table>
        <input type="submit" value="Comprobar">
    </form>
</body>

</html>