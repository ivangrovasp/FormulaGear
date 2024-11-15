<?php
require_once '../../Controller/UsuarioController.php';
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['terminos-condiciones'])) {
    $nombreFiltrado = htmlspecialchars($_POST['nombre']);
    $correoFiltrado = htmlspecialchars($_POST['email']);
    $passFiltrada = htmlspecialchars($_POST['password']);

    if (filter_var($correoFiltrado, FILTER_VALIDATE_EMAIL)) {
        $userController = new UsuarioController();
        if ($userController->crearUsuario($nombreFiltrado, $correoFiltrado, $passFiltrada)) {
            header("Location: /app/View/main/main.php");
        } else {
            echo "Correo en uso";
        }
    } else {
        echo "Input no válido";
    }
}else{
    echo "Salió algo mal";
}
