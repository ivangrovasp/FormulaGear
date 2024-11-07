<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nombreFiltrado = htmlspecialchars($_POST['nombre']);
    $correoFiltrado = htmlspecialchars($_POST['email']);
    $passFiltrada = htmlspecialchars($_POST['password']);
    if($nombreFiltrado && $correoFiltrado && $passFiltrada){
        
    }else{
        echo "Input no válido";
    }
}

