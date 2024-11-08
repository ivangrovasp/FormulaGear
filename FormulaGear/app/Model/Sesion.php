<?php
Class Sesion{
    public function __construct(){
        //Iniciar la sesión solo si no ha sido iniciada
        if(!(session_status() == PHP_SESSION_ACTIVE)){
            session_start();
        }
    }


    public function iniciarVariableSesion($nombre, $valorInicial){
        //Inicializar la variable de sesión si no existe
        if (!isset($_SESSION[$nombre])) {
            $_SESSION[$nombre] = $valorInicial;
        }
    }


    public function obtenerVariableSesion($nombre){
        return $_SESSION[$nombre] ?? null;
    }


    public function eliminarVariableSesion($nombre){
        unset($_SESSION[$nombre]);
    }
}