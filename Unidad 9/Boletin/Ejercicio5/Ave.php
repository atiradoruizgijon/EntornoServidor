<?php
include_once "Animal.php";
class Ave extends Animal {
    public function __construct($nombre, $sexo) {
        parent::__construct($nombre, $sexo);
    }
    // numero de huevos
    public function ponerHuevos($huevos) {
        echo $this->getNombre()." ha puesto $huevos huevos";
    }
}