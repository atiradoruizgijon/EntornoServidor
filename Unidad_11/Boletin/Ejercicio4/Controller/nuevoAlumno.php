<?php
    include_once "../Model/Alumno.php";
    include_once "../Model/Asignatura.php";
    include_once "../Model/Alumno_Asignatura.php";

    if (isset($_POST['nombre'])) {
        $nuevoAlumno = new Alumno($_REQUEST['matricula'],
        $_REQUEST['nombre'],
        $_REQUEST['apellidos'],
        $_REQUEST['curso']);

        $nuevoAlumno->insert();
        
        header('Location: ../Controller/index.php');
        exit();
    }
    
    include "../View/nuevoAlumno_view.php";
?>