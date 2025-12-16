<?php
    class Cubo {
        private $capacidad;
        private $contenido;

        public function __construct($capacidad, $contenido) {
            $this->capacidad = $capacidad;
            if ($contenido > $capacidad) $this->contenido = $capacidad;
            else $this->contenido = $contenido;
        }
        public function getCapacidad() {
            return $this->capacidad;
        }
        public function getContenido() {
            return $this->contenido;
        }
        public function setContenido($contenido) {
            $this->contenido = $contenido;
        }
        public function verterCubo($cubo2) {
            $cantidadFaltante = $this->capacidad - $this->contenido;
            
            // si lo que falta es menor al contenido del cubo a verter:
            if ($cantidadFaltante < $cubo2->getContenido()) {
                // se rellena el contenido al tope de capacidad:
                $this->contenido = $this->capacidad;
                // y se le quita lo vertido al segundo cubo
                $cubo2->setContenido($cubo2->getContenido() - $cantidadFaltante);
            } else {
                // si no, se le suma directamente al cubo.
                $this->contenido += $cubo2->getContenido();
                // y como lo hemos vertido por completo, lo vaciamos:
                $cubo2->setContenido(0);
            }
        }
    }