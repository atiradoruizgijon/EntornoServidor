<?php
    // Al no pasarlo por referencia n1 no cambia
    function suma1 ($n1, $n2) {
        $n1 += $n2;
        return $n1 + $n2;
    }
    
    // Sin embargo aqui si cambia n1 al salir de la funcion
    // ya que lo he pasado por referencia
    function suma2 (&$n1, &$n2) {
        $n1 += $n2;
        return $n1 + $n2;
    }

    // En caso de que no estes seguro de que se vayan a mandar todos los argumentos
    // podemos asignarles un valor por defecto, esto hace que sean opcionales:
    function suma3 ($n1, $n2 = 5) {
        $n1 += $n2;
        return $n1 + $n2;
    }
?>
