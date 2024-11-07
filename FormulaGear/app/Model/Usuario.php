<?php
Class Usuario{
    private $idUsuario;
    private $nombreUsuario;
    private $correoUsuario;
    private $permisosUsuario;
    private $passUsuario;

    public function __construct($idUsuario, $nombreUsuario,$correoUsuario,$permisosUsuario,$passUsuario){
        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->correoUsuario = $correoUsuario;
        $this->permisosUsuario = $permisosUsuario;
        $this->passUsuario = $passUsuario;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }
    public function getCorreoUsuario(){
        return $this->correoUsuario;
    }
    public function getPermisosUsuario(){
        return $this->permisosUsuario;
    }
    public function getPassUsuario(){
        return $this->passUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    public function setNombreUsuario($nombreUsuario){
        $this->nombreUsuario = $nombreUsuario;
    }

    public function setCorreoUsuario($correoUsuario){
        $this->correoUsuario = $correoUsuario;
    }

    public function setPermisosUsuario($permisosUsuario){
        $this->permisosUsuario = $permisosUsuario;
    }

    public function setPassUsuario($passUsuario){
        $this->passUsuario = $passUsuario;
    }
}