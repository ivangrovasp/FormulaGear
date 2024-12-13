<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Favorito.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";

/**
 * Class FavoritoController
 * 
 * Gestiona las acciones relacionadas con los favoritos de los usuarios.
 * 
 * @package Controller
 */
class FavoritoController {

    /**
     * Método que añade o elimina un producto de los favoritos de un usuario.
     *
     * @param int $idUsuario El ID del usuario que añade el producto como favorito.
     * @param int $idProducto El ID del producto que el usuario añade como favorito.
     */
    public function favoritoUserId($idUsuario, $idProducto) {
        // Crea una nueva instancia de la clase Favorito
        $favoritoUser = new Favorito(0, $idProducto, $idUsuario);
        
        // Llama al método userFavorites de la clase Favorito y devuelve el resultado
        $favoritoUser->userFavorites($favoritoUser);
    }
}
?>
