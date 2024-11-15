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
    <link rel="stylesheet" href="/app/View/admin/admin.css">
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

                <li><a href="../productos/productos.php">Productos</a></li>
                <li><a href="../perfil/perfil.php">Perfil</a></li>
                <div class="perfil-image">
                    <a href="../perfil/perfil.php">
                        <img id="persona-image" src="../../../Imagenes/perfil.png">
                        <p><?= $user['nombreUsuario'] ?></p>
                    </a>
                </div>

            </ul>
        </nav>
    </header>
    <div class="grid">
        <div class="nombreProducto">Nombre del Producto</div>
        <div class="descripcionProducto">Descripción Producto</div>
        <div class="imagenProducto">Ruta Imagen</div>
        <div class="precioProducto">€</div>
        <div class="talla">Talla</div>
        <div class="añadir">Añadir</div>
        <div class="eliminar">Eliminar</div>
        <div class="confirmar">Confirmar</div>
    </div>

    <div class="footer">
        <p id="contactFooter">Contacto: </p>
        <div class="footer-content">
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/gmail.png">FormulaGear@gmail.com</p>
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/twitter.png">FormulaGear</p>
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/instagram.png">FormulaGear</p>
        </div>
    </div>
    <!------------------------------------------------------------------------------------------------------------->
    
</body>

</html>