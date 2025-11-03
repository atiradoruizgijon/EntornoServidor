<?php
  session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/producto.css">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php
            $escogido = $_SESSION['productos'][$_REQUEST['indice']];
            echo "<li>";
            echo "<img src='$escogido[2]' alt='Imagen Bolígrafro'>";
            echo "</li>";

            echo "<li>";
            echo "<p>$escogido[0]</p>";
            echo "</li>";

            echo "<li>";
            echo "<p>Precio: $escogido[1] €</p>";
            echo "</li>";
        ?>
        <h4>Descripción: </h4>
        <p class="descripcion">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Exercitationem quia id eius fuga consequuntur harum fugiat
            perferendis corrupti delectus autem laudantium neque facere,
            soluta sequi? Tempore praesentium cum beatae repellat.
        </p>
        <form action="tienda.php" method="post">
            <input type="hidden" name="indice" value="<?= $_REQUEST['indice'] ?>">
            <input type="submit" value="Comprar">
        </form>
    </ul>
</body>
</html>