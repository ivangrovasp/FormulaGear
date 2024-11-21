<?php
    require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/config/dbConnection.php';
Class Pedido{
    private $idPedido;
    private $idUsuario;
    private $idProducto;
    private $isLiked;

    public function __construct($idPedido,$idUsuario,$idProducto,$isLiked){
        $this->idPedido = $idPedido;
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
        $this->isLiked = $isLiked;

    }
    public function getIdPedido()
    {
        return $this->idPedido;
    }


    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;
    }
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }


    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    public function getIdProducto()
    {
        return $this->idProducto;
    }


    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }
    public function isLiked()
    {
        return $this->isLiked;
    }


    public function setIsLiked($isLiked)
    {
        $this->isLiked = $isLiked;
    }
}