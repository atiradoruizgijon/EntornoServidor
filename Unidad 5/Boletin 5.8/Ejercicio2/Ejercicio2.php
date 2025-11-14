<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            padding: 5px;
            margin: 10px 5px;
        }
    </style>
</head>

<body>
    <h2>Restaurante de comida rápida</h2>
    <?php
    $comida = [
        "Pizza" => ["Carbonara", "Peperoni", "Más queso", "Borde de Queso", "Piña"],
        "Hamburguesa" => ["Tomate", "Lechuga", "Queso", "Doble de carne", "Cebolla"],
        "Perrito caliente" => ["Lechuga", "Ketchup", "Mayonesa", "Mostaza"]
    ];

    # Aqui mando el array para que no se pierda
    if (isset($_REQUEST['cadenaArray'])) {
        $ingPedidos = $_REQUEST['cadenaArray'];
        $pedido = unserialize(base64_decode($ingPedidos));

        $pedido[] = $_REQUEST['ingPedidos'];
    } else {
        $pedido = [];
    }
    


    $ingPedidos = base64_encode(serialize($pedido));

    foreach ($comida as $plato => $ingredientes) {
        echo "<h3>$plato</h3>";
        echo "<form action='' method='post'>";
        // Lo meto en <b></b> para que el pedido final se vea mejor
        echo "<input type='hidden' name='ingPedidos[]' value='<b>$plato:</b>'>";
        for ($i = 0; $i < count($ingredientes); $i++) {
    ?>
            
            <input type="checkbox" name="ingPedidos[]" value="<?= $ingredientes[$i] ?>">
            <label for="<?= $i ?>"><?= $ingredientes[$i] ?></label>
            <input type="hidden" name="cadenaArray" value="<?= $ingPedidos ?>">
    <?php
        }
        echo "<br><input type='submit' value='Pedir'>";
        echo "</form> <hr>";
    }
    ?>
    <form action="pedido.php" method="post">
        <input type="hidden" name="pedido" value="<?= $ingPedidos ?>">
        <input type="submit" value="Terminar pedido">
    </form>
</body>

</html>