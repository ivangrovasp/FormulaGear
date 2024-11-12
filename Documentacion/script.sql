/*
INSERTAR USUARIOS
*/
INSERT INTO `usuario`( `nombreUsuario`, `correoUsuario`, `permisosUsuario`, `passUsuario`) VALUES ('Admin','admin@gmail.com',1,'admin123');
INSERT INTO `usuario`( `nombreUsuario`, `correoUsuario`, `permisosUsuario`, `passUsuario`) VALUES ('Mathias','mathiasveira@gmail.com',0,'mathias123');
INSERT INTO `usuario`( `nombreUsuario`, `correoUsuario`, `permisosUsuario`, `passUsuario`) VALUES ('Ivan','ivan@gmail.com',0,'ivan123');
INSERT INTO `usuario`( `nombreUsuario`, `correoUsuario`, `permisosUsuario`, `passUsuario`) VALUES ('Alberto','alberto@gmail.com',0,'alberto123');
/*
INSERTAR PRODUCTOS
*/
INSERT INTO `producto`(`nombreProducto`,`precioProducto`,`descripcionProducto`,`imagenProducto`,`numeroLikesProducto`) VALUES ('Camiseta Ferrari',50,'Consigue el estilo de tu equipo favorito de carreras. Este artículo icónico añade un toque de velocidad a cualquier otra prenda para que puedas mostrar tus simpatías en la pista y en cualquier otra parte.','C:\xampp/htdocs/FormulaGear/FormulaGear/imagenes/camiseta-ferrari.jpg',60);
INSERT INTO `producto`(`nombreProducto`,`precioProducto`,`descripcionProducto`,`imagenProducto`,`numeroLikesProducto`) VALUES ('Camiseta Mercedes',40,'Consigue el estilo de tu equipo favorito de carreras. Este artículo icónico añade un toque de velocidad a cualquier otra prenda para que puedas mostrar tus simpatías en la pista y en cualquier otra parte.','C:\xampp/htdocs/FormulaGear/FormulaGear/imagenes/mercedesCamiseta.png',50);
INSERT INTO `producto`(`nombreProducto`,`precioProducto`,`descripcionProducto`,`imagenProducto`,`numeroLikesProducto`) VALUES ('Camiseta Aston Martin',70,'Consigue el estilo de tu equipo favorito de carreras. Este artículo icónico añade un toque de velocidad a cualquier otra prenda para que puedas mostrar tus simpatías en la pista y en cualquier otra parte.','C:\xampp/htdocs/FormulaGear/FormulaGear/imagenes/camisetaAstonMartin.png',40);
INSERT INTO `producto`(`nombreProducto`,`precioProducto`,`descripcionProducto`,`imagenProducto`,`numeroLikesProducto`) VALUES ('Gorra Red Bull',20,'Consigue el estilo de tu equipo favorito de carreras. Este artículo icónico añade un toque de velocidad a cualquier otra prenda para que puedas mostrar tus simpatías en la pista y en cualquier otra parte.','C:\xampp/htdocs/FormulaGear/FormulaGear/imagenes/gorra-red-bull.webp',5);
INSERT INTO `producto`(`nombreProducto`,`precioProducto`,`descripcionProducto`,`imagenProducto`,`numeroLikesProducto`) VALUES ('Coche Miniatura Fernando Alonso',100,'Consigue el estilo de tu equipo favorito de carreras. Este artículo icónico añade un toque de velocidad a cualquier otra prenda para que puedas mostrar tus simpatías en la pista y en cualquier otra parte.','C:\xampp/htdocs/FormulaGear/FormulaGear/imagenes/gorra-red-bull.webp',70);
/*
INSERTAR TALLA
*/
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('XL',1);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('L',1);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('XL',2);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('L',2);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('XL',3);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('L',3);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('XL',4);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('L',4);
/*
INSERTAR PRODUCTOS FAVORITOS
*/
INSERT INTO `favorito`(`idUsuario`,`idProducto`)VALUES(1,1);
INSERT INTO `favorito`(`idUsuario`,`idProducto`)VALUES(2,2);
/*INSERTAR PEDIDO*/
INSERT INTO `pedido`(`idUsuario`,`idProducto`)VALUES(2,5);
INSERT INTO `pedido`(`idUsuario`,`idProducto`)VALUES(3,1);
INSERT INTO `pedido`(`idUsuario`,`idProducto`)VALUES(4,2);
