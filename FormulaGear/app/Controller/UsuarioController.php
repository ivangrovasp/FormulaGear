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

    public function crearUsuario($nombreUsuario, $correoUsuario,$passUsuario){
        $user = new Usuario(0,$nombreUsuario, $correoUsuario,false,$passUsuario);
        if($user->findUserByEmail($correoUsuario)){
            return false;
        }else{
            $user->crearUsuario($user);
        }
        return true ;
    }

}