<!DOCTYPE html>
<html lang="en">
<?php
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";
require_once '../../Controller/ProductoController.php';
$sesion = new Sesion();
$user = $sesion->obtenerVariableSesion("usuario");
$productController = new ProductoController();
$products = $productController->getAllProducts();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/View/admin/admin.css">
    <title>Gestión</title>
</head>

<body>
    <div class="container">
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
        <form action="/app/View/admin/admin.php" method="post" class="grid">
            <?php

            require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/ProductoController.php";

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Obtenemos el producto junto con las tallas
                $producto = new ProductoController();
                $producto = $producto->getProductByID($products[$i]['idProducto']);
            ?>
                <div class="gridarea nombreProducto">

                    <select name="producto-seleccionado" class="select-products">
                        <?php
                        for ($i = 0; $i < count($products); $i++) {
                            /*Comprobamos si el id del producto que estamos verificando es igual a la opción enviada desde el formulario
                             Se le resta uno ya que las opciones del select empiezan en 1 no en 0. En este caso queremos usar la opción seleccionada
                             como índice para encontrar el producto seleccionado.
                            */
                            if ($products[$i]['idProducto'] == $products[$_POST['producto-seleccionado'] - 1]['idProducto']) {
                                
                                ?>
                                    <option value="<?= $products[$i]['idProducto'] ?>"selected>
                                        <?= $products[$i]['nombreProducto']?>
                                    </option>
                                <?php
                            }else{
                                ?>
                                    <option value="<?= $products[$i]['idProducto'] ?>">
                                        <?= $products[$i]['nombreProducto'] ?>
                                    </option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                </div>
                <div class="gridarea descripcionProducto">
                    <textarea name="descripcionProducto"
                        placeholder="Descripción Producto" class="style-inputs"><?= $products[$_POST['producto-seleccionado'] - 1]['descripcionProducto'] ?></textarea>
                </div>
                <!-- La ruta de la imagen del producto no se puede mostrar en el input file -->
                <div class="gridarea imagenProducto">
                    <input type="file" accept="image/png, image/jpeg" name="imagenProducto" class="style-inputs">
                </div>
                <div class="gridarea precioProducto"><input type="number" name="precioProducto" class="style-inputs" value="<?= $products[$_POST['producto-seleccionado'] - 1]['precioProducto'] ?>"></div>
                <div class="gridarea talla">Talla</div>
                <div class="gridarea añadir"><input type="submit" value="Añadir" class="style-inputs"></div>
                <div class="gridarea eliminar"><input type="submit" value="Eliminar" class="style-inputs"></div>
                <div class="gridarea confirmar"><input type="submit" value="Confirmar" class="style-inputs"></div>
                <div class="gridarea cargarProducto"><input type="submit" value="Cargar Producto" class="style-inputs"></div>
            <?php
            } else {
            ?>

                <div class="gridarea nombreProducto">

                    <select name="producto-seleccionado" class="select-products">
                        <?php
                        for ($i = 0; $i < count($products); $i++) {
                        ?>
                            <option value="<?= $products[$i]['idProducto'] ?>"><?= $products[$i]['nombreProducto'] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>
                <div class="gridarea descripcionProducto"><textarea name="descripcionProducto"
                        placeholder="Descripción Producto" class="style-inputs"></textarea></div>
                <div class="gridarea imagenProducto">
                    <input type="file" accept="image/png, image/jpeg" name="imagenProducto" class="style-inputs">
                </div>
                <div class="gridarea precioProducto"><input type="number" name="precioProducto" class="style-inputs"></div>
                <div class="gridarea talla">Talla</div>
                <div class="gridarea añadir"><input type="submit" value="Añadir" class="style-inputs"></div>
                <div class="gridarea eliminar"><input type="submit" value="Eliminar" class="style-inputs"></div>
                <div class="gridarea confirmar"><input type="submit" value="Confirmar" class="style-inputs"></div>
                <div class="gridarea cargarProducto"><input type="submit" value="Cargar Producto" class="style-inputs"></div>
            <?php
            }
            ?>

        </form>
        <div class="footer">
            <p id="contactFooter">Contacto: </p>
            <div class="footer-content">
                <p class="pfooter"><img class="rrss" src="../../../Imagenes/gmail.png">FormulaGear@gmail.com</p>
                <p class="pfooter"><img class="rrss" src="../../../Imagenes/twitter.png">FormulaGear</p>
                <p class="pfooter"><img class="rrss" src="../../../Imagenes/instagram.png">FormulaGear</p>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------------------------------------------------->
</body>

</html>