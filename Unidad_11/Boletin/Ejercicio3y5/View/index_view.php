<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Hola, te has logeado <?= $data['usuario']->getUsername() ?></h1>
    <h1><?= $data['usuario']->getRol() ?></h1>
    <h1><?= $data['usuario']->getPassword() ?></h1>
</body>
</html>