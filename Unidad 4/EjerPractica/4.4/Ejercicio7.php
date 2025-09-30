<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Ejercicio 7
Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. El programa nos pedirá
la combinación para abrirla. Si no acertamos, se nos mostrará el mensaje “Lo siento, esa no es la combinación” y
si acertamos se nos dirá “La caja fuerte se ha abierto satisfactoriamente”. Tendremos cuatro oportunidades para
abrir la caja fuerte. -->
    <?php
    if (!isset($_REQUEST['$codigoIn'])) {
        $intentos = 4;
        $codigoCaja = rand(0, 9999);
        $codigoIn = -1;
    } else {
        $intentos = $_POST['intentos'];
        $codigoCaja = $_POST['codigoCaja'];
        $codigoIn = $_POST['codigoIn'];
    }
    if ($codigoIn == $codigoCaja) {
            echo "La caja fuerte se ha abierdo satisfactoriamente<br>";
            echo "El código era: $codigoCaja";
        } else {
            echo "Código erróneo.";
    ?>
    <p>Introduce el código de la caja fuerte. Te quedan <?= $intentos-- ?></p>
    <form action="Ejercicio7.php" method="post">
        <input type="number" name="codigoIn" min="0" max="9999" autofocus>
        <input type="hidden" name="codigoCaja" value="<?= $codigoCaja ?>">
        <input type="hidden" name="intentos" value="<?= $intentos ?>">
        <input type="submit" value="Validar">
    </form>
    <!-- Aqui termina el else -->
    <?php
        }
    ?>
</body>

</html>