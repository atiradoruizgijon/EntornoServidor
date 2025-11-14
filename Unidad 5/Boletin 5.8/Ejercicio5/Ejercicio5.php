<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html {
            font-family: sans-serif;
            font-size: 20px;
        }
        form:first-child ul {
            margin: auto;
            list-style-type: none;
            display: block;
            width: fit-content;
            border: 2px solid black;
            padding: 5px;
        }
        ul li {
            margin: 5px;
        }
    </style>
</head>

<body>
    <?php
        if (isset($_REQUEST['cadenaArray'])) {
            $lista = unserialize(base64_decode($_REQUEST['cadenaArray']));
            $lista[] = ['nombre' => $_REQUEST['nombre'], 'edad' => $_REQUEST['edad'], 'anios' => $_REQUEST['anios'], 'correo' => $_REQUEST['correo']];
        } else {
            $lista = [   
                // ['nombre' => 'Juan', 'edad' => 50, 'anios' => 30, 'correo' => 'juan@gmail.com'],
                // ['nombre' => 'Diego', 'edad' => 22, 'anios' => 2, 'correo' => 'dieguito@gmail.com'],
                // ['nombre' => 'Fátima', 'edad' => 20, 'anios' => 0, 'correo' => 'fatima@gmail.com']
            ];
        }

        $cadenaArray = base64_encode(serialize($lista));
    ?>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
            </li>
            <li>
                <label for="edad">Edad:</label>
                <input type="number" name="edad" required>
            </li>
            <li>
                <label for="anios">Años de experiencia:</label>
                <input type="number" name="anios" required>
            </li>
            <li>
                <label for="correo">Correo electrónico:</label>
                <input type="email" name="correo" required>
            </li>
            <li>
                <input type="submit" value="Enviar">
            </li>
        </ul>
        <input type="hidden" name="cadenaArray" value="<?= $cadenaArray ?>">
    </form>
    <form style="text-align: center;" action="lista.php" method="get">
                <input type="submit" value="Terminar lista">
        <input type="hidden" name="cadenaArray" value="<?= $cadenaArray ?>">
    </form>
</body>

</html>