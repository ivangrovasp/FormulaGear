<?php

require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Usuario.php";

class UsuarioController {

    
    public function getUserbyEmail($correoFiltrado,$contraseñaFiltrada) {
        return Usuario::getUserbyEmail($correoFiltrado,$contraseñaFiltrada);
    }

}

?>