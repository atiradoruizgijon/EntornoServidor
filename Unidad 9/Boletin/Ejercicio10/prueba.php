<?php
    include_once "Bombilla.php";

    if (session_status() == PHP_SESSION_NONE) session_start();

    if (!isset($_SESSION['bombillas'])) {
        // bombillas de prueba
        $bombillas = [
            new Bombilla("Cocina")
        ];
    } else {
        $bombillas = unserialize(base64_decode($_SESSION['bombillas']));
    }

    if (isset($_REQUEST['ubicacion']) && $_REQUEST['ubicacion'] != "") {
        $bombillas[] = new Bombilla($_REQUEST['ubicacion']);
    }
    if (isset($_REQUEST['ind'])) {
        $bombillas[$_REQUEST['ind']]->cambiarEstado();
    }

    $_SESSION['bombillas'] = base64_encode(serialize($bombillas));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="ubicacion" placeholder="Ubicacion de la bombilla" autofocus>
        <input type="submit" value="Añadir">
    </form>
    <table>
        <?php
            foreach ($bombillas as $key => $value) {
                if ($key == 0) {
                    echo "<tr>";
                }
                if ($value->getEstado()) {
                    echo "<td class='encendida'>";
                } else {
                    echo "<td class='apagada'>";
                }
                echo "<a href='prueba.php?ind=$key'>
                ". $value->getUbicacion() ."
                </a>
                </td>";
                if ($key%10 == 0 && $key != 0) {
                    echo "</tr><tr>";
                }
            }
        ?>
    </table>
</body>
</html>