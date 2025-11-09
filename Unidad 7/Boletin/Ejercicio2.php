<?php
    if (session_status() == PHP_SESSION_NONE) session_start();

    // recuperar los votos desde la cookie, si existe.
    if (isset($_COOKIE['votos'])) {
        $_SESSION['votacion'] = unserialize(base64_decode($_COOKIE['votos']));
    }

    if (isset($_REQUEST['borrar'])) {
        setcookie("votos", "", -1);
        session_destroy();
        unset($votos);
        unset($_SESSION['votacion']);
    }
    // primera vez que entramos a la página:
    if (!isset($_SESSION['votacion']) || empty($_SESSION['votacion'])) {
        $votos = [0, 0];
        $_SESSION['votacion'] = $votos;
        setcookie("votos", base64_encode(serialize($votos)), strtotime("+3 months"));
    } else {
        // si no es la primera vez, cargamos la sesion.
        $votos = $_SESSION['votacion'];
    }

    function mostrarVotos($array, $indice, $color)
    {
        for ($i = 0; $i < $array[$indice]; $i++) {
            // icono svg con el que muestro los votos
            echo '
                <svg style="color: ' . $color . ';" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award-fill" viewBox="0 0 16 16">
                    <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864z"/>
                    <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1z"/>
                </svg>
                ';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        form, h4, svg {
            display: inline;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <h1>¿Tortilla con o sin cebolla?</h1>
    <div>
        <h4>SI</h4>
        <?php
        if (isset($_REQUEST['SI'])) {
            $votos[0]++;
        }
        if (isset($_REQUEST['NO'])) {
            $votos[1]++;
        }

        mostrarVotos($votos, 0, "green");
        echo "<hr><h4>NO</h4>";
        mostrarVotos($votos, 1, "red");
        
        setcookie("votos", base64_encode(serialize($votos)), strtotime("+3 months"));
        ?>
    </div>
    
    <form action="" method="post">
        <input type="hidden" name="SI" value="">
        <input type="submit" value="SI">
    </form>
    <form action="" method="post">
        <input type="hidden" name="NO" value="">
        <input type="submit" value="NO">
    </form>
    <form action="" method="post">
        <input type="hidden" name="borrar" value="">
        <input type="submit" value="Borrar Cookies">
    </form>
</body>

</html>