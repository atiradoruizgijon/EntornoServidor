<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    if (!isset($_SESSION['ultima'])) {
        $_SESSION['ultima'] = "No se ha creado ninguna nota";
    }
    if (!isset($_SESSION['fecha'])) {
        $_SESSION['fecha'] = 0;
    }
    
    class Nota {
        private $titulo;
        private $texto;
        private $creacion;

        public function __construct($titulo, $texto) {
            $this->titulo = $titulo;
            $this->texto = $texto;
            $this->creacion = time();
            $_SESSION['ultima'] = $titulo;
            $_SESSION['fecha'] = time();
        }

        public function getTitulo() {
            return $this->titulo;
        }
        public function getTexto() {
            return $this->texto;
        }
        public function getCreacion() {
            return $this->creacion;
        }
        static public function getUltima() {
            return $_SESSION['ultima'];
        }
        static public function getFecha() {
            $fecha = date("d/m/Y H:i:s", $_SESSION['fecha']);
            return $fecha;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }
        public function setTexto($texto) {
            $this->texto = $texto;
        }
    }
?>