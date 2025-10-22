<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo-ejercicio1.css">
    <title>Document</title>
</head>
<body>
    <h1>Lotería</h1>
    <div>
        <p>Numeros 1 - 49 | Número de serie 1 - 999</p>
        <p>Sí quieres introducir un título:</p>
        <form action="loteria.php" method="post">
            <input type="text" name="titulo" placeholder="Título Opcional">
            <br>
            <!-- Los paso como array. -->
            <input type="number" name="numEle[]" min=1 max=49>
            <input type="number" name="numEle[]" min=1 max=49>
            <input type="number" name="numEle[]" min=1 max=49>
            <input type="number" name="numEle[]" min=1 max=49>
            <input type="number" name="numEle[]" min=1 max=49>
            <input type="number" name="numEle[]" min=1 max=49>
            <input type="number" name="numSerie" min=1 max=999 placeholder="Nº Serie"> <br>
            <input type="submit" value="Comprobar">
        </form>
    </div>
</body>
</html>