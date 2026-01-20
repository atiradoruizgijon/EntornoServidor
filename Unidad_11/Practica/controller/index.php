<?php
    $SALTOS = 5;
    include_once "../model/Producto.php";
    if (session_status() == PHP_SESSION_NONE) session_start();
    
    
    if (isset($_SESSION['pagina'])) {
        $pagina = $_SESSION['pagina'];
    } else {
        $pagina = 1;
    }

    $totalPaginas = ceil(Producto::getTotalProductos() / $SALTOS);

    if (isset($_REQUEST['avanzar'])) {
        $pagina++;
        if ($pagina > $totalPaginas) $pagina--;
    }
    if (isset($_REQUEST['retroceder'])) {
        $pagina--;
        if ($pagina == 0) $pagina++;
    }
    if (isset($_REQUEST['primeraPagina'])) $pagina = 1;
    if (isset($_REQUEST['ultimaPagina'])) $pagina = $totalPaginas;

    /* Importante recuperar la información justo aquí. Para
    que asi se actualice $pagina y no de problemas a la hora
    de meterlo en la funcion getPaginaProductos */
    $data['productos'] = Producto::getPaginaProductos($pagina, $SALTOS);
    
    $_SESSION['pagina'] = $pagina;

    include "../view/index_view.php";
?>