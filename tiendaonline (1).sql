-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-10-2017 a las 16:34:12
-- Versión del servidor: 10.1.26-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendaonline`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`tienda`@`%` PROCEDURE `addCliente` (IN `nombre` VARCHAR(100), IN `apellido` VARCHAR(100), IN `email` VARCHAR(25), IN `usuario` VARCHAR(50), IN `contrasena` VARCHAR(50), IN `direccion` VARCHAR(100), IN `pais` VARCHAR(50))  BEGIN

    INSERT INTO clientes (nombre,apellidos,email,usuario,contrasena,direccion,pais)  VALUES(nombre,apellido,email,usuario,contrasena,direccion,pais);

  END$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `addLineaPedido` (IN `pedido` INT(10), IN `producto` INT(10), IN `unidades` INT(10))  BEGIN


  INSERT INTO  lineaspedido (idpedido, idproducto, unidades) VALUES (pedido,producto,unidades);


  END$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `addPedido` (IN `id` VARCHAR(10))  BEGIN


  INSERT  INTO pedidos (idCliente,fecha,estado) VALUES (id,CURDATE(),'0');


  END$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `addProducto` (IN `nombre` VARCHAR(100), IN `descripcion` VARCHAR(100), IN `precio` DECIMAL(10,0), IN `peso` DOUBLE, IN `existencias` INT(10), IN `estado` INT(2))  BEGIN

 INSERT INTO productos (nombre,descripcion,precio,peso,existencias,estado) 
VALUES (nombre,descripcion,precio,peso,existencias,estado);

  END$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `Autenticacion` (IN `usuario` VARCHAR(100), IN `pass` VARCHAR(50))  BEGIN


  SELECT * from clientes WHERE  usuario = usuario AND contrasena = pass LIMIT 1;



  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `autenticacionU` (IN `usuario` VARCHAR(100), IN `pass` VARCHAR(100))  NO SQL
BEGIN

SELECT * from usuarios WHERE user = usuario AND pass= md5('pass');

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cancelarPedido` (IN `id` INT(10))  NO SQL
UPDATE pedidos SET estado =2 WHERE idPedido = id$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `descontarStock` (IN `id` INT(10), IN `unidades` INT(10))  BEGIN


  UPDATE productos SET existencias = (existencias -1) WHERE idProducto = id;


  END$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `getAllImgByProducto` (IN `id` INT(11))  BEGIN


  SELECT * from imagenesproductos WHERE  idProducto =id;



  END$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `getAllPro` ()  BEGIN
    SELECT * FROM productos WHERE existencias > 0 ;

  END$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `getAllProdById` (IN `id` INT(11))  BEGIN


SELECT * from productos WHERE idProducto =id LIMIT 1;

  END$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `getPedidoByCliente` (IN `id` VARCHAR(10))  BEGIN


  SELECT * from pedidos WHERE idCliente = id ORDER BY fecha DESC LIMIT 1;


  END$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `getProdAndImage` (IN `id` INT(11))  BEGIN


  SELECT productos.* , imagenesproductos.* from productos INNER JOIN imagenesproductos ON productos.idProducto = imagenesproductos.idProducto = id LIMIT 1;

  END$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `getProductById` (IN `id` INT(10))  BEGIN
    SELECT * FROM productos WHERE idProducto=id ;

  END$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `getProductImagenById` (IN `id` INT(10))  BEGIN
    SELECT * FROM imagenesproductos WHERE idProducto=id  limit 1;

  END$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `pedidoServido` (IN `id` INT(10))  UPDATE pedidos SET estado =1 WHERE idPedido = id$$

CREATE DEFINER=`tienda`@`%` PROCEDURE `validar` (IN `usuario` VARCHAR(100), IN `clave` VARCHAR(100))  BEGIN
  DECLARE sp_encrypted_password VARCHAR(32);
  SET sp_encrypted_password = MD5(`clave`);

  SELECT * FROM usuarios WHERE user = usuario and pass=sp_encrypted_password;


  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `email` varchar(25) COLLATE utf16_spanish_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `pais` varchar(50) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- RELACIONES PARA LA TABLA `clientes`:
