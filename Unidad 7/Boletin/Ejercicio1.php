<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_SESSION['colores'])) {
    if (isset($_REQUEST['color'])) {
        // recibo un array de 3 numeros aleatorios entre 0 y 255:
        $colorGenerado = unserialize(base64_decode($_REQUEST['color']));

        // recibo la paleta de colores de la sesión
        $colores = unserialize(base64_decode($_SESSION['colores']));
        // añado el nuevo color generado a la paleta
        $colores[] = $colorGenerado;
        // vuelvo a meter la paleta en una sesion
        $_SESSION['colores'] = base64_encode(serialize($colores));
        // hago implode al array de numeros:
        $selec = implode(",", $colorGenerado);
    }
} else {
    $colores = [];
    $_SESSION['colores'] = base64_encode(serialize($colores));
}
// para borrar los colores
if (isset($_REQUEST['borrar'])) {
    session_destroy();
    $selec = "white";
}
// valor por defecto de la página
if (!isset($selec)) $selec = "white";
if (isset($_REQUEST['selec'])) $selec = $_REQUEST['selec'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: rgb(<?= $selec ?>);
        }

        div {
            display: inline-block;
            height: 40px;
            width: 40px;
            margin: 2px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_REQUEST['mostrar'])) {
        $paleta = unserialize(base64_decode($_SESSION['colores']));
        if (empty($paleta)) {
            echo "Todavía no has generado ningún color.";
        } else {
            foreach ($paleta as $color) {
                echo "<a href='Ejercicio1.php?selec=".implode(",", $color)."'><div style='background-color: rgb(".implode(",", $color).");'></div></a>";
            }
        }
    }
    ?>

    <form action="" method="post">
        <input type="hidden" name="color" value="<?= base64_encode(serialize([rand(0, 255), rand(0, 255), rand(0, 255)])) ?>">
        <input type="submit" value="Añadir color">
    </form>
    <form action="" method="post">
        <input type="hidden" name="mostrar" value="">
        <input type="submit" value="Mostrar Paleta">
    </form>
    <form action="" method="post">
        <input type="hidden" name="borrar" value="">
        <input type="submit" value="Nueva Paleta">
    </form>
</body>

</html>