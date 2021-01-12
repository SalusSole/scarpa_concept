-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-09-2020 a las 22:38:04
-- Versión del servidor: 5.5.62-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `scarpapos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chef`
--

CREATE TABLE IF NOT EXISTS `chef` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `precio` varchar(7) NOT NULL,
  `disponible` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `chef`
--

INSERT INTO `chef` (`id`, `nombre`, `precio`, `disponible`) VALUES
(1, 'lasagna', '80', 1),
(2, 'ratatuile', '112', 0),
(3, 'pizza', '24', 1),
(4, 'milaneza', '50', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE IF NOT EXISTS `envio` (
  `id_envio` int(11) NOT NULL AUTO_INCREMENT,
  `cp` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `telefono` int(11) NOT NULL,
  `exterior` varchar(11) NOT NULL,
  `interior` varchar(11) NOT NULL,
  PRIMARY KEY (`id_envio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`id_envio`, `cp`, `estado`, `municipio`, `colonia`, `calle`, `telefono`, `exterior`, `interior`) VALUES
(1, 11, '11', '11', '11', '11', 11, '11', ''),
(2, 11, '11', '11', '11', '11', 11, '11', '11'),
(3, 11, '11', '11', '11', '11', 11, '11', '11'),
(4, 11, '11', '11', '11', '11', 11, '11', '11'),
(5, 11, '11', '11', '11', '11', 11, '11', '11'),
(6, 11, '11', '11', '11', '11', 11, '11', '11'),
(7, 11, '11', '11', '11', '11', 11, '11', '11'),
(8, 11, '11', '11', '11', '11', 11, '11', '11'),
(9, 11, '11', '11', '11', '11', 11, '11', '11'),
(10, 11, '11', '11', '11', '11', 11, '11', '11'),
(11, 777, '777', '777', '77', '77', 777777, '777', '777'),
(12, 777, '777', '777', '77', '77', 777777, '777', '777'),
(13, 66, '66', '66', '66', '66', 66, '66', '66'),
(14, 77, '77', '77', '77', '77', 77, '77', '77'),
(15, 66, '66', '66', '66', '66', 66, '66', '66'),
(16, 777, '777', '777', '77', '77', 777777, '777', '777'),
(17, 777, '777', '777', '77', '77', 777777, '777', '777'),
(18, 66, '66', '66', '66', '66', 66, '66', '66'),
(19, 77, '77', '77', '77', '77', 77, '77', '77'),
(20, 66, '66', '66', '66', '66', 66, '66', '66'),
(21, 6567, 'jal', 'gdl', 'la loma', 'la loma', 2222222, '123', '1'),
(22, 0, 'yy', 'yy', 'yy', 'yy', 55555, 'yy', 'yy'),
(23, 777, '777', '777', '77', '77', 777777, '777', '777'),
(24, 777, '777', '777', '77', '77', 777777, '777', '777'),
(25, 66, '66', '66', '66', '66', 66, '66', '66'),
(26, 77, '77', '77', '77', '77', 77, '77', '77'),
(27, 66, '66', '66', '66', '66', 66, '66', '66'),
(28, 6567, 'jal', 'gdl', 'la loma', 'la loma', 2222222, '123', '1'),
(29, 0, 'yy', 'yy', 'yy', 'yy', 55555, 'yy', 'yy'),
(30, 676, '676', '676', '76', '6666', 6, '6', '6'),
(31, 777, '777', '777', '77', '77', 777777, '777', '777'),
(32, 777, '777', '777', '77', '77', 777777, '777', '777'),
(33, 66, '66', '66', '66', '66', 66, '66', '66'),
(34, 77, '77', '77', '77', '77', 77, '77', '77'),
(35, 66, '66', '66', '66', '66', 66, '66', '66'),
(36, 6567, 'jal', 'gdl', 'la loma', 'la loma', 2222222, '123', '1'),
(37, 0, 'yy', 'yy', 'yy', 'yy', 55555, 'yy', 'yy'),
(38, 676, '676', '676', '76', '6666', 6, '6', '6'),
(39, 55, '55', '55', '55', '55', 55, '55', '55'),
(40, 777, '777', '777', '77', '77', 777777, '777', '777'),
(41, 777, '777', '777', '77', '77', 777777, '777', '777'),
(42, 66, '66', '66', '66', '66', 66, '66', '66'),
(43, 77, '77', '77', '77', '77', 77, '77', '77'),
(44, 66, '66', '66', '66', '66', 66, '66', '66'),
(45, 6567, 'jal', 'gdl', 'la loma', 'la loma', 2222222, '123', '1'),
(46, 0, 'yy', 'yy', 'yy', 'yy', 55555, 'yy', 'yy'),
(47, 676, '676', '676', '76', '6666', 6, '6', '6'),
(48, 55, '55', '55', '55', '55', 55, '55', '55'),
(49, 0, 'Guanajuato', 'Guanajuato', 'La loma', 'Nacimineto poniente', 2147483647, '34', ''),
(50, 11, '11', '11', '11', '11', 11, '11', '11'),
(51, 0, 'fdf', 'fdf', 'fd', 'hgh', 2147483647, 'gtrfg', 'gfg'),
(52, 22, '222', '22', '22', '22', 22, '22', '22'),
(53, 11, '11', '11', '11', '11', 11, '11', '11'),
(54, 0, 'fdf', 'fdf', 'fd', 'hgh', 2147483647, 'gtrfg', 'gfg'),
(55, 22, '222', '22', '22', '22', 22, '22', '22'),
(56, 454, 'Jalisco', 'El salto', 'La loma', 'La loma', 2147483647, '12', '1'),
(57, 11, '11', '11', '11', '11', 11, '11', '11'),
(58, 0, 'fdf', 'fdf', 'fd', 'hgh', 2147483647, 'gtrfg', 'gfg'),
(59, 22, '222', '22', '22', '22', 22, '22', '22'),
(60, 454, 'Jalisco', 'El salto', 'La loma', 'La loma', 2147483647, '12', '1'),
(61, 12331, 'Jalisco', 'El salto', 'La loma', 'La loma', 2147483647, '123', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `ruta_factura` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `id_usuario`, `id_pedido`, `ruta_factura`, `status`) VALUES
(10, 3, 8, 'ss_id3_June_10_2020', 'entregado'),
(11, 2, 7, 'salvador_id2_June_10_2020', 'bien'),
(12, 2, 10, 'salvador_id2_June_11_2020', 'entregado'),
(13, 2, 11, 'salvador_id2_June_11_2020', 'entregado'),
(14, 2, 12, 'salvador_id2_June_11_2020', 'pagado'),
(15, 2, 14, 'Claudia_id2_June_19_2020', 'pendiente'),
(16, 3, 15, 'Salvador-Solis_id3_June_19_2020', 'entregado'),
(17, 3, 16, 'Salvador-Solis_id3_June_19_2020', 'pagado'),
(18, 3, 17, 'Salvador-Solis_id3_June_19_2020', 'pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(3) NOT NULL AUTO_INCREMENT,
  `nombre_p` varchar(20) NOT NULL,
  `precio_p` int(4) NOT NULL,
  `imagen_p` varchar(20) NOT NULL,
  `existencia` int(3) NOT NULL,
  `talla_p` int(4) NOT NULL,
  `color_p` varchar(10) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_p`, `precio_p`, `imagen_p`, `existencia`, `talla_p`, `color_p`, `tipo`) VALUES
(1, 'DERBY', 2399, 'derby.jpg', 10, 0, '', 'zapato'),
(2, 'MONKSTRAP', 2199, 'monk_strap.jpg', 15, 0, '', 'zapato'),
(3, 'OXFORD', 1999, 'oxford.jpg', 9, 0, '', 'zapato'),
(4, 'CHELSEA', 2899, 'chelsea.jpg', 9, 0, '', 'bota'),
(5, 'CHUKA', 2199, 'chuka.jpg', 15, 0, '', 'bota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Administrador', 'Admin', 'admin@gmail.com', 'admin2020', '2020-06-19 02:11:20'),
(2, 'Claudia', 'claudia', 'claudia@gmail.com', '1234', '2020-06-10 07:25:38'),
(3, 'Salvador Solis', 'Salvador', 'ch1.yomero.ss@gmail.com', '1234', '2020-06-19 19:12:10'),
(4, 'Sanc', 'Alejandro', 'alesanc@gmail.com', '1234', '2020-06-19 22:53:40');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
