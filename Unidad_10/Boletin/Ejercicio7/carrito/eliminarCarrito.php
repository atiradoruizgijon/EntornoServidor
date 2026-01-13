<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    if (!isset($_SESSION['carrito'])) {
        header('Location: ../index.php');
        exit();
    }
    if (!isset($_POST['eliminar'])) {
        header('Location: carrito.php');
        exit();
    }

    $carrito = unserialize(base64_decode($_SESSION['carrito']));

    unset($carrito[$_POST['eliminar']]);

    $_SESSION['carrito'] = base64_encode(serialize($carrito));
    header('Location: carrito.php');
    exit();
?>