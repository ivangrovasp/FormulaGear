<!DOCTYPE html>
<html lang="en">
<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/PedidoController.php";
$sesion = new Sesion();
$pedido = new PedidoController();
$product_id = $_GET['id'];
$user = $sesion->obtenerVariableSesion("usuario");
$pedido->addOrder($user['idUsuario'],$product_id,false);
$order = $pedido->getOrder($product_id,$user['idUsuario']);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="orderDetail.css">
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

    <div class="contenido-container">
        <div class="formulario-header">
            <p>Resumen de la compra</p>
        </div>
        <div class="formulario-container">
            <p>Order ID: <?= $order[0]['idPedido'] ?></p>
            <form action="/app/View/login/login.php" method="post">
                Nombre Producto:<input type="text" name="email" value="<?= $order[0]['nombreProducto'] ?>" readonly >
                Precio<input type="text" name="password" value="<?= $order[0]['precioProducto'] ?> €" readonly >
                <img id="fotoResumen" src="../../..<?= $order[0]['imagenProducto'] ?>" alt="Neumático f1">
            </form>
            <a href="/app/View/main/main.php">Volver al menú principal</a>
        </div>
    </div>

    <div class="footer">
        <div class="footer-content">
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/gmail.png">FormulaGear@gmail.com</p>
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/twitter.png">FormulaGear</p>
            <p class="pfooter"><img class="rrss" src="../../../Imagenes/instagram.png">FormulaGear</p>
        </div>
    </div>
</body>

</html>