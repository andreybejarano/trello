<?php

class tableroControlador {

    private $modelo;

    public function __construct() {
        $this->modelo = Modelo::cargar("tableros");
    }

    public function principal() {
        Vista::mostrar('tableros');
    }

    public function postBoard() {
        $datos = json_decode(file_get_contents("php://input"));
        $this->modelo->setNombreTablero($datos->nombreTablero);
        echo $this->modelo->insertarTablero();
    }

    public function getBoards() {
        echo json_encode($this->modelo->listarTableros());
    }

    public function putTablero() {
        $datos = json_decode(file_get_contents("php://input"));
        $this->modelo->setIdTablero($datos->idTablero);
        $this->modelo->setNombreTablero($datos->nombreTablero);
        echo $this->modelo->editarTablero();
    }

    public function deleteTablero() {
        $datos = json_decode(file_get_contents("php://input"));
        $this->modelo->setIdTablero($datos->idTablero);
        echo $this->modelo->eliminarTablero();
    }

    public function getIdBoard() {
        $datos = json_decode(file_get_contents("php://input"));
        $this->modelo->setIdTablero($datos->idTablero);
        echo json_encode($this->modelo->listarIdTablero());
    }

    public function putBoard() {
        $datos = json_decode(file_get_contents("php://input"));
        $this->modelo->setIdTablero($datos->idTablero);
        $this->modelo->setNombreTablero($datos->nombreTablero);
        echo $this->modelo->editarTablero();
    }

    public function deleteBoard() {
        $datos = json_decode(file_get_contents("php://input"));
        $this->modelo->setIdTablero($datos->idTablero);
        echo $this->modelo->eliminarTablero();
    }

}
