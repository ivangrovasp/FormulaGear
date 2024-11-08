<?php

require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/UsuarioController.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correoFiltrado = htmlspecialchars($_POST['email']);
    $contraseñaFiltrada = htmlspecialchars($_POST['password']);


    if (filter_var($correoFiltrado, FILTER_VALIDATE_EMAIL)) {
        $usuariosController = new UsuarioController();
        $llamadaLoginController = $usuariosController->getLogin($correoFiltrado, $contraseñaFiltrada);

        if ($llamadaLoginController == "Inicio de sesión exitoso"){
            header("Location: /FormulaGear/FormulaGear/app/View/main/main.html");
        }else{
            echo "No hay ningún usuario registrado con ese email";
        }
    } else {
        echo "el email no es valido";
    }
    
} else
    echo "Error";