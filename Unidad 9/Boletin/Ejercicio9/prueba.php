<?php
    include_once "Coche.php";
    include_once "CocheLujo.php";

    if (session_status() == PHP_SESSION_NONE) session_start();

    if (!isset($_SESSION['coches'])) {
        // coches de prueba:
        $coches = [
            new Coche("rfe313", "Ford Tourneo", 10000)
        ];
    } else {
        $coches = unserialize(base64_decode($_SESSION['coches']));
    }

    if (isset($_REQUEST['matricula'])) {
        if (isset($_REQUEST['suplemento']) && $_REQUEST['suplemento'] != "") {
            $coches[] = new CocheLujo($_REQUEST['matricula'], $_REQUEST['modelo'], $_REQUEST['precio'], $_REQUEST['suplemento']);
        } else {
            $coches[] = new Coche($_REQUEST['matricula'], $_REQUEST['modelo'], $_REQUEST['precio']);
        }
    }

    $_SESSION['coches'] = base64_encode(serialize($coches));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>
<body>
    <main>
        <table>
            <tr>
                <td>Matricula</td>
                <td>Modelo</td>
                <td>Precio</td>
                <td>Suplemento</td>
            </tr>
            <?php
                foreach ($coches as $key => $value) {
                    echo "<tr>";
                    echo $value->__toString();
                    if (get_class($value) == "Coche") {
                        echo "<td>No procede</td>";
                    }
                    echo "</tr>";
                }  
                ?>
        </table>
        <form action="" method="post">
            <input type="text" name="matricula" placeholder="Matricula" required>
            <input type="text" name="modelo" placeholder="Modelo" required>
            <input type="number" name="precio" min=1 placeholder="Precio" required>
            <input type="number" name="suplemento" min=1 placeholder="Suplemento (si es de lujo)">
            <input type="submit" value="Añadir">
        </form>
    </main>
</body>
</html>