<?php
/**
 * Class Sesion
 * 
 * Gestiona la información almacenada en la sesión
 * @package Model
 */
Class Sesion{
    /**
     * Constructor vacío
     */
    public function __construct(){
        //Iniciar la sesión solo si no ha sido iniciada
        if(!(session_status() == PHP_SESSION_ACTIVE)){
            session_start();
        }
    }

    /**
     * Método que crea una variable de Sesión
     * @param string $nombre Nombre de la variable de la sesión
     * @param mixed $valorInicial Valor inicial de la variable de la sesión
     * @return void
     */
    public function iniciarVariableSesion($nombre, $valorInicial){
        if(!isset($_SESSION[$nombre])){
            $_SESSION[$nombre] = $valorInicial;
        }
        
    }

    /**
     * Método que recupera el valor de una variable de sesión concreta
     * @param string $nombre nombre de la variable de la sesión a buscar
     * @return mixed Valor de la variable de la sesión a buscar
     */
    public function obtenerVariableSesion($nombre){
        return $_SESSION[$nombre] ?? null;
    }

    /**
     * Método que elimina una variable de sesión concreta
     * @param string $nombre nombre de la variable de la sesión a buscar
     * @return void
     */
    public static function eliminarVariableSesion($nombre){
        unset($_SESSION[$nombre]);
    }
}