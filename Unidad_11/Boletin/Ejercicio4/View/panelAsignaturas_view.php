<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/panelAdministracion.css">
    <style>
        input[type=text] {
            padding: 10px 15px;
            font-size: 1.1rem;
        }
    </style>
    <title>Panel de asignaturas</title>
</head>
<body>
    <main class="main">
        <h1 class="main__title">Asignaturas</h1>
        <a class="boton" href="../Controller/index.php">Volver</a>
        <table class="main__table">
            <thead class="table__header">
                <tr class="table__header-tr">
                    <th class="table__header-th">ID</th>
                    <th class="table__header-th">Abreviatura</th>
                    <th class="table__header-th">Asignatura</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php
                    foreach ($data['asignaturas'] as $key => $asignatura) {
                ?>
                    <tr class="table__tbody-tr">
                        <td class="table__tbody-td"><?= $asignatura->getId() ?></td>
                        <td class="table__tbody-td"><?= $asignatura->getAbreviacion() ?></td>
                        <td class="table__tbody-td"><?= $asignatura->getNombre() ?></td>
                        <td class="table__tbody-td"><a class="boton" href="../Controller/panelAsignaturas.php?d=<?= $asignatura->getId() ?>">Eliminar</a></td>
                    </tr>
                <?php  
                    }  
                ?>
                <tr class="table__tbody-tr">
                    <td class="table__tbody-td"></td>
                    <form action="../Controller/panelAsignaturas.php" method="post">
                        <td class="table__tbody-td">
                            <input type="text" name="abreviacion" placeholder="Abreviatura">
                        </td>
                        <td class="table__tbody-td">
                            <input type="text" name="nombre" placeholder="Nombre de asignatura">
                        </td>
                        <td class="table__tbody-td">
                            <input class="boton" type="submit" value="Añadir asignatura">
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>