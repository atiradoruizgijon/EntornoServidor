<?php
    include_once "../Model/Asignatura.php";

    if (!isset($_REQUEST['m'])) {
        header('Location: ../Controller/index.php');
        exit();
    }

    if (isset($_POST['abreviacion'])) {
        $mAsignatura = new Asignatura($_REQUEST['idAsignatura'], $_REQUEST['nombre'], $_REQUEST['abreviacion']);

        $mAsignatura->update();

        header('Location: ../Controller/panelAsignaturas.php');
        exit();
    }

    $data['asignatura'] = Asignatura::getAsignaturaById($_REQUEST['m']);

    include "../View/modificarAsignatura_view.php";
?>