-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2020 at 01:38 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scarpapos`
--

-- --------------------------------------------------------

--
-- Table structure for table `productos`
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
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_p`, `precio_p`, `imagen_p`, `existencia`, `talla_p`, `color_p`, `tipo`) VALUES
(1, 'DERBY', 2399, 'derby.jpg', 10, 0, '', 'zapato'),
(2, 'MONKSTRAP', 2199, 'monk_strap.jpg', 15, 0, '', 'zapato'),
(3, 'OXFORD', 1999, 'oxford.jpg', 10, 0, '', 'zapato'),
(4, 'CHELSEA', 2499, 'chelsea.jpg', 10, 0, '', 'bota'),
(5, 'CHUKA', 2199, 'chuka.jpg', 15, 0, '', 'bota');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
