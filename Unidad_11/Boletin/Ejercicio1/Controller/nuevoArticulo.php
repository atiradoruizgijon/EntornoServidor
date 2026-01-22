<?php
    include_once "../Model/Articulo.php";

    if (isset($_POST['titulo'])) {
        $articulo = new Articulo("", $_POST['titulo'], date("Y-m-d"), $_POST['articulo'], 0);
        $articulo->insert();
        header('Location: ../Controller/index.php');
        exit();
    }

    include "../View/nuevoArticulo_view.php";
?>