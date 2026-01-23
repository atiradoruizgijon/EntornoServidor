<?php
    include_once "../Model/EscuelaDB.php";

    class Alumno {
        private $id;
        private $nombre;
        private $apellidos;
        private $matricula;
        private $curso;

        public function __construct(
        $id = "",
        $nombre = "",
        $apellidos = "",
        $matricula = "",
        $curso = "")
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->matricula = $matricula;
            $this->curso = $curso;
        }

        public function insert() {
            $conexion = EscuelaDB::connectDB();
            $conexion->exec("INSERT INTO alumnos(nombre, apellidos, matricula, curso) 
            VALUES ('$this->nombre', '$this->apellidos', '$this->matricula', '$this->curso')");
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
         * Get the value of apellidos
         */ 
        public function getApellidos()
        {
                return $this->apellidos;
        }

        /**
         * Set the value of apellidos
         *
         * @return  self
         */ 
        public function setApellidos($apellidos)
        {
                $this->apellidos = $apellidos;

                return $this;
        }

        /**
         * Get the value of matricula
         */ 
        public function getMatricula()
        {
                return $this->matricula;
        }

        /**
         * Set the value of matricula
         *
         * @return  self
         */ 
        public function setMatricula($matricula)
        {
                $this->matricula = $matricula;

                return $this;
        }

        /**
         * Get the value of curso
         */ 
        public function getCurso()
        {
                return $this->curso;
        }

        /**
         * Set the value of curso
         *
         * @return  self
         */ 
        public function setCurso($curso)
        {
                $this->curso = $curso;

                return $this;
        }
    }
?>