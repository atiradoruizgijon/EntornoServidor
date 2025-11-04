<?php
session_start();

if (!isset($_SESSION['suma'])) {
    $_SESSION['suma'] = 0;
    $_SESSION['introducidos'] = 0;
} else if ($_SESSION['suma'] < 10000 && isset($_REQUEST['num'])) {
    $_SESSION['suma'] += $_REQUEST['num'];
    $_SESSION['introducidos']++;
}

if (!isset($_SESSION['mayor'])) $_SESSION['mayor'] = PHP_INT_MIN;
else {
    if (isset($_REQUEST['num']) && $_SESSION['mayor'] < $_REQUEST['num'] && isset($_SESSION['suma']) && $_SESSION['suma'] < 10000) {
        $_SESSION['mayor'] = $_REQUEST['num'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="number" name="num" placeholder="Numero" autofocus>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if (isset($_SESSION['suma']) && $_SESSION['suma'] > 10000 ) {
            echo "<br>Suma de los números: ". $_SESSION['suma'];
            echo "<br>Media de los números: ". $_SESSION['suma'] / $_SESSION['introducidos'];
            echo "<br>Cantidad de números introducidos: ". $_SESSION['introducidos'];
        }
    ?>
</body>

</html>