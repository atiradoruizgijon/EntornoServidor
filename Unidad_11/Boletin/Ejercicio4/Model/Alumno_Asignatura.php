<?php
    include_once "../Model/EscuelaDB.php";

    class Alumno_Asignatura {
        private $id;
        private $matriculaAlumno;
        private $idAsignatura;

        public function __construct(
        $id = "",
        $matriculaAlumno = "",
        $idAsignatura = ""
        )
        {
            $this->id = $id;
            $this->matriculaAlumno = $matriculaAlumno;
            $this->idAsignatura = $idAsignatura;
        }

        public function insert() {
            $conexion = EscuelaDB::connectDB();
            $conexion->exec("INSERT INTO alumno_asignatura(matriculaAlumno, idAsignatura) VALUES ('$this->matriculaAlumno', $this->idAsignatura)");
            
            $conexion = null;
        }

        /**
         * Realmente no hace falta porque en este tipo de tablas intermedias nunca te va a hacer falta actualizar.
         * Lo dejo hecho por si acaso.
         */
        public function update() {
            $conexion = EscuelaDB::connectDB();
            $conexion->exec("UPDATE alumno_asignatura SET matriculaAlumno='$this->matriculaAlumno', idAsignatura=idAsignatura WHERE id=$this->id");

            $conexion = null;
        }
            
        public function delete() {
            $conexion = EscuelaDB::connectDB();
            $conexion->exec("DELETE FROM alumno_asignatura WHERE id=$this->id");
            $conexion = null;
        }

        public static function deleteByIdAsignaturaMatricula($matricula, $idAsignatura) {
            $conexion = EscuelaDB::connectDB();
            $conexion->exec("DELETE FROM alumno_asignatura
                            WHERE matriculaAlumno = '$matricula'
                            AND idAsignatura = $idAsignatura");
            $conexion = null;
        }

        public static function getAlumnoAsignatura()
        {
            $conexion = EscuelaDB::connectDB();
            $consulta = $conexion->query("SELECT * FROM alumno_asignatura");
            $alumno_asignatura = [];

            while ($registro = $consulta->fetchObject()) {
                $alumno_asignatura[] = new Alumno_Asignatura($registro->id, $registro->matriculaAlumno, $registro->idAsignatura);
            }
            $conexion = null;
            return $alumno_asignatura;
        }

        /**
         * devuelve un array con todas las asignaturas segun la matricula del alumno
         * @param matriculaAlumno matricula del alumno
         */
        public static function getAlumnoAsignaturaByMatricula($matriculaAlumno) {
            $conexion = EscuelaDB::connectDB();

            $insercion = "
            SELECT a.*
            FROM asignaturas a
            INNER JOIN alumno_asignatura aa ON a.id = aa.idAsignatura
            WHERE aa.matriculaAlumno = '$matriculaAlumno'
            ";

            $consulta = $conexion->query($insercion);
            $asignaturas = [];

            while ($registro = $consulta->fetchObject()) {
                $asignaturas[] = new Asignatura($registro->id, $registro->abreviacion, $registro->nombre);
            }

            $conexion = null;
            return $asignaturas;
        }

        /**
         * devuelve un array con las asignaturas en las
         * que no esta matriculado el alumno
         * @param matricula matricula del alumno
         */
        public static function getAsignaturasNoMatriculadas($matricula) {
            $conexion = EscuelaDB::connectDB();

            $consulta = "SELECT * FROM asignaturas
            WHERE id NOT IN (
                SELECT idAsignatura
                FROM alumno_asignatura
                WHERE matriculaAlumno='$matricula'
                )";
            $asignaturas = [];

            $consulta = $conexion->query($consulta);
            
            while ($registro = $consulta->fetchObject()) {
                $asignaturas[] = new Asignatura($registro->id, $registro->abreviacion, $registro->nombre);
            }
            
            $conexion = null;
            return $asignaturas;
        }

        // no creo que haga falta esto, pero lo dejo:
        public static function getAlumnoAsignaturaById($id) {
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT * FROM alumno_asignatura WHERE id=$id";
            $consulta = $conexion->query($seleccion);

            if ($consulta->rowCount() > 0) {
                $registro = $consulta->fetchObject();
                $alumno_asignatura = new Alumno_Asignatura($registro->id, $registro->matriculaAlumno, $registro->idAsignatura);
                $conexion = null;
                
                return $alumno_asignatura;
            } else {
                $conexion = null;
                return false;
            }
        }

        /**
         * Get the value of matriculaAlumno
         */ 
        public function getMatriculaAlumno()
        {
                return $this->matriculaAlumno;
        }

        /**
         * Set the value of matriculaAlumno
         *
         * @return  self
         */ 
        public function setMatriculaAlumno($matriculaAlumno)
        {
                $this->matriculaAlumno = $matriculaAlumno;

                return $this;
        }

        /**
         * Get the value of idAsignatura
         */ 
        public function getIdAsignatura()
        {
                return $this->idAsignatura;
        }

        /**
         * Set the value of idAsignatura
         *
         * @return  self
         */ 
        public function setIdAsignatura($idAsignatura)
        {
                $this->idAsignatura = $idAsignatura;

                return $this;
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
    }
?>