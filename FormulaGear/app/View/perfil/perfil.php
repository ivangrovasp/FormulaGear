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
    <link rel="stylesheet" href="/app/View/perfil/perfil.css">
    <title>Mi Perfil</title>
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
                <li><a href="#">Favoritos</a></li>
                <li><a href="../productos/productos.php">Productos</a></li>
                <li><a href="../perfil/perfil.php">Perfil</a></li>
                <li><a href="../main/main.php">Inicio</a></li>
                <div class="perfil-image">
                    <a href="../perfil/perfil.php">
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
            <p>Modificar Perfil</p>
            <form action="perfil.php" method="post">
                <input type="text" name="nombre" placeholder="Nombre de usuario" required value="<?= $user['nombreUsuario'] ?>">
                <input type="email" name="email" placeholder="Email" required value="<?= $user['correoUsuario'] ?>">
                <input type="password" name="password" placeholder="contraseña" required value="<?= $user['passUsuario'] ?>">
                <input type="submit" id="submit" value="Aceptar">
            </form>
        </div>
    </div>

    
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
    <!------------------------------------------------------------------------------------------------------------->
    <div class="footer">
        <p id="contactFooter">Contacto: </p>
        <div class="footer-content">
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/gmail.png">FormulaGear@gmail.com</p>
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/twitter.png">FormulaGear</p>
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/instagram.png">FormulaGear</p>
        </div>
    </div>
    <!------------------------------------------------------------------------------------------------------------->
    <?php
    require_once '../../Controller/UsuarioController.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nombreFiltrado = htmlspecialchars($_POST['nombre']);
        $correoFiltrado = htmlspecialchars($_POST['email']);
        $passFiltrada = htmlspecialchars($_POST['password']);

        if (filter_var($correoFiltrado, FILTER_VALIDATE_EMAIL)) {
            $userController = new UsuarioController();
            //modificamos los valores de la sesión
            $user['nombreUsuario'] = $nombreFiltrado;
            $user['correoUsuario'] = $correoFiltrado;
            $user['passUsuario'] = $passFiltrada;
            //Eliminamos la sesión anterior y creamos una nueva con los datos actualizados
            $sesion->eliminarVariableSesion('usuario');
            $sesion->iniciarVariableSesion("usuario",$user);
            //Llamamos al método del controlador para modificar el usuario
            $userController->updateUser($user['idUsuario'],$user['nombreUsuario'],$user['correoUsuario'],$user['permisosUsuario'],$user['passUsuario']);
            header("Location: /FormulaGear/FormulaGear/app/View/perfil/perfil.php");
        } else {
            echo "Correo no válido";
        }
    }
    if (isset($_GET['cerrarSesion'])) {
        cerrarSesion($sesion);
    }
    function cerrarSesion($session)
    {
        $session->eliminarVariableSesion('usuario');
        header("Location: /app/View/login/login.php");
    }
    ?>
</body>

</html>