<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Producto.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Talla.php";

/**
 * 
 * Class ProductoController
 * 
 * Gestiona las acciones relacionadas con los productos.
 * 
 * @package Controller
 */
class ProductoController {
    
    /**
     * Método que recupera todos los productos disponibles.
     *
     * @return array Lista de todos los productos.
     */
    public function getAllProducts() {
        return Producto::getAllProducts();
    }

    /**
     * Método que recupera los productos más gustados.
     *
     * @return array Lista de productos más populares.
     */
    public function MostLiked() {
        return Producto::getProducstMostLiked();
    }

    /**
     * Método para recuperar los detalles de un producto según su ID.
     *
     * @param int $idProducto El ID del producto del cuál se desean saber sus detalles.
     * @return mixed Los detalles del producto especificado.
     */
    public function getDetailProductByID($idProducto) {
        return Producto::getDetailProductByID($idProducto);
    }

    /**
     * Método para recuperar un producto específico según su ID.
     *
     * @param int $idProducto El ID del producto.
     * @return mixed El producto especificado.
     */
    public function getProductByID($idProducto) {
        return Producto::getProductById($idProducto);
    }

    /**
     * Método para actualizar la cantidad de "me gusta" de un producto.
     *
     * @param int $idProducto El ID del producto al que se le actualizarán los "me gusta".
     * @return mixed El resultado de actualizar el producto.
     */
    public function updateProductLikes($idProducto) {
        return Producto::updateProductLike($idProducto);
    }

    /**
     * Método para añadir un producto a los favoritos de un usuario.
     *
     * @param array $producto El producto que se va a añadir a favoritos.
     */
    public function añadirFavoritos($producto) {
        // Inicia la sesión y agrega el producto a favoritos
        $sesion = new Sesion();
        $sesion->iniciarVariableSesion("favoritos", $producto[0]);
    }

    /**
     * Método para persistir un nuevo producto en la base de datos.
     *
     * @param string $nombreProducto El nombre del producto.
     * @param float $precioProducto El precio del producto.
     * @param string $descripcionProducto La descripción del producto.
     * @param string $imagenProducto La URL de la imagen del producto.
     * @param int $numeroLikesProducto El número de "me gustas" del producto.
     */
    public function addProduct($nombreProducto, $precioProducto, $descripcionProducto, $imagenProducto, $numeroLikesProducto) {
        $tallas = array('XL', 'L', 'M', 'S'); // Tallas disponibles para el producto
        $product = new Producto(0, '', 0, '', '', 0);
        $size = new Talla();
        
        // Agrega el producto a la base de datos y obtiene su ID
        $idProducto = $product->addProduct($nombreProducto, $precioProducto, $descripcionProducto, $imagenProducto, $numeroLikesProducto);
        
        // Asocia las tallas al producto
        foreach ($tallas as $talla) {
            $size->addSize($talla, $idProducto);
        }
    }

    /**
     * Método para eliminar un producto de la base de datos.
     *
     * @param int $idProduct El ID del producto que se desea eliminar.
     */
    public function deleteProduct($idProduct) {
        $product = new Producto(0, '', 0, '', '', 0);
        $product->deleteProduct($idProduct);
    }

    /**
     * Método para actualizar los detalles de un producto.
     *
     * @param int $idProducto El ID del producto a actualizar.
     * @param string $nombreProducto El nuevo nombre del producto.
     * @param float $precioProducto El nuevo precio del producto.
     * @param string $descripcionProducto La nueva descripción del producto.
     * @param string $imagenProducto La nueva imagen del producto.
     */
    public function updateProduct($idProducto, $nombreProducto, $precioProducto, $descripcionProducto, $imagenProducto) {
        $product = new Producto(0, '', 0, '', '', 0);
        $product->updateProduct($idProducto, $nombreProducto, $precioProducto, $descripcionProducto, $imagenProducto);
    }
}
?>
