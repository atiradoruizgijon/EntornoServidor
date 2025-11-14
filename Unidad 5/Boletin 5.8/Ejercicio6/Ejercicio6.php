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

        if (!isset($_REQUEST['cadenaCV'])) {
            // Relleno con algunos de ejemplo y tambien para hacer pruebas:
            $arrayCV = [
                // Estructura:
                // DNI => ['titulo' => 'valor, 'titulo' => 'valor']
            // '49124697D' => ['Nombre' => 'Alejandro Tirado', 'Edad' => '21'],
            // '29591768B' => ['Nombre' => 'Pablo', 'Experiencia' => '1 año']
            ];
        } else $arrayCV = unserialize(base64_decode($_REQUEST['cadenaCV']));
        

        $cadenaCV = base64_encode(serialize($arrayCV));
    ?>
    <form action="crearCV.php" method="post">
        <input type="text" name="dni" placeholder="Introduce DNI">
        <input type="hidden" name="cadenaCV" value="<?= $cadenaCV ?>">
        <input type="submit" value="Nuevo CV">
    </form>

    <form action="listaCV.php" method="get">
        <input type="hidden" name="cadenaCV" value="<?= $cadenaCV ?>">
        <input type="submit" value="Lista de CV">
    </form>
</body>
</html>