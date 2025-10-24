<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_REQUEST['texto'])) {
            $texto = $_REQUEST['texto'];
            $texto = explode(" ", $texto);
            echo "El número de palabras de tu texto es de ".count($texto). " palabras";
        }
    ?>
    <form action="" method="post">
        <textarea type="text" name="texto" placeholder="Introduce tu texto"></textarea>
        <input type="submit" value="Contar">
    </form>
</body>
</html>