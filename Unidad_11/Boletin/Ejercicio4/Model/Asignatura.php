<?php
    include_once "../Model/EscuelaDB.php";

    class Asignatura {
        private $id;
        private $nombre;
        private $abreviacion;

        public function __construct(
        $id="",
        $nombre = "",
        $abreviacion = ""
        )
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->abreviacion = $abreviacion;
        }

        public function insert() {
            $conexion = EscuelaDB::connectDB();
            $conexion->exec("INSERT INTO asignaturas(nombre, abreviacion) VALUES ('$this->nombre', '$this->abreviacion')");
            
            $conexion = null;
        }

        public function update() {
            $conexion = EscuelaDB::connectDB();
            $conexion->exec("UPDATE asignaturas SET nombre='$this->nombre', abreviacion='$this->abreviacion' WHERE id=$this->id");

            $conexion = null;
        }

        public function delete() {
            $conexion = EscuelaDB::connectDB();
            $conexion->exec("DELETE FROM asignaturas WHERE id=$this->id");

            $conexion = null;
        }

        public static function getAsignaturas()
        {
            $conexion = EscuelaDB::connectDB();
            $consulta = $conexion->query("SELECT * FROM asignaturas");
            $asignaturas = [];

            while ($registro = $consulta->fetchObject()) {
                $asignaturas[] = new Asignatura($registro->id, $registro->nombre, $registro->abreviacion);
            }
            return $asignaturas;
        }

        public function getAsignaturaById($id) {
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT * FROM asignaturas WHERE id=$id";
            $consulta = $conexion->query($seleccion);

            if ($consulta->rowCount() > 0) {
                $registro = $consulta->fetchObject();
                $asignatura = new Asignatura($registro->id, $registro->nombre, $registro->abreviacion);
                $conexion = null;
                
                return $asignatura;
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
         * Get the value of abreviacion
         */ 
        public function getAbreviacion()
        {
            return $this->abreviacion;
        }

        /**
         * Set the value of abreviacion
         *
         * @return  self
         */ 
        public function setAbreviacion($abreviacion)
        {
            $this->abreviacion = $abreviacion;

            return $this;
        }
    }
?>