<?php
  if (session_status() == PHP_SESSION_NONE) session_start();

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            border: 2px solid black;
            padding: 15px 25px;
        }
        table {
            border-collapse: collapse;
            margin: auto;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="3">FECHA: <?= date("d/m/Y") ?> </td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td>Animal</td>
            <td>Edad</td>
        </tr>
    </table>
</body>
</html>