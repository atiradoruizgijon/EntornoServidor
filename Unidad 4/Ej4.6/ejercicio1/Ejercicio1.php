<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- despues de unos segundos te devuelve a la pagina que tu pongas -->
    <!-- <meta http-equiv="Refresh" content="2;url=Ejercicio1.php"> -->
    <title>Document</title>
    <style>
        div{
            background-color: lightblue;
            border: 3px solid black;
            width: 160px;
            height: 160px;
        }
        body{
            text-align: center;
        }
        table{
            margin: auto;
            border-collapse: collapse;
        }
        td, tr{
            padding: 0px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td><a href="imagen.php?cuadro=1"><div></div></a></td>
            <td><a href="imagen.php?cuadro=2"><div></div></a></td>
            <td><a href="imagen.php?cuadro=3"><div></div></a></td>
        </tr>
        <tr>
            <td><a href="imagen.php?cuadro=4"><div></div></a></td>
            <td><a href="imagen.php?cuadro=5"><div></div></a></td>
            <td><a href="imagen.php?cuadro=6"><div></div></a></td>
        </tr>
        <tr>
            <td><a href="imagen.php?cuadro=7"><div></div></a></td>
            <td><a href="imagen.php?cuadro=8"><div></div></a></td>
            <td><a href="imagen.php?cuadro=9"><div></div></a></td>
        </tr>
    </table>
    <form action="resultado.php" method="post">
        <p>Adivina la imagen: </p>
        <input type="text" name="resultado"><br>
        <input type="submit" value="Comprobar">
    </form>
</body>
</html>