<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo-ejercicio2.css">
    <title>Document</title>
</head>
<body>
    <main> 
        <div>
            <h2>Administrador</h2>
            <table>
                <tr>
                    <td></td>
                    <td>A</td>
                    <td>B</td>
                    <td>C</td>
                    <td>D</td>
                    <td>E</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>111</td>
                    <td>222</td>
                    <td>333</td>
                    <td>444</td>
                    <td>555</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>666</td>
                    <td>777</td>
                    <td>888</td>
                    <td>999</td>
                    <td>121</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>212</td>
                    <td>313</td>
                    <td>131</td>
                    <td>414</td>
                    <td>141</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>151</td>
                    <td>515</td>
                    <td>616</td>
                    <td>161</td>
                    <td>717</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>171</td>
                    <td>181</td>
                    <td>818</td>
                    <td>191</td>
                    <td>919</td>
                </tr>
            </table>
        </div>
        <div>
            <h2>Usuario</h2>
            <table>
                <tr>
                    <td></td>
                    <td>A</td>
                    <td>B</td>
                    <td>C</td>
                    <td>D</td>
                    <td>E</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>333</td>
                    <td>111</td>
                    <td>444</td>
                    <td>666</td>
                    <td>555</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>313</td>
                    <td>999</td>
                    <td>888</td>
                    <td>777</td>
                    <td>222</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>414</td>
                    <td>121</td>
                    <td>141</td>
                    <td>131</td>
                    <td>161</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>212</td>
                    <td>717</td>
                    <td>151</td>
                    <td>919</td>
                    <td>616</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>515</td>
                    <td>171</td>
                    <td>191</td>
                    <td>818</td>
                    <td>181</td>
                </tr>
            </table>
        </div>
    </main>
        <?php
            $letras = ["A", "B", "C", "D", "E"];
            $coords =  [rand(1, 5), $letras[rand(0, 4)]];
            $cadenaCoords = base64_encode(serialize($coords));

            echo "<p>Tienes que poner la contraseña de: ". $coords[0].$coords[1];  
        ?>
        <form action="acceso.php" method="post">
            <select name="perfil">
                <option value="admin">Administrador</option>
                <option value="user">Usuario</option>
            </select>
            <input type="hidden" name="coords" value="<?= $cadenaCoords ?>">
            <input type="number" name="contraseña" required>
            <input type="submit" value="Acceder">
        </form>
</body>
</html>