<?php
include_once "../Model/BlogDB.php";
class Articulo
{
        private $id;
        private $titulo;
        private $fecha;
        private $articulo;
        private $likes;

        public function __construct($id = 0, $titulo = "", $fecha = "", $articulo = "", $likes = 0)
        {
                $this->id = $id;
                $this->titulo = $titulo;
                $this->fecha = $fecha;
                $this->articulo = $articulo;
                $this->likes = $likes;
        }

        public function insert()
        {
                $conexion = BlogDB::connectDB();
                $insert = "INSERT INTO articulos (titulo, fecha, articulo, likes) 
            VALUES ('$this->titulo', '$this->fecha', '$this->articulo', $this->likes)";

                $conexion->exec($insert);
                $conexion = null;
        }

        public function delete()
        {
                $conexion = BlogDB::connectDB();
                $borrado = "DELETE FROM articulos WHERE id='$this->id'";
                $conexion->exec($borrado);
                $conexion = null;
        }
        public function update()
        {
                // no hago update a la fecha porque siempre va a ser la misma
                $conexion = BlogDB::connectDB();
                $actualiza = "UPDATE articulos SET titulo='$this->titulo', articulo='$this->articulo',
                likes='$this->likes'
                WHERE id='$this->id'";

                $conexion->exec($actualiza);
                $conexion = null;
        }

        public static function getArticuloById($id)
        {
                $conexion = BlogDB::connectDB();
                $seleccion = "SELECT * FROM articulos WHERE id=$id";
                $consulta = $conexion->query($seleccion);

                if ($consulta->rowCount() > 0) {
                        $registro = $consulta->fetchObject();
                        $articulo = new articulo($registro->id, $registro->titulo, $registro->fecha, $registro->articulo, $registro->likes);
                        $conexion = null;

                        return $articulo;
                } else {
                        $conexion = null;
                        return false;
                }
        }

        public static function getArticulos()
        {
                $conexion = BlogDB::connectDB();
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
