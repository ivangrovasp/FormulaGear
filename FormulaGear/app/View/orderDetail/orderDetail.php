<!DOCTYPE html>
<html lang="en">

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
            <p>Order Number "ID PRODUCTO"</p>
            <form action="/app/View/login/login.php" method="post">
                Nombre Producto<input type="email" name="email" >
                Precio<input type="password" name="password" >
                <img id="fotoResumen" src="../../../imagenes/neumatico.png" alt="Neumático f1">
            </form>
            <a href="/app/View/main/main.php">Volver al menú principal</a>
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