<?php
class Producto
{
    private $id;
    private $nombre;
    private $precio;
    private $imagen;

    public function __construct($id = "", $nombre = "", $imagen = "", $precio = 0)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->precio = $precio;
    }

    public function insert()
    {
        $conexion = TiendaDB::connectDB();
        $conexion->exec("INSERT INTO productos(nombre, imagen, precio) 
            VALUES ('$this->nombre', '$this->imagen', '$this->precio')");

        $conexion = null;
    }

    public function update()
    {
        $conexion = TiendaDB::connectDB();
        $conexion->exec("UPDATE productos SET nombre='$this->nombre', imagen='$this->imagen', 
        precio='$this->precio' WHERE id=$this->id");

        $conexion = null;
    }

    public function delete()
    {
        $conexion = TiendaDB::connectDB();
        $conexion->exec("DELETE FROM productos WHERE id=$this->id");

        $conexion = null;
    }

    public static function getProductos()
    {
        $conexion = TiendaDB::connectDB();
        $consulta = $conexion->query("SELECT * FROM productos");
        $producto = [];

        while ($registro = $consulta->fetchObject()) {
            $producto[] = new Producto(
                $registro->id,
                $registro->nombre,
                $registro->imagen,
                $registro->precio
            );
        }
        return $producto;
    }

    public static function getProductoById($id)
    {
        $conexion = TiendaDB::connectDB();

        $seleccion = "SELECT * FROM productos WHERE id=$id";
        $consulta = $conexion->query($seleccion);


        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $producto = new Producto(
                $registro->id,
                $registro->nombre,
                $registro->imagen,
                $registro->precio
            );
            $conexion = null;

            return $producto;
        } else {
            $conexion = null;
            return false;
        }
    }

    public static function getProductoByNombre($nombre)
    {
        $conexion = TiendaDB::connectDB();

        $seleccion = "SELECT * FROM productos WHERE nombre='$nombre'";
        $consulta = $conexion->query($seleccion);


        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $producto = new Producto(
                $registro->id,
                $registro->nombre,
                $registro->imagen,
                $registro->precio
            );
            $conexion = null;

            return $producto;
        } else {
            $conexion = null;
            return false;
        }
    }

    /**
     * Devuelve un array de productos que contengan
     * o coincidan parcialmente con el nombre.
     * @param String $cadena String con el que se buscan las conincidencias.
     * @return Array $productos array con productos, si no encuentra ninguno,
     * se devuelve un array vacío.
     */
    public static function getProductosByNombre($cadena)
    {
        $conexion = TiendaDB::connectDB();

        $seleccion = "SELECT * FROM productos WHERE nombre LIKE '%$cadena%'";
        $consulta = $conexion->query($seleccion);
        $productos = [];

        // MEJOR USAR fetch(PDO::FETCH_ASSOC)
        // MEJOR USAR fetchAll(PDO::FETCH_ASSOC)
        // while ($registro = $consulta->fetchObject()) {
        //     $productos[] = new Producto(
        //         $registro->id,
        //         $registro->nombre,
        //         $registro->imagen,
        //         $registro->precio
        //     );
        // }
    
        $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $productos;
    }
}
