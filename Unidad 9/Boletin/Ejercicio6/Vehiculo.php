<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['kmTotales'])) {
    $_SESSION['kmTotales'] = 0;
}
if (!isset($_SESSION['vehiculosCreados'])) {
    $_SESSION['vehiculosCreados'] = 0;
}
    class Vehiculo {
        private $nombre;
        private $kmRecorridos = 0;

        public function __construct($nombre) {
            $this->nombre = $nombre;
            $_SESSION['vehiculosCreados']++;
        }
        public static function getVehiculosCreados() {
            return $_SESSION['vehiculosCreados'];
        }
        public static function getKmTotales() {
            return $_SESSION['kmTotales'];
        }

        public function getNombre() {
            return $this->nombre;
        }
        public function getKmRecorridos() {
            return $this->kmRecorridos;
        }
        public function recorre($km) {
            $this->kmRecorridos += $km;
            $_SESSION['kmTotales'] += $km;
        }
    }  
?>