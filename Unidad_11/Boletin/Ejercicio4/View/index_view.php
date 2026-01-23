<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/index.css">
    <title>Inicio</title>
</head>
<body>
    <main class="main">
        <h1 class="main__title">Alumnos</h1>
        <a class="boton" href="../Controller/nuevoAlumno.php">Añadir alumno</a>
        <table class="main__table">
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Matrícula</th>
                <th>Curso</th>
            </tr>
            <?php
                foreach ($data['alumnos'] as $key => $alumno) {
                    
            ?>
                <tr>
                    <td><?= $alumno->getNombre() ?></td>
                    <td><?= $alumno->getApellidos() ?></td>
                    <td><?= $alumno->getMatricula() ?></td>
                    <td><?= $alumno->getCurso() ?></td>
                </tr>
            <?php
            // fin del foreach
                }
                    
            ?>  
        </table>
    </main>
</body>
</html>