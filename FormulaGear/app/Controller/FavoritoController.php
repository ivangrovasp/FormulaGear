<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Favorito.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";

class FavoritoController {
    public function favoritoUserId($idUsuario,$idProducto){
        $favoritoUser= new Favorito(0,$idProducto,$idUsuario);
        return $favoritoUser->userFavorites($favoritoUser);
    }
}
?>