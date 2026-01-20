<?php
    abstract class AlmacenDB {
        private static $server = 'localhost';
        private static $db = 'almacen';
        private static $user = 'root';
        private static $password = 'toor';

        public static function connectDB() {
        try {
            // Aqui se usa self::server, en vez de this::server, porque
            // para atributos estaticos se utiliza self
            $connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=utf8",
            self::$user, self::$password);
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
        }
            return $connection;
        }
    }
?>