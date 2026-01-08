<?php

// para ahorrarme copiar y pegar el try catch
    function conectar() {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=almacen;charset=utf8", "root", "toor");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        return $conexion;
    }
?>