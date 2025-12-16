<?php
include_once "Animal.php";
class Mamifero extends Animal {
    public function __construct($nombre, $sexo) {
        parent::__construct($nombre, $sexo);
    }
    public function hibernar() {
        echo "Me voy a dormir, zzzzzzz.";
    }
}