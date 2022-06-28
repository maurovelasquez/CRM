-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2022 a las 02:35:10
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crmtools`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `recibido` date DEFAULT NULL,
  `cierre` date DEFAULT NULL,
  `dias` int(11) DEFAULT NULL,
  `estado` varchar(25) NOT NULL,
  `observaciones` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `recibido`, `cierre`, `dias`, `estado`, `observaciones`) VALUES
(32, '2022-06-24', '2022-06-10', 124, '4', 'Observacion'),
(38, '2022-06-30', '2022-07-30', 2908, 'SAPO1', 'SEASAPO244'),
(39, '2022-06-08', '2022-06-10', 45, '122', '45'),
(41, '2022-06-17', '2022-06-18', 2, 'cerrado', 'se valido el caso y se llego a un acuerdo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `reporte` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `reporte_hecho_por` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Dia_reporte` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `respuesta` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `respuesta_hecha_por` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Dia_respuesta` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id`, `reporte`, `reporte_hecho_por`, `Dia_reporte`, `respuesta`, `respuesta_hecha_por`, `Dia_respuesta`) VALUES
(1, 'eliminado', 'demo', '08/06/2022 - 11:44:45 PM ', 'xd', '1@1', '08/06/2022 - 11:45:10 PM '),
(2, 'sapo', 'demo', '16/06/2022 - 7:09:36 PM ', 'eliminado', '1@1', '08/06/2022 - 12:00:08 AM '),
(8, ' sapo peo', 'demo', '16/06/2022 - 6:51:21 PM ', 'elena es gay\r\n', 'Admin', '16/06/2022 - 6:54:19 PM '),
(9, 'el', 'demo', '08/06/2022 - 11:46:04 PM ', 'respuesta 23', 'Admin', '16/06/2022 - 6:53:39 PM ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_Usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Colaborador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `Tipo_Usuario`) VALUES
(1, 'Colaborador', 'c8f37be17cb9c58521083d062f500b3b', 'Colaborador'),
(2, 'Colaborador2', ' c8f37be17cb9c58521083d062f500b3b', 'Colaborador'),
(3, 'Colaborador3', ' c8f37be17cb9c58521083d062f500b3b', 'Colaborador'),
(4, 'Admin', '2a2e9a58102784ca18e2605a4e727b5f', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
