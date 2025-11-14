<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html {
            font-family: sans-serif;
            font-size: 20px;
        }

        ul {
            list-style-type: none;
            border: 2px solid #000;
            padding: 15px;
            width: fit-content;
        }

        form {
            display: block;
            width: fit-content;
        }

        ul li {
            margin: 10px 5px;
        }

        table {
            font-size: 1em;
            border-collapse: collapse;
        }

        tr:nth-child(odd) {
            background-color: lightblue;
        }

        td {
            border: 2px solid #000;
            padding: 10px;
        }

        main>div {
            width: fit-content;
            display: flex;
            gap: 20px;
            flex-direction: column;
        }

        main {
            width: fit-content;
            display: flex;
            gap: 20px;
            justify-content: center;
            margin: auto;
        }

        tr:first-child {
            background-color: #d3d3d3;
        }

        .terminar__input {
            padding: 20px;
            font-size: 1.5em;
        }

        .terminar {
            display: block;
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    <main>
        <?php

        // Por si quiero mandar directamente hacia atrás
        // en caso de que no se mande nada
        // if (!isset($_REQUEST['personas'])) {
        //     header("location:Ejercicio4.php");
        // }

        if (isset($_REQUEST['cadenaArray'])) {
            $personas = unserialize(base64_decode($_REQUEST['cadenaArray']));
        }

        // print_r($array) para ver los valores del array y ver que va todo bien
        if (!isset($personas)) {
            $personas = [
                ['nombre' => 'Anita', 'sexo' => 'm', 'orientacion' => 'bis'],
                ['nombre' => 'Lolita', 'sexo' => 'm', 'orientacion' => 'bis'],
                ['nombre' => 'Pepito', 'sexo' => 'h', 'orientacion' => 'bis'],
                ['nombre' => 'Juanito', 'sexo' => 'h', 'orientacion' => 'bis'],
                ['nombre' => 'Roberto', 'sexo' => 'h', 'orientacion' => 'het'],
                ['nombre' => 'Antonio', 'sexo' => 'h', 'orientacion' => 'het'],
                ['nombre' => 'Manuela', 'sexo' => 'm', 'orientacion' => 'het'],
                ['nombre' => 'Isabel', 'sexo' => 'm', 'orientacion' => 'het'],
                ['nombre' => 'Jenifer', 'sexo' => 'm', 'orientacion' => 'hom'],
                ['nombre' => 'Susan', 'sexo' => 'm', 'orientacion' => 'hom'],
                ['nombre' => 'Peter', 'sexo' => 'h', 'orientacion' => 'hom'],
                ['nombre' => 'Mike', 'sexo' => 'h', 'orientacion' => 'hom']
            ];
        }

        if (isset($_REQUEST['nombre'])) {
            $personas[] = ['nombre' => $_REQUEST['nombre'], 'sexo' => $_REQUEST['sexo'], 'orientacion' => $_REQUEST['orientacion']];
        }

        $cadenaArray = base64_encode(serialize($personas));

        echo "<table>";
        echo "<tr>
        <td>Nombre</td>
        <td>Sexo</td>
        <td>Orientación</td>
        </tr>";
        for ($i = 0; $i < count($personas); $i++) {
            echo "<tr>";
            foreach ($personas[$i] as $persona => $datos) {
                if ($datos == "het") echo "<td>Heterosexual</td>";
                else if ($datos == "hom") echo "<td>Homosexual</td>";
                else if ($datos == "bis") echo "<td>Bisexual</td>";
                else if ($datos == "m") echo "<td>Mujer</td>";
                else if ($datos == "h") echo "<td>Hombre</td>";
                else echo "<td>$datos</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>
        <div>
            <form action="" method="post">
                <ul>
                    <li>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" required>
                    </li>
                    <li>
                        <label for="sexo">Sexo:</label>
                        <input type="radio" name="sexo" value="m" required>M
                        <input type="radio" name="sexo" value="h" required>H
                    </li>
                    <li>
                        <label for="orientacion">Orientación</label>
                        <select name="orientacion" required>
                            <option value="het">Heterosexual</option>
                            <option value="hom">Homosexual</option>
                            <option value="bis">Bisexual</option>
                        </select>
                    </li>
                    <li>
                        <input type="submit" value="Añadir">
                    </li>
                </ul>
                <input type="hidden" name="cadenaArray" value="<?= $cadenaArray ?>">
            </form>

            <!-- Puedo hacer también:
            <input type="text" name="nueva[nombre]">
            <input type="ratio" name="nueva[sexo]" value="m">
            <input type="ratio" name="nueva[orientacion]" value="het">
            Y esto te lo añade directamente en un array -->

            <form class="terminar" action="listaParejas.php" method="post">
                <input class="terminar__input" type="submit" value="Terminar">
                <input type="hidden" name="cadenaArray" value="<?= $cadenaArray ?>">
            </form>
        </div>
    </main>
</body>

</html>