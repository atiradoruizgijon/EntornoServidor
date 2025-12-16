<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    // borrar sesion de usuario
    if (isset($_REQUEST['borrar'])) {
        unset($_SESSION['usuario']);
    }
    // si intentamos volver:
    if (isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }
    // si tenemos cookie con los datos de inicio:
    if (isset($_COOKIE['recordar'])) {
        $datos = unserialize(base64_decode($_COOKIE['recordar']));
    } else {
        $datos = ["", ""];
    }

    // si nos llega una petición de registro:
    if (isset($_REQUEST['registrar'])) {
        $fichero = fopen(__DIR__."/usuarios.dat", "r");
        while (!feof($fichero)) {
            // separo la linea en un array
            $linea = fgetcsv($fichero, null, ",");

            // hago este isset, ya que si llega al final
            // y la linea esta vacia, solo se creará $linea[0]
            // y todo funcionará pero salta un error que queda feo, aunque funcione
            if (isset($linea[1])) {
                // si encuentra un usuario y contraseña igual al que pide un registro
                if ($linea[0] != "" && $linea[0] == $_REQUEST['usuario'] && $linea[1] == $_REQUEST['passw']) {
                    $encontrado = true;
                    break;
                }
            }
        }
        // si no se ha encontrado escribimos el usuario y la contraseña en el fichero.
        if (!isset($encontrado)) {
            $fichero = fopen(__DIR__."/usuarios.dat", "a+");
            fputs($fichero, $_REQUEST['usuario'].",".$_REQUEST['passw'].PHP_EOL);
        }
        fclose($fichero);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
            font-family: sans-serif;
        }
        h1, h2, form, a {
            text-align: center;
        }
        a {
            display: block;
        }
        html {
            font-size: 22px;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <h1>MIS NOTAS</h1>
    <?php
        if (isset($_REQUEST['aviso'])) {
            echo "<h2 style='color: red;'>Usuario o contraseña incorrectos</h2>";
        }
        if (isset($encontrado)) {
            echo "<h2 style='color: red;'>Ya existe un usuario con esa contraseña</h2>";
        }
        if (!isset($encontrado) && isset($_REQUEST['registrar'])) {
            echo "<h2 style='color: green;'>Te has registrado como ". $_REQUEST['usuario'] .", inicia sesión para continuar</h2>";
        }
    ?>
    <hr>
    <h2>Inicia sesión para acceder a su panel de notas</h2>
    <form action="index.php" method="post">
        <label for="usuario">Usuario:</label>
        <input required type="text" name="usuario" value="<?= $datos[0] ?>"><br><br>
        
        <label for="passw">Contraseña:</label>
        <input required type="password" name="passw" value="<?= $datos[1] ?>"><br><br>
        
        <label for="recordar">Recordar contraseña:</label>
        <input type="checkbox" name="recordar"><br><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
    <hr>
    <h2>Registrate si no tienes cuenta:</h2>
    <a href="registrar.php">Registrar</a>
</body>
</html>