<!DOCTYPE html>
<html lang="en">
<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/ProductoController.php";

$sesion = new Sesion();
$user = $sesion->obtenerVariableSesion("usuario");

$productsController = new ProductoController();
$productsMostLiked  = $productsController->MostLiked();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
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

    <div class="body-content">

        <p>El mejor lugar para llevarte el mejor merchandising!!
            Con una historia de más 30 años ofreciendo nuestro servicio <span class="rojo">sobre ruedas. </span>
            Con más de 33 sucursales en España y Envío gratuito disponible!!
            <span class="rojo">La página favorita de Don Fernando Alonso.</span>
        </p>


        <video width="1600" height="526" loop autoplay muted preload="auto">
            <source src="../../../video/main_menu.mp4" type="video/mp4">
            Tu navegador no soporta la etiqueta de video.
        </video>

    </div>

    <div class="trending">
        <p>Son tendencia !!!!</p>
    </div>

    <div class="trending-products">
        <div class="contenido-container">
            <div class="detail-header">
                <img class="img-product" src="<?=$productsMostLiked[0]['imagenProducto']?>">
                <div class="likes">
                    <p><?php
                        echo $productsMostLiked[0]['numeroLikesProducto']
                    ?></p>
                    <img class="img-like" src="../../../Imagenes/corazon.png">
                </div>
            </div>
            <div class="detail-container">
                <p><?php
                    echo $productsMostLiked[0]['nombreProducto']
                ?></p>
                <p class="precio">
                <?php
                    echo $productsMostLiked[0]['precioProducto'] . "€"
                ?>
                </p>
            </div>
        </div>
        <div class="contenido-container">
            <div class="detail-header">
                <img class="img-product" src="<?=$productsMostLiked[1]['imagenProducto']?>">
                <div class="likes">
                    <p><?php
                        echo $productsMostLiked[1]['numeroLikesProducto']
                    ?></p>
                    <img class="img-like" src="../../../Imagenes/corazon.png">
                </div>
            </div>
            <div class="detail-container">
                <p><?php
                    echo $productsMostLiked[1]['nombreProducto']
                ?></p>
                <p class="precio">
                <?php
                    echo $productsMostLiked[1]['precioProducto'] . "€"
                ?>
                </p>
            </div>
        </div>
        <div class="contenido-container">
            <div class="detail-header">
                <img class="img-product" src="<?=$productsMostLiked[2]['imagenProducto']?>">
                <div class="likes">
                    <p><?php
                        echo $productsMostLiked[2]['numeroLikesProducto']
                    ?></p>
                    <img class="img-like" src="../../../Imagenes/corazon.png">
                </div>
            </div>
            <div class="detail-container">
                <p><?php
                    echo $productsMostLiked[2]['nombreProducto']
                ?></p>
                <p class="precio">
                <?php
                    echo $productsMostLiked[2]['precioProducto'] . "€"
                ?>
                </p>
            </div>
        </div>
        </div>
    </div>

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