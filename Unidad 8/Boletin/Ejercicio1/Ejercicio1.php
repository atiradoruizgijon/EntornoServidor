<?php
  if (session_status() == PHP_SESSION_NONE) session_start();

    $hoy = date("d/m/Y");
    
    if (!isset($_SESSION['animales'])) {
        // array de prueba:
        $animales = [];
    } else {
        $animales = unserialize(base64_decode($_SESSION['animales']));
    }

    if (isset($_REQUEST['datos'])) {
        $animales[] = $_REQUEST['datos'];
    }

    $_SESSION['animales'] = base64_encode(serialize($animales));

    if (isset($_REQUEST['grabar'])) {
        // si no existe el fichero en el almacenamiento, lo creo.
        if (!file_exists("animales.txt")) {
            $fichero = fopen("animales.txt", "w");
            fclose($fichero);
        }
        // lo abro como lectura para comprobar si la fecha de hoy ya está
        $fichero = fopen("animales.txt", "r");

        while (!feof($fichero)) {
            // comparar fecha añadiendo PHP_EOL, si no, no lo detecta.
            if (fgets($fichero) == $hoy. PHP_EOL) {
                // en caso de que se encuentre la fecha:
                $fechaEncontrada = true;
            }            
        }
        fclose($fichero);
        
        // inserto los animales en el fichero:
        $fichero = fopen("animales.txt", "a+");
        // si antes no se encontró la fecha, se escribe en el fichero.
        if (!isset($fechaEncontrada)) {
            fputs($fichero, $hoy.PHP_EOL);
        }
        foreach ($animales as $key => $value) {
            fputs($fichero, $value[0]."-".$value[1]."-".$value[2]. PHP_EOL);
        }
        fclose($fichero);
        
        session_destroy();
        unset($_SESSION['animales']);
        unset($animales);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Ejercicio1.css">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td colspan="3">FECHA: <?= $hoy ?> </td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td>Animal</td>
            <td>Edad</td>
        </tr>
        <?php
          if (isset($animales)) {
            foreach ($animales as $key => $animal) {
                echo "<tr>";
                foreach ($animal as $key => $dato) {
                    echo "<td>$dato</td>";
                }
                echo "</tr>";
            }
          }  
        ?>
    </table>
    <form action="" method="post">
        Nombre:
        <input type="text" name="datos[]" required>
        Animal:
        <input type="text" name="datos[]" required>
        Edad:
        <input type="number" name="datos[]" min=0 required>
        <input class="boton" type="submit" value="Añadir">
    </form>
    <form action="" method="post">
        <input type="hidden" value="" name="grabar">
        <input class="boton" type="submit" value="Grabar">
    </form>
</body>
</html>