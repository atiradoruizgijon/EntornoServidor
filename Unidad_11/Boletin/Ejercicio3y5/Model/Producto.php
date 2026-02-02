<?php
    include_once "../Model/TiendaDB.php";

    class Producto {
        private $id;
        private $nombre;
        private $imagen;
        private $descripcionCorta;
        private $descripcionLarga;
        private $precio;

        public function __construct($id = "", $nombre = "", $imagen = "", $descripcionCorta = "", $descripcionLarga = "", $precio = 0)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->imagen = $imagen;
            $this->descripcionCorta = $descripcionCorta;
            $this->descripcionLarga = $descripcionLarga;
            $this->precio = $precio;
        }

        public function insert() {
            $conexion = TiendaDB::connectDB();
            $conexion->exec("INSERT INTO productos(nombre, imagen, descripcionCorta, descripcionLarga, precio) 
            VALUES ('$this->nombre', '$this->imagen', '$this->descripcionCorta', '$this->precio')");
            
            $conexion = null;
        }

        public function update() {
            $conexion = TiendaDB::connectDB();
            $conexion->exec("UPDATE productos SET nombre='$this->nombre', imagen='$this->imagen', descripcionCorta='$this->descripcionCorta',
            descripcionLarga='$this->descripcionLarga', precio='$this->precio' WHERE id=$this->id");

            $conexion = null;
        }

        public function delete() {
            $conexion = TiendaDB::connectDB();
            $conexion->exec("DELETE FROM productos WHERE id=$this->id");

            $conexion = null;
        }

        public static function getProductos()
        {
                $conexion = TiendaDB::connectDB();
                $consulta = $conexion->query("SELECT * FROM productos");
                $producto = [];

                while ($registro = $consulta->fetchObject()) {
                    $producto[] = new Producto($registro->id, $registro->nombre, $registro->imagen,
                     $registro->descripcionCorta, $registro->descripcionLarga, $registro->precio);
                }
                return $producto;
        }

        public static function getProductoById($id) {
            $conexion = TiendaDB::connectDB();
            
            $seleccion = "SELECT * FROM productos WHERE id='$id'";
            $consulta = $conexion->query($seleccion);


            if ($consulta->rowCount() > 0) {
                $registro = $consulta->fetchObject();
                $producto = new Producto($registro->id, $registro->nombre, $registro->imagen,
                     $registro->descripcionCorta, $registro->descripcionLarga, $registro->precio);
                $conexion = null;
                        
                return $producto;
            } else {
                $conexion = null;
                return false;
            }
        }

        public static function getProductoByNombre($nombre) {
            $conexion = TiendaDB::connectDB();
            
            $seleccion = "SELECT * FROM productos WHERE nombre='$nombre'";
            $consulta = $conexion->query($seleccion);


            if ($consulta->rowCount() > 0) {
                $registro = $consulta->fetchObject();
                $producto = new Producto($registro->id, $registro->nombre, $registro->imagen,
                     $registro->descripcionCorta, $registro->descripcionLarga, $registro->precio);
                $conexion = null;
                        
                return $producto;
            } else {
                $conexion = null;
                return false;
            }
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of imagen
         */ 
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */ 
        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }

        /**
         * Get the value of descripcionCorta
         */ 
        public function getDescripcionCorta()
        {
                return $this->descripcionCorta;
        }

        /**
         * Set the value of descripcionCorta
         *
         * @return  self
         */ 
        public function setDescripcionCorta($descripcionCorta)
        {
                $this->descripcionCorta = $descripcionCorta;

                return $this;
        }

        /**
         * Get the value of descripcionLarga
         */ 
        public function getDescripcionLarga()
        {
                return $this->descripcionLarga;
        }

        /**
         * Set the value of descripcionLarga
         *
         * @return  self
         */ 
        public function setDescripcionLarga($descripcionLarga)
        {
                $this->descripcionLarga = $descripcionLarga;

                return $this;
        }

        /**
         * Get the value of precio
         */ 
        public function getPrecio()
        {
                return $this->precio;
        }

        /**
         * Set the value of precio
         *
         * @return  self
         */ 
        public function setPrecio($precio)
        {
                $this->precio = $precio;

                return $this;
        }
    }
?>