<?php
if (session_status() == PHP_SESSION_NONE) session_start();

$hoy = date("Y/m/d");

if (isset($_COOKIE['libros'])) {
    $libros = unserialize(base64_decode($_COOKIE['libros']));
    $_SESSION['libros'] = $libros;
    $deuda = $_COOKIE['deuda'];
    $_SESSION['deuda'] = $deuda;
}

if (isset($_REQUEST['borrar'])) {
    setcookie("libros", "", -1);
    session_destroy();
    unset($libros);
    unset($deuda);
    unset($_SESSION['libros']);
    unset($_SESSION['deuda']);
}


// compruebo si es la primera vez que entro en la página
if (!isset($_SESSION['libros'])) {
    // si lo es, inicializo mis variables
    $deuda = 0;
    $_SESSION['deuda'] = $deuda;

    $libros = [];
    $_SESSION['libros'] = $libros;
} else {
    $_SESSION['libros'] = $libros;
    $_SESSION['deuda'] = $deuda;
}

if (isset($_REQUEST['titulo'])) {
    if (strtotime($_REQUEST['fecha']) > strtotime($hoy)) echo "<p style='color: red;'>La fecha no puede ser mayor que hoy.</p>";
    else $libros[] = [$_REQUEST['titulo'], date("Y/m/d", strtotime($_REQUEST['fecha']))];
}
if (isset($_REQUEST['indice'])) {
    $deuda += $_REQUEST['dinero'];
    unset($libros[$_REQUEST['indice']]);
    $_SESSION['libros'] = $libros;
}

setcookie("deuda", $deuda, strtotime("+1 year"));
setcookie("libros", base64_encode(serialize($libros)), strtotime("+1 year"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            font-family: sans-serif;
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        h1,
        h4 {
            text-align: center;
            margin: 1em auto;
        }

        table {
            border-collapse: collapse;
            text-align: center;
            margin: 1em auto;
        }

        td {
            padding: 15px 25px;
            border: 1px solid black;
        }
        p {
            font-size: 2em;
            text-align: center;
        }
        form {
            width: fit-content;
            margin: auto;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <h1>Control de libros prestados. Hoy es <?= date("d/m/Y", strtotime($hoy)) ?></h1>
    <h4 style="color: red;">Deuda por sanciones: <?= $deuda ?> €</h4>
    <form action="" method="post">
        Titulo:
        <input type="text" name="titulo" required>
        Fecha:
        <input type="date" name="fecha" required>
        <input type="submit" value="Realizar préstamo">
    </form>

    <table>
        <tr>
            <td>Devolver</td>
            <td>Título</td>
            <td>Préstamo</td>
            <td>Devolución</td>
            <td>Días restantes</td>
        </tr>
        <?php
        foreach ($libros as $key => $libro) {
            $devolucion = date("d/m/Y", strtotime($libro[1] . " +7 days"));
            // calculo los días de diferencia.
            $dias = abs(floor((strtotime($libro[1] . " +7 days") - strtotime($hoy)) / 86400));
            $sancion = 0;

            if (strtotime($libro[1] . " +7 days") >= strtotime($hoy)) {
                $diasRestantes = "$dias día(s)";
            } else {
                // si hemos sobrepasado la fecha de devolución, se aplica una sanción:
                $sancion = $dias * 2;
                $diasRestantes = "RETRASADO por $dias días: Sanción de " . $dias * 2 . "€";
            }

        ?>
            <tr>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="indice" value="<?= $key ?>">
                        <input type="hidden" name="dinero" value="<?= $sancion ?>">
                        <input type="submit" value="Devolver">
                    </form>
                </td>
                <td><?= $libro[0] ?></td>
                <td><?= date("d/m/Y", strtotime($libro[1])) ?></td>
                <td><?= $devolucion ?></td>
                <td><?= $diasRestantes ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <form action="" method="post">
        <input type="hidden" name="borrar" value="">
        <input type="submit" value="Borrar Cookies">
    </form>
</body>

</html>