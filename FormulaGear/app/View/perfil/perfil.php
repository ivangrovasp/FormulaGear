<!DOCTYPE html>
<html lang="en">
<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";
$sesion = new Sesion();
$user = $sesion->obtenerVariableSesion("usuario");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="perfil.css">
    <title>Document</title>
</head>

<body>
    <header class="header-container">

        <div class="logo-container">
            FormulaGear
        </div>

        <div class="img-container">
            <img id="neumatico" src="../../../imagenes/neumatico.png" alt="Neumático f1">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="#">Whislist</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Perfil</a></li>
                <li><a href="../main/main.html">Inicio</a></li>
                <div class="perfil-image">
                    <a href="../login/login.html">
                        <img id="persona-image" src="../../../Imagenes/perfil.png">
                        <p><?= $user['nombreUsuario'] ?></p>
                    </a>
                </div>

            </ul>
        </nav>
    </header>
    <!------------------------------------------------------------------------------------------------------------->


    <div class="contenido-container">
        <div class="formulario-container">
            <form action="perfil.php" method="post">
                <input type="text" name="nombre" placeholder="Nombre de usuario" required value="<?= $user['nombreUsuario'] ?>">
                <input type="email" name="email" placeholder="Email" required value="<?= $user['correoUsuario'] ?>">
                <input type="password" name="password" placeholder="contraseña" required>
                <input type="password" name="password2" placeholder="Confirmar contraseña" required>
                <input type="submit" id="submit" value="Aceptar">
            </form>
        </div>
    </div>

    <?php
    require_once '../../Controller/UsuarioController.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nombreFiltrado = htmlspecialchars($_POST['nombre']);
        $correoFiltrado = htmlspecialchars($_POST['email']);
        $passFiltrada = htmlspecialchars($_POST['password']);
        $passFiltrada2 = htmlspecialchars($_POST['password2']);

        if (filter_var($correoFiltrado, FILTER_VALIDATE_EMAIL)) {
            if ($passFiltrada != $passFiltrada2) {
                echo "Las contraseñas no coinciden";
            } else {

                // $userController = new UsuarioController();
                // if ($userController->updateUser($nombreFiltrado, $correoFiltrado, $passFiltrada)) {
                //     header("Location: /FormulaGear/FormulaGear/app/View/perfil/perfil.html");
                // } else {
                //     echo "Correo en uso";
                // }
            }
        } else {
            echo "Correo no válido";
        }
    }
    ?>
    <!------------------------------------------------------------------------------------------------------------->
    <div id="divPerfil">
        <img src="../../../imagenes/perfil.png" alt="perfil" id="fotoPerfil">
    </div>
    <div id="nombreUsuario">
        <p><?= $user['nombreUsuario'] ?></p>
    </div>
    <div id="botonSesion">
        <a href="perfil.php?cerrarSesion=true"><button>Cerrar Sesión</button></a>
    </div>
    <?php
    function cerrarSesion($session)
    {
        $session->eliminarVariableSesion('usuario');
        header("Location: /FormulaGear/FormulaGear/app/View/login/login.html");
    }
    if (isset($_GET['cerrarSesion'])) {
        cerrarSesion($sesion);
    }
    ?>
</body>

</html>