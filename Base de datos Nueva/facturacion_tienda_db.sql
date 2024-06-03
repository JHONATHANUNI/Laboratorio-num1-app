-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2024 a las 21:18:15
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
-- Base de datos: `facturacion_tienda_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `precio`) VALUES
(1, 'Maleta deportiva', 120000),
(2, 'Colchoneta profesional', 60000),
(3, 'Bandas elasticas', 45000),
(4, 'Casco para bicicleta', 179000),
(5, 'Barra multifuncional', 175900),
(6, 'Lazo para ejercicio', 16900),
(7, 'Gorra deportiva', 89990),
(8, 'Botella de agua deportiva', 31990),
(9, 'Kit de entrenamiento', 158900),
(10, 'Canguro riñonera', 29900),
(11, 'Guantes de entrenamiento', 39000),
(12, 'Rueda abdominales', 79900),
(13, 'BAnco de pesas', 419900);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombreCompleto` varchar(150) NOT NULL,
  `tipoDocumento` enum('CC','CE','NIT','TI','Otro') NOT NULL,
  `numeroDocumento` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombreCompleto`, `tipoDocumento`, `numeroDocumento`, `email`, `telefono`) VALUES
(1, 'Jhonathan', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(2, 'Jhonathan', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(3, 'pepe', 'CC', '656757', 'hectoryesid9428@gmail.com', '098877'),
(4, 'Jhonathan', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(5, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(6, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(7, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(8, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(9, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(10, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(11, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(12, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(13, 'Jhonathan', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(14, 'Jhonathan', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(15, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(16, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(17, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(18, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(19, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(20, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(21, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(22, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(23, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(24, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(25, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(26, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484'),
(27, 'Jhonathan felipe uni sisa', 'CC', '1052312387', 'jhonathanunisisa@gmail.com', '3222325484');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefacturas`
--

CREATE TABLE `detallefacturas` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioUnitario` double NOT NULL,
  `idArticulo` int(11) NOT NULL,
  `referenciaFactura` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallefacturas`
--

