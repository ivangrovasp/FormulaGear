<!DOCTYPE html>
<html lang="en">
<?php

require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";
require_once '../../Controller/ProductoController.php';
$sesion = new Sesion();
$sesion->iniciarVariableSesion('selectedIndex', -1);
$sesion->iniciarVariableSesion("productoCargado",false);
$user = $sesion->obtenerVariableSesion("usuario");
$productoCargado = $sesion->obtenerVariableSesion("productoCargado");
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

        <header class="header-container">

            <div class="logo-container">
                FormulaGear
            </div>

            <div class="img-container">
                <img id="neumatico" src="../../../imagenes/neumatico.png" alt="Neumático f1">
            </div>
            <nav>
                <ul class="nav-links">
                    <div class="opciones">
                        <li>Panel de administración</li>
                    </div>
                </ul>
            </nav>
        </header>
        <div class="container"></div>
            <form action="/app/View/admin/admin.php" method="post" class="contentInfo">

                <div class="datosUsuario">
                    <div id="divPerfil">
                        <img src="../../../imagenes/perfil.png" alt="perfil" id="fotoPerfil">
                    </div>
                    <div id="nombreUsuario">
                        <p><?= $user['nombreUsuario'] ?></p>
                    </div>
                    <div id="botonSesion">
                            <input type='hidden' name='form2'>
                            <button type="submit" name="cerrarSesion" value="true">Cerrar Sesión</button>
                    </div>
                </div>

                <div class="grid">
                    <?php

                    require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/ProductoController.php";

                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cargar'])) {
                        $productoCargado = true;
                        $producto = new ProductoController();
                        //Esta línea se supone que era para obtener el producto junto con sus tallas para mostarlas en el select de tallas
                        $product;
                    ?>
                        <div class="gridarea nombreProducto">

                            <select name="producto-seleccionado" class="select-products">
                                <?php
                                for ($i = 0; $i < count($products); $i++) {
                                    /*Aquí se comprueba si el id del producto que estamos verificando es igual al id del producto seleccionado por el usuario en el select. Si es correcto, guardamos la posición del producto en sesión para usarlo como índice a la hora de mostrar la información del producto y a la hora de pasar el id de producto cuando se tenga que eliminar o actualizar un producto.
                                */
                                    if ($products[$i]['idProducto'] == $_POST['producto-seleccionado']) {

                                ?>
                                        <option value="<?= $products[$i]['idProducto'] ?>" selected>
                                            <?= $products[$i]['nombreProducto'] ?>
                                        </option>
                                    <?php
                                        //Una vez encontramos el nombre del producto deseado, obtenemos la información de ese producto junto con sus tallas
                                        $product = $producto->getDetailProductByID($products[$i]['idProducto']);

                                        $_SESSION['selectedIndex'] = $i;
                                    } else {
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
                        <div class="gridarea newNombreProducto">
                            <input type="text" placeholder="Nombre del nuevo producto" class="textNewNombreProducto" name="nuevoNombreProducto">
                        </div>
                        <div class="gridarea descripcionProducto">
                            <textarea name="descripcionProducto"
                                placeholder="Descripción Producto" class="style-inputs"><?= $products[$_SESSION['selectedIndex']]['descripcionProducto'] ?></textarea>
                        </div>
                        <div class="gridarea imagenProducto">
                            <input type="text" name="imagenProducto" placeholder="Ruta de la Imagen" class="style-inputs" value="<?= $products[$_SESSION['selectedIndex']]['imagenProducto'] ?>">
                        </div>
                        <div class="gridarea precioProducto"><input type="number" name="precioProducto" class="style-inputs" value="<?= $products[$_SESSION['selectedIndex']]['precioProducto'] ?>"></div>
                        <div class="gridarea talla">
                            <select class="select-products">
                                <?php
                                //En este bucle recorremos el array con el producto seleccionado y sus diferentes tallas
                                for ($i = 0; $i < count($product); $i++) {
                                ?>
                                    <option><?= $product[$i]['nombreTalla'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="gridarea añadir"><input type="submit" name="añadir" value="Añadir" class="style-inputs"></div>
                        <div class="gridarea eliminar"><input type="submit" <?=$productoCargado?'':'disabled'?> name="eliminar" value="Eliminar" class="style-inputs"></div>
                        <div class="gridarea confirmar"><input type="submit" <?=$productoCargado?'':'disabled'?> name="confirmar" value="Confirmar" class="style-inputs"></div>
                        <div class="gridarea cargarProducto"><input type="submit" name="cargar" value="Cargar Producto" class="style-inputs"></div>
                    <?php
                    } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['añadir'])) {
                        $productoCargado = false;
                        $productController->addProduct($_POST['nuevoNombreProducto'], $_POST['precioProducto'], $_POST['descripcionProducto'], $_POST['imagenProducto'], 0);
                        header("Location: admin.php");
                        exit();
                    } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminar'])) {
                        $productoCargado = false;
                        $productController->deleteProduct($products[$_SESSION['selectedIndex']]['idProducto']);
                        header("Location: admin.php");
                        exit();
                    } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirmar'])) {
                        $productoCargado = false;
                        if ($_POST['nuevoNombreProducto'] != '') {
                            $productController->updateProduct($products[$_SESSION['selectedIndex']]['idProducto'], $_POST['nuevoNombreProducto'], $_POST['precioProducto'], $_POST['descripcionProducto'], $_POST['imagenProducto']);
                        } else {
                            $productController->updateProduct($products[$_SESSION['selectedIndex']]['idProducto'], $products[$_SESSION['selectedIndex']]['nombreProducto'], $_POST['precioProducto'], $_POST['descripcionProducto'], $_POST['imagenProducto']);
                        }

                        header("Location: admin.php");
                        exit();
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
                        <div class="gridarea newNombreProducto">
                            <input type="text" placeholder="Nombre del nuevo producto" class="textNewNombreProducto" name="nuevoNombreProducto">
                        </div>
                        <div class="gridarea descripcionProducto"><textarea name="descripcionProducto"
                                placeholder="Descripción Producto" class="style-inputs"></textarea></div>
                        <div class="gridarea imagenProducto">
                            <input type="text" name="imagenProducto" placeholder="Ruta de la Imagen" class="style-inputs">
                        </div>
                        <div class="gridarea precioProducto"><input type="number" name="precioProducto" placeholder="Precio" class="style-inputs"></div>
                        <div class="gridarea talla">Talla</div>
                        <div class="gridarea añadir"><input type="submit" name="añadir" value="Añadir" class="style-inputs"></div>
                        <div class="gridarea eliminar"><input type="submit" <?=$productoCargado?'':'disabled'?> name="eliminar" value="Eliminar" class="style-inputs"></div>
                        <div class="gridarea confirmar"><input type="submit" <?=$productoCargado?'':'disabled'?> name="confirmar" value="Confirmar" class="style-inputs"></div>
                        <div class="gridarea cargarProducto"><input type="submit" name="cargar" value="Cargar Producto" class="style-inputs"></div>
                    <?php
                    }
                    if (isset($_POST['cerrarSesion'])) {
                        cerrarSesion($sesion);
                    }
                    function cerrarSesion($session)
                    {
                        $session->eliminarVariableSesion('usuario');
                        header("Location: /app/View/login/login.php");
                    }
                    ?>
                </div>
            </form>
    </div>
    
</body>

</html>