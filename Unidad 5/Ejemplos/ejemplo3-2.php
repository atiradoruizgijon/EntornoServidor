<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    echo "<b>Notas:</b><br>";
    for ($i = 0; $i < 10; $i++) {
        // números aleatorios entre 0 y 10 (ambos incluidos)
        $n[$i] = rand(0, 10);
    }
    for ($i=0; $i < count($n); $i++) { 
        echo "$n[$i] <br>";
    }
    ?>
</body>

</html>