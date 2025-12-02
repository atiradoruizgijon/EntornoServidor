<?php
    if (session_status() == PHP_SESSION_NONE) session_start();

    class Coche {
        private $matricula;
        private $modelo;
        private $precio;

        public function __construct($matricula, $modelo, $precio) {
            $this->matricula = $matricula;
            $this->modelo = $modelo;
            $this->precio = $precio;
        }

        public function getMatricula() {
            return $this->matricula;
        }
        
        public function getModelo() {
            return $this->modelo;
        }

        public function getPrecio() {
            return $this->precio;
        }

        public function setMatricula($matricula) {
            $this->matricula = $matricula;
        }

        public function setModelo($modelo) {
            $this->modelo = $modelo;
        }

        public function setPrecio($precio) {
            $this->precio = $precio;
        }

        public function __toString() {
            return "<td>". 
            $this->matricula
            ."</td><td>". 
            $this->modelo
            ."</td><td>". 
            $this->precio
            ." €</td>"
            ;
        }

        static public function masCaro() {
            return $_SESSION['modeloCaro']." ". $_SESSION['precioCaro'];
        }
    }
?>