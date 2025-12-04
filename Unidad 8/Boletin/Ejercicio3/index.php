<?php
    if (session_status() == PHP_SESSION_NONE) session_start();

    if (isset($_REQUEST['borrar'])) {
        setcookie("prodEnCesta", "", -1);
        setcookie("cesta", "", -1);
        session_destroy();
        unset($_SESSION['productos']);
        unset($_SESSION['prodEnCesta']);
    }

    if (isset($_COOKIE['cesta'])) {
        $_SESSION['cesta'] = $_COOKIE['cesta'];
    }
    // compruebo si existe la sesion cesta
    if (isset($_SESSION['cesta'])) {
        // si existe la guardo en $cesta
        $cesta = unserialize(base64_decode($cesta));
    } else {
        // si no, inicializo $cesta, es decir, no hay ningun producto en cesta
        $cesta = [];
    }
    if (!isset($_SESSION['productos'])) {
        // $productos = [
        //     "Raton" => [20, "css/img/raton.jpg", "Ratón ergonómico con el que tu mano no sufrirá en largas sesiones de trabajo."],
        //     "Teclado" => [30, "css/img/teclado.jpg", "Teclado ergonómico, para largas sesiones de trabajo. Perfecto para cuidar de tus muñecas."],
        //     "Monitor" => [100, "css/img/monitor.png", "Monitor LCD IPS de 27 pulgadas."],
        //     "Mando" => [50, "css/img/mandoSteam.webp", "Nuevo mando de la compañía Valve, el Steam Controller. Siendo una de sus características más llamativas, sus dos paneles táctiles incorporados al mando, para controlar el cursor de tu ordenador."]
        // ];
        $ficProd = fopen("productos.txt", "r");
            while (!feof($ficProd)) {
                $productos[] = fgetcsv($ficProd, null, "-");
            }
        fclose($ficProd);
    } else {
        $productos = unserialize(base64_decode($_SESSION['productos']));
    }

    if (isset($_SESSION['prodEnCesta'])) {
        $prodEnCesta = $_SESSION['prodEnCesta'];
    } else {
        $prodEnCesta = 0;
    }

    if (isset($_REQUEST['producto'])) {
        $_SESSION['cesta'][] = $productos[$_REQUEST['producto']];
        $prodEnCesta++;
    }

    setcookie("cesta", base64_encode(serialize($cesta)), strtotime("+3 days"));
    setcookie("prodEnCesta", $prodEnCesta, strtotime("+3 days"));
    $_SESSION['productos'] = base64_encode(serialize($productos));
    $_SESSION['prodEnCesta'] = $prodEnCesta;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
  <title>Tienda</title>
</head>

<body>
    <table>
        <tr>
            <td colspan="4">Productos en cesta: <?= $prodEnCesta ?></td>
        </tr>
        <tr>
            <td>Producto</td>
            <td>Precio</td>
            <td>Imagen</td>
            <td>Carrito</td>
        </tr>
        <?php
            foreach ($productos as $ind => $producto) {
                echo "<tr>
                <td>$producto[1]</td>
                <td class='precio'>$producto[2] €</td>
                <td><img src='$producto[3]'></td>
                <td>
                    <form action='' method='post'>
                        <input type='hidden' name='producto' value='$ind'>
                        <input type='submit' value='Añadir a la cesta'>
                    </form>
                </td>
                </tr>";
            }
        ?>
    </table>
    <a href="cesta.php">Ver la cesta</a>
    <a href="gestion.php">Gestión</a>
    <form action='' method='post'>
            <input type='submit' name='borrar' value='Borrar Cookies/Sesion'>
    </form>
</body>

</html>