INSERT INTO `detallefacturas` (`id`, `cantidad`, `precioUnitario`, `idArticulo`, `referenciaFactura`) VALUES
(1, 1, 89990, 7, '664c3aed0df4a'),
(2, 1, 120000, 1, '664c46807c6f3'),
(3, 1, 60000, 2, '664c46807c6f3'),
(4, 1, 45000, 3, '664c46807c6f3'),
(5, 1, 179000, 4, '664c46807c6f3'),
(6, 1, 175900, 5, '664c46807c6f3'),
(7, 1, 16900, 6, '664c46807c6f3'),
(8, 1, 89990, 7, '664c46807c6f3'),
(9, 1, 31990, 8, '664c46807c6f3'),
(10, 1, 158900, 9, '664c46807c6f3'),
(11, 1, 29900, 10, '664c46807c6f3'),
(12, 1, 39000, 11, '664c46807c6f3'),
(13, 1, 79900, 12, '664c46807c6f3'),
(14, 1, 419900, 13, '664c46807c6f3'),
(15, 1, 120000, 1, '664c4763a51db'),
(16, 1, 60000, 2, '664c4763a51db'),
(17, 1, 45000, 3, '664c4763a51db'),
(18, 1, 89990, 7, '664c4763a51db'),
(19, 1, 31990, 8, '664c4763a51db'),
(20, 1, 158900, 9, '664c4763a51db'),
(21, 1, 175900, 5, '664e8a5878563'),
(22, 1, 31990, 8, '664e8a5878563'),
(23, 1, 29900, 10, '664e8a5878563'),
(24, 1, 79900, 12, '664e8a5878563'),
(25, 1, 419900, 13, '664e8a5878563'),
(26, 1, 120000, 1, '664e9a4b1e397'),
(27, 1, 60000, 2, '664e9a4b1e397'),
(28, 1, 45000, 3, '664e9a4b1e397'),
(29, 1, 179000, 4, '664e9a4b1e397'),
(30, 1, 175900, 5, '664e9a4b1e397'),
(31, 1, 120000, 1, '664ecad14143a'),
(32, 1, 60000, 2, '664ecad14143a'),
(33, 1, 45000, 3, '664ecad14143a'),
(34, 1, 179000, 4, '664ecad14143a'),
(35, 1, 175900, 5, '664ecad14143a'),
(36, 1, 16900, 6, '664ecad14143a'),
(37, 1, 89990, 7, '664ecad14143a'),
(38, 1, 39000, 11, '664ecad14143a'),
(39, 1, 419900, 13, '664ecad14143a'),
(40, 1, 120000, 1, '664ed6eda49cc'),
(41, 1, 60000, 2, '664ed6eda49cc'),
(42, 1, 89990, 7, '664ed6eda49cc'),
(43, 1, 120000, 1, '664ed96f3a10c'),
(44, 1, 31990, 8, '664eda6e4e260'),
(45, 1, 120000, 1, '664eddaaed85a'),
(46, 1, 45000, 3, '664eddaaed85a'),
(47, 1, 120000, 1, '664edf65aaaa6'),
(48, 1, 31990, 8, '664ee81b6ad06'),
(49, 1, 419900, 13, '664ee81b6ad06'),
(50, 1, 120000, 1, '664ee9ae25778'),
(51, 1, 120000, 1, '6651e34020880'),
(52, 1, 89990, 7, '6651e34020880'),
(53, 1, 120000, 1, '665205210cf88'),
(54, 1, 419900, 13, '665205210cf88'),
(55, 1, 60000, 2, '6652bd1ed78fe'),
(56, 1, 179000, 4, '6652bd1ed78fe'),
(57, 1, 120000, 1, '66562add72e6c'),
(58, 1, 45000, 3, '66562add72e6c'),
(59, 1, 175900, 5, '66562add72e6c'),
(60, 1, 120000, 1, '66562ce9b0dd0'),
(61, 1, 39000, 11, '66562ce9b0dd0'),
(62, 1, 120000, 1, '66578d8f9a261'),
(63, 1, 31990, 8, '66578d8f9a261'),
(64, 1, 120000, 1, '66578f77dc40a'),
(65, 1, 419900, 13, '66578f77dc40a'),
(66, 1, 120000, 1, '665791a09db40'),
(67, 1, 60000, 2, '665791a09db40'),
(68, 1, 45000, 3, '665791a09db40'),
(69, 1, 29900, 10, '665791a09db40'),
(70, 1, 39000, 11, '665791a09db40'),
(71, 1, 79900, 12, '665791a09db40'),
(72, 1, 419900, 13, '665791a09db40'),
(73, 1, 39000, 11, '6657c33e3e1a4'),
(74, 1, 419900, 13, '6657c33e3e1a4'),
(75, 1, 120000, 1, '66582ce18b530'),
(76, 1, 179000, 4, '66582ce18b530'),
(77, 1, 79900, 12, '66582ce18b530'),
(78, 1, 60000, 2, '66582f8e4f571'),
(79, 1, 175900, 5, '66582f8e4f571'),
(80, 1, 29900, 10, '66582f8e4f571'),
(81, 1, 120000, 1, '66583617d83b5'),
(82, 1, 60000, 2, '66583617d83b5'),
(83, 1, 120000, 1, '66583679021f3'),
(84, 1, 60000, 2, '66583679021f3'),
(85, 1, 120000, 1, '665836a268445'),
(86, 1, 120000, 1, '66583ac6c9a6b'),
(87, 1, 60000, 2, '66583ac6c9a6b'),
(88, 1, 45000, 3, '66583ac6c9a6b'),
(89, 1, 31990, 8, '66583ac6c9a6b'),
(90, 1, 60000, 2, '66583e51c800a'),
(91, 1, 31990, 8, '66583e51c800a'),
(92, 1, 79900, 12, '66583e51c800a'),
(93, 1, 120000, 1, '66583fd8e2d3e'),
(94, 1, 79900, 12, '66583fd8e2d3e'),
(95, 1, 60000, 2, '66584197797f9'),
(96, 1, 45000, 3, '66584197797f9'),
(97, 1, 29900, 10, '6658449216696'),
(98, 1, 79900, 12, '6658481b1a499');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `referencia` varchar(150) NOT NULL,
  `fecha` datetime NOT NULL,
  `idCliente` int(11) NOT NULL,
  `estado` enum('Cambio','Devolución','Error','Pagada') NOT NULL DEFAULT 'Pagada',
  `descuento` enum('0','5','10') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`referencia`, `fecha`, `idCliente`, `estado`, `descuento`) VALUES
