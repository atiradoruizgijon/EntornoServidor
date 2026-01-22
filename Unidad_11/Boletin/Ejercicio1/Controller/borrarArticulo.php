<?php
    include_once "../Model/Articulo.php";

    if (isset($_POST['borrar'])) {
        $articulo = new Articulo($_REQUEST['borrar'], "", "", "", "");
        $articulo->delete();
        header('Location: ../Controller/index.php');
        exit();
    }
    if (!isset($_POST['id'])) {
        header('Location: ../Controller/index.php');
        exit();
    }

    include "../View/borrarArticulo_view.php";
?>