<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_SESSION['animales'])) {
    $animales = unserialize(base64_decode($_SESSION['animales']));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Ejercicio2.css">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <p>Escoge la fecha:</p>
        <select name="fecha">
            <?php
            $fichero = fopen("../Ejercicio1/animales.txt", "r");
            while (!feof($fichero)) {
                $linea = trim(fgets($fichero));
                // esta funcion devuelve false en caso de que no se encuentre
                if (mb_stripos($linea, "/") != false) {
                    echo $linea;
                    echo "<option value='$linea'>$linea</option>";
                }
            }
            fclose($fichero);
            ?>
        </select>
        <input type="submit" value="Enviar">
    </form>

    <table>
        <?php
        if (isset($_REQUEST['fecha'])) {
            $fecha_seleccionada = $_REQUEST['fecha'];
            $fichero = fopen("../Ejercicio1/animales.txt", "r");
            $animales = [];
            // bandera:
            $en_fecha = false;

            if ($fichero) {
                while (!feof($fichero)) {
                    $linea = trim(fgets($fichero));
                    
                    // compruebo  si la línea es una fecha
                    $es_fecha = strpos($linea, "/") != false;

                    // si es una fecha:
                    if ($linea == $fecha_seleccionada) {
                        $en_fecha = true;
                    } 
                    // si no es una fecha y no esta vacia la linea:
                    else if ($en_fecha && !$es_fecha && !empty($linea)) {
                        $aux = explode("-", $linea);
                        // guardo los animales en un array
                        $animales[] = [$aux[0], $aux[1], $aux[2]];
                    }
                    // si es una fecha:
                    else if ($en_fecha && $es_fecha) {
                        $en_fecha = false;
                        break;
                    }
                }
                fclose($fichero);
                
                $_SESSION['animales'] = base64_encode(serialize($animales));
            }

            if (!empty($animales)) {
        ?>
            <tr>
                <td>Nombre</td>
                <td>Animal</td>
                <td>Edad</td>
            </tr>
        <?php
            }
        }

        if (!empty($animales)) {
            foreach ($animales as $value) {
                echo "<tr>
                        <td>{$value[0]}</td>
                        <td>{$value[1]}</td>
                        <td>{$value[2]}</td>
                    </tr>";
            }
        }
        ?>
    </table>
</body>

</html>