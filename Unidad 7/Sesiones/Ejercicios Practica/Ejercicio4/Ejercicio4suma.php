<?php
session_start();

if (isset($_REQUEST['usuario'])) $_SESSION['sesion'] = true;

if (!isset($_SESSION['sesion']) || (isset($_SESSION['sesion']) && $_SESSION['sesion'] == false)) {
    header("Location: Ejercicio4login.php");
    // aborta todo lo siguiente a ejecutar,
    // ya que si nos vamos a ir a otra página, no vale de nada
    exit();
}

if (!isset($_SESSION['numeros'])) {
    $_SESSION['numeros'] = 0;
} else {
    if (isset($_REQUEST['num']) && $_REQUEST['num'] > 0) {
        $_SESSION['numeros'] = $_SESSION['numeros'] + $_REQUEST['num'];
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

    <h3>Introduce numeros para sumarlos, la suma terminará cuando introduzcas un negativo.</h3>
    <form action="" method="post">
        <input type="number" name="num" placeholder="Numero" autofocus>
        <input type="submit" value="Enviar">
    </form>
    <br>
    <form action="Ejercicio4login.php" method="post">
        <input type="hidden" name="cerrar">
        <input type="submit" value="Cerrar Sesión">
    </form>

    <?php
    if (isset($_REQUEST['num']) && $_REQUEST['num'] < 0) {
        echo "La suma de los números es de: " . ($_SESSION['numeros']);
    }
    ?>
</body>

</html>