<?php
    class Coche extends Vehiculo {
        
        public function __construct($nombre) {
            parent::__construct($nombre);
        }

        public function quemarRueda() {
            return "Brum brum, has quemado rueda con el coche.";
        }
    }
?>