('664c32a490681', '2024-05-21 07:35:32', 1, 'Error', ''),
('664c34d822c84', '2024-05-21 07:44:56', 1, 'Error', ''),
('664c34eac5712', '2024-05-21 07:45:14', 1, 'Error', ''),
('664c35ca02bd1', '2024-05-21 07:48:58', 1, 'Cambio', ''),
('664c36aa750b5', '2024-05-21 07:52:42', 1, 'Cambio', ''),
('664c373532517', '2024-05-21 07:55:01', 1, 'Devolución', ''),
('664c384849e19', '2024-05-21 07:59:36', 1, 'Devolución', ''),
('664c3aed0df4a', '2024-05-21 08:10:53', 1, 'Error', ''),
('664c451460035', '2024-05-21 08:54:12', 1, 'Error', '10'),
('664c453918b6a', '2024-05-21 08:54:49', 1, 'Error', '10'),
('664c46807c6f3', '2024-05-21 09:00:16', 1, 'Error', '10'),
('664c4763a51db', '2024-05-21 09:04:03', 1, 'Error', '10'),
('664e8a5878563', '2024-05-23 02:14:16', 1, 'Error', '10'),
('664e9a4b1e397', '2024-05-23 03:22:19', 1, 'Error', '10'),
('664ecad14143a', '2024-05-23 06:49:21', 1, 'Cambio', '10'),
('664ed6eda49cc', '2024-05-23 07:41:01', 1, 'Devolución', '10'),
('664ed96f3a10c', '2024-05-23 07:51:43', 1, 'Devolución', '5'),
('664eda6e4e260', '2024-05-23 07:55:58', 1, 'Cambio', '0'),
('664eddaaed85a', '2024-05-23 08:09:46', 1, 'Error', '5'),
('664edf65aaaa6', '2024-05-23 08:17:09', 1, 'Devolución', '5'),
('664ee81b6ad06', '2024-05-23 08:54:19', 1, 'Devolución', '10'),
('664ee9ae25778', '2024-05-23 09:01:02', 1, 'Error', '5'),
('6651e34020880', '2024-05-25 15:10:24', 2, 'Devolución', '10'),
('6651e8266f337', '2024-05-25 15:31:18', 3, 'Cambio', '0'),
('665205210cf88', '2024-05-25 17:34:57', 4, 'Error', '10'),
('6652bd1ed78fe', '2024-05-26 06:39:58', 5, 'Devolución', '10'),
('66562add72e6c', '2024-05-28 21:05:01', 6, 'Error', '10'),
('66562ce9b0dd0', '2024-05-28 21:13:45', 7, 'Error', '5'),
('66578d8f9a261', '2024-05-29 22:18:23', 8, 'Error', '5'),
('66578f77dc40a', '2024-05-29 22:26:31', 9, 'Devolución', '10'),
('665791a09db40', '2024-05-29 22:35:44', 10, 'Error', '10'),
('6657c33e3e1a4', '2024-05-30 02:07:26', 11, 'Error', '10'),
('66582aab99788', '2024-05-30 09:28:43', 12, '', '5'),
('66582accc8312', '2024-05-30 09:29:16', 13, '', '10'),
('66582b93d1782', '2024-05-30 09:32:35', 14, '', '10'),
('66582baf8527e', '2024-05-30 09:33:03', 15, '', '10'),
('66582beabc71b', '2024-05-30 09:34:02', 16, '', '10'),
('66582ce18b530', '2024-05-30 09:38:09', 17, 'Error', '10'),
('66582f8e4f571', '2024-05-30 09:49:34', 18, 'Cambio', '10'),
('66583617d83b5', '2024-05-30 10:17:27', 19, 'Error', '5'),
('6658362678412', '2024-05-30 10:17:27', 19, 'Error', '5'),
('66583679021f3', '2024-05-30 10:19:05', 20, 'Cambio', '5'),
('6658367d7a6f5', '2024-05-30 10:19:05', 20, 'Cambio', '5'),
('665836a268445', '2024-05-30 10:19:46', 21, 'Error', '5'),
('66583ac6c9a6b', '2024-05-30 10:37:26', 22, 'Error', '10'),
('66583e51c800a', '2024-05-30 10:52:33', 23, 'Cambio', '5'),
('66583fd8e2d3e', '2024-05-30 10:59:04', 24, 'Error', '5'),
('66584197797f9', '2024-05-30 11:06:31', 25, 'Pagada', '5'),
('6658449216696', '2024-05-30 11:19:14', 26, 'Pagada', '0'),
('6658481b1a499', '2024-05-30 11:34:19', 27, 'Pagada', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pwd`) VALUES
(1, 'comercial1', 'comercio12345'),
(2, 'comercial2', 'comercio67890'),
(3, 'aaaa', 'aaaa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallefacturas`
--
ALTER TABLE `detallefacturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalleFacturas_articulos` (`idArticulo`),
  ADD KEY `fk_detalleFacturas_refenciaFactura` (`referenciaFactura`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`referencia`),
  ADD KEY `fk_facturas_idCliente` (`idCliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `detallefacturas`
--
ALTER TABLE `detallefacturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallefacturas`
--
ALTER TABLE `detallefacturas`
  ADD CONSTRAINT `fk_detalleFacturas_articulos` FOREIGN KEY (`idArticulo`) REFERENCES `articulos` (`id`),
  ADD CONSTRAINT `fk_detalleFacturas_refenciaFactura` FOREIGN KEY (`referenciaFactura`) REFERENCES `facturas` (`referencia`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_facturas_idCliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
