<?php
    include_once "../Model/Oferta.php";
    $data['ofertas'] = Oferta::getOfertas();
    
    // Carga la vista de listado:
    include "../View/index_view.php";
?>