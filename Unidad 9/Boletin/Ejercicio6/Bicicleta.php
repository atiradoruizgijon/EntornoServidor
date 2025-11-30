<?php
    class Bicicleta extends Vehiculo{
        
        public function __construct($nombre) {
            parent::__construct($nombre);
        }

        function hacerElCaballito() {
            switch (rand(0, 1)) {
                case 0:
                    return "Te has caido intentando hacer el caballito con la bicicleta";
                    break;
                
                default:
                    return "Has hecho el caballito con la bicicleta";
                    break;
            }
        }
    }
?>