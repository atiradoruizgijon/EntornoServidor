<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Introduce un número romano:</p>
    <form action="" method="post">
        <input type="text" name="numeroRom">
        <input type="submit" value="Enviar">
    </form>
    <?php
        $letras = [
            'M' => 1000,
            'D' => 500,
            'C' => 100,
            'L' => 50,
            'X' => 10,
            'I' => 1
        ];

        if (isset($_REQUEST['numeroRom'])) {
            $numRom = $_REQUEST['numeroRom'];
            $numRom = trim($numRom);
            // En caso de que se haya introducido en minusculas
            $numRom = strtoupper($numRom);
            $bandera = true;
            $suma = 0;

            for ($i = 0; $i < strlen($numRom); $i++) { 
                if ($numRom[$i] != 'M' && $numRom[$i] != 'D' && $numRom[$i] != 'C' && $numRom[$i] != 'L' && $numRom[$i] != 'X' && $numRom[$i] != 'I') {
                    $bandera = false;
                } else {
                    $suma += $letras[$numRom[$i]];
                }
            }
            if ($bandera) echo "El resultado es: $suma";
            else echo "No has introducido un número romano.";
        }
    ?>
</body>
</html>