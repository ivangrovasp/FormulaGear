<?php

require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/UsuarioController.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correoFiltrado = htmlspecialchars($_POST['email']);
    $contraseñaFiltrada = htmlspecialchars($_POST['password']);


    if (filter_var($correoFiltrado, FILTER_VALIDATE_EMAIL)) {
        $favoritosController = new UsuarioController();
        $favoritosController->getUserbyEmail($correoFiltrado, $contraseñaFiltrada);
    } else {
        echo " email is not valid";
    }
    
} else
    echo "Error";