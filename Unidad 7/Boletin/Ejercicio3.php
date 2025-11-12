<?php
    if (session_status() == PHP_SESSION_NONE) session_start();

    $hoy = date("d/m/Y");
    
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

        $libros = [
            ["El diario de John", "9/11/2025"],
            ["Don Quijote de la Mancha", "10/11/2025"],
            ["La vida de PI", "13/12/2025"]
        ];
        $_SESSION['libros'] = base64_encode(serialize($libros));
    }

    if (isset($_REQUEST['indice'])) {
        $deuda += $_REQUEST['dinero'];
        unset($libros[$_REQUEST['indice']]);
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
        h1, h4 {
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
        form {
            width: fit-content;
            margin: auto;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <h1>Control de libros prestados. Hoy es <?= $hoy ?></h1>
    <h4 style="color: red;">Deuda por sanciones: <?= $deuda ?> €</h4>
    <form action="" method="post">
        Titulo:
        <input type="text" name="titulo">
        Fecha:
        <input type="date" name="fecha">
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
                echo "<hr>";
                echo strtotime($libro[1] . " +7 days");
                echo "<br>";
                echo strtotime($hoy);
                echo "<br>";
                echo (strtotime($libro[1] . " +7 days") - strtotime($hoy)) / 86400;
                echo "<hr>";
                $sancion = 0;   

                if (strtotime($libro[1]) > strtotime($hoy)) {
                    // 86.400 seg/dia
                    $diasRestantes = $dias." día(s)";
                } else {
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
                    <td><?= $libro[1] ?></td>
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