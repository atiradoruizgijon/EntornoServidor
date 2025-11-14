<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    $estatura['Rosa'] = 168;
    $estatura['Ignacio'] = 175;
    $estatura['Daniel'] = 172;
    $estatura['Rubén'] = 182;
    echo "La estatura de Daniel es ", $estatura['Daniel'], " cm"; 
    
    foreach ($estatura as $nombre => $altura) {
        echo "$nombre con $altura cm <br>";
    }
    ?>
</body>

</html>