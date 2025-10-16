<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 50px;
        }
        table {
            margin: auto;
        }
    </style>
</head>

<body>
    <table>
        <?php
        if (!isset($_REQUEST['cadenaArray'])) {
            $ojos = [];
        } else {
            $ojos = explode(' ', $_REQUEST['cadenaArray']);
        }

        if (isset($_REQUEST['abrir'])) {
            $indice = $_REQUEST['abrir'];

            // Si encuentra que esta en el array, lo cierra
            // machacando el valor en el indice en el que se encuentra
            if (in_array($indice, $ojos)) {
                // Asi sale la URL super larga, pero bueno
                $ojos[array_search($indice, $ojos)] = -1;
            } else {
                $ojos[] = $indice;
            }
        }

        $cadenaArray = implode(" ", $ojos);

        for ($i = 1; $i <= 100; $i++) {
            if ($i == 1) echo "</tr>";
            $imagen = in_array($i, $ojos) ? "abierto.jpg" : "cerrado.png";
        ?>
            <td>
                <a href="Ejercicio1.php?abrir=<?= $i ?>&cadenaArray=<?= $cadenaArray ?>">
                    <img src="<?= $imagen ?>" alt="Imagen de ojo">
                </a>
            </td>
        <?php
            if ($i% 10 == 0) echo "</tr>";
            if ($i% 10 == 0) echo "<tr>";
        }

        ?>
    </table>
</body>

</html>