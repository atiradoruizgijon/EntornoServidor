<!-- Si el lector es suficientemente perspicaz ya se habrá dado cuenta de que $_GET y $_POST son arrays
asociativos.
Con los arrays asociativos se puede usar también la sintaxis abreviada que emplea corchetes. -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
        foreach ($_REQUEST as $clave => $valor) {
            echo "Clave: $clave => Valor: $valor <br>";
        }
    ?>
    <form action="ejemplo9.php" method="post">
        <p>Texto</p>
        <input type="text">
        <p>Numero</p>
        <input type="number">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>