<!DOCTYPE html>
<html lang="es">
<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";


$sesion = new Sesion();
$user = $sesion->obtenerVariableSesion("usuario");
if($user != null){
    if($user['permisosUsuario']){
        header("Location: /app/View/admin/admin.php");
    }else{
        header("Location: /app/View/main/main.php");
    }
    
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/View/login/login.css">
    <title>Iniciar sesión</title>
</head>

<body>
    <div class="header-container">
        <div class="logo-container">
            FormulaGear
        </div>
        <div class="img-container">
            <img id="neumatico" src="../../../imagenes/neumatico.png" alt="Neumático f1">
        </div>


    </div>

    <div class="contenido-container">
        <div class="formulario-header">
            <img src="../../../imagenes/formula_1_PNG57.png" alt="coche f1">
        </div>
        <div class="formulario-container">
            <p>Iniciar Sesión</p>
            <form action="/app/View/login/login.php" method="post">
                <input type="email" name="email" placeholder="email">
                <input type="password" name="password" placeholder="contraseña">
                <input type="submit" id="submit" value="Iniciar sesión">
            </form>
            <a href="/app/View/registro/registro.html">¿No tienes cuenta? Pincha aquí!</a>
        </div>
        <?php

        require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/UsuarioController.php";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correoFiltrado = htmlspecialchars($_POST['email']);
            $contraseñaFiltrada = htmlspecialchars($_POST['password']);


            if (filter_var($correoFiltrado, FILTER_VALIDATE_EMAIL)) {
                $usuariosController = new UsuarioController();
                $llamadaLoginController = $usuariosController->getLogin($correoFiltrado, $contraseñaFiltrada);

                if ($llamadaLoginController == "Inicio de sesión exitoso") {
                    $usuario = $usuariosController->getUser($correoFiltrado);
                    if($usuario[0]['permisosUsuario']){
                        header("Location: /app/View/admin/admin.php");
                    }else{
                        header("Location: /app/View/main/main.php");
                    }
                } else if($llamadaLoginController == 'Contraseña no válida'){
                    echo "Contraseña no válida";
                }else {
                    echo "No hay ningún usuario registrado con ese email";
                }
            } else {
                echo "el email no es valido";
            }
        }
        ?>
    </div>
</body>

</html>