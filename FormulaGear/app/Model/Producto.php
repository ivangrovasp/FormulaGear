<?php
require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/config/dbConnection.php';

Class Producto{
    private $idProducto;
    private $nombreProducto;
    private $precioProducto;
    private $descripcionProducto;
    private $imagenProducto;
    private $numeroLikesProducto;

    public function __construct($idProducto,$nombreProducto,$precioProducto,$descripcionProducto,$imagenProducto,$numeroLikesProducto){
        $this->idProducto = $idProducto;
        $this->nombreProducto = $nombreProducto;
        $this->precioProducto = $precioProducto;
        $this->descripcionProducto = $descripcionProducto;
        $this->imagenProducto = $imagenProducto;
        $this->numeroLikesProducto = $numeroLikesProducto;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }


    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }


    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }


    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
    }


    public function getPrecioProducto()
    {
        return $this->precioProducto;
    }

    public function setPrecioProducto($precioProducto)
    {
        $this->precioProducto = $precioProducto;
    }


    public function getDescripcionProducto()
    {
        return $this->descripcionProducto;
    }

    public function setDescripcionProducto($descripcionProducto)
    {
        $this->descripcionProducto = $descripcionProducto;
    }


    public function getImagenProducto()
    {
        return $this->imagenProducto;
    }

    public function setImagenProducto($imagenProducto)
    {
        $this->imagenProducto = $imagenProducto;
    }



    public function getNumeroLikesProductoProducto()
    {
        return $this->numeroLikesProducto;
    }

    public function setNumeroLikesProductoProducto($numeroLikesProducto)
    {
        $this->numeroLikesProducto = $numeroLikesProducto;
    }
}

?>