<?php
    include_once "Coche.php";
    class CocheLujo extends Coche {
        private $suplemento;

        public function __construct($matricula, $modelo, $precio, $suplemento) {
            parent::__construct($matricula, $modelo, $precio);
            $this->suplemento = $suplemento;
        }

        public function getPrecio() {
            return parent::getPrecio() + $this->suplemento;
        }

        public function __toString() {
            return parent::__toString() . "<td>".$this->suplemento." €</td>";
        }
    }
?>