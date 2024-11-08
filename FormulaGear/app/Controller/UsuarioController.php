<?php

require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Usuario.php";

class UsuarioController {

    
    public function getLogin($correoFiltrado,$contraseñaFiltrada) {
        if(Usuario::getLogin($correoFiltrado,$contraseñaFiltrada)){
            return "Inicio de sesión exitoso";
        }else{
            return "Correo no encontrado";
        }
    }

}

?>