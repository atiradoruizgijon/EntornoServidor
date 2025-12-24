<?php
    if (isset($_POST['eliminar'])) {
        if (session_status() == PHP_SESSION_NONE) session_start();
        // se eliminan segun el id, su id en la tabla en su indice en el array.
        $_SESSION['carrito'][$_POST['eliminar']]--;
        // el numero de productos en carrito:
        $_SESSION['enCarrito']--;
        if ($_SESSION['carrito'][$_POST['eliminar']] == 0) {
            unset($_SESSION['carrito'][$_POST['eliminar']]);
        }
        header('Location: carrito.php');
    } else {
        header('Location: index.php');
    }
?>