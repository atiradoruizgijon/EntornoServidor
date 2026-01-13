<?php
    function avanzar($pagina, $totalPagina) {
        $pagina++;
        if ($pagina > $totalPagina) $pagina--;
        return $pagina;
    }
    
    function retroceder($pagina) {
        $pagina--;
        if ($pagina == 0) $pagina++;
        return $pagina;
    }
?>