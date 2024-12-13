<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Pedido.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";

/**
 * 
 * Class PedidoController
 * 
 * Gestiona los pedidos de los usuarios.
 * 
 * @package Controller
 */
class PedidoController {

    /**
     * Método para añadir un pedido de un usuario para un producto determinado.
     *
     * @param int $idUsuario El ID del usuario que realiza el pedido.
     * @param int $idProducto El ID del producto que el usuario desea pedir.
     * @param bool $isLiked Indica si el producto está marcado como favorito por el usuario.
     */
    public function addOrder($idUsuario, $idProducto, $isLiked) {
        // Crea una nueva instancia de la clase Pedido
        $pedido = new Pedido(0, 0, 0, false);
        
        // Llama al método addOrder de la clase Pedido
        $pedido->addOrder($idUsuario, $idProducto, $isLiked);
    }

    /**
     * Método para obtener un pedido de un usuario para un producto determinado.
     *
     * @param int $idProduct El ID del producto relacionado con el pedido.
     * @param int $idUsuario El ID del usuario que realizó el pedido.
     * @return mixed El pedido del usuario relacionado con el producto.
     */
    public function getOrder($idProduct, $idUsuario) {
        // Crea una nueva instancia de la clase Pedido
        $pedido = new Pedido(0, 0, 0, false);
        
        // Llama al método getOrder de la clase Pedido y devuelve el resultado
        return $pedido->getOrder($idProduct, $idUsuario);
    }

    /**
     * Método para actualizar el pedido de un producto.
     *
     * @param int $idProduct El ID del producto cuyo pedido se desea actualizar.
     */
    public function updateOrder($idProduct) {
        // Crea una nueva instancia de la clase Pedido
        $pedido = new Pedido(0, 0, 0, false);
        
        // Llama al método updateOrder de la clase Pedido
        $pedido->updateOrder($idProduct);
    }
}
?>
