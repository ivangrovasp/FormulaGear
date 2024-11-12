<!DOCTYPE html>
<html lang="es">
<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";
require_once '../../Controller/ProductoController.php';
$sesion = new Sesion();
$productController = new ProductoController();
$user = $sesion->obtenerVariableSesion("usuario");
$products = $productController->getAllProducts();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="productos.css">
    <title>Lista de Productos</title>
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


    <div class="trending-products">
        <div class="contenido-container">
            <div class="detail-header">
                <img class="img-product" src="<?=$products[0]['imagenProducto']?>">
                <div class="likes">
                    <p><?=$products[0]['numeroLikesProducto']?></p>
                    <img class="img-like" src="../../../Imagenes/corazon.png">
                </div>
            </div>
            <div class="detail-container">
                <p><?=$products[0]['nombreProducto']?></p>
                <p class="precio"><?=$products[0]['precioProducto']?>€</p>
            </div>
        </div>
        <div class="contenido-container">
            <div class="detail-header">
                <img class="img-product" src="../../../Imagenes/camisetaAstonMartin.png">
                <div class="likes">
                    <p>likes</p>
                    <img class="img-like" src="../../../Imagenes/corazon.png">
                </div>
            </div>
            <div class="detail-container">
                <p>Nombre</p>
                <p class="precio">Precio</p>
            </div>
        </div>
        <div class="contenido-container">
            <div class="detail-header">
                <img class="img-product" src="../../../Imagenes/camisetaAstonMartin.png">
                <div class="likes">
                    <p>likes</p>
                    <img class="img-like" src="../../../Imagenes/corazon.png">
                </div>
            </div>
            <div class="detail-container">
                <p>Nombre</p>
                <p class="precio">Precio</p>
            </div>
        </div>
        
    </div>
    <div style="padding-top : 700px"></div>
    <div class="footer">
        <p>Contacto: </p>

        <div class="footer-content">
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/gmail.png">FormulaGear@gmail.com</p>
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/twitter.png">FormulaGear</p>
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/instagram.png">FormulaGear</p>
        </div>
    </div>

</body>

</html>