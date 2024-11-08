<?php
require_once '../../Controller/UsuarioController.php';
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['terminos-condiciones'])) {
    $nombreFiltrado = htmlspecialchars($_POST['nombre']);
    $correoFiltrado = htmlspecialchars($_POST['email']);
    $passFiltrada = htmlspecialchars($_POST['password']);

    if (filter_var($correoFiltrado, FILTER_VALIDATE_EMAIL)) {
        $userController = new UsuarioController();
        if ($userController->crearUsuario($nombreFiltrado, $correoFiltrado, $passFiltrada)) {
            header("Location: /FormulaGear/FormulaGear/app/View/main/main.html");
        } else {
            echo "Correo en uso";
        }
    } else {
        echo "Input no válido";
    }
}else{
    echo "va a ser que no";
}
