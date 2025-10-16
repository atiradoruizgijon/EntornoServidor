<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            padding: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    $comida = [
        "Pizzas" => ["Carbonara", "Peperoni", "4 Quesos", "Borde de Queso", "Con piña"],
        "Hamburguesa" => ["Tomate", "Lechuga", "Queso", "Doble de carne", "Cebolla"],
        "Perrito caliente" => ["Lechuga", "Ketchup", "Mayonesa", "Mostaza"]
    ];

    foreach ($comida as $plato => $ingredientes) {
        echo "<h3>$plato</h3>";
        echo "<form action='' method='post'>";
        for ($i = 0; $i < count($ingredientes); $i++) {
    ?>
            <input type="checkbox" name="<?= $i ?>">
            <label for="<?= $i ?>"><?= $ingredientes[$i] ?></label>
    <?php
        }
        echo "</form> <hr>";
    }
    ?>
</body>

</html>