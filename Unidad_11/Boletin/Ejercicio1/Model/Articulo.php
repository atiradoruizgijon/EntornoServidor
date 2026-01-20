<?php
    include_once "../Model/BlogDB.php";
    class Articulo {
        private $id;
        private $titulo;
        private $fecha;
        private $articulo;
        private $likes;

        public function __construct($id="", $titulo="", $fecha="", $articulo="", $likes=0)
        {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->fecha = $fecha;
            $this->articulo = $articulo;
            $this->likes = $likes;
        }

        public function insert() {
            $conexion = AlmacenDB::connectDB();
            $insert = "INSERT INTO articulo (titulo, fecha, articulo, likes)";
        }

        public static function getArticulos() {
            $conexion = AlmacenDB::connectDB();
            $consulta = $conexion->query("SELECT * FROM articulos");
            $articulos = [];

            while ($registro = $consulta->fetchObject()) {
                $articulos[] = new Articulo($registro->id, $registro->titulo, $registro->fecha, $registro->articulo, $registro->likes);
            }
            return $articulos;
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
         * Get the value of titulo
         */ 
        public function getTitulo()
        {
                return $this->titulo;
        }

        /**
         * Set the value of titulo
         *
         * @return  self
         */ 
        public function setTitulo($titulo)
        {
                $this->titulo = $titulo;

                return $this;
        }

        /**
         * Get the value of fecha
         */ 
        public function getFecha()
        {
                return $this->fecha;
        }

        /**
         * Set the value of fecha
         *
         * @return  self
         */ 
        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

        /**
         * Get the value of articulo
         */ 
        public function getArticulo()
        {
                return $this->articulo;
        }

        /**
         * Set the value of articulo
         *
         * @return  self
         */ 
        public function setArticulo($articulo)
        {
                $this->articulo = $articulo;

                return $this;
        }

        /**
         * Get the value of likes
         */ 
        public function getLikes()
        {
                return $this->likes;
        }

        /**
         * Set the value of likes
         *
         * @return  self
         */ 
        public function setLikes($likes)
        {
                $this->likes = $likes;

                return $this;
        }
    }
?>