--

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `apellidos`, `email`, `usuario`, `contrasena`, `direccion`, `pais`) VALUES
(1, 'Stefhani Marjorie', 'López Gómez', 'fanygomez17@hotmail.com', 'Fany', 'brabus.01@', 'Pasaquina', 'El salvador'),
(2, 'Cristian Arnulfo', 'Zelaya Ventura', 'crizv@hotmail.com', 'Cristian', 'brabus.01@', 'Santa Rosa', 'El salvador'),
(3, 'Edwin', 'Guevara', 'g@gmail.com', 'edwin', '12345678', 'Pasaquina', 'El salvador'),
(4, 'Ferdinand', 'Gomez', 'ferdi@gmail.com', 'ferdi', '12345', 'Pasaquina', 'El salvador'),
(5, 'Mia', 'Gomez', 'mig@gmail.com', 'Mia', '12345', 'Pasaquina', 'El Salvador');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `getallproductimagen`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `getallproductimagen` (
`idImagen` int(10)
,`idProducto` int(11)
,`imagen` varchar(100)
,`titulo` varchar(100)
,`descripcion` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `getallproductimagenby`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `getallproductimagenby` (
`idImagen` int(10)
,`idProducto` int(11)
,`imagen` varchar(100)
,`titulo` varchar(100)
,`descripcion` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenesproductos`
--

CREATE TABLE `imagenesproductos` (
  `idImagen` int(10) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `titulo` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- RELACIONES PARA LA TABLA `imagenesproductos`:
--   `idProducto`
--       `productos` -> `idProducto`
--

--
-- Volcado de datos para la tabla `imagenesproductos`
--

INSERT INTO `imagenesproductos` (`idImagen`, `idProducto`, `imagen`, `titulo`, `descripcion`) VALUES
(1, 1, 'usb4.jpg', 'Memoria usb 4 gb', 'lolalalala'),
(3, 1, 'img2.png', 'Memoria', ''),
(4, 2, 'disco1tera.png', 'DISCO DURO EXTERNO 1TB TOSHIBA USB 3.0', 'USB energizado.'),
(5, 3, 'Sony-CP-ELS.jpg', 'Cargador Portatil CP-ELS', 'Cualquier usuario de smartphones sabe que la debilidad de los mismos es la duración de la batería. '),
(6, 4, 'Mouseinalámbrico.jpg', 'Mouse inalámbrico', ''),
(7, 5, 'fundahp14.jpg', 'Funda ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaspedido`
--

CREATE TABLE `lineaspedido` (
  `idLienasP` int(11) NOT NULL,
  `idpedido` int(10) NOT NULL,
  `idproducto` int(10) NOT NULL,
  `unidades` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- RELACIONES PARA LA TABLA `lineaspedido`:
--   `idpedido`
--       `pedidos` -> `idPedido`
--   `idproducto`
--       `productos` -> `idProducto`
--

--
-- Volcado de datos para la tabla `lineaspedido`
--

INSERT INTO `lineaspedido` (`idLienasP`, `idpedido`, `idproducto`, `unidades`) VALUES
(1, 78, 1, 2),
(2, 78, 1, 2),
(3, 79, 1, 2),
(4, 79, 2, 2),
(5, 80, 1, 2),
(6, 80, 2, 2),
(7, 81, 1, 2),
(8, 81, 1, 2),
(9, 82, 1, 10),
(10, 82, 1, 10),
(11, 82, 1, 10),
(12, 82, 1, 10),
(13, 82, 1, 10),
(14, 82, 1, 10),
(15, 82, 1, 10),
(16, 82, 1, 10),
(17, 82, 1, 10),
(18, 82, 1, 10),
(19, 82, 1, 10),
(20, 82, 1, 10),
(21, 82, 1, 10),
(22, 82, 1, 10),
(23, 82, 1, 10),
(24, 82, 1, 10),
(25, 82, 1, 10),
(26, 82, 1, 10),
(27, 82, 1, 10),
(28, 82, 1, 10),
(29, 82, 1, 10),
(30, 82, 1, 10),
(31, 82, 1, 10),
(32, 82, 1, 10),
(33, 82, 1, 10),
(34, 82, 1, 10),
(35, 82, 1, 10),
(36, 82, 1, 10),
(37, 82, 1, 10),
(38, 82, 1, 10),
(39, 82, 1, 10),
(40, 82, 1, 10),
(41, 82, 1, 10),
(42, 82, 1, 10),
(43, 82, 1, 10),
(44, 82, 1, 10),
(45, 82, 1, 10),
(46, 82, 1, 10),
(47, 82, 1, 10),
(48, 82, 1, 10),
(49, 82, 1, 10),
(50, 82, 1, 10),
(51, 82, 1, 10),
(52, 82, 1, 10),
(53, 82, 1, 10),
(54, 82, 1, 10),
(55, 82, 1, 10),
(56, 82, 1, 10),
(57, 82, 1, 10),
(58, 82, 1, 10),
(59, 82, 1, 10),
(60, 82, 1, 10),
(61, 82, 1, 10),
(62, 82, 1, 10),
(63, 82, 1, 10),
(64, 82, 1, 10),
(65, 82, 1, 10),
(66, 82, 1, 10),
(67, 82, 1, 10),
(68, 82, 1, 10),
(69, 82, 1, 10),
(70, 82, 1, 10),
(71, 82, 1, 10),
(72, 82, 1, 10),
(73, 82, 1, 10),
(74, 82, 1, 10),
(75, 82, 1, 10),
(76, 82, 1, 10),
(77, 82, 1, 10),
(78, 82, 1, 10),
(79, 82, 1, 10),
(80, 82, 1, 10),
(81, 82, 1, 10),
(82, 82, 1, 10),
(83, 82, 1, 10),
(84, 82, 1, 10),
(85, 82, 1, 10),
(86, 82, 1, 10),
(87, 82, 1, 10),
(88, 82, 1, 10),
(89, 90, 2, 3),
(90, 90, 2, 3),
(91, 90, 2, 3),
(92, 91, 2, 4),
(93, 91, 2, 4),
(94, 91, 2, 4),
(95, 91, 2, 4);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `listpedidoscliente`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `listpedidoscliente` (
`idpedido` int(10)
,`fecha` varchar(10)
,`estado` varchar(100)
,`nombre` varchar(100)
,`apellidos` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(10) NOT NULL,
  `idCliente` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(100) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- RELACIONES PARA LA TABLA `pedidos`:
--   `idCliente`
--       `clientes` -> `idCliente`
--

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idCliente`, `fecha`, `estado`) VALUES
(78, 4, '2016-09-04', '2'),
(79, 1, '2016-09-05', '2'),
(80, 4, '2016-09-06', '2'),
(81, 1, '2016-09-06', '2'),
(82, 1, '2016-09-08', '2'),
(83, 1, '2016-09-08', '2'),
(84, 1, '2016-09-08', '2'),
(85, 1, '2016-09-08', '2'),
(86, 1, '2016-09-08', '2'),
(87, 1, '2016-09-08', '2'),
(88, 1, '2016-09-08', '2'),
(89, 1, '2016-09-08', '2'),
(90, 4, '2016-09-08', '2'),
(91, 1, '2016-09-09', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `peso` double NOT NULL,
  `existencias` int(10) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- RELACIONES PARA LA TABLA `productos`:
--

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `descripcion`, `precio`, `peso`, `existencias`, `estado`) VALUES
(1, 'Memoria USB 4GB', 'Tipo de producto:Unidad flash USB ·Tipo de interfaz: Hi-Speed USB', '100', 10, -50, 1),
(2, 'Disco duro Externo 1tb', 'Interfaz de host	USB 3.0', '175', 165, 34, 1),
(3, 'Cargador Portatil', '', '75', 5, 20, 1),
(4, 'Mouse óptico inalámbrico', 'Con una unidad óptica de precisión de 1200 dpi.', '16', 1, 50, 1),
(5, 'Funda HP', 'Para Laptops de hasta 14\".', '20', 0.25, 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `user` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `rol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `user`, `pass`, `rol`) VALUES
(1, 'Fany', '6a0482f0d9daf730ce2b6dddaf558b43', 1),
(2, 'Portillo', 'ae15fb3d979fe2d4cb1a88f274771c9f', 0),
(3, 'Sandra', 'ae15fb3d979fe2d4cb1a88f274771c9f', 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `getallproductimagen`
--
DROP TABLE IF EXISTS `getallproductimagen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getallproductimagen`  AS  select `imagenesproductos`.`idImagen` AS `idImagen`,`imagenesproductos`.`idProducto` AS `idProducto`,`imagenesproductos`.`imagen` AS `imagen`,`imagenesproductos`.`titulo` AS `titulo`,`imagenesproductos`.`descripcion` AS `descripcion` from `imagenesproductos` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `getallproductimagenby`
--
DROP TABLE IF EXISTS `getallproductimagenby`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getallproductimagenby`  AS  select `imagenesproductos`.`idImagen` AS `idImagen`,`imagenesproductos`.`idProducto` AS `idProducto`,`imagenesproductos`.`imagen` AS `imagen`,`imagenesproductos`.`titulo` AS `titulo`,`imagenesproductos`.`descripcion` AS `descripcion` from `imagenesproductos` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `listpedidoscliente`
--
DROP TABLE IF EXISTS `listpedidoscliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`tienda`@`%` SQL SECURITY DEFINER VIEW `listpedidoscliente`  AS  select `pedidos`.`idPedido` AS `idpedido`,date_format(`pedidos`.`fecha`,'%d/%m/%Y') AS `fecha`,`pedidos`.`estado` AS `estado`,`clientes`.`nombre` AS `nombre`,`clientes`.`apellidos` AS `apellidos` from (`pedidos` left join `clientes` on((`pedidos`.`idCliente` = `clientes`.`idCliente`))) order by `pedidos`.`estado`,date_format(`pedidos`.`fecha`,'%d/%m/%Y') ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `imagenesproductos`
--
ALTER TABLE `imagenesproductos`
  ADD PRIMARY KEY (`idImagen`),
  ADD KEY `idProducto` (`idProducto`) USING BTREE;

--
-- Indices de la tabla `lineaspedido`
--
ALTER TABLE `lineaspedido`
  ADD PRIMARY KEY (`idLienasP`),
  ADD KEY `idpedido` (`idpedido`) USING BTREE,
  ADD KEY `idproducto` (`idproducto`) USING BTREE;

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idCliente` (`idCliente`) USING BTREE;

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `imagenesproductos`
--
ALTER TABLE `imagenesproductos`
  MODIFY `idImagen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `lineaspedido`
--
ALTER TABLE `lineaspedido`
  MODIFY `idLienasP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenesproductos`
--
ALTER TABLE `imagenesproductos`
  ADD CONSTRAINT `imagenesproductos_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lineaspedido`
--
ALTER TABLE `lineaspedido`
  ADD CONSTRAINT `lineaspedido_ibfk_1` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lineaspedido_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
