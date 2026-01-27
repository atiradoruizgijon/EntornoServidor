<?php
    include_once "../Model/EscuelaDB.php";

    class Alumno {
        private $matricula;
        private $nombre;
        private $apellidos;
        private $curso;

        public function __construct(
        $matricula = "",
        $nombre = "",
        $apellidos = "",
        $curso = "")
        {
            $this->matricula = $matricula;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->curso = $curso;
        }

        public function insert() {
            $conexion = EscuelaDB::connectDB();
            $conexion->exec("INSERT INTO alumnos(matricula, nombre, apellidos, curso) 
            VALUES ('$this->matricula', '$this->nombre', '$this->apellidos', '$this->curso')");
            
            $conexion = null;
        }

        public function update() {
            $conexion = EscuelaDB::connectDB();
            $conexion->exec("UPDATE alumnos SET nombre='$this->nombre', apellidos='$this->apellidos', curso='$this->curso' 
            WHERE matricula=$this->matricula");

            $conexion = null;
        }

        public function delete() {
            $conexion = EscuelaDB::connectDB();
            $conexion->exec("DELETE FROM alumnos WHERE matricula=$this->matricula");
        }

        public static function getAlumnos()
        {
                $conexion = EscuelaDB::connectDB();
                $consulta = $conexion->query("SELECT * FROM alumnos");
                $alumnos = [];

                while ($registro = $consulta->fetchObject()) {
                        $alumnos[] = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
                }
                return $alumnos;
        }

        public static function getAlumnoByMatricula($matricula) {
            $conexion = EscuelaDB::connectDB();
            
            $seleccion = "SELECT * FROM alumnos WHERE matricula='$matricula'";
            $consulta = $conexion->query($seleccion);


            if ($consulta->rowCount() > 0) {
                $registro = $consulta->fetchObject();
                $alumno = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
                $conexion = null;
                        
                return $alumno;
            } else {
                $conexion = null;
                return false;
            }
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