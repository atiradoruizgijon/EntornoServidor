<?php
    include_once "../Model/Alumno.php";
    include_once "../Model/Asignatura.php";
    include_once "../Model/Alumno_Asignatura.php";

    if (isset($_POST['abreviacion'])) {
        $nAsignatura = new Asignatura("", $_POST['nombre'], $_POST['abreviacion']);
        $nAsignatura->insert();
    }

    // d de delete, para borrar una asignatura:
    if (isset($_REQUEST['d'])) {
        $nAsignatura = new Asignatura($_REQUEST['d'], "", "");
        $nAsignatura->delete();
    }

    $data['asignaturas'] = Asignatura::getAsignaturas();

    include "../View/panelAsignaturas_view.php";
?>