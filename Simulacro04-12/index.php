<?php
    include_once "Nota.php";
    if (session_status() == PHP_SESSION_NONE) session_start();

    // si existe la sesion, se continua
    if (isset($_SESSION['usuario'])) {
    // si no, se comprueba de que haya llegado una petición de logeo
    } else if (isset($_REQUEST['usuario'])) {
        $fichero = fopen(__DIR__."/usuarios.dat", "r+");
        while (!feof($fichero)) {
            // separo la linea en un array
            $linea = fgetcsv($fichero, null, ",");

            if ($linea[0] == $_REQUEST['usuario'] && $linea[1] == $_REQUEST['passw']) {
                $encontrado = true;
                // si se encuentra, creo una sesion y termino el bucle
                $_SESSION['usuario'] = $_REQUEST['usuario'];
                // si se marcó que se recordará la sesión, lo guardamos en una cookie
                if (isset($_REQUEST['recordar'])) {
                    setcookie("recordar", base64_encode(serialize($linea)), strtotime("+1 month"));
                } else {
                    // borro la cookie si no se ha mandado
                    setcookie("recordar", "", -1);
                }
                break;
            }
        }
        fclose($fichero);
        // si no se ha encontrado, se devuelve al login con un aviso
        if (!$encontrado) {
            header('Location: login.php?aviso=');
        }
    // en niguno de los dos casos, se devuelve al login con un aviso
    } else header('Location: login.php');

    if (isset($_SESSION['notas'])) {
        $notas = unserialize(base64_decode($_SESSION['notas']));
    } else {
        $notas = [];
    }

    if (isset($_REQUEST['titulo'])) {
        $notas[$_SESSION['usuario']][] = new Nota($_REQUEST['titulo'], $_REQUEST['texto']);
    }

    $_SESSION['notas'] = base64_encode(serialize($notas));
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
        table {
            border-collapse: collapse;
            margin: auto;
        }
        td {
            border: 1px solid black;
            padding: 5px;
        }
        html {
            font-size: 22px;
        }
    </style>
    <title>Página principal</title>
</head>
<body>
    <h1>Panel de notas del usuario: <?= $_SESSION['usuario'] ?></h1>
    <p><b>Última nota creada:</b><?= Nota::getUltima() ?></p>
    <p><b>Fecha de la última nota registrada:</b><?= Nota::getFecha() ?></p>
    <hr>
    <h3>Añadir nueva nota:</h3>
    <form action="" method="post">
        <label for="titulo">Título de la nota:</label><br>
        <input required type="text" name="titulo" placeholder="Título"><br><br>
        <label for="texto">Texto de la nota:</label><br>
        <textarea name="texto" placeholder="Texto de la nota"></textarea>
        <input required type="submit" value="Añadir">
    </form>
    <form action="login.php" method="post">
        <input type="submit" name="borrar" value="Cerrar sesión">
    </form>
    <hr>
    <table>
        <tr>
            <td>Titulo</td>
            <td>Fecha</td>
            <td>Hora</td>
        </tr>
        <?php
        if (isset($notas[$_SESSION['usuario']])) {
            foreach ($notas[$_SESSION['usuario']] as $key => $value) {
                echo "<tr>
                <td><a href='index.php?ind=".$key."'>".$value->getTitulo()."</a></td>
                <td>".date("d/m/Y", strtotime($value->getFecha()))."</td>
                <td>".date("H:i:s", strtotime($value->getFecha()))."</td>
                </tr>";
            }  
        }
        ?>
    </table>
    <?php
        if (isset($_REQUEST['ind'])) {
            $notaEscogida = $notas[$_SESSION['usuario']][$_REQUEST['ind']];
            echo "<h3>".$notaEscogida->getTitulo()."</h3>";
            echo "<p>".$notaEscogida->getTexto()."</p>";
        }  
    ?>
</body>
</html>