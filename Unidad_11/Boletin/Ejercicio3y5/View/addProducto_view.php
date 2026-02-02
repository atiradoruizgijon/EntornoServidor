<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/addProducto.css">
    <title>Añadir nuevo producto</title>
</head>
<body>
    <main class="main">
        <h1 class="main__title">Añadir un nuevo producto</h1>

        <form class="main__form" action="../Controller/addProducto.php" method="post">
            <input class="form__input" type="text" name="nombre" placeholder="Nombre del producto">
            <input class="form__input" type="text" name="descripcionCorta" placeholder="Breve descripción del producto">
            <textarea class="form__textarea" name="descripcionLarga" placeholder="Descripción larga del producto."></textarea>
            <input type="number" placeholder="Precio €" min=0.01 max=100000 step="0.01">
            <input type="file" name="imagen">
            
            <input type="submit" value="Añadir">
        </form>
    </main>    
</body>
</html>