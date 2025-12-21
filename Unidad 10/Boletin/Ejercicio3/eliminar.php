<?php
    if (isset($_POST['eliminar'])) {
        if (session_status() == PHP_SESSION_NONE) session_start();
        $_SESSION['carrito'][$_POST['eliminar']]--;
        if ($_SESSION['carrito'][$_POST['eliminar']] == 0) {
            unset($_SESSION['carrito'][$_POST['eliminar']]);
        }
        header('Location: carrito.php');
    } else {
        header('Location: index.php');
    }
?>