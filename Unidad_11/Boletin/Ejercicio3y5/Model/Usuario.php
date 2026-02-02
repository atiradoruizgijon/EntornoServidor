<?php
    include_once "../Model/TiendaDB.php";

    class Usuario {
        private $id;
        private $username;
        private $password;
        private $rol;

        public function __construct($id = "", $username = "", $password = "", $rol = "")
        {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->rol = $rol;
        }

        public function insert() {
            $conexion = TiendaDB::connectDB();
            $conexion->exec("INSERT INTO usuario(username, password, rol) 
            VALUES ('$this->username', '$this->password', '$this->rol')");
            
            $conexion = null;
        }

        public function update() {
            $conexion = TiendaDB::connectDB();
            $conexion->exec("UPDATE usuario SET username='$this->username', rol='$this->rol', password='$this->password'
            WHERE id=$this->id");

            $conexion = null;
        }

        public function delete() {
            $conexion = TiendaDB::connectDB();
            $conexion->exec("DELETE FROM usuario WHERE id=$this->id");

            $conexion = null;
        }

        public static function getUsuarios()
        {
                $conexion = TiendaDB::connectDB();
                $consulta = $conexion->query("SELECT * FROM usuario");
                $usuario = [];

                while ($registro = $consulta->fetchObject()) {
                        $usuario[] = new Usuario($registro->id, $registro->username, $registro->password, $registro->rol);
                }
                return $usuario;
        }

        public static function getUsuarioById($id) {
            $conexion = TiendaDB::connectDB();
            
            $seleccion = "SELECT * FROM usuario WHERE id='$id'";
            $consulta = $conexion->query($seleccion);


            if ($consulta->rowCount() > 0) {
                $registro = $consulta->fetchObject();
                $usuario = new Usuario($registro->id, $registro->username, $registro->password, $registro->rol);
                $conexion = null;
                        
                return $usuario;
            } else {
                $conexion = null;
                return false;
            }
        }

        public static function getUsuarioByUsername($username) {
            $conexion = TiendaDB::connectDB();
            
            $seleccion = "SELECT * FROM usuario WHERE username='$username'";
            $consulta = $conexion->query($seleccion);


            if ($consulta->rowCount() > 0) {
                $registro = $consulta->fetchObject();
                $usuario = new Usuario($registro->id, $registro->username, $registro->password, $registro->rol);
                $conexion = null;
                        
                return $usuario;
            } else {
                $conexion = null;
                return false;
            }
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        /**
         * Get the value of rol
         */ 
        public function getRol()
        {
                return $this->rol;
        }

        /**
         * Set the value of rol
         *
         * @return  self
         */ 
        public function setRol($rol)
        {
                $this->rol = $rol;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
    }
?>