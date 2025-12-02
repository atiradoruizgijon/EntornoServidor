<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    if (!isset($_SESSION['tiradasTotales'])) {
        $_SESSION['tiradasTotales'] = 0;
    }

    class DadoPoker {
        private $figuras = ["As", "K", "Q", "J", "7", "8"];
        private $ultimaTirada;

        public function __construct() {
            // para que tenga por defecto una cara aleatoria ya seleccionada
            $this->tira();
            $_SESSION['tiradasTotales']--;
        }

        public function tira() {
            $this->ultimaTirada = $this->figuras[rand(0, 5)];
            $_SESSION['tiradasTotales']++;
        }

        public function nombreFigura() {
            return $this->ultimaTirada;
        }

        static public function getTiradasTotales() {
            return $_SESSION['tiradasTotales'];
        }
    }
?>