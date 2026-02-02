<?php
    include_once "../Model/Usuario.php";
    include_once "../Model/Producto.php";

    $data['productos'] = Producto::getProductos();

    include "../View/panelAdmin_view.php";
?>