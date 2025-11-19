<?php
    class Factura {
        static private $IVA = 21;
        private $importeBase;
        private $fecha;
        private $estado = "pendiente"; // pagada o pendiente
        private $productos; // array con todos los productos de la factura. [nombre, precio, cantidad]

        public function __construct($fecha) {
            $this->fecha = $fecha;
        }
        public function añadeProducto($nombre, $precio, $cantidad) {
            $this->productos[] = [$nombre, $precio, $cantidad];
        }
        public function imprimeFactura() {
            $prodFactura = "";
            foreach ($this->productos as $key => $producto) {
                $prodFactura .= $producto[0]. " ".$producto[1]. " €\t". $producto[2]. " unidades <br>";
            }
            
            return "Factura del día: ". $this->fecha . "<br>
            Estado: ". $this->estado."<br><br>Productos:<br>". $prodFactura;
        }
        // getters
        public function getImporteBase() {
            return $this->importeBase;
        }
        public function getFecha() {
            return $this->fecha;
        }
        public function getEstado() {
            return $this->estado;
        }
        // setters
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
        public function setEstado($estado) {
            $this->estado = $estado;
        }
    }