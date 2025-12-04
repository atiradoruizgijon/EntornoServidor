<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    if (!isset($_SESSION['totalVendidas'])) {
        $_SESSION['totalVendidas'] = 0;
    }
    class Zona {
        private $nombre;
        private $entradas;
        private $precio;

        public function __construct($nombre, $entradasIniciales, $precio) {
            $this->nombre = $nombre;
            $this->entradas = $entradasIniciales;
            $this->precio = $precio;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getPrecio() {
            return $this->precio;
        }

        public function getEntradas() {
            return $this->entradas;
        }
        
        public function setEntradas($entradas) {
            $this->entradas = $entradas;
        }

        public function vender($entradas) {
            // devuelve false si resulta que se quieren comprar más entradas de las que hay
            if ($entradas > $this->entradas) {
                return false;
            } else {
                Zona::setEntradas($this->entradas - $entradas);
                $_SESSION['totalVendidas'] += $entradas;
            }
        }

        static public function getTotalVendidas() {
            return $_SESSION['totalVendidas'];
        }
    }
?>