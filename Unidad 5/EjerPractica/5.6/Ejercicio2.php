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
            $numeroTexto = explode(" ", $numeroTexto);

            $minimo = 100;
            $maximo = 0;
            echo "Los números introducidos son:<br>";
            foreach ($numeroTexto as $value) {
                if ($value < $minimo) {
                    $minimo = $value;
                }
                if ($value > $maximo) {
                    $maximo = $value;
                }
            }
            foreach ($numeroTexto as $value) {
                if ($value == $minimo) {
                    echo " $value (MÍNIMO) -";
                } else if ($value == $maximo) {
                    echo " $value (MAXIMO) -";
                } else {
                    echo " $value -";
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