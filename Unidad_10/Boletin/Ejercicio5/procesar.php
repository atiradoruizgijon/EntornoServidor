<?php
    if (session_status() == PHP_SESSION_NONE) session_start();

    if (!isset($_SESSION['carrito'])) {
        header('Location: index.php');
    }
    
    $factura = fopen("factura.txt", "a+");
    fclose($factura);

    header('Location: factura.txt');
?>