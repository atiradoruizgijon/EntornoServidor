<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/nuevoAlumno.css">
    <title>Nuevo Alumno</title>
</head>
<body>
    <main class="main">
        <a class="boton" href="../Controller/index.php">Volver</a>
        <h1 class="main__title">Nuevo Alumno</h1>
        
        <form class="main__form" action="../Controller/nuevoAlumno.php" method="post">
            <input class="form__input" type="text" name="matricula" placeholder="Matrícula">
            <input class="form__input" type="text" name="nombre" placeholder="Nombre del alumno">
            <input class="form__input" type="text" name="apellidos" placeholder="Apellidos del alumno">
            <input class="form__input" type="text" name="curso" placeholder="Curso del alumno">
            <input class="boton form__submit" type="submit" value="Añadir alumno">
        </form>
    </main>
</body>
</html>