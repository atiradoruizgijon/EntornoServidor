<?php
    include_once "../model/AlmacenDB.php";
    class Producto {
        private $codigo;
        private $descripcion;
        private $precioCompra;
        private $precioVenta;
        private $stock;

        public function __construct($codigo="", $descripcion="", $precioCompra="", $precioVenta="", $stock="") {
            $this->$codigo;
            $this->$descripcion;
            $this->$precioCompra;
            $this->$precioVenta;
            $this->$stock;
        }

        public function insert() {
            $conexion = AlmacenDB::connectDB();
            $insercion = "INSERT INTO productos (codigo, descripcion, precioCompra, precioVenta, stock) VALUES ('$this->codigo',
            '$this->descripcion','$this->precioCompra', '$this->precioVenta', '$this->stock')";

            $conexion->exec($insercion);
            $conexion=null;
        }

        public function delete() {
            $conexion = AlmacenDB::connectDB();
            $borrado = "DELETE FROM productos WHERE codigo='$this->codigo'";
            
            $conexion->exec($borrado);
            $conexion=null;
        }

        public function update() {
            $conexion = AlmacenDB::connectDB();
            $actualiza = "UPDATE productos SET codigo='$this->codigo', descripcion='$this->descripcion', precioCompra='$this->precioCompra',
            precioVenta='$this->precioVenta', stock='$this->stock'
            WHERE codigo='$this->codigo'";

            $conexion->exec($actualiza);
            $conexion=null;
        }

        public static function getOfertas() {
            $conexion = AlmacenDB::connectDB();
            $seleccion = "SELECT * FROM productos";
            $consulta = $conexion->query($seleccion);
            $productos = [];
            
            while ($registro = $consulta->fetchObject()) {
                $productos[] = new Producto($registro->codigo, $registro->descripcion, $registro->precioCompra, $registro->precioVenta, $registro->stock);
            }
            
            $conexion=null;
            return $productos;
        }

        public static function getOfertaById($codigo) {
            $conexion = AlmacenDB::connectDB();
            $seleccion = "SELECT * FROM oferta WHERE codigo=$codigo";
            $consulta = $conexion->query($seleccion);

            if ($consulta->rowCount()>0) {
                $registro = $consulta->fetchObject();
                $producto = new Producto($registro->codigo, $registro->descripcion, $registro->precioCompra, $registro->precioVenta, $registro->stock);
                $conexion=null;
                
                return $producto;
            } else {
                $conexion=null;
                return false;
            }
        }
        
        /**
         * Get the value of stock
         */ 
        public function getStock()
        {
                return $this->stock;
        }

        /**
         * Set the value of stock
         *
         * @return  self
         */ 
        public function setStock($stock)
        {
                $this->stock = $stock;

                return $this;
        }

        /**
         * Get the value of precioVenta
         */ 
        public function getPrecioVenta()
        {
                return $this->precioVenta;
        }

        /**
         * Set the value of precioVenta
         *
         * @return  self
         */ 
        public function setPrecioVenta($precioVenta)
        {
                $this->precioVenta = $precioVenta;

                return $this;
        }

        /**
         * Get the value of precioCompra
         */ 
        public function getPrecioCompra()
        {
                return $this->precioCompra;
        }

        /**
         * Set the value of precioCompra
         *
         * @return  self
         */ 
        public function setPrecioCompra($precioCompra)
        {
                $this->precioCompra = $precioCompra;

                return $this;
        }

        /**
         * Get the value of descripcion
         */ 
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        /**
         * Get the value of codigo
         */ 
        public function getCodigo()
        {
                return $this->codigo;
        }

        /**
         * Set the value of codigo
         *
         * @return  self
         */ 
        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;

                return $this;
        }
    }
    
?>