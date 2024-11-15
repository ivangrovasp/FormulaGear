<?php

require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Usuario.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";
class UsuarioController {

    
    public function getLogin($correoFiltrado,$contraseñaFiltrada) {
        if(Usuario::getLogin($correoFiltrado,$contraseñaFiltrada)){
            $user  = new Usuario(0,"",$correoFiltrado,false,$contraseñaFiltrada);
            $sesion = new Sesion();
            $sessionUser = $user->getUser($user);
            $sesion->iniciarVariableSesion("usuario",$sessionUser[0]);
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
            $sesion = new Sesion();
            $sessionUser = $user->getUser($user);
            $sesion->iniciarVariableSesion("usuario",$sessionUser[0]);
        }
        return true;
    }


    public function updateUser($idUsuario,$nombreUsuario, $correoUsuario,$permisosUsuario,$passUsuario){
        $newUser = new Usuario($idUsuario,$nombreUsuario,$correoUsuario,$permisosUsuario,$passUsuario);
        $newUser->updateUser($newUser);
    }

    public function getUser($correoFiltrado){
        $user = new Usuario(0,'',$correoFiltrado,false,'');
        return $user->getUser($user);
    }

}