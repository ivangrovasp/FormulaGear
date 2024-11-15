<!DOCTYPE html>
<html lang="en">
<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/ProductoController.php";
$sesion = new Sesion();
$productController = new ProductoController();
$product_id = $_GET['id'];

$detailProducts = $productController->getProductByID($product_id);
$user = $sesion->obtenerVariableSesion("usuario");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="detail.css">
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
        
<div class="content-container">
    <div class="img2-container">
        <img src="<?= $detailProducts[0]['imagenProducto']?>" alt="camisetaAston" class="imgProduct">
        <div class="likes">
            <p><?= $detailProducts[0]['numeroLikesProducto']?></p>
            <img class="img-like" src="../../../Imagenes/corazon.png">
        </div>
    </div>
    <div class="text-container">
        <p id="title"><?= $detailProducts[0]['nombreProducto']?></p>
        <p><?= $detailProducts[0]['descripcionProducto']?></p>
        <div class="talla">
            <p>Tallas:</p>
            <select>
            <?php
            for ($i = 0; $i < count($detailProducts); $i++) {
                $tallaId = $detailProducts[$i]['nombreTalla'];
            ?>
                <option><?=$tallaId?></option>
            <?php
            }
            ?>
            </select>
        </div>
        <p class="precio"><?= $detailProducts[0]['precioProducto'] . "€"?></p>
        <p id="fav">Añadir a favoritos</p>
    </div>
</div>

<div id="botonComprar">
    <a href=""><button>Comprar</button></a>
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