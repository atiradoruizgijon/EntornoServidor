<?php
    include_once "../Model/Usuario.php";
    if (session_status() == PHP_SESSION_NONE) session_start();

    if (isset($_SESSION['usuario'])) {
        header('Location: ../Controller/index.php');
    }

    if (isset($_POST['username'])) {

        // si devuelve false, es que no ha encontrado ninguno con ese nombre
        if ($usuario = Usuario::getUsuarioByUsername($_POST['username'])) {
            if ($usuario->getPassword() == $_POST['password']) {
                $_SESSION['usuario'] = $_POST['username'];
                header('Location: ../Controller/index.php');
                exit();
            } else {
                $error = urlencode("La contraseña es incorrecta");
                header('Location: ../Controller/login.php?error='.$error);
                exit();
            }
        } else {
            $error = urlencode("El usuario no existe");
            header('Location: ../Controller/login.php?error='.$error);
            exit();
        }

    }

    include "../View/login_view.php";
?>