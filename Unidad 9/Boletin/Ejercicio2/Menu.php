<?php
class Menu
{
    // ambos son arrays
    private $titulo;
    private $enlace;

    public function __construct() {}

    public function añadirElementos($titulo, $enlace) {
        $this->titulo[] = $titulo;
        $this->enlace[] = $enlace;
    }

    public function mostrarEnVertical () {
        foreach ($this->titulo as $key => $value) {
            // display block para que haga el salto en el flujo html
            // sin necesidad de usar <br>
            echo "<a style='display: block;' href='".$this->enlace[$key]."'>".$value."</a>";
        }
    }
    public function mostrarEnHorizontal () {
        foreach ($this->titulo as $key => $value) {
            // display block para que haga el salto en el flujo html
            // sin necesidad de usar <br>
            echo "<a href='".$this->enlace[$key]."'>".$value."</a>";
        }
    }
}
