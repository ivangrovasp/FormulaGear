<!DOCTYPE html>
<html lang="en">
<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/ProductoController.php";
$sesion = new Sesion();
$productController = new ProductoController();
$product_id = $_GET['id'];
$detailProducts = $productController->getDetailProductByID($product_id);
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

    <div class="content-container">
        <div class="img2-container"> <img src="<?= htmlspecialchars($detailProducts[0]['imagenProducto']) ?>" alt="camisetaAston" class="imgProduct">
            <form action="detail.php?id=<?= htmlspecialchars($product_id) ?>" method="post" class="likes2">
                <button type="submit" name="like" class="likes2" id="buttonLike">
                    <p><?= htmlspecialchars($detailProducts[0]['numeroLikesProducto']) ?></p> 
                    <img class="img-like" src="../../../Imagenes/corazon.png">
                </button>
            </form>
        </div>
        <div class="text-container">
            <p id="title"><?= $detailProducts[0]['nombreProducto'] ?></p>
            <p><?= $detailProducts[0]['descripcionProducto'] ?></p>
            <div class="talla">
                <p>Tallas:</p>
                <select>
                    <?php 
                    for ($i = 0; $i < count($detailProducts); $i++) {
                        $tallaId = $detailProducts[$i]['nombreTalla'];
                    ?>
                        <option><?= $tallaId ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <p class="precio"><?= $detailProducts[0]['precioProducto'] . "€" ?></p>
            <form action="detail.php?id=<?= htmlspecialchars($product_id) ?>" method="POST">
                    <input type="hidden" name="form1">
                    <input type="submit" id="fav" value="Añadir a favoritos">
            </form>
        </div>
    </div>

    <div id="botonComprar">
        <button>Comprar</button>
    </div>

    <div class="footer">
        <p>Contacto: </p>
        <div class="footer-content">
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/gmail.png">FormulaGear@gmail.com</p>
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/twitter.png">FormulaGear</p>
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/instagram.png">FormulaGear</p>
        </div>
    </div>

    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['like'])) {
        $productController->updateProductLikes($product_id);
        // Redirige para evitar reenvío del formulario al recargar la página
        header("Location: detail.php?id=" . $product_id);
        exit();
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form1'])){
        if (isset($_SESSION['favoritos'])) {
            array_push($_SESSION['favoritos'],$detailProducts[0]);
         }else{
           // $sesion->iniciarVariableSesion('favoritos',$detailProducts[0]);
           $_SESSION['favoritos'] = [
            0 => $detailProducts[0],
            ];
         }
    }
    ?>
</body>

</html>