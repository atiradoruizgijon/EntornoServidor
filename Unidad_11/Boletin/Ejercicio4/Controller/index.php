<?php
    include_once "../Model/Alumno.php";

    $data['alumnos'] = Alumno::getAlumnos();

    include "../View/index_view.php";
?>