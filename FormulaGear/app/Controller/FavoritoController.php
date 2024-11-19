<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Favorito.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";

class FavoritoController {
    public function favoritoUserId($idUsuario,$idProducto){
        $favoritoUser= new Favorito(0,$idUsuario,$idProducto);
        return $favoritoUser->userFavorites($favoritoUser);
    }
}
?>