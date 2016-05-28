-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2016 a las 11:04:49
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `acopiochile_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aporte`
--

CREATE TABLE IF NOT EXISTS `aporte` (
  `id_aporte` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_aporte` varchar(45) DEFAULT NULL,
  `descripcion_aporte` varchar(300) DEFAULT NULL,
  `id_tipo_aporte` int(11) NOT NULL,
  `id_centro_acopio` int(11) NOT NULL,
  `cantidad_aporte` int(11) DEFAULT '0',
  `estado_aporte` int(11) DEFAULT '1',
  PRIMARY KEY (`id_aporte`),
  KEY `fk_aporte_tipo_aporte1_idx` (`id_tipo_aporte`),
  KEY `fk_aporte_centro_acopio1_idx` (`id_centro_acopio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `aporte`
--

INSERT INTO `aporte` (`id_aporte`, `nombre_aporte`, `descripcion_aporte`, `id_tipo_aporte`, `id_centro_acopio`, `cantidad_aporte`, `estado_aporte`) VALUES
(1, NULL, NULL, 1, 2, 112, 1),
(4, NULL, NULL, 2, 2, 114, 1),
(5, NULL, NULL, 5, 2, 90, 1),
(6, NULL, NULL, 3, 2, 76, 1),
(7, NULL, NULL, 4, 2, 82, 1),
(8, NULL, NULL, 1, 1, 197, 1),
(9, NULL, NULL, 5, 1, 102, 1),
(10, NULL, NULL, 2, 1, 217, 1),
(11, NULL, NULL, 3, 1, 86, 1),
(12, NULL, NULL, 7, 2, 225, 1),
(13, NULL, NULL, 9, 2, 85, 1),
(14, NULL, NULL, 9, 1, 181, 1),
(15, NULL, NULL, 4, 1, 185, 1),
(16, NULL, NULL, 7, 1, 101, 1),
(17, NULL, NULL, 10, 1, 2, 1),
(18, NULL, NULL, 11, 1, 2, 1),
(19, NULL, NULL, 13, 2, 2, 1),
(20, NULL, NULL, 1, 9, 98, 1),
(21, NULL, NULL, 12, 9, 165, 1),
(22, NULL, NULL, 14, 9, 400, 1),
(23, NULL, NULL, 56, 9, 22, 1),
(24, NULL, NULL, 61, 9, 25, 1),
(25, NULL, NULL, 16, 9, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aportes_caja`
--

CREATE TABLE IF NOT EXISTS `aportes_caja` (
  `id_aportes_caja` int(11) NOT NULL AUTO_INCREMENT,
  `id_caja` int(11) NOT NULL,
  `id_tipo_aporte` int(11) NOT NULL,
  `cantidad_aportes_caja` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_aportes_caja`),
  KEY `fk_aportes_caja_caja1_idx` (`id_caja`),
  KEY `fk_aportes_caja_tipo_aporte1_idx` (`id_tipo_aporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `aportes_caja`
--

INSERT INTO `aportes_caja` (`id_aportes_caja`, `id_caja`, `id_tipo_aporte`, `cantidad_aportes_caja`) VALUES
(1, 18, 1, 12),
(2, 18, 5, 5),
(3, 18, 2, 2),
(4, 18, 7, 5),
(5, 18, 3, 2),
(6, 19, 4, 12),
(7, 20, 2, 3),
(8, 20, 68, 5),
(9, 21, 1, 12),
(10, 21, 12, 34),
(11, 21, 14, 22),
(12, 21, 61, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aportes_caja_familia`
--

CREATE TABLE IF NOT EXISTS `aportes_caja_familia` (
  `id_aportes_caja_familia` int(11) NOT NULL AUTO_INCREMENT,
  `id_caja_familia` int(11) NOT NULL,
  `id_tipo_aporte` int(11) NOT NULL,
  `cantidad_aporte_familia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_aportes_caja_familia`),
  KEY `fk_aportes_caja_familia_caja_familia1_idx` (`id_caja_familia`),
  KEY `fk_aportes_caja_familia_tipo_aporte1_idx` (`id_tipo_aporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=215 ;

--
-- Volcado de datos para la tabla `aportes_caja_familia`
--

INSERT INTO `aportes_caja_familia` (`id_aportes_caja_familia`, `id_caja_familia`, `id_tipo_aporte`, `cantidad_aporte_familia`) VALUES
(102, 17, 1, 16),
(103, 17, 5, 5),
(104, 17, 2, 2),
(105, 17, 7, 5),
(106, 17, 3, 3),
(107, 17, 4, 12),
(138, 18, 1, 12),
(139, 18, 5, 5),
(140, 18, 2, 2),
(141, 18, 7, 5),
(142, 18, 3, 2),
(156, 20, 1, 12),
(157, 20, 5, 5),
(158, 20, 2, 2),
(159, 20, 7, 5),
(160, 20, 3, 2),
(176, 19, 1, 12),
(177, 19, 5, 5),
(178, 19, 2, 2),
(179, 19, 7, 5),
(180, 19, 3, 2),
(181, 16, 1, 12),
(182, 16, 5, 10),
(183, 16, 2, 2),
(184, 21, 1, 12),
(185, 21, 5, 5),
(186, 21, 2, 2),
(187, 21, 7, 5),
(188, 21, 3, 2),
(189, 15, 1, 12),
(190, 15, 5, 5),
(191, 15, 2, 2),
(192, 15, 7, 5),
(193, 15, 3, 10),
(194, 22, 1, 12),
(195, 22, 5, 5),
(196, 22, 2, 2),
(197, 22, 7, 5),
(198, 22, 3, 2),
(200, 23, 4, 12),
(201, 24, 4, 12),
(202, 24, 1, 15),
(203, 25, 1, 12),
(204, 25, 12, 34),
(205, 25, 14, 22),
(206, 25, 61, 15),
(211, 26, 1, 12),
(212, 26, 12, 34),
(213, 26, 14, 22),
(214, 26, 61, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aportes_envio`
--

CREATE TABLE IF NOT EXISTS `aportes_envio` (
  `id_aportes_envio` int(11) NOT NULL AUTO_INCREMENT,
  `id_envio` int(11) NOT NULL,
  `id_aporte` int(11) NOT NULL,
  PRIMARY KEY (`id_aportes_envio`),
  KEY `fk_aportes_envio_envio1_idx` (`id_envio`),
  KEY `fk_aportes_envio_aporte1_idx` (`id_aporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aportes_lista`
--

CREATE TABLE IF NOT EXISTS `aportes_lista` (
  `id_aportes_lista` int(11) NOT NULL AUTO_INCREMENT,
  `id_lista_aporte` int(11) NOT NULL,
  `id_tipo_aporte` int(11) NOT NULL,
  `cantidad_aportes_lista` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_aportes_lista`),
  KEY `fk_aportes_lista_lista1_idx` (`id_lista_aporte`),
  KEY `fk_aportes_lista_tipo_aporte1_idx` (`id_tipo_aporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Volcado de datos para la tabla `aportes_lista`
--

INSERT INTO `aportes_lista` (`id_aportes_lista`, `id_lista_aporte`, `id_tipo_aporte`, `cantidad_aportes_lista`) VALUES
(2, 3, 1, 0),
(3, 4, 1, 33),
(4, 5, 1, 33),
(5, 5, 2, 2),
(6, 6, 1, 33),
(7, 7, 1, 3),
(8, 8, 1, 3),
(9, 8, 2, 4),
(10, 9, 5, 2),
(11, 10, 1, 1),
(12, 11, 3, 34),
(13, 11, 2, 44),
(14, 12, 2, 5),
(15, 13, 2, 5),
(16, 14, 1, 45),
(17, 15, 1, 7),
(18, 16, 4, 12),
(19, 17, 1, 10),
(20, 18, 4, 20),
(21, 19, 3, 2),
(22, 20, 1, 23),
(23, 21, 5, 25),
(24, 21, 2, 23),
(25, 21, 3, 20),
(26, 22, 3, 12),
(27, 23, 1, 12),
(28, 24, 1, 45),
(29, 25, 2, 8),
(30, 26, 1, 0),
(31, 27, 1, 30),
(32, 28, 1, 42),
(33, 29, 2, 12),
(34, 30, 7, 2),
(35, 31, 7, 53),
(36, 32, 9, 12),
(37, 33, 2, 12),
(38, 34, 1, 2),
(39, 35, 2, 25),
(40, 36, 2, 22),
(41, 37, 4, 50),
(42, 38, 1, 12),
(43, 38, 3, 33),
(44, 38, 3, 5),
(45, 38, 7, 4),
(46, 38, 9, 66),
(47, 38, 7, 78),
(48, 38, 7, 88),
(49, 38, 9, 7),
(50, 38, 3, 6),
(51, 38, 5, 88),
(52, 39, 9, 2),
(53, 40, 4, 33),
(54, 41, 7, 2),
(55, 42, 1, 200),
(56, 42, 5, 200),
(57, 42, 2, 200),
(58, 42, 3, 200),
(59, 42, 7, 200),
(60, 42, 4, 200),
(61, 42, 9, 200),
(62, 43, 1, 2),
(63, 44, 10, 2),
(64, 45, 5, 100),
(65, 46, 11, 2),
(66, 47, 13, 2),
(67, 48, 2, 3),
(68, 49, 1, 122),
(69, 49, 12, 233),
(70, 49, 14, 444),
(71, 49, 56, 22),
(72, 50, 61, 55),
(73, 51, 16, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE IF NOT EXISTS `caja` (
  `id_caja` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_caja` varchar(45) DEFAULT NULL,
  `descripcion_caja` varchar(100) DEFAULT NULL,
  `id_estado_caja` int(11) NOT NULL,
  `cantidad_caja` int(11) DEFAULT '0',
  `id_centro_acopio` int(11) NOT NULL,
  PRIMARY KEY (`id_caja`),
  KEY `fk_caja_estado_caja1_idx` (`id_estado_caja`),
  KEY `fk_caja_centro_acopio1_idx` (`id_centro_acopio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id_caja`, `nombre_caja`, `descripcion_caja`, `id_estado_caja`, `cantidad_caja`, `id_centro_acopio`) VALUES
(18, 'Caja Básica', 'Caja de uso básico', 1, 24, 1),
(19, 'Caja Vida', 'Caja de la vida', 1, 1, 1),
(20, 'Caja Prueba', '', 1, 0, 1),
(21, 'Caja Prueba', 'Caja que tiene una prueba', 1, 2, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_familia`
--

CREATE TABLE IF NOT EXISTS `caja_familia` (
  `id_caja_familia` int(11) NOT NULL AUTO_INCREMENT,
  `rut_destinatario` varchar(45) DEFAULT NULL,
  `nombre_destinatario` varchar(60) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `id_estado_caja_familia` int(11) NOT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `id_centro_acopio` int(11) NOT NULL,
  `cantidad_caja_familia` int(11) DEFAULT '1',
  PRIMARY KEY (`id_caja_familia`),
  KEY `fk_caja_familia_estado_caja_familia1_idx` (`id_estado_caja_familia`),
  KEY `fk_caja_familia_caja1_idx` (`id_caja`),
  KEY `fk_caja_familia_centro_acopio1_idx` (`id_centro_acopio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `caja_familia`
--

INSERT INTO `caja_familia` (`id_caja_familia`, `rut_destinatario`, `nombre_destinatario`, `fecha_creacion`, `fecha_entrega`, `id_estado_caja_familia`, `id_caja`, `id_centro_acopio`, `cantidad_caja_familia`) VALUES
(15, '11111', 'AFG', '2016-05-15 19:06:57', NULL, 3, 18, 1, 1),
(16, '18542', 'aasdasdrrr', '2016-05-15 19:17:59', NULL, 3, 18, 1, 1),
(17, '122333123', 'HERNS ASSA', '2016-05-15 21:31:32', NULL, 2, 18, 1, 1),
(18, '445553', 'Diegolas', '2016-05-15 22:07:09', NULL, 2, 18, 1, 1),
(19, '12345', '', '2016-05-15 22:09:51', NULL, 3, 18, 1, 1),
(20, '', '', '2016-05-15 22:09:55', NULL, 1, 18, 1, 1),
(21, '', '', '2016-05-15 22:09:57', NULL, 3, 18, 1, 1),
(22, '', '', '2016-05-15 22:24:40', NULL, 1, 18, 1, 1),
(23, '', '', '2016-05-15 23:00:38', NULL, 3, 19, 1, 1),
(24, '', '', '2016-05-15 23:05:03', NULL, 1, 19, 1, 1),
(25, '', '', '2016-05-28 04:53:47', NULL, 1, 21, 9, 1),
(26, '', '', '2016-05-28 04:54:02', NULL, 2, 21, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_tipo_aporte`
--

CREATE TABLE IF NOT EXISTS `categoria_tipo_aporte` (
  `id_categoria_tipo_aporte` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria_tipo_aporte` varchar(45) DEFAULT NULL,
  `estado_categoria_tipo_aporte` int(11) DEFAULT '1',
  PRIMARY KEY (`id_categoria_tipo_aporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `categoria_tipo_aporte`
--

INSERT INTO `categoria_tipo_aporte` (`id_categoria_tipo_aporte`, `nombre_categoria_tipo_aporte`, `estado_categoria_tipo_aporte`) VALUES
(1, 'Alimentos', 1),
(2, 'Ropa adultos', 1),
(3, 'Artículos de aseo adultos', 1),
(4, 'Medicamentos', 1),
(5, 'Artículos de aseo niños', 1),
(6, 'Artículos de limpieza general', 1),
(7, 'Ropa niños', 1),
(8, 'Juguetes', 1),
(9, 'Ropa cama', 1),
(10, 'Muebles', 1),
(11, 'Artículos electrónicos/eléctricos', 1),
(12, 'Materiales de construcción', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_acopio`
--

CREATE TABLE IF NOT EXISTS `centro_acopio` (
  `id_centro_acopio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_centro_acopio` varchar(50) DEFAULT NULL,
  `direccion_centro_acopio` varchar(100) DEFAULT NULL,
  `id_comuna` int(11) NOT NULL,
  `estado_centro_acopio` int(11) DEFAULT '1',
  PRIMARY KEY (`id_centro_acopio`),
  KEY `fk_centro_acopio_comuna1_idx` (`id_comuna`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `centro_acopio`
--

INSERT INTO `centro_acopio` (`id_centro_acopio`, `nombre_centro_acopio`, `direccion_centro_acopio`, `id_comuna`, `estado_centro_acopio`) VALUES
(1, 'Compañía de bomberos 2', 'Buenas birbas', 1101, 0),
(2, 'Colegio San Pedro', 'Av. Asasca', 1405, 0),
(3, 'Centro De Test', 'Test', 4103, 0),
(8, 'AAA', 'sd', 4105, 0),
(9, 'Centro de Prueba', 'Prueba', 13201, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE IF NOT EXISTS `comuna` (
  `id_comuna` int(11) NOT NULL AUTO_INCREMENT,
  `COMUNA_NOMBRE` varchar(20) DEFAULT NULL,
  `id_provincia` int(11) NOT NULL,
  PRIMARY KEY (`id_comuna`),
  KEY `fk_comuna_provincia1_idx` (`id_provincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15203 ;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`id_comuna`, `COMUNA_NOMBRE`, `id_provincia`) VALUES
(1101, 'Iquique', 11),
(1107, 'Alto Hospicio', 11),
(1401, 'Pozo Almonte', 14),
(1402, 'Camiña', 14),
(1403, 'Colchane', 14),
(1404, 'Huara', 14),
(1405, 'Pica', 14),
(2101, 'Antofagasta', 21),
(2102, 'Mejillones', 21),
(2103, 'Sierra Gorda', 21),
(2104, 'Taltal', 21),
(2201, 'Calama', 22),
(2202, 'Ollagüe', 22),
(2203, 'San Pedro de Atacama', 22),
(2301, 'Tocopilla', 23),
(2302, 'María Elena', 23),
(3101, 'Copiapó', 31),
(3102, 'Caldera', 31),
(3103, 'Tierra Amarilla', 31),
(3201, 'Chañaral', 32),
(3202, 'Diego de Almagro', 32),
(3301, 'Vallenar', 33),
(3302, 'Alto del Carmen', 33),
(3303, 'Freirina', 33),
(3304, 'Huasco', 33),
(4101, 'La Serena', 41),
(4102, 'Coquimbo', 41),
(4103, 'Andacollo', 41),
(4104, 'La Higuera', 41),
(4105, 'Paihuano', 41),
(4106, 'Vicuña', 41),
(4201, 'Illapel', 42),
(4202, 'Canela', 42),
(4203, 'Los Vilos', 42),
(4204, 'Salamanca', 42),
(4301, 'Ovalle', 43),
(4302, 'Combarbalá', 43),
(4303, 'Monte Patria', 43),
(4304, 'Punitaqui', 43),
(4305, 'Río Hurtado', 43),
(5101, 'Valparaíso', 51),
(5102, 'Casablanca', 51),
(5103, 'Concón', 51),
(5104, 'Juan Fernández', 51),
(5105, 'Puchuncaví', 51),
(5107, 'Quintero', 51),
(5109, 'Viña del Mar', 51),
(5201, 'Isla de Pascua', 52),
(5301, 'Los Andes', 53),
(5302, 'Calle Larga', 53),
(5303, 'Rinconada', 53),
(5304, 'San Esteban', 53),
(5401, 'La Ligua', 54),
(5402, 'Cabildo', 54),
(5403, 'Papudo', 54),
(5404, 'Petorca', 54),
(5405, 'Zapallar', 54),
(5501, 'Quillota', 55),
(5502, 'La Calera', 55),
(5503, 'Hijuelas', 55),
(5504, 'La Cruz', 55),
(5506, 'Nogales', 55),
(5601, 'San Antonio', 56),
(5602, 'Algarrobo', 56),
(5603, 'Cartagena', 56),
(5604, 'El Quisco', 56),
(5605, 'El Tabo', 56),
(5606, 'Santo Domingo', 56),
(5701, 'San Felipe', 57),
(5702, 'Catemu', 57),
(5703, 'Llay Llay', 57),
(5704, 'Panquehue', 57),
(5705, 'Putaendo', 57),
(5706, 'Santa María', 57),
(5801, 'Quilpué', 58),
(5802, 'Limache', 58),
(5803, 'Olmué', 58),
(5804, 'Villa Alemana', 58),
(6101, 'Rancagua', 61),
(6102, 'Codegua', 61),
(6103, 'Coinco', 61),
(6104, 'Coltauco', 61),
(6105, 'Doñihue', 61),
(6106, 'Graneros', 61),
(6107, 'Las Cabras', 61),
(6108, 'Machalí', 61),
(6109, 'Malloa', 61),
(6110, 'Mostazal', 61),
(6111, 'Olivar', 61),
(6112, 'Peumo', 61),
(6113, 'Pichidegua', 61),
(6114, 'Quinta de Tilcoco', 61),
(6115, 'Rengo', 61),
(6116, 'Requínoa', 61),
(6117, 'San Vicente', 61),
(6201, 'Pichilemu', 62),
(6202, 'La Estrella', 62),
(6203, 'Litueche', 62),
(6204, 'Marchihue', 62),
(6205, 'Navidad', 62),
(6206, 'Paredones', 62),
(6301, 'San Fernando', 63),
(6302, 'Chépica', 63),
(6303, 'Chimbarongo', 63),
(6304, 'Lolol', 63),
(6305, 'Nancagua', 63),
(6306, 'Palmilla', 63),
(6307, 'Peralillo', 63),
(6308, 'Placilla', 63),
(6309, 'Pumanque', 63),
(6310, 'Santa Cruz', 63),
(7101, 'Talca', 71),
(7102, 'Constitución', 71),
(7103, 'Curepto', 71),
(7104, 'Empedrado', 71),
(7105, 'Maule', 71),
(7106, 'Pelarco', 71),
(7107, 'Pencahue', 71),
(7108, 'Río Claro', 71),
(7109, 'San Clemente', 71),
(7110, 'San Rafael', 71),
(7201, 'Cauquenes', 72),
(7202, 'Chanco', 72),
(7203, 'Pelluhue', 72),
(7301, 'Curicó', 73),
(7302, 'Hualañé', 73),
(7303, 'Licantén', 73),
(7304, 'Molina', 73),
(7305, 'Rauco', 73),
(7306, 'Romeral', 73),
(7307, 'Sagrada Familia', 73),
(7308, 'Teno', 73),
(7309, 'Vichuquén', 73),
(7401, 'Linares', 74),
(7402, 'Colbún', 74),
(7403, 'Longaví', 74),
(7404, 'Parral', 74),
(7405, 'Retiro', 74),
(7406, 'San Javier', 74),
(7407, 'Villa Alegre', 74),
(7408, 'Yerbas Buenas', 74),
(8101, 'Concepción', 81),
(8102, 'Coronel', 81),
(8103, 'Chiguayante', 81),
(8104, 'Florida', 81),
(8105, 'Hualqui', 81),
(8106, 'Lota', 81),
(8107, 'Penco', 81),
(8108, 'San Pedro de la Paz', 81),
(8109, 'Santa Juana', 81),
(8110, 'Talcahuano', 81),
(8111, 'Tomé', 81),
(8112, 'Hualpén', 81),
(8201, 'Lebu', 82),
(8202, 'Arauco', 82),
(8203, 'Cañete', 82),
(8204, 'Contulmo', 82),
(8205, 'Curanilahue', 82),
(8206, 'Los Álamos', 82),
(8207, 'Tirúa', 82),
(8301, 'Los Ángeles', 83),
(8302, 'Antuco', 83),
(8303, 'Cabrero', 83),
(8304, 'Laja', 83),
(8305, 'Mulchén', 83),
(8306, 'Nacimiento', 83),
(8307, 'Negrete', 83),
(8308, 'Quilaco', 83),
(8309, 'Quilleco', 83),
(8310, 'San Rosendo', 83),
(8311, 'Santa Bárbara', 83),
(8312, 'Tucapel', 83),
(8313, 'Yumbel', 83),
(8314, 'Alto Biobío', 83),
(8401, 'Chillán', 84),
(8402, 'Bulnes', 84),
(8403, 'Cobquecura', 84),
(8404, 'Coelemu', 84),
(8405, 'Coihueco', 84),
(8406, 'Chillán Viejo', 84),
(8407, 'El Carmen', 84),
(8408, 'Ninhue', 84),
(8409, 'Ñiquén', 84),
(8410, 'Pemuco', 84),
(8411, 'Pinto', 84),
(8412, 'Portezuelo', 84),
(8413, 'Quillón', 84),
(8414, 'Quirihue', 84),
(8415, 'Ránquil', 84),
(8416, 'San Carlos', 84),
(8417, 'San Fabián', 84),
(8418, 'San Ignacio', 84),
(8419, 'San Nicolás', 84),
(8420, 'Treguaco', 84),
(8421, 'Yungay', 84),
(9101, 'Temuco', 91),
(9102, 'Carahue', 91),
(9103, 'Cunco', 91),
(9104, 'Curarrehue', 91),
(9105, 'Freire', 91),
(9106, 'Galvarino', 91),
(9107, 'Gorbea', 91),
(9108, 'Lautaro', 91),
(9109, 'Loncoche', 91),
(9110, 'Melipeuco', 91),
(9111, 'Nueva Imperial', 91),
(9112, 'Padre las Casas', 91),
(9113, 'Perquenco', 91),
(9114, 'Pitrufquén', 91),
(9115, 'Pucón', 91),
(9116, 'Saavedra', 91),
(9117, 'Teodoro Schmidt', 91),
(9118, 'Toltén', 91),
(9119, 'Vilcún', 91),
(9120, 'Villarrica', 91),
(9121, 'Cholchol', 91),
(9201, 'Angol', 92),
(9202, 'Collipulli', 92),
(9203, 'Curacautín', 92),
(9204, 'Ercilla', 92),
(9205, 'Lonquimay', 92),
(9206, 'Los Sauces', 92),
(9207, 'Lumaco', 92),
(9208, 'Purén', 92),
(9209, 'Renaico', 92),
(9210, 'Traiguén', 92),
(9211, 'Victoria', 92),
(10101, 'Puerto Montt', 101),
(10102, 'Calbuco', 101),
(10103, 'Cochamó', 101),
(10104, 'Fresia', 101),
(10105, 'Frutillar', 101),
(10106, 'Los Muermos', 101),
(10107, 'Llanquihue', 101),
(10108, 'Maullín', 101),
(10109, 'Puerto Varas', 101),
(10201, 'Castro', 102),
(10202, 'Ancud', 102),
(10203, 'Chonchi', 102),
(10204, 'Curaco de Vélez', 102),
(10205, 'Dalcahue', 102),
(10206, 'Puqueldón', 102),
(10207, 'Queilén', 102),
(10208, 'Quellón', 102),
(10209, 'Quemchi', 102),
(10210, 'Quinchao', 102),
(10301, 'Osorno', 103),
(10302, 'Puerto Octay', 103),
(10303, 'Purranque', 103),
(10304, 'Puyehue', 103),
(10305, 'Río Negro', 103),
(10306, 'San Juan de la Costa', 103),
(10307, 'San Pablo', 103),
(10401, 'Chaitén', 104),
(10402, 'Futaleufú', 104),
(10403, 'Hualaihué', 104),
(10404, 'Palena', 104),
(11101, 'Coyhaique', 111),
(11102, 'Lago Verde', 111),
(11201, 'Aysén', 112),
(11202, 'Cisnes', 112),
(11203, 'Guaitecas', 112),
(11301, 'Cochrane', 113),
(11302, 'O''Higgins', 113),
(11303, 'Tortel', 113),
(11401, 'Chile Chico', 114),
(11402, 'Río Ibáñez', 114),
(12101, 'Punta Arenas', 121),
(12102, 'Laguna Blanca', 121),
(12103, 'Río Verde', 121),
(12104, 'San Gregorio', 121),
(12201, 'Cabo de Hornos', 122),
(12202, 'Antártica', 122),
(12301, 'Porvenir', 123),
(12302, 'Primavera', 123),
(12303, 'Timaukel', 123),
(12401, 'Natales', 124),
(12402, 'Torres del Paine', 124),
(13101, 'Santiago', 131),
(13102, 'Cerrillos', 131),
(13103, 'Cerro Navia', 131),
(13104, 'Conchalí', 131),
(13105, 'El Bosque', 131),
(13106, 'Estación Central', 131),
(13107, 'Huechuraba', 131),
(13108, 'Independencia', 131),
(13109, 'La Cisterna', 131),
(13110, 'La Florida', 131),
(13111, 'La Granja', 131),
(13112, 'La Pintana', 131),
(13113, 'La Reina', 131),
(13114, 'Las Condes', 131),
(13115, 'Lo Barnechea', 131),
(13116, 'Lo Espejo', 131),
(13117, 'Lo Prado', 131),
(13118, 'Macul', 131),
(13119, 'Maipú', 131),
(13120, 'Ñuñoa', 131),
(13121, 'Pedro Aguirre Cerda', 131),
(13122, 'Peñalolén', 131),
(13123, 'Providencia', 131),
(13124, 'Pudahuel', 131),
(13125, 'Quilicura', 131),
(13126, 'Quinta Normal', 131),
(13127, 'Recoleta', 131),
(13128, 'Renca', 131),
(13129, 'San Joaquín', 131),
(13130, 'San Miguel', 131),
(13131, 'San Ramón', 131),
(13132, 'Vitacura', 131),
(13201, 'Puente Alto', 132),
(13202, 'Pirque', 132),
(13203, 'San José de Maipo', 132),
(13301, 'Colina', 133),
(13302, 'Lampa', 133),
(13303, 'Tiltil', 133),
(13401, 'San Bernardo', 134),
(13402, 'Buin', 134),
(13403, 'Calera de Tango', 134),
(13404, 'Paine', 134),
(13501, 'Melipilla', 135),
(13502, 'Alhué', 135),
(13503, 'Curacaví', 135),
(13504, 'María Pinto', 135),
(13505, 'San Pedro', 135),
(13601, 'Talagante', 136),
(13602, 'El Monte', 136),
(13603, 'Isla de Maipo', 136),
(13604, 'Padre Hurtado', 136),
(13605, 'Peñaflor', 136),
(14101, 'Valdivia', 141),
(14102, 'Corral', 141),
(14103, 'Lanco', 141),
(14104, 'Los Lagos', 141),
(14105, 'Máfil', 141),
(14106, 'Mariquina', 141),
(14107, 'Paillaco', 141),
(14108, 'Panguipulli', 141),
(14201, 'La Unión', 142),
(14202, 'Futrono', 142),
(14203, 'Lago Ranco', 142),
(14204, 'Río Bueno', 142),
(15101, 'Arica', 151),
(15102, 'Camarones', 151),
(15201, 'Putre', 152),
(15202, 'General Lagos', 152);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE IF NOT EXISTS `envio` (
  `id_envio` int(11) NOT NULL AUTO_INCREMENT,
  `id_centro_acopio_origen` int(11) NOT NULL,
  `id_centro_acopio_destino` int(11) NOT NULL,
  `nombre_referencia` varchar(45) DEFAULT NULL,
  `direccion_referencia` varchar(45) DEFAULT NULL,
  `id_estado_envio` int(11) NOT NULL,
  `fecha_creacion_envio` datetime DEFAULT NULL,
  `fecha_envio_envio` datetime DEFAULT NULL,
  `fecha_recepción_envio` varchar(45) DEFAULT NULL,
  `id_tipo_envio` int(11) NOT NULL,
  PRIMARY KEY (`id_envio`),
  KEY `fk_aporte_envio_centro_acopio1_idx` (`id_centro_acopio_origen`),
  KEY `fk_envio_estado_envio1_idx` (`id_estado_envio`),
  KEY `fk_envio_centro_acopio1_idx` (`id_centro_acopio_destino`),
  KEY `fk_envio_tipo_envio1_idx` (`id_tipo_envio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_caja`
--

CREATE TABLE IF NOT EXISTS `estado_caja` (
  `id_estado_caja` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado_caja` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_estado_caja`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estado_caja`
--

INSERT INTO `estado_caja` (`id_estado_caja`, `nombre_estado_caja`) VALUES
(1, 'vigente'),
(2, 'no vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_caja_familia`
--

CREATE TABLE IF NOT EXISTS `estado_caja_familia` (
  `id_estado_caja_familia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado_caja_familia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_estado_caja_familia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estado_caja_familia`
--

INSERT INTO `estado_caja_familia` (`id_estado_caja_familia`, `nombre_estado_caja_familia`) VALUES
(1, 'pendiente'),
(2, 'entregada'),
(3, 'no valida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_envio`
--

CREATE TABLE IF NOT EXISTS `estado_envio` (
  `id_estado_envio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_envio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_estado_envio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_lista`
--

CREATE TABLE IF NOT EXISTS `estado_lista` (
  `id_estado_lista` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado_lista` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_estado_lista`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estado_lista`
--

INSERT INTO `estado_lista` (`id_estado_lista`, `nombre_estado_lista`) VALUES
(1, 'ingresada'),
(2, 'rechazada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE IF NOT EXISTS `lista` (
  `id_lista` int(11) NOT NULL AUTO_INCREMENT,
  `autor_lista` varchar(45) DEFAULT NULL,
  `detalle_lista` varchar(200) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fehca_modificacion` datetime DEFAULT NULL,
  `id_centro_acopio` int(11) NOT NULL,
  `id_tipo_lista` int(11) NOT NULL,
  `id_estado_lista` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_lista`),
  KEY `fk_lista_centro_acopio1_idx` (`id_centro_acopio`),
  KEY `fk_lista_tipo_lista1_idx` (`id_tipo_lista`),
  KEY `fk_lista_estado_lista1_idx` (`id_estado_lista`),
  KEY `fk_lista_usuario1_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Volcado de datos para la tabla `lista`
--

INSERT INTO `lista` (`id_lista`, `autor_lista`, `detalle_lista`, `fecha_creacion`, `fehca_modificacion`, `id_centro_acopio`, `id_tipo_lista`, `id_estado_lista`, `id_usuario`) VALUES
(3, NULL, '', NULL, NULL, 2, 1, 1, 1),
(4, NULL, '', NULL, NULL, 2, 1, 1, 1),
(5, NULL, '', NULL, NULL, 2, 1, 1, 1),
(6, NULL, '', NULL, NULL, 2, 1, 1, 1),
(7, NULL, '', NULL, NULL, 2, 1, 1, 1),
(8, NULL, '', NULL, NULL, 2, 1, 1, 1),
(9, NULL, '', NULL, NULL, 2, 1, 1, 1),
(10, NULL, '', NULL, NULL, 2, 2, 1, 1),
(11, NULL, '', NULL, NULL, 2, 1, 1, 1),
(12, NULL, '', NULL, NULL, 2, 2, 1, 1),
(13, NULL, '', NULL, NULL, 2, 2, 1, 1),
(14, NULL, '', NULL, NULL, 2, 1, 1, 1),
(15, NULL, '', NULL, NULL, 2, 2, 1, 1),
(16, NULL, '', NULL, NULL, 2, 1, 1, 1),
(17, NULL, '', NULL, NULL, 2, 2, 1, 1),
(18, NULL, '', NULL, NULL, 2, 1, 1, 1),
(19, NULL, '', NULL, NULL, 2, 2, 1, 1),
(20, NULL, '', NULL, NULL, 1, 1, 1, 1),
(21, NULL, '', NULL, NULL, 1, 1, 1, 1),
(22, NULL, '', NULL, NULL, 1, 2, 1, 1),
(23, NULL, '', NULL, NULL, 1, 2, 1, 1),
(24, NULL, '', NULL, NULL, 1, 1, 1, 1),
(25, NULL, '', '2016-05-14 23:08:50', NULL, 1, 1, 1, 1),
(26, NULL, '', '2016-05-14 23:13:15', NULL, 2, 1, 1, 1),
(27, NULL, '', '2016-05-14 23:47:56', NULL, 2, 1, 1, 1),
(28, NULL, '', '2016-05-14 23:48:11', NULL, 2, 1, 1, 1),
(29, NULL, '', '2016-05-14 23:48:34', NULL, 2, 1, 1, 1),
(30, NULL, '', '2016-05-15 00:45:11', NULL, 2, 1, 1, 1),
(31, NULL, '', '2016-05-15 00:45:19', NULL, 2, 1, 1, 1),
(32, NULL, '', '2016-05-15 00:46:11', NULL, 2, 1, 1, 1),
(33, NULL, '', '2016-05-15 10:24:24', NULL, 2, 1, 1, 1),
(34, NULL, '', '2016-05-15 10:24:33', NULL, 2, 2, 1, 1),
(35, NULL, '', '2016-05-15 11:28:52', NULL, 2, 1, 1, 1),
(36, NULL, '', '2016-05-15 11:35:20', NULL, 2, 1, 1, 1),
(37, NULL, '', '2016-05-15 11:40:46', NULL, 2, 1, 1, 1),
(38, NULL, '', '2016-05-15 12:17:44', NULL, 2, 1, 1, 1),
(39, NULL, '', '2016-05-15 14:11:44', NULL, 1, 1, 1, 1),
(40, NULL, '', '2016-05-15 14:11:53', NULL, 1, 1, 1, 1),
(41, NULL, '', '2016-05-15 16:56:22', NULL, 1, 1, 1, 1),
(42, NULL, '', '2016-05-15 18:32:11', NULL, 1, 1, 1, 1),
(43, NULL, '', '2016-05-15 23:04:50', NULL, 1, 1, 1, 1),
(44, NULL, '', '2016-05-17 23:31:51', NULL, 1, 1, 1, 1),
(45, NULL, '', '2016-05-17 23:47:09', NULL, 1, 2, 1, 1),
(46, NULL, '', '2016-05-17 23:49:36', NULL, 1, 1, 1, 1),
(47, NULL, '', '2016-05-18 00:23:11', NULL, 2, 1, 1, 1),
(48, NULL, '', '2016-05-18 00:47:57', NULL, 2, 1, 1, 1),
(49, NULL, '', '2016-05-28 04:50:03', NULL, 9, 1, 1, 1),
(50, NULL, '', '2016-05-28 04:53:36', NULL, 9, 1, 1, 1),
(51, NULL, '', '2016-05-28 05:02:14', NULL, 9, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `PROVINCIA_NOMBRE` varchar(23) DEFAULT NULL,
  `id_region` int(2) NOT NULL,
  PRIMARY KEY (`id_provincia`),
  KEY `fk_provincia_region1_idx` (`id_region`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=153 ;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `PROVINCIA_NOMBRE`, `id_region`) VALUES
(11, 'Iquique', 1),
(14, 'Tamarugal', 1),
(21, 'Antofagasta', 2),
(22, 'El Loa', 2),
(23, 'Tocopilla', 2),
(31, 'Copiapó', 3),
(32, 'Chañaral', 3),
(33, 'Huasco', 3),
(41, 'Elqui', 4),
(42, 'Choapa', 4),
(43, 'Limarí', 4),
(51, 'Valparaíso', 5),
(52, 'Isla de Pascua', 5),
(53, 'Los Andes', 5),
(54, 'Petorca', 5),
(55, 'Quillota', 5),
(56, 'San Antonio', 5),
(57, 'San Felipe de Aconcagua', 5),
(58, 'Marga Marga', 5),
(61, 'Cachapoal', 6),
(62, 'Cardenal Caro', 6),
(63, 'Colchagua', 6),
(71, 'Talca', 7),
(72, 'Cauquenes', 7),
(73, 'Curicó', 7),
(74, 'Linares', 7),
(81, 'Concepción', 8),
(82, 'Arauco', 8),
(83, 'Biobío', 8),
(84, 'Ñuble', 8),
(91, 'Cautín', 9),
(92, 'Malleco', 9),
(101, 'Llanquihue', 10),
(102, 'Chiloé', 10),
(103, 'Osorno', 10),
(104, 'Palena', 10),
(111, 'Coihaique', 11),
(112, 'Aisén', 11),
(113, 'Capitán Prat', 11),
(114, 'General Carrera', 11),
(121, 'Magallanes', 12),
(122, 'Antártica Chilena', 12),
(123, 'Tierra del Fuego', 12),
(124, 'Última Esperanza', 12),
(131, 'Santiago', 13),
(132, 'Cordillera', 13),
(133, 'Chacabuco', 13),
(134, 'Maipo', 13),
(135, 'Melipilla', 13),
(136, 'Talagante', 13),
(141, 'Valdivia', 14),
(142, 'Ranco', 14),
(151, 'Arica', 15),
(152, 'Parinacota', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id_region` int(2) NOT NULL,
  `REGION_NOMBRE` varchar(50) DEFAULT NULL,
  `ISO_3166_2_CL` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id_region`, `REGION_NOMBRE`, `ISO_3166_2_CL`) VALUES
(1, 'Tarapacá', 'CL-TA'),
(2, 'Antofagasta', 'CL-AN'),
(3, 'Atacama', 'CL-AT'),
(4, 'Coquimbo', 'CL-CO'),
(5, 'Valparaíso', 'CL-VS'),
(6, 'Región del Libertador Gral. Bernardo O’Higgins', 'CL-LI'),
(7, 'Región del Maule', 'CL-ML'),
(8, 'Región del Biobío', 'CL-BI'),
(9, 'Región de la Araucanía', 'CL-AR'),
(10, 'Región de Los Lagos', 'CL-LL'),
(11, 'Región Aisén del Gral. Carlos Ibáñez del Campo', 'CL-AI'),
(12, 'Región de Magallanes y de la Antártica Chilena', 'CL-MA'),
(13, 'Región Metropolitana de Santiago', 'CL-RM'),
(14, 'Región de Los Ríos', 'CL-LR'),
(15, 'Arica y Parinacota', 'CL-AP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE IF NOT EXISTS `rol_usuario` (
  `id_rol_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol_usu` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rol_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`id_rol_usuario`, `nombre_rol_usu`) VALUES
(1, 'administrador'),
(2, 'Encargado Regional'),
(3, 'Encargado Provincial'),
(4, 'Encargado Comunal'),
(5, 'Encargado Acopio'),
(6, 'Acopiador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_aporte`
--

CREATE TABLE IF NOT EXISTS `tipo_aporte` (
  `id_tipo_aporte` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_aporte` varchar(45) DEFAULT NULL,
  `descripcion_tipo_aporte` varchar(100) DEFAULT NULL,
  `id_categoria_tipo_aporte` int(11) NOT NULL,
  `estado_tipo_aporte` int(11) DEFAULT '1',
  PRIMARY KEY (`id_tipo_aporte`),
  KEY `fk_tipo_aporte_categoria_tipo_aporte1_idx` (`id_categoria_tipo_aporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=124 ;

--
-- Volcado de datos para la tabla `tipo_aporte`
--

INSERT INTO `tipo_aporte` (`id_tipo_aporte`, `nombre_tipo_aporte`, `descripcion_tipo_aporte`, `id_categoria_tipo_aporte`, `estado_tipo_aporte`) VALUES
(1, 'Pastas', 'Todo tipo de fideos', 1, 1),
(2, 'Pantalón', 'Pantalón para niños entre 5-10 años', 2, 1),
(3, 'Pasta de dientes', 'Shampoo para lavar el pelo', 3, 1),
(4, 'Paracetamol', 'Medicamento estándar', 4, 1),
(5, 'Arroz', 'Arroz de cualquier denominación.', 1, 1),
(7, 'Jabón', 'Jabón en barra', 3, 1),
(9, 'Alcohol 90º', 'Alcohol para limpiar', 4, 1),
(10, 'Camisa', NULL, 2, 1),
(11, 'Papel Higiénico', NULL, 3, 1),
(12, 'Azúcar', NULL, 1, 1),
(13, 'Miel', NULL, 1, 1),
(14, 'Mermeladas', NULL, 1, 1),
(15, 'Cereal', NULL, 1, 1),
(16, 'Sal', NULL, 1, 1),
(17, 'Chocolate', NULL, 1, 1),
(18, 'Tortilla Maíz', NULL, 1, 1),
(19, 'Porotos', NULL, 1, 1),
(20, 'Café', NULL, 1, 1),
(21, 'Té', NULL, 1, 1),
(22, 'Aceite', NULL, 1, 1),
(23, 'Leche en polvo', NULL, 1, 1),
(24, 'Frutos secos', NULL, 1, 1),
(25, 'Bebidas enlatadas', NULL, 1, 1),
(26, 'Semillas', NULL, 1, 1),
(27, 'Vinagre', NULL, 1, 1),
(28, 'Huevo', NULL, 1, 1),
(29, 'Jugos en polvo', NULL, 1, 1),
(30, 'Sopas en polvo', NULL, 1, 1),
(31, 'Garbanzos', NULL, 1, 1),
(32, 'Lentejas', NULL, 1, 1),
(33, 'Agua', NULL, 1, 1),
(34, 'Pañales adultos', NULL, 3, 1),
(35, 'Afeitadoras', NULL, 3, 1),
(36, 'Cremas de afeitar', NULL, 3, 1),
(37, 'Desodorante', NULL, 3, 1),
(38, 'Shampoo', NULL, 3, 1),
(39, 'Crema', NULL, 3, 1),
(40, 'Pañales', NULL, 5, 1),
(41, 'Colonia', NULL, 5, 1),
(42, 'Jabón niño', NULL, 5, 1),
(43, 'Shampoo niño', NULL, 5, 1),
(44, 'Toallas húmedas', NULL, 5, 1),
(45, 'Toalla', NULL, 3, 1),
(46, 'Cotones de algodón', NULL, 5, 1),
(47, 'Limpia muebles', NULL, 6, 1),
(48, 'Limpia vidrios', NULL, 6, 1),
(49, 'Cera piso de madera', NULL, 6, 1),
(50, 'Cera piso flotante', NULL, 6, 1),
(51, 'Virutilla pisos', NULL, 6, 1),
(52, 'Paños de limpieza', NULL, 6, 1),
(53, 'Escoba o escobillón', NULL, 6, 1),
(54, 'Plumero', NULL, 6, 1),
(55, 'Desinfectante', NULL, 6, 1),
(56, 'Chaqueta', NULL, 2, 1),
(57, 'Chaleco', NULL, 2, 1),
(58, 'Bufanda', NULL, 2, 1),
(59, 'Sombrero', NULL, 2, 1),
(60, 'Calcetines', NULL, 2, 1),
(61, 'Ropa interior', NULL, 2, 1),
(62, 'Polera', NULL, 2, 1),
(63, 'Polerón', NULL, 2, 1),
(64, 'Gorro', NULL, 2, 1),
(65, 'Zapato', NULL, 2, 1),
(66, 'Zapatilla', NULL, 2, 1),
(67, 'Jockey', NULL, 2, 1),
(68, 'Pantalón', NULL, 7, 1),
(69, 'Camisa', NULL, 7, 1),
(70, 'Chaqueta', NULL, 7, 1),
(71, 'Chaleco', NULL, 7, 1),
(72, 'Bufanda', NULL, 7, 1),
(73, 'Sombrero', NULL, 7, 1),
(74, 'Calcetines', NULL, 7, 1),
(75, 'Ropa interior', NULL, 7, 1),
(76, 'Polera', NULL, 7, 1),
(77, 'Polerón', NULL, 7, 1),
(78, 'Gorro', NULL, 7, 1),
(79, 'Zapato', NULL, 7, 1),
(80, 'Zapatilla', NULL, 7, 1),
(81, 'Jockey', NULL, 7, 1),
(82, 'Autos', NULL, 8, 1),
(83, 'Juegos de salón', NULL, 8, 1),
(84, 'Juguetes eléctricos', NULL, 8, 1),
(85, 'Bicicletas', NULL, 8, 1),
(86, 'Plásticos', NULL, 8, 1),
(87, 'Cubre pies', NULL, 8, 1),
(88, 'Colcha', NULL, 9, 1),
(89, 'Cubre cama', NULL, 9, 1),
(90, 'Sábanas', NULL, 9, 1),
(91, 'Frazadas', NULL, 9, 1),
(92, 'Almohada', NULL, 9, 1),
(93, 'Cubre almohada', NULL, 9, 1),
(94, 'Cama', NULL, 10, 1),
(95, 'Living', NULL, 10, 1),
(96, 'Comedor', NULL, 10, 1),
(97, 'Mueble de cocina', NULL, 10, 1),
(98, 'Estante', NULL, 10, 1),
(99, 'Mesa TV', NULL, 10, 1),
(100, 'Arrimo', NULL, 10, 1),
(101, 'Sillas', NULL, 10, 1),
(102, 'Sillones', NULL, 10, 1),
(103, 'Mecedora', NULL, 10, 1),
(104, 'Repiza', NULL, 10, 1),
(105, 'Librero', NULL, 10, 1),
(106, 'Radio', NULL, 11, 1),
(107, 'Televisor', NULL, 11, 1),
(108, 'Equipo musical', NULL, 11, 1),
(109, 'Celular', NULL, 11, 1),
(110, 'Audífonos', NULL, 11, 1),
(111, 'Madera', NULL, 12, 1),
(112, 'Zinc', NULL, 12, 1),
(113, 'Canaletas', NULL, 12, 1),
(114, 'Ventanas', NULL, 12, 1),
(115, 'Clavos', NULL, 12, 1),
(116, 'Arena', NULL, 12, 1),
(117, 'Cemento', NULL, 12, 1),
(118, 'Ripio', NULL, 12, 1),
(119, 'Bolones', NULL, 12, 1),
(120, 'Planchas', NULL, 12, 1),
(121, 'Tubería', NULL, 12, 1),
(122, 'Artículos eléctricos', NULL, 12, 1),
(123, 'Aspirina', NULL, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_envio`
--

CREATE TABLE IF NOT EXISTS `tipo_envio` (
  `id_tipo_envio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_envio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_envio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_lista`
--

CREATE TABLE IF NOT EXISTS `tipo_lista` (
  `id_tipo_lista` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_lista` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_lista`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_lista`
--

INSERT INTO `tipo_lista` (`id_tipo_lista`, `nombre_tipo_lista`) VALUES
(1, 'ingreso'),
(2, 'merma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usu` varchar(100) DEFAULT NULL,
  `nick_usu` varchar(45) DEFAULT NULL,
  `email_usu` varchar(45) DEFAULT NULL,
  `hash` varchar(300) DEFAULT NULL,
  `estado_usu` int(11) DEFAULT '1',
  `id_rol_usuario` int(11) NOT NULL,
  `id_region` int(2) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `id_comuna` int(11) DEFAULT NULL,
  `id_centro_acopio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_rol_usuario_idx` (`id_rol_usuario`),
  KEY `fk_usuario_centro_acopio1_idx` (`id_centro_acopio`),
  KEY `fk_usuario_region1_idx` (`id_region`),
  KEY `fk_usuario_provincia1_idx` (`id_provincia`),
  KEY `fk_usuario_comuna1_idx` (`id_comuna`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usu`, `nick_usu`, `email_usu`, `hash`, `estado_usu`, `id_rol_usuario`, `id_region`, `id_provincia`, `id_comuna`, `id_centro_acopio`) VALUES
(1, 'Diego San Martín C.', 'diegolas', 'd@d.com', '$2a$10$8sCrxoum3Q0/slN6FjI08OP1jtxvMYkSHMaaSLWj8TWoOTUiES0ea', 1, 1, NULL, NULL, NULL, NULL),
(2, 'Eduardo Runge Oyarzo', 'erunge16', 'd@d.com', '$2a$10$Mn73y2pq7p4cOkML6NJW2eZLeC26HZZMHzcJy.0PqOtwSGuOHbeIS', 1, 1, NULL, NULL, NULL, 2),
(8, 'asdasd', 'aasdasd16', 'asd@asd.com', '$2a$10$v6oMXq5RQv0umRtP2w/nvuJNv0UX8Ka1UgtgAIzucsC3E/JNBY5yu', 0, 1, NULL, NULL, NULL, NULL),
(9, 'Hernesto Alfonzo', 'halfonzo16', 'asd@asd.com', '$2a$10$gD8Ca2tEFzEvsHZaiWFVae3mG7ibsUb3zp8sL5UHXBPQDhxsq7JSG', 0, 2, 1, NULL, NULL, NULL),
(10, 'Pablo Escobar', 'pescobar16', 'asd@asd.com', '$2a$10$C2midZ8F6kxmbZ5A2YFdk.Ib7CJjivwy61I2rAtXC7F8JC37Pk6Di', 0, 4, NULL, NULL, 1101, NULL),
(11, 'Alvaro Silva', 'asilva16', 'asd@asd.com', '$2a$10$rrMMDe0Bk7HS1TLjvTBU4O8ZL98tZS6Xl8UFEcUQTw7MxhfnQkOmi', 0, 4, NULL, NULL, 1101, NULL),
(12, 'Pedro Alfonzo', 'palfonzo16', 'asd@asd.com', '$2a$10$acdHwTeEV6wTlTgVs.pAeOqjgCE4/0lWGTC7MAJiEsX4OrHw66cs.', 0, 5, NULL, NULL, NULL, 1),
(13, 'Pepe', 'ppepe16', 'asd@sd.com', '$2a$10$J4lxBtQ5yOIek/bD5xa3KOy6wcrKD7aQQOI1vDRajsTbb60CW5aFm', 0, 4, NULL, NULL, 1101, NULL),
(14, 'Juan Vass', 'jvass16', 'asd@asd.com', '$2a$10$uO0iHtZZV9kRZg4DKRWlSuq64QhWsVC7dGQ50x4w6H8KXtL6NiteK', 0, 6, NULL, NULL, NULL, 1),
(15, 'Josefo Alca', 'jalca16', 'asd@gasd.com', '$2a$10$50ZA1FQLbncbwCvSll836e.AMxOwfCBEhKXyJ/0.YY5A.qeCd6Afa', 0, 3, NULL, 11, NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aporte`
--
ALTER TABLE `aporte`
  ADD CONSTRAINT `fk_aporte_centro_acopio1` FOREIGN KEY (`id_centro_acopio`) REFERENCES `centro_acopio` (`id_centro_acopio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aporte_tipo_aporte1` FOREIGN KEY (`id_tipo_aporte`) REFERENCES `tipo_aporte` (`id_tipo_aporte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `aportes_caja`
--
ALTER TABLE `aportes_caja`
  ADD CONSTRAINT `fk_aportes_caja_caja1` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`id_caja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aportes_caja_tipo_aporte1` FOREIGN KEY (`id_tipo_aporte`) REFERENCES `tipo_aporte` (`id_tipo_aporte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `aportes_caja_familia`
--
ALTER TABLE `aportes_caja_familia`
  ADD CONSTRAINT `fk_aportes_caja_familia_caja_familia1` FOREIGN KEY (`id_caja_familia`) REFERENCES `caja_familia` (`id_caja_familia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aportes_caja_familia_tipo_aporte1` FOREIGN KEY (`id_tipo_aporte`) REFERENCES `tipo_aporte` (`id_tipo_aporte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `aportes_envio`
--
ALTER TABLE `aportes_envio`
  ADD CONSTRAINT `fk_aportes_envio_aporte1` FOREIGN KEY (`id_aporte`) REFERENCES `aporte` (`id_aporte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aportes_envio_envio1` FOREIGN KEY (`id_envio`) REFERENCES `envio` (`id_envio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `aportes_lista`
--
ALTER TABLE `aportes_lista`
  ADD CONSTRAINT `fk_aportes_lista_lista1` FOREIGN KEY (`id_lista_aporte`) REFERENCES `lista` (`id_lista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aportes_lista_tipo_aporte1` FOREIGN KEY (`id_tipo_aporte`) REFERENCES `tipo_aporte` (`id_tipo_aporte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `fk_caja_centro_acopio1` FOREIGN KEY (`id_centro_acopio`) REFERENCES `centro_acopio` (`id_centro_acopio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_caja_estado_caja1` FOREIGN KEY (`id_estado_caja`) REFERENCES `estado_caja` (`id_estado_caja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `caja_familia`
--
ALTER TABLE `caja_familia`
  ADD CONSTRAINT `fk_caja_familia_caja1` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`id_caja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_caja_familia_centro_acopio1` FOREIGN KEY (`id_centro_acopio`) REFERENCES `centro_acopio` (`id_centro_acopio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_caja_familia_estado_caja_familia1` FOREIGN KEY (`id_estado_caja_familia`) REFERENCES `estado_caja_familia` (`id_estado_caja_familia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `centro_acopio`
--
ALTER TABLE `centro_acopio`
  ADD CONSTRAINT `fk_centro_acopio_comuna1` FOREIGN KEY (`id_comuna`) REFERENCES `comuna` (`id_comuna`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `fk_comuna_provincia1` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `envio`
--
ALTER TABLE `envio`
  ADD CONSTRAINT `fk_aporte_envio_centro_acopio1` FOREIGN KEY (`id_centro_acopio_origen`) REFERENCES `centro_acopio` (`id_centro_acopio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_envio_centro_acopio1` FOREIGN KEY (`id_centro_acopio_destino`) REFERENCES `centro_acopio` (`id_centro_acopio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_envio_estado_envio1` FOREIGN KEY (`id_estado_envio`) REFERENCES `estado_envio` (`id_estado_envio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_envio_tipo_envio1` FOREIGN KEY (`id_tipo_envio`) REFERENCES `tipo_envio` (`id_tipo_envio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `fk_lista_centro_acopio1` FOREIGN KEY (`id_centro_acopio`) REFERENCES `centro_acopio` (`id_centro_acopio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lista_estado_lista1` FOREIGN KEY (`id_estado_lista`) REFERENCES `estado_lista` (`id_estado_lista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lista_tipo_lista1` FOREIGN KEY (`id_tipo_lista`) REFERENCES `tipo_lista` (`id_tipo_lista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lista_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `fk_provincia_region1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipo_aporte`
--
ALTER TABLE `tipo_aporte`
  ADD CONSTRAINT `fk_tipo_aporte_categoria_tipo_aporte1` FOREIGN KEY (`id_categoria_tipo_aporte`) REFERENCES `categoria_tipo_aporte` (`id_categoria_tipo_aporte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_centro_acopio1` FOREIGN KEY (`id_centro_acopio`) REFERENCES `centro_acopio` (`id_centro_acopio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_comuna1` FOREIGN KEY (`id_comuna`) REFERENCES `comuna` (`id_comuna`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_provincia1` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_region1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_rol_usuario` FOREIGN KEY (`id_rol_usuario`) REFERENCES `rol_usuario` (`id_rol_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
