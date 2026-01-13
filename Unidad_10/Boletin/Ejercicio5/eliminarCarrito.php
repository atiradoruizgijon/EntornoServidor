<?php
    if (!isset($_POST['eliminarCarrito'])) {
        header('Location: index.php');
    }
    
    if (session_status() == PHP_SESSION_NONE) session_start();
    $carrito = unserialize(base64_decode($_SESSION['carrito']));

    unset($carrito[$_POST['eliminarCarrito']]);
    
    $_SESSION['carrito'] = base64_encode(serialize($carrito));
    header('Location: index.php');
?>