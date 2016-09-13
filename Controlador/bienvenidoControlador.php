<?php

class bienvenidoControlador {

    private $modelo;

    public function __construct() {
        $this->modelo = Modelo::cargar('tableros');
    }

    function principal() {
        Vista::mostrar('bienvenido');
    }

}
