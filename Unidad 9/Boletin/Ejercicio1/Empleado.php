<?php
    class Empleado {
        private $nombre;
        private $sueldo;

        public function __construct($nombre, $sueldo) {
            $this->nombre = $nombre;
            $this->sueldo = $sueldo;
        }

        public function asigna($nombre, $sueldo) {
            if ($nombre == $this->nombre) $this->sueldo = $sueldo;
            else echo "No has introducido el nombre de la persona correctamente";
        }

        public function aPagar() {
            if ($this->sueldo > 3000) echo $this->nombre." debe pagar impuestos";
            else echo $this->nombre." no debe pagar impuestos";
        }
    }