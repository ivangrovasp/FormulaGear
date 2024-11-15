<?php
require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/config/dbConnection.php';

class Usuario {
    private $idTalla;
    private $nombreTalla;
    private $idProducto;

    public function getIdTalla() {
        return $this->idTalla;
    }

    public function setIdTalla($idTalla) {
        $this->idTalla = $idTalla;
    }

    public function getNombreTalla() {
        return $this->nombreTalla;
    }

    public function setNombreTalla($nombreTalla) {
        $this->nombreTalla = $nombreTalla;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }
}
?>
