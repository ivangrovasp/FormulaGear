<?php
require_once '../../Controller/UsuarioController.php';
require_once '../../Model/Sesion.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nombreFiltrado = htmlspecialchars($_POST['nombre']);
    $correoFiltrado = htmlspecialchars($_POST['email']);
    $passFiltrada = htmlspecialchars($_POST['password']);
    $passFiltrada2 = htmlspecialchars($_POST['password2']);

    if (filter_var($correoFiltrado, FILTER_VALIDATE_EMAIL && $passFiltrada == $passFiltrada2)) {
        $userController = new UsuarioController();
        if ($userController->updateUser($nombreFiltrado, $correoFiltrado, $passFiltrada)) {
            header("Location: /FormulaGear/FormulaGear/app/View/perfil/perfil.html");
        } else {
            echo "Correo en uso";
        }
    } else {
        echo "Correo no válido / las contraseñas no coinciden";
    }
}else{
    echo "Introduce los datos de nuevo";
}

