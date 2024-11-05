/*
INSERTAR USUARIOS
*/

INSERT INTO `usuario`( `nombreUsuario`, `correoUsuario`, `permisosUsuario`, `passUsuario`) VALUES ('Mathias','mathiasveira@gmail.com',0,'mathias123');
INSERT INTO `usuario`( `nombreUsuario`, `correoUsuario`, `permisosUsuario`, `passUsuario`) VALUES ('Admin','admin@gmail.com',1,'admin123');
/*
INSERTAR PRODUCTOS
*/
INSERT INTO `producto`(`nombreProducto`,`precioProducto`,`descripcionProducto`,`imagenProducto`,`numeroLikesProducto`) VALUES ('Camiseta Ferrari',50,'Camiseta de ferrari chida','C:/formulagear_img/camiseta-ferrari.jpg',0);
INSERT INTO `producto`(`nombreProducto`,`precioProducto`,`descripcionProducto`,`imagenProducto`,`numeroLikesProducto`) VALUES ('Camiseta Mercedes',50,'Camiseta de Mercedes chida','C:/formulagear_img/camiseta-mercedes.avif',0);
/*
INSERTAR TALLA
*/
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('XL',1);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('L',1);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('XL',2);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('L',2);
/*
INSERTAR PRODUCTOS FAVORITOS
*/
INSERT INTO `favorito`(`idUsuario`,`idProducto`)VALUES(1,1);
INSERT INTO `favorito`(`idUsuario`,`idProducto`)VALUES(2,2);
/*INSERTAR PEDIDO*/
INSERT INTO `pedido`(`idUsuario`,`idProducto`)VALUES(1,1);
INSERT INTO `pedido`(`idUsuario`,`idProducto`)VALUES(2,2);
/*INSERTAR  SESION*/
INSERT INTO `sesion`(`idSesion`,`idUsuario`)VALUES(1,1);