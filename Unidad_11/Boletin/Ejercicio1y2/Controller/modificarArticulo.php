<?php
    include_once "../Model/Articulo.php";

    if (isset($_POST['modificar'])) {
        $articulo = new Articulo($_POST['modificar'], $_POST['titulo'], "", $_POST['articulo'], 0);
        $articulo->update();
        header('Location: ../Controller/index.php');
        exit();
    }
    
    if (!isset($_POST['id'])) {
        header('Location: ../Controller/index.php');
        exit();
    }

    $data['articulo'] = Articulo::getArticuloById($_POST['id']);

    include "../View/modificarArticulo_view.php";
?>