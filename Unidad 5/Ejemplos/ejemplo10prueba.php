<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    # Esto es diferente, no es un array asociativo, es un array normal, con sus indices numericos
    # pero que contiene arrays asociativos.

    $persona = [
        ["nombre" => "Rosa", "estatura" => 168, "sexo" => "F"],
        ["nombre" => "Ignacio", "estatura" => 175, "sexo" => "M"],
        ["nombre" => "Daniel", "estatura" => 172, "sexo" => "M"],
        ["nombre" => "Rubén", "estatura" => 182, "sexo" => "M"]
    ];

    foreach ($persona as $datos) {
        foreach ($datos as $campo => $valor) {
            echo "$campo: $valor<br>";
        }
        echo "<hr>";
    }
    ?>
</body>

</html>