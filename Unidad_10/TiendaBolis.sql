-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-01-2026 a las 19:11:51
-- Versión del servidor: 10.11.13-MariaDB-0ubuntu0.24.04.1
-- Versión de PHP: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `TiendaBolis`
--
CREATE DATABASE IF NOT EXISTS `TiendaBolis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `TiendaBolis`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boligrafos`
--

DROP TABLE IF EXISTS `boligrafos`;
CREATE TABLE `boligrafos` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `boligrafos`
--

INSERT INTO `boligrafos` (`id`, `imagen`, `descripcion`, `precio`) VALUES
(1, 'css/img/boliAzul1.webp', 'Bolígrafo azul de la marca BIC. Duradero, simple y confiable.', 0.60),
(2, 'css/img/boliNegro1.jpg', 'Bolígrafo de escritura media.\r\nCapuchón y tapón del color de la tinta.\r\nCuerpo transparente que permite ver el nivel de tinta.\r\nColor negro.', 0.28),
(9, 'css/img/pez.avif', 'Bolígrafo con forma de pez, to rechulon\r\n', 2.00),
(10, 'css/img/boliAzul2.jpg', 'otro boli asul', 24.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boligrafos`
--
ALTER TABLE `boligrafos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boligrafos`
--
ALTER TABLE `boligrafos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
