<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Producto.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Talla.php";
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
    public function addProduct($nombreProducto,$precioProducto,$descripcionProducto,$imagenProducto,$numeroLikesProducto){
        $tallas = array('XL','L','M','S');
        $product = new Producto(0,'',0,'','',0);
        $size = new Talla();
        $idProducto = $product->addProduct($nombreProducto,$precioProducto,$descripcionProducto,$imagenProducto,$numeroLikesProducto);
        foreach ($tallas as $talla) {
            $size->addSize($talla,$idProducto);
        }
        
    }
    public function deleteProduct($idProduct){
        $product = new Producto(0,'',0,'','',0);
        $product->deleteProduct($idProduct);
    }
    public function updateProduct($idProducto,$nombreProducto,$precioProducto,$descripcionProducto,$imagenProducto){
        $product = new Producto(0,'',0,'','',0);
        $product->updateProduct($idProducto,$nombreProducto,$precioProducto,$descripcionProducto,$imagenProducto);
    }
    
}
