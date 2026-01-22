<?php
    include_once "../Model/Articulo.php";

    $articulo = new Articulo("", $_POST['titulo'], date("Y-m-d"), $_POST['articulo'], 0);

    header('Location: ../Controller/index.php');
?>