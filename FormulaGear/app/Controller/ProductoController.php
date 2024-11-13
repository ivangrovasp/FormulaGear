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
        
    
}
