<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="Refresh" content="2;url=Ejercicio1.php">
    <?php
        $cuadro = "cuadro".$_REQUEST['cuadro']
    ?>
    <style>
        body{
            text-align: center;
        }
        table{
            border-collapse: collapse;
            margin: auto;
            background-image: url(rubik.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
        div{
            border: 3px solid black;
            width: 160px;
            height: 160px;
            background-color: lightblue;
        }
        td, tr{
            padding: 0px;
        }
        /* vaya inventada he tenido, pero me ha funcionado */
        .<?= $cuadro ?>{
            display: none;
        }
    </style>
    </head>
    <body>
    <table>
        <tr>
            <td><div class="cuadro1"></div></td>
            <td><div class="cuadro2"></div></td>
            <td><div class="cuadro3"></div></td>
        </tr>
        <tr>
            <td><div class="cuadro4"></div></td>
            <td><div class="cuadro5"></div></td>
            <td><div class="cuadro6"></div></td>
        </tr>
        <tr>
            <td><div class="cuadro7"></div></td>
            <td><div class="cuadro8"></div></td>
            <td><div class="cuadro9"></div></td>
        </tr>
    </table>
</body>
</html>