<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Pedido.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";

class PedidoController {
    public function addOrder($idUsuario,$idProducto,$isLiked){
        $pedido = new Pedido(0,0,0,false);
        $pedido->addOrder($idUsuario,$idProducto,$isLiked);
    }
    public function getOrder($idProduct){
        $pedido = new Pedido(0,0,0,false);
        return $pedido->getOrder($idProduct);
    }
}
?>