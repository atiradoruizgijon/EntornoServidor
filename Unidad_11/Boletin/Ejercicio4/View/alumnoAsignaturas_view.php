<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/index.css">
    <title>Asignaturas de <?= $data['alumno']->getNombre() ?></title>
</head>
<body>
    <main class="main">
        <table class="main__table">
            <thead class="table__header">
                <tr class="table__header-tr">
                    <th class="table__header-th">Abreviación</th>
                    <th class="table__header-th">Nombre</th>
                    <th class="table__header-th"></th>
                </tr>
            </thead>
            <tbody class="table__body">
                <?php
                    foreach ($data['asignaturasAlumno'] as $key => $asignatura) {
                ?>
                        <tr class="table__body-tr">
                            <td class="table__body-tr"><?= $asignatura->getAbreviacion() ?></td>
                            <td class="table__body-tr"><?= $asignatura->getNombre() ?></td>
                            <td class="table__body-tr">
                                <form action="../Controller/alumnoAsignatura.php" method="post">
                                    <input type="hidden" name="idAsignatura" value="<?= $asignatura->getId() ?>">
                                    <input type="hidden" name="matricula" value="<?= $_REQUEST['matricula'] ?>">
                                    <input style="background-color: red;" class="boton" type="submit" value="Eliminar X">
                                </form>
                            </td>
                        </tr>
                <?php
                // fin del foreach
                    }
                ?>
                <tr class="table__body-tr">
                    <form action="../Controller/alumnoAsignaturas.php" method="post">
                        <td class="table__body-td">
                            <select name="asignatura">
                                <?php
                                    foreach ($data['asignaturas'] as $key => $asignatura) {        
                                ?>
                                    <option value="<?= $asignatura->getId() ?>"><?= $asignatura->getNombre() ?></option>
                                <?php
                                // fin foreach
                                    }
                                ?>
                            </select>
                        </td>
                        <td class="table__body-td">
                            <input type="hidden" value="<?= $_REQUEST['matricula'] ?>" name="matricula">
                            <input type="submit" class="boton" value="Añadir">
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>