<?php

class tableros {

    private $idTablero;
    private $nombreTablero;
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexiones();
    }

    public function insertarTablero() {
        $sql = "INSERT INTO tableros(idTablero, nombreTablero) "
                . "VALUES (null, '{$this->getNombreTablero()}')";

        return $this->conexion->consultaSimple($sql);
    }

    public function listarTableros() {
        $sql = "SELECT idTablero, nombreTablero FROM tableros";

        return $this->conexion->consulta($sql);
    }

    public function listarIdTablero() {
        $sql = "SELECT idTablero, nombreTablero "
                . "FROM tableros "
                . "WHERE idTablero={$this->getIdTablero()}";

        return $this->conexion->consulta($sql);
    }

    public function editarTablero() {
        $sql = "UPDATE tableros SET nombreTablero='{$this->getNombreTablero()}' "
                . "WHERE idTablero={$this->getIdTablero()}";

        return $this->conexion->consultaSimple($sql);
    }

    public function eliminarTablero() {
        $sql = "DELETE FROM `tableros` WHERE idTablero={$this->getIdTablero()}";

        return $this->conexion->consultaSimple($sql);
    }

    public function getIdTablero() {
        return $this->idTablero;
    }

    public function getNombreTablero() {
        return $this->nombreTablero;
    }

    public function setIdTablero($idTablero) {
        $this->idTablero = $idTablero;
    }

    public function setNombreTablero($nombreTablero) {
        $this->nombreTablero = $nombreTablero;
    }
}
