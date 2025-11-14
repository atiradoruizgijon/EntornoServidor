<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            font-family: sans-serif;
            font-size: 1.1em;
            text-align: center;
        }
        h1{
            font-size: 1.8em;
        }
        table{
            border-collapse: collapse;
            border: 2px solid black;
            margin: auto;
        }
        tr{
            border: solid black 1px;
            padding: 5px;
        }
        td{
            border: solid black 1px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php
      $media = ($_REQUEST['tienda1'] + $_REQUEST['tienda2'] + $_REQUEST['tienda3']) / 3;  
    ?>
    <h1>Tabla de precios</h1>
    <table>
        <tr style="background-color: lightgreen;">
            <td>Tiendas</td>
            <td>Precios</td>
            <td>Media</td>
            <td>Dif Media</td>
        </tr>
        <tr>
            <td>Tienda 1</td>
            <td><?= $_REQUEST['tienda1'] ?></td>
            <td rowspan="3"><?= $media ?></td>
            <td><?= $media - $_REQUEST['tienda1'] ?></td>
        </tr>
        <tr>
            <td>Tienda 3</td>
            <td><?= $_REQUEST['tienda2'] ?></td>
            <td><?= $media - $_REQUEST['tienda2'] ?></td>
        </tr>
        <tr>
            <td>Tienda 3</td>
            <td><?= $_REQUEST['tienda3'] ?></td>
            <td><?= $media - $_REQUEST['tienda3'] ?></td>
        </tr>
    </table>
</body>
</html>