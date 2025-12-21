<?php
    if (isset($_POST['comprar'])) {
        if (session_status() == PHP_SESSION_NONE) session_start();
        if (isset($_SESSION['carrito'][$_POST['comprar']])) {
            $_SESSION['carrito'][$_POST['comprar']]++;
        } else {
            $_SESSION['carrito'][$_POST['comprar']] = 1;
        }
        header('Location: index.php');
    } else {
        header('Location: index.php');
    }
?>