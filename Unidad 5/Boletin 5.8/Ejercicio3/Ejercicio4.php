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
    </style>
</head>

<body>
    <table>
        <?php
        for ($i = 1; $i <= 100; $i++) {
            if ($i == 1) echo "<tr>";
        ?>

            <td><a href="Ejercicio4.php"></a></td>

        <?php
            if ($i % 10 == 0) echo "</tr>";
            if ($i % 10 == 0) echo "<tr>";
        }
        ?>
        <!-- <img src="kebab.jpg" alt="Imagen"> -->
    </table>
</body>

</html>