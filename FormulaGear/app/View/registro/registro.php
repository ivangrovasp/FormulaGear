<?php
require_once '../../Controller/UsuarioController.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nombreFiltrado = htmlspecialchars($_POST['nombre']);
    $correoFiltrado = htmlspecialchars($_POST['email']);
    $passFiltrada = htmlspecialchars($_POST['password']);
    if($nombreFiltrado && $correoFiltrado && $passFiltrada){
        $userController = new UsuarioController();
        if($userController->crearUsuario($nombreFiltrado,$correoFiltrado,$passFiltrada)){
            echo "Usuario creado";
        }else{
            echo "Correo en uso";
        }
    }else{
        echo "Input no válido";
    }
}

