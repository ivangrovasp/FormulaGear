<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Producto.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";
class ProductoController{
    public function getAllProducts(){
        return Producto::getAllProducts();
    }
    
    public function MostLiked(){
        return Producto::getProducstMostLiked();
    }

    public function getDetailProductByID($idProducto) {
        return Producto::getDetailProductByID($idProducto);
    }

    public function getProductByID($idProducto) {
        return Producto::getProductById($idProducto);
    }
    
    public function updateProductLikes($idProducto) {
        return Producto::updateProductLike($idProducto);
    }
            
    public function añadirFavoritos($producto){
        $sesion = new Sesion();
        $sesion->iniciarVariableSesion("favoritos",$producto [0]);
    }
}
