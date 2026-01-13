<?php
    $imagen = $_REQUEST['imagenAnterior'];
    
    if ($_FILES["imagen"]["name"] != "") {
        // sube la imagen al servidor
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/images/" . $_FILES["imagen"]["name"]);
        
        // borro la imagen antigüa:
        unlink($imagen);

        // ...
    }
?>