-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2024 a las 10:00:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formulagear`
--
CREATE DATABASE `formulagear`;
USE `formulagear`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

CREATE TABLE `favorito` (
  `idFavorito` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `isLiked` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(255) NOT NULL,
  `precioProducto` decimal(10,0) NOT NULL,
  `descripcionProducto` varchar(255) NOT NULL,
  `imagenProducto` varchar(255) NOT NULL,
  `numeroLikesProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `idTalla` int(11) NOT NULL,
  `nombreTalla` varchar(255) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  `correoUsuario` varchar(255) NOT NULL,
  `permisosUsuario` bit(1) NOT NULL,
  `passUsuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`idFavorito`),
  ADD KEY `fk_favorito_usuario` (`idUsuario`),
  ADD KEY `fk_favorito_producto` (`idProducto`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_usuario` (`idUsuario`),
  ADD KEY `fk_producto` (`idProducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);



--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`idTalla`),
  ADD KEY `fk_producto_talla` (`idProducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `favorito`
--
ALTER TABLE `favorito`
  MODIFY `idFavorito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `idTalla` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `fk_favorito_producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`)
  ON DELETE CASCADE,
  ADD CONSTRAINT `fk_favorito_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
  ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`)
   ON DELETE CASCADE,
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
   ON DELETE CASCADE;


--
-- Filtros para la tabla `talla`
--
ALTER TABLE `talla`
ADD CONSTRAINT `fk_producto_talla`
FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`)
ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
