<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Hola <?= $_REQUEST['nombre'] ?>, tienes <?= $_REQUEST['edad']?> <br>
    Dentro de <?= $_REQUEST['anios'] ?> tendras <?= $_REQUEST['edad'] + $_REQUEST['anios'] ?>
    <?php
    //  header("Location: enlace.html") me redirecciona a esta pagina
    ?>
</body>
</html>