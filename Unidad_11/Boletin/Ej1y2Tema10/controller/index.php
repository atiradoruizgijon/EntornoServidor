<?php
    include_once "../model/Producto.php";
    if (session_status() == PHP_SESSION_NONE) session_start();
    
    $data['productos'] = Producto::getOfertas();
    
    if (isset($_SESSION['pagina'])) {
        $pagina = $_SESSION['pagina'];
    } else {
        $pagina = 1;
    }

    $totalPaginas = ceil(count($data) / 5);

    if (isset($_REQUEST['avanzar'])) {
        $pagina++;
        if ($pagina > $totalPaginas) $pagina--;
    }
    if (isset($_REQUEST['retroceder'])) {
        $pagina--;
        if ($pagina == 0) $pagina++;
    }

    $_SESSION['pagina'] = $pagina;

    include "../view/index_view.php";
?>