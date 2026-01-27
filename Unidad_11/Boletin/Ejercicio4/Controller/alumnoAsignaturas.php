<?php
    include_once "../Model/Alumno.php";
    include_once "../Model/Asignatura.php";
    include_once "../Model/Alumno_Asignatura.php";

    if (!isset($_REQUEST['matricula'])) {
        header('Location: ../Controller/index.php');
    }

    if (isset($_POST['asignatura'])) {
        $alumnoAsignatura = new Alumno_Asignatura("", $_REQUEST['matricula'], $_REQUEST['asignatura']);
        $alumnoAsignatura->insert();
    }

    if (isset($_POST['idAsignatura'])) {
        Alumno_Asignatura::deleteByIdAsignaturaMatricula($_POST['matricula'], $_POST['idAsignatura']);
    }

    $data['alumno'] = Alumno::getAlumnoByMatricula($_REQUEST['matricula']);
    $data['asignaturasAlumno'] = Alumno_Asignatura::getAlumnoAsignaturaByMatricula($_REQUEST['matricula']);
    $data['asignaturas'] = Alumno_Asignatura::getAsignaturasNoMatriculadas($_REQUEST['matricula']);

    include "../View/alumnoAsignaturas_view.php";
?>