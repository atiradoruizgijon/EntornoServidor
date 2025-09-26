<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            font-size: 1em;
            font-family: sans-serif;
            text-align: center;
        }
        table{
            border: 2px solid black;
            border-collapse: collapse;
            margin: auto;
        }
        td{
            border: 1px solid grey;
            padding: 2px;
        }
        tr{
            border: 1px solid grey;
            padding: 2px;
        }
    </style>
</head>
<body>
    <p>Número de la lotería:</p>
    <table>
        <tr>
            <td><?= rand(1, 49)?></td>
            <td><?= rand(1, 49)?></td>
            <td><?= rand(1, 49)?></td>
            <td><?= rand(1, 49)?></td>
            <td><?= rand(1, 49)?></td>
            <td><?= rand(1, 49)?></td>
            <td><?= rand(1, 999)?></td>
        </tr>
        <tr>
            <td><?= $_REQUEST['num1'] ?></td>
            <td><?= $_REQUEST['num2'] ?></td>
            <td><?= $_REQUEST['num3'] ?></td>
            <td><?= $_REQUEST['num4'] ?></td>
            <td><?= $_REQUEST['num5'] ?></td>
            <td><?= $_REQUEST['num6'] ?></td>
            <td><?= $_REQUEST['numS'] ?></td>
        </tr>
    </table>
</body>
</html>