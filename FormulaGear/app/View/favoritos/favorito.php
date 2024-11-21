<!DOCTYPE html>
<html lang="en">
<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/ProductoController.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/FavoritoController.php";
$sesion = new Sesion();
$productController = new ProductoController();
$favoritoController = new FavoritoController();
$user = $sesion->obtenerVariableSesion("usuario");
$products = $sesion->obtenerVariableSesion("favoritos");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="favorito.css">
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
                <li><a href="../favoritos/favorito.php">Favoritos</a></li>
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
    <div class="trending-products">
        <?php
        if ($products) {
            for ($i = 0; $i < count($products); $i++) {
                $product_id = $products[$i]['idProducto'];
        ?>
                <a href="../detailProduct/detail.php?id=<?= $product_id ?>" class="contenido-container">
                    <div class="detail-header">
                        <img class="img-product" src="<?= $products[$i]['imagenProducto'] ?>">
                        <div class="likes">
                            <p><?= $products[$i]['numeroLikesProducto'] ?></p>
                            <img class="img-like" src="../../../Imagenes/corazon.png">
                        </div>
                    </div>
                    <div class="detail-container">
                        <p><?= $products[$i]['nombreProducto'] ?></p>
                        <p class="precio"><?= $products[$i]['precioProducto'] ?>€</p>
                    </div>
                </a>
        <?php
            }
        }
        ?>
    </div>
    <div id="botonComprar">
        <form method="post">
            <input type="hidden" name="guardar">
            <button type="submit" name="guardar">
                Guardar Lista
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guardar'])) {
                    if ($products) {
                        for ($i = 0; $i < count($products); $i++) {
                            $product_id = $products[$i]['idProducto'];
                            $favoritoController->favoritoUserId($user['idUsuario'], $product_id);
                        } 
                        unset($_SESSION['favoritos']);
                        header("Location: favorito.php");
                        exit();
                    }
                }
                ?>
            </button>
        </form>
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