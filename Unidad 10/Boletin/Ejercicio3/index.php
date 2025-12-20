<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Tienda</title>
</head>
<body>
    <header>
        <h1>La Estilográfica</h1>
    </header>
    <main>
        <h3>Productos</h3>
        <section class="boligrafo">
            <picture>
                <img src="css/img/boliAzul1.webp" alt="Boligrafo">
            </picture>
            <p>Descripción del boligrafo</p>
            <p class="precio">Precio: <span>200 €</span></p>
            <form action="compra.php" method="post">
                <input type="hidden" value="idBoli">
                <input class="comprar" type="submit" value="Comprar">
            </form>
        </section>
    </main>
</body>
</html>