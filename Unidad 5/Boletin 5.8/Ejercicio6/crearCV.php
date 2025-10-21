<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-size: 1.1em;
            font-family: sans-serif;
            text-align: center;
        }
        form {
            margin: 1em auto;
        }
    </style>
</head>
<body>
    <?php
        $arrayCV = unserialize(base64_decode($_REQUEST['cadenaCV']));
      
        if (isset($_REQUEST['dni'])) {
            if (isset($_REQUEST['titulo'])) {
                $arrayCV[$_REQUEST['dni']][$_REQUEST['titulo']] = $_REQUEST['valor'];
            }
        }
        $cadenaCV = base64_encode(serialize($arrayCV));
    ?>
    <form action="" method="post">
        <input type="text" placeholder="Titulo" name="titulo">
        <input type="text" placeholder="Valor" name="valor">
        <input type="hidden" name="dni" value="<?= $_REQUEST['dni'] ?>">
        <input type="hidden" name="cadenaCV" value="<?= $cadenaCV ?>">
        <input type="submit" value="Añadir valor">
    </form>
    <form action="Ejercicio6.php" method="post">
        <input type="hidden" name="cadenaCV" value="<?= $cadenaCV ?>">
        <input type="submit" value="Volver">
    </form>
</body>
</html>