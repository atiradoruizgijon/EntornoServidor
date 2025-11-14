<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    $a = 8;
    $b = 3;
    $c = 3;
    echo ($a == $b) && ($c > $b), "<br>";
    echo ($a == $b) || ($b == $c), "<br>";
    echo !($b <= $c), "<br>";
    // Nota: Si imprimimos un boolean, no saldrá true ni false
    // saldrá 1 en caso de true y nada en caso de false
    ?>
</body>

</html>