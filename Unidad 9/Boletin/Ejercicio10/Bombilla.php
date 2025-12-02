<?php
    class Bombilla {
        // false = apagada true = encendida
        private $estado = false;
        private $potenciaConsumida;
        private $ubicacion;

        public function __construct($ubicacion) {
            $this->ubicacion = $ubicacion;
        }

        public function getEstado() {
            return $this->estado;
        }
        
        public function getPotenciaConsumida() {
            return $this->potenciaConsumida;
        }

        public function cambiarEstado() {
            if ($this->estado == true) {
                $this->estado = false;
            } else {
                $this->estado = true;
            }
        }

        public function getUbicacion() {
            return $this->ubicacion;
        }

        public function setUbicacion($ubicacion) {
            $this->ubicacion = $ubicacion;
        }

        public function setEstado($estado) {
            $this->estado = $estado;
        }

        public function setPotenciaConsumida($potencia) {
            $this->potenciaConsumida = $potencia;
        }

        public function encendida() {
            if ($this->getEstado()) {
                return "Está encendida";
            } else {
                return "Está apagada";
            }
        }
    }
?>