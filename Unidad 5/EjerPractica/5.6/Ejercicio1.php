<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td, tr{
            border: solid black 1px;
            text-align: center;
            font-size: 2rem;
        }
        tr:nth-child(even){
            background-color: lightgrey;
        }
        table{
            margin: auto;
        }
        </style>
</head>
<body>
    <table>
        <tr>
            <td>Numero</td>
            <td>Cuadrado</td>
            <td>Cubo</td>
        </tr>
        <?php
      for ($i = 0; $i < 20; $i++) { 
        $numero[$i] = rand(0, 100);
        $cuadrado[$i] = $numero[$i] ** 2;
        $cubo[$i] = $numero[$i] ** 3;

        echo "<tr>
        <td>$numero[$i]</td>
        <td>$cuadrado[$i]</td>
        <td>$cubo[$i]</td>
        </tr>";
      }
    ?>
    </table>
</body>
</html>