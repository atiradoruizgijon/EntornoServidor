<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    $notas['Rosa'] = [5, 2, 7, 9, 10];
    $notas['Ignacio'] = [9, 5];
    $notas['Daniel'] = [10, 9, 9, 7];
    $notas['Rubén'] = [5];
    
    # Primero recorre el array principal 'notas'
    foreach ($notas as $nombres => $calificaciones) {
        echo "$nombres: ";
        # Y luego el array que esta contenido en 'notas', 
        # que le he dado de nombre 'calificaciones' en el foreach anterior
        foreach ($calificaciones as $nota) {
            echo "$nota,";
        }
        echo "<br>";
    }
    ?>
</body>

</html>