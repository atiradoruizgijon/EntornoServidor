<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
        if (isset($_REQUEST['numeroMandado'])) {
            $contador = $_REQUEST['contador'];
            $numeroTexto = $_REQUEST['numeroTexto'] . " " . $_REQUEST['numeroMandado'];
        } else {
            $contador = 0;
            $numeroTexto = "";
        }
        if ($contador == 10) {
            $numeroTexto = substr($numeroTexto, 1);
            $array = explode(" ", $numeroTexto);

            $minimo = PHP_INT_MAX;
            $maximo = PHP_INT_MIN;
            echo "Los números introducidos son:<br>";
            foreach ($array as $value) {
                if ($value < $minimo) {
                    $minimo = $value;
                }
                if ($value > $maximo) {
                    $maximo = $value;
                }
            }
            foreach ($array as $value) {
                if ($value == $minimo) {
                    echo " $value (MÍNIMO) <br>";
                } else if ($value == $maximo) {
                    echo " $value (MAXIMO) <br>";
                } else {
                    echo " $value <br>";
                }
            }
        }
    ?>
    <form action="" method="post">
        <p>Numero</p>
        <input type="number" name="numeroMandado" autofocus>
        <input type="hidden" name="contador" value="<?= ++$contador ?>">
        <input type="hidden" name="numeroTexto" value="<?= $numeroTexto?>">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>