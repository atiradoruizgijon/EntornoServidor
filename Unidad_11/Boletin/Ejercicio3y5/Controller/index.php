<?php
    include_once "../Model/Usuario.php";
    if (session_status() == PHP_SESSION_NONE) session_start();
    
    if (!isset($_SESSION['usuario'])) {
        header('Location: ../Controller/login.php');
        exit();
    }

    $data['usuario'] = Usuario::getUsuarioByUsername($_SESSION['usuario']);

    if ($data['usuario']->getRol() == 'admin') {
        header('Location: ../Controller/panelAdmin.php');
        exit();
    }

    include "../View/index_view.php";
?>