<?php
abstract class Animal {
    private $nombre;
    private $sexo;
    
    public function __construct($nombre, $sexo) {
        $this->nombre = $nombre;
        $this->sexo = $sexo;
    }
    public function getSexo() {
        return $this->sexo;
    }
    public function getNombre() {
        return $this->nombre;
    }
}