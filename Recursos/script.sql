/*
INSERTAR USUARIOS
*/
INSERT INTO `usuario`( `nombreUsuario`, `correoUsuario`, `permisosUsuario`, `passUsuario`) VALUES ('Admin','admin@gmail.com',1,'$2y$10$dXe7FlukGziCt5Ra8ZzucObCBSIBDmMLiQjVCX0bXP4W6NqR8kyyC');
INSERT INTO `usuario`( `nombreUsuario`, `correoUsuario`, `permisosUsuario`, `passUsuario`) VALUES ('Mathias','mathiasveira@gmail.com',0,'$2y$10$Z.60oZi/eZn7P2K5Ael50ePgTvaxEcmvGACu3PDiBuifZzxIwHdK6');
INSERT INTO `usuario`( `nombreUsuario`, `correoUsuario`, `permisosUsuario`, `passUsuario`) VALUES ('Ivan','ivan@gmail.com',0,'$2y$10$yeo1T6Z7Il5gZixcgM3h.Oryksvq7M4kYC7ftwOlyrifoM4/JWYpW');
INSERT INTO `usuario`( `nombreUsuario`, `correoUsuario`, `permisosUsuario`, `passUsuario`) VALUES ('Alberto','alberto@gmail.com',0,'$2y$10$14PMxdE2xtIJG9hQg1i3C.ZqVm.krADtZpSA6dhUAoq08MOr.zuyK');
/*
INSERTAR PRODUCTOS
*/
INSERT INTO `producto`(`nombreProducto`,`precioProducto`,`descripcionProducto`,`imagenProducto`,`numeroLikesProducto`) VALUES ('Camiseta Ferrari',50,'Consigue el estilo de tu equipo favorito de carreras. Este artículo icónico añade un toque de velocidad a cualquier otra prenda para que puedas mostrar tus simpatías en la pista y en cualquier otra parte.','/Imagenes/camiseta-ferrari.jpg',60);
INSERT INTO `producto`(`nombreProducto`,`precioProducto`,`descripcionProducto`,`imagenProducto`,`numeroLikesProducto`) VALUES ('Camiseta Mercedes',40,'Consigue el estilo de tu equipo favorito de carreras. Este artículo icónico añade un toque de velocidad a cualquier otra prenda para que puedas mostrar tus simpatías en la pista y en cualquier otra parte.','/Imagenes/mercedesCamiseta.png',50);
INSERT INTO `producto`(`nombreProducto`,`precioProducto`,`descripcionProducto`,`imagenProducto`,`numeroLikesProducto`) VALUES ('Camiseta Aston Martin',70,'Consigue el estilo de tu equipo favorito de carreras. Este artículo icónico añade un toque de velocidad a cualquier otra prenda para que puedas mostrar tus simpatías en la pista y en cualquier otra parte.','/Imagenes/camisetaAstonMartin.png',40);
INSERT INTO `producto`(`nombreProducto`,`precioProducto`,`descripcionProducto`,`imagenProducto`,`numeroLikesProducto`) VALUES ('Gorra Red Bull',20,'Consigue el estilo de tu equipo favorito de carreras. Este artículo icónico añade un toque de velocidad a cualquier otra prenda para que puedas mostrar tus simpatías en la pista y en cualquier otra parte.','/Imagenes/gorra-red-bull.webp',5);

/*
INSERTAR TALLA
*/
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('XL',1);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('L',1);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('M',1);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('S',1);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('XL',2);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('L',2);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('M',2);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('S',2);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('XL',3);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('L',3);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('M',3);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('S',3);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('XL',4);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('L',4);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('M',4);
INSERT INTO `talla`(`nombreTalla`,`idProducto`)VALUES('S',4);
/*
INSERTAR PRODUCTOS FAVORITOS
*/
INSERT INTO `favorito`(`idUsuario`,`idProducto`)VALUES(1,1);
INSERT INTO `favorito`(`idUsuario`,`idProducto`)VALUES(2,2);
/*INSERTAR PEDIDO*/
INSERT INTO `pedido`(`idUsuario`,`idProducto`,`isLiked`)VALUES(2,3,0);
INSERT INTO `pedido`(`idUsuario`,`idProducto`,`isLiked`)VALUES(3,1,0);
INSERT INTO `pedido`(`idUsuario`,`idProducto`,`isLiked`)VALUES(4,2,0);
