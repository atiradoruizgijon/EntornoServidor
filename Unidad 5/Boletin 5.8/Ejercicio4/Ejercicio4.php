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
            border: 2px solid black;
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
            float: right;
        }

        td {
            border: 2px solid black;
            padding: 10px;
        }
        div {
            width: 50%;
            margin: auto;
        }
        tr:first-child {
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <div>
        <?php
        
        if (isset($_REQUEST['cadenaArray'])) {
            $personas = unserialize(base64_decode($_REQUEST['cadenaArray']));
        }
        
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
    </div>
</body>

</html>