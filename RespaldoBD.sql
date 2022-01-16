-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2022 a las 22:56:07
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lenti`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones_orden`
--

CREATE TABLE `acciones_orden` (
  `id_accion` int(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `fecha_hora` varchar(25) DEFAULT NULL,
  `accion` varchar(200) DEFAULT NULL,
  `observaciones` varchar(200) NOT NULL,
  `usuario` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acciones_orden`
--

INSERT INTO `acciones_orden` (`id_accion`, `codigo`, `fecha_hora`, `accion`, `observaciones`, `usuario`) VALUES
(44, '0122-1', '09-01-2022 12:45:55', 'Digitada en laboratorio', '', '1'),
(45, '0122-2', '09-01-2022 12:50:18', 'Digitada en laboratorio', '', '1'),
(46, '0122-2', '09-01-2022', 'Despacho de Bodega', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alturas_orden`
--

CREATE TABLE `alturas_orden` (
  `codigo` varchar(45) DEFAULT NULL,
  `paciente` varchar(250) DEFAULT NULL,
  `od_dist_pupilar` varchar(10) DEFAULT NULL,
  `od_altura_pupilar` varchar(10) DEFAULT NULL,
  `od_altura_oblea` varchar(10) DEFAULT NULL,
  `oi_dist_pupilar` varchar(10) DEFAULT NULL,
  `oi_altura_pupilar` varchar(10) DEFAULT NULL,
  `oi_altura_oblea` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alturas_orden`
--

INSERT INTO `alturas_orden` (`codigo`, `paciente`, `od_dist_pupilar`, `od_altura_pupilar`, `od_altura_oblea`, `oi_dist_pupilar`, `oi_altura_pupilar`, `oi_altura_oblea`) VALUES
('0921-1', 'Gerardo Ernesto Guillen', '', '', '', '', '', ''),
('0921-2', 'Rafael Guillen', '', '', '', '', '', ''),
('0921-3', 'Alejandro Sanz', '', '', '', '', '', ''),
('1021-1', 'Liliana de Alvarenga', '32', '', '12', '33', '', '12'),
('1121-1', 'ELETICIA AQUINO DE MARROQUIN', '31.50', '', '12', '31.50', '', '12'),
('1121-2', 'MARIA ADELA RUIZ DE CANALES', '29.50', '', '14', '29.50', '', '14'),
('1121-3', 'Marcos Cruz de Soriano', '31.5', '', '', '31.5', '', ''),
('1121-4', 'Maria Ruiz de Canales', '', '', '', '', '', ''),
('1121-5', 'Leonicio Siguenza Menjivar', '', '', '', '', '', ''),
('1121-6', 'MARIA ELSA GONZALEZ ', '', '', '', '', '', ''),
('1121-7', 'Jose Manuel Tobar Peraza', '', '', '', '', '', ''),
('1121-8', 'Carlos José Corvera', '', '', '', '', '', ''),
('1121-9', 'Jorge Gonzalez', '', '', '', '', '', ''),
('1121-10', 'Victorino Lopez', '', '', '', '', '', ''),
('1121-11', 'Estela Perez', '4', '', '', '4', '', ''),
('1121-12', 'Oscar Antonio Gonzalez', '', '', '', '', '', ''),
('1121-13', 'Roxana Lopez', '1', '', '', '', '', ''),
('1121-14', 'Marcos Rivera', '', '', '', '', '', ''),
('1121-15', 'Maria Elena Rivera', '', '', '', '', '', ''),
('1121-16', 'Alexandra Sosa', '36', '', '', '33', '', ''),
('1121-17', 'Ricardo Valladares', '', '', '', '', '', ''),
('1121-18', 'Oscar Gonzalez', '', '', '', '', '', ''),
('1121-19', 'Paciente prueba', '', '', '', '', '', ''),
('1121-20', 'paciente 3', '', '', '', '', '', ''),
('1121-21', 'Maria Isabel Ramirez', '+3.25', '', '', '+2.50', '', ''),
('1121-22', 'Yolanda Edith Gatan', 'e', '', '', '43', '', ''),
('1121-23', 'Ana Cecilia Lopez', '4', '', '', 'e', '', ''),
('1121-24', 'Nicolle Villalobos', '', '', '', '', '', ''),
('1121-25', 'Mayra Anabella Enrriquez', '', '', '', '', '', ''),
('1121-26', 'Sonia Margarita Guevara', '32', '21', '3', '23', '43', '3'),
('1121-27', 'Reina Rivera de Quintanilla', '', '', '', '', '', ''),
('1121-28', 'Sandra Elizabeth Ramires', '32', '33', '25', '32', '33', '50'),
('1221-1', 'Jorge Alberto Sales', '', '', '', '', '', ''),
('0122-1', 'Mirian Francisca López', '32.5 mm', '', '', '37.5 mm', '', ''),
('0122-2', 'Antonio Alonso Gonzalez', '', '', '', '', '', ''),
('0122-3', 'Ana Guadalupe Martinez', '', '', '', '', '', ''),
('0122-4', 'Vicente Lopez', '', '', '', '', '', ''),
('0122-5', 'Rafael Eduardo Corvera', '', '', '', '', '', ''),
('0122-6', 'José Eduardo Pérez', '', '', '', '', '', ''),
('0122-7', 'Laura Dinora Martinez', '', '', '', '', '', ''),
('0122-1', 'Lorena Hernandez', '', '', '', '', '', ''),
('0122-2', 'Georgina del Carmen Gutierres', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aro_orden`
--

CREATE TABLE `aro_orden` (
  `codigo` varchar(45) NOT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `diseno` varchar(45) DEFAULT NULL,
  `horizontal` varchar(45) DEFAULT NULL,
  `diagonal` varchar(45) DEFAULT NULL,
  `vertical` varchar(45) DEFAULT NULL,
  `puente` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aro_orden`
--

INSERT INTO `aro_orden` (`codigo`, `modelo`, `marca`, `color`, `diseno`, `horizontal`, `diagonal`, `vertical`, `puente`) VALUES
('0921-1', '', '', '', '', '', '', '', ''),
('0921-2', '', '', '', '', '', '', '', ''),
('0921-3', '', '', '', '', '', '', '', ''),
('1021-1', 'Ray-Ban002021', '', '', 'Semia-aereo', '52', '51', '37', '16'),
('1121-1', 'ES11033', '', '', 'Semia-aereo', '48', '49', '27', '18'),
('1121-2', 'ES11036', '', '', 'Cerrado', '50', '', '31', '18'),
('1121-3', 'ES11033', '', '', 'Cerrado', '12', '2', '3', '3'),
('1121-4', 'Ray-Ban002021', '', '', 'Semia-aereo', '', '', '', ''),
('1121-5', 'Ray-Ban002021', '', '', 'Areo', '', '', '', ''),
('1121-6', 'Ray-Ban002021', '', '', 'Cerrado', '', '', '', ''),
('1121-7', 'Ray-Ban002021', '', '', '', '', '', '', ''),
('1121-8', 'Ray-Ban002021', '', '', 'Cerrado', '', '', '', ''),
('1121-9', 'Ray-Ban002021', 'Ray-Ban', 'c4', 'Semia-aereo', '', '', '', ''),
('1121-10', 'Ray-Ban002021', 'Ray-Ban', '6', 'Semia-aereo', '', '', '', ''),
('1121-11', 'Ray-Ban002021', 'A2123', '6', 'Semia-aereo', '', '', '', ''),
('1121-12', 'Ray-Ban002021', 'Ray-Ban', '', '', '7', '2', '', ''),
('1121-13', 'Ray-Ban002021', 'Ray-Ban', '6', 'Semia-aereo', '', '', '', ''),
('1121-14', '', '', '', '', '', '', '', ''),
('1121-15', 'Ray-Ban002021', 'Ray-Ban', '4', 'Semia-aereo', '', '', '', ''),
('1121-16', 'Ray-Ban002021', 'A2123', 'c4', 'Semia-aereo', '12', '3', '4', '7'),
('1121-17', 'Ray-Ban002021', 'Ray-Ban', 'c4', 'Semia-aereo', '', '', '', ''),
('1121-18', 'Ray-Ban002021', 'Ray-Ban', 'c4', 'Semia-aereo', '', '', '', ''),
('1121-19', 'Ray-Ban002021', 'Ray-Ban', '6', 'Semia-aereo', '', '', '', ''),
('1121-20', 'Ray-Ban002021', 'Ray-Ban', '6', 'Cerrado', '', '', '', ''),
('1121-21', '', '', '', '', '', '', '', ''),
('1121-22', 'Ray-Ban002021', 'Ray-Ban', 'c4', 'Semia-aereo', '', '', '', ''),
('1121-23', 'Ray-Ban002021', 'Ray-Ban', '6', 'Semia-aereo', '', '', '', ''),
('1121-24', 'Ray-Ban002021', 'A2123', '6', 'Semia-aereo', 'e', '2', 'e', '4'),
('1121-25', 'Ray-Ban002021', 'Ray-Ban', '6', 'Areo', '1', '', '', ''),
('1121-26', 'Ray-Ban002021', 'Ray-Ban', 'c4', 'Semia-aereo', '', '', '', ''),
('1121-27', 'L2021', 'Lacoste', 'c4', 'Semia-aereo', '14', '35', '33', '25'),
('1121-28', 'CH2514', 'Carolina Herrera', 'c8', 'Cerrado', '15', '58', '14', '25'),
('1221-1', 'Ray-Ban002021', 'Ray Ban', '', '', '', '', '', ''),
('0122-1', 'GG0409OK', 'AND VAS', '002', 'Semia-aereo', '12', '14', '14', '22'),
('0122-2', 'GG0409OK', 'AND VAS', '002', 'Semia-aereo', '12', '15', '33', ''),
('0122-3', 'GG0409OK', 'EINAR', 'C6', 'Cerrado', '25', '12', '71', '23'),
('0122-4', 'GG0409OK', 'ANDVAS', '002', 'Semia-aereo', '23', '14', '7', '33'),
('0122-5', 'GG0409OK', 'EINAR', '002', 'Semia-aereo', 'r', 'r', 'r', 'r'),
('0122-6', 'GG0409OK', 'TIMBERLAND', '002', 'Semia-aereo', '33.mm', '34', '44', '4'),
('0122-7', 'GG0409OK', 'GUCCI', '001', 'Semia-aereo', '12', '24', '24', '3'),
('0122-1', 'GG0409OK', 'TIMBERLAND', '002', 'Semia-aereo', '25', '12', '12', '9'),
('0122-2', 'EI120', 'EINAR', '002', 'Semia-aereo', '+0.25', '36', '96', '24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_lentes`
--

CREATE TABLE `codigos_lentes` (
  `id_codigo` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `identificador_lente` varchar(45) NOT NULL,
  `tipo_lente` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `codigos_lentes`
--

INSERT INTO `codigos_lentes` (`id_codigo`, `codigo`, `identificador_lente`, `tipo_lente`) VALUES
(1, '21DS000C53715', 'term_1_1', 'Terminado'),
(2, '21DS000C53739', 'term_1_19', 'Terminado'),
(3, '21DS000C53741', 'term_1_69', 'Terminado'),
(4, '21DS000C54066', 'term_4_1', 'Terminado'),
(5, '21DS000C53743', 'base_1_1', 'Base'),
(6, '21DS000C53714', 'base_1_3', 'Base'),
(7, '21DS000C53725', 'base_3_1', 'Base'),
(8, '21DS000C53738', 'base_3_5', 'Base'),
(9, '21DS000C53702', 'base_2_1', 'Base'),
(10, '21DS000C53906', 'base_2_2', 'Base'),
(11, '21DS000C53740', 'td_ftop_1713', 'Base Flaptop'),
(12, '21DS000C53697', 'td_ftop_1171.253', 'Base Flaptop'),
(13, '21DS000C53988', 'td_ftop_1371.753', 'Base Flaptop'),
(14, '21DS000C53993', 'td_ftop_672.253', 'Base Flaptop'),
(15, '21DS000C53986', 'td_ftop_1815', 'Base Flaptop'),
(16, '21DS000C54062', 'td_ftop_281.255', 'Base Flaptop'),
(17, '21DS000C53972', 'td_ftop_10815', 'Base Flaptop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descargos`
--

CREATE TABLE `descargos` (
  `id_descargo` int(11) NOT NULL,
  `fecha` varchar(25) DEFAULT NULL,
  `tipo_lente` varchar(125) DEFAULT NULL,
  `codigo_lente` varchar(45) DEFAULT NULL,
  `ojo` varchar(45) DEFAULT NULL,
  `paciente` varchar(150) DEFAULT NULL,
  `medidas` varchar(45) DEFAULT NULL,
  `codigo_orden` varchar(45) DEFAULT NULL,
  `id_optica` int(11) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `descargos`
--

INSERT INTO `descargos` (`id_descargo`, `fecha`, `tipo_lente`, `codigo_lente`, `ojo`, `paciente`, `medidas`, `codigo_orden`, `id_optica`, `id_sucursal`, `id_usuario`) VALUES
(1, '09-01-2022 14:42:55', 'Terminado', '21DS000C53715', 'derecho', 'Georgina del Carmen Gutierres', 'Esfera: +2.00, Cilindro: 0.00', '0122-2', 2, 4, 1),
(2, '09-01-2022 14:42:55', 'Terminado', '21DS000C53715', 'izquierdo', 'Georgina del Carmen Gutierres', 'Esfera: +2.00, Cilindro: 0.00', '0122-2', 2, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grad_tablas_base`
--

CREATE TABLE `grad_tablas_base` (
  `id_graduacion` int(11) NOT NULL,
  `graduacion` varchar(11) DEFAULT NULL,
  `id_tabla_base` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grad_tablas_base`
--

INSERT INTO `grad_tablas_base` (`id_graduacion`, `graduacion`, `id_tabla_base`) VALUES
(1, '1.50', 2),
(2, '3.25', 2),
(3, '4.00', 1),
(4, '6.00', 1),
(5, '4.25', 2),
(6, '5.50', 2),
(7, '0.75', 3),
(8, '2.00', 3),
(9, '3.50', 3),
(10, '4.75', 3),
(11, '6.25', 3),
(12, '7.50', 3),
(13, '9.00', 3),
(14, '5.00', 1),
(15, '1.25', 4),
(16, '4.00', 4),
(17, '3.50', 4),
(18, '6.75', 4),
(19, '4.75', 5),
(20, '6.25', 5),
(21, '1.50', 5),
(22, '1.00', 6),
(23, '2.75', 6),
(24, '4.25', 6),
(25, '6.50', 6),
(26, '3', 7),
(27, '4', 7),
(28, '6', 7),
(29, '9', 7),
(30, '5', 8),
(31, '7', 8),
(32, '8', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lente_terminado`
--

CREATE TABLE `lente_terminado` (
  `id_terminado` int(11) NOT NULL,
  `marca` varchar(60) DEFAULT NULL,
  `diseno` varchar(60) DEFAULT NULL,
  `lente` varchar(100) DEFAULT NULL,
  `identificador` varchar(45) DEFAULT NULL,
  `stock` varchar(45) DEFAULT NULL,
  `esfera` varchar(45) DEFAULT NULL,
  `cilindro` varchar(45) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lente_terminado`
--

INSERT INTO `lente_terminado` (`id_terminado`, `marca`, `diseno`, `lente`, `identificador`, `stock`, `esfera`, `cilindro`, `codigo`) VALUES
(1, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*0.00 \'', '10', '+2.00\'', '0.00 \'', '667888151530'),
(2, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-0.25\'', '25', '+2.00\'', '-0.25\'', '660756007519'),
(3, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-0.50\'', '42', '+2.00\'', '-0.50\'', '886540003943'),
(4, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-0.75\'', '40', '+2.00\'', '-0.75\'', 'VISANA020828711000'),
(5, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-1.00\'', '282', '+2.00\'', '-1.00\'', '7751851006255'),
(6, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-1.25\'', '10', '+2.00\'', '-1.25\'', '7416500010440'),
(7, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-1.50\'', '3', '+2.00\'', '-1.50\'', '2319374404450'),
(8, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-1.75\'', '13', '+2.00\'', '-1.75\'', '8580960078636'),
(9, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-2.00\'', '25', '+2.00\'', '-2.00\'', '710293000235'),
(10, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-2.25\'', '0', '+2.00\'', '-2.25\'', ''),
(11, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-2.50\'', '0', '+2.00\'', '-2.50\'', ''),
(12, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-2.75\'', '0', '+2.00\'', '-2.75\'', ''),
(13, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-3.00\'', '0', '+2.00\'', '-3.00\'', ''),
(14, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-3.25\'', '0', '+2.00\'', '-3.25\'', ''),
(15, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-3.50\'', '0', '+2.00\'', '-3.50\'', ''),
(16, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-3.75\'', '0', '+2.00\'', '-3.75\'', ''),
(17, 'Essilor', 'Ar Green', 'VS Terminado', '+2.00\'*-4.00\'', '0', '+2.00\'', '-4.00\'', ''),
(18, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*0.00 \'', '58', '+1.75\'', '0.00 \'', '7501073025622'),
(19, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-0.25\'', '14', '+1.75\'', '-0.25\'', '086581017699'),
(20, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-0.50\'', '15', '+1.75\'', '-0.50\'', '21DS000C28074'),
(21, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-0.75\'', '14', '+1.75\'', '-0.75\'', '8053672008487'),
(22, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-1.00\'', '25', '+1.75\'', '-1.00\'', '20210802360'),
(23, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-1.25\'', '55', '+1.75\'', '-1.25\'', '1258764'),
(24, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-1.50\'', '0', '+1.75\'', '-1.50\'', '4713294987464'),
(25, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-1.75\'', '0', '+1.75\'', '-1.75\'', ''),
(26, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-2.00\'', '0', '+1.75\'', '-2.00\'', ''),
(27, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-2.25\'', '0', '+1.75\'', '-2.25\'', ''),
(28, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-2.50\'', '0', '+1.75\'', '-2.50\'', ''),
(29, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-2.75\'', '0', '+1.75\'', '-2.75\'', ''),
(30, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-3.00\'', '0', '+1.75\'', '-3.00\'', ''),
(31, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-3.25\'', '0', '+1.75\'', '-3.25\'', ''),
(32, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-3.50\'', '0', '+1.75\'', '-3.50\'', ''),
(33, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-3.75\'', '0', '+1.75\'', '-3.75\'', ''),
(34, 'Essilor', 'Ar Green', 'VS Terminado', '+1.75\'*-4.00\'', '0', '+1.75\'', '-4.00\'', ''),
(35, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*0.00 \'', '25', '+1.50\'', '0.00 \'', '041789001987'),
(36, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-0.25\'', '60', '+1.50\'', '-0.25\'', '8029985460236'),
(37, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-0.50\'', '0', '+1.50\'', '-0.50\'', ''),
(38, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-0.75\'', '0', '+1.50\'', '-0.75\'', ''),
(39, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-1.00\'', '0', '+1.50\'', '-1.00\'', ''),
(40, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-1.25\'', '0', '+1.50\'', '-1.25\'', ''),
(41, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-1.50\'', '0', '+1.50\'', '-1.50\'', ''),
(42, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-1.75\'', '0', '+1.50\'', '-1.75\'', ''),
(43, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-2.00\'', '0', '+1.50\'', '-2.00\'', ''),
(44, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-2.25\'', '0', '+1.50\'', '-2.25\'', ''),
(45, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-2.50\'', '0', '+1.50\'', '-2.50\'', ''),
(46, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-2.75\'', '0', '+1.50\'', '-2.75\'', ''),
(47, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-3.00\'', '0', '+1.50\'', '-3.00\'', ''),
(48, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-3.25\'', '0', '+1.50\'', '-3.25\'', ''),
(49, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-3.50\'', '0', '+1.50\'', '-3.50\'', ''),
(50, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-3.75\'', '0', '+1.50\'', '-3.75\'', ''),
(51, 'Essilor', 'Ar Green', 'VS Terminado', '+1.50\'*-4.00\'', '0', '+1.50\'', '-4.00\'', ''),
(52, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*0.00 \'', '0', '+1.25\'', '0.00 \'', ''),
(53, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-0.25\'', '0', '+1.25\'', '-0.25\'', ''),
(54, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-0.50\'', '0', '+1.25\'', '-0.50\'', ''),
(55, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-0.75\'', '0', '+1.25\'', '-0.75\'', ''),
(56, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-1.00\'', '0', '+1.25\'', '-1.00\'', ''),
(57, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-1.25\'', '0', '+1.25\'', '-1.25\'', ''),
(58, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-1.50\'', '0', '+1.25\'', '-1.50\'', ''),
(59, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-1.75\'', '0', '+1.25\'', '-1.75\'', ''),
(60, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-2.00\'', '0', '+1.25\'', '-2.00\'', ''),
(61, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-2.25\'', '0', '+1.25\'', '-2.25\'', ''),
(62, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-2.50\'', '0', '+1.25\'', '-2.50\'', ''),
(63, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-2.75\'', '0', '+1.25\'', '-2.75\'', ''),
(64, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-3.00\'', '0', '+1.25\'', '-3.00\'', ''),
(65, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-3.25\'', '0', '+1.25\'', '-3.25\'', ''),
(66, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-3.50\'', '0', '+1.25\'', '-3.50\'', ''),
(67, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-3.75\'', '0', '+1.25\'', '-3.75\'', ''),
(68, 'Essilor', 'Ar Green', 'VS Terminado', '+1.25\'*-4.00\'', '0', '+1.25\'', '-4.00\'', ''),
(69, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*0.00 \'', '0', '+1.00\'', '0.00 \'', ''),
(70, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-0.25\'', '0', '+1.00\'', '-0.25\'', ''),
(71, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-0.50\'', '0', '+1.00\'', '-0.50\'', ''),
(72, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-0.75\'', '0', '+1.00\'', '-0.75\'', ''),
(73, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-1.00\'', '0', '+1.00\'', '-1.00\'', ''),
(74, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-1.25\'', '0', '+1.00\'', '-1.25\'', ''),
(75, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-1.50\'', '0', '+1.00\'', '-1.50\'', ''),
(76, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-1.75\'', '0', '+1.00\'', '-1.75\'', ''),
(77, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-2.00\'', '0', '+1.00\'', '-2.00\'', ''),
(78, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-2.25\'', '0', '+1.00\'', '-2.25\'', ''),
(79, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-2.50\'', '0', '+1.00\'', '-2.50\'', ''),
(80, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-2.75\'', '0', '+1.00\'', '-2.75\'', ''),
(81, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-3.00\'', '0', '+1.00\'', '-3.00\'', ''),
(82, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-3.25\'', '0', '+1.00\'', '-3.25\'', ''),
(83, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-3.50\'', '0', '+1.00\'', '-3.50\'', ''),
(84, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-3.75\'', '0', '+1.00\'', '-3.75\'', ''),
(85, 'Essilor', 'Ar Green', 'VS Terminado', '+1.00\'*-4.00\'', '0', '+1.00\'', '-4.00\'', ''),
(86, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*0.00 \'', '0', '+0.75\'', '0.00 \'', ''),
(87, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-0.25\'', '0', '+0.75\'', '-0.25\'', ''),
(88, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-0.50\'', '0', '+0.75\'', '-0.50\'', ''),
(89, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-0.75\'', '0', '+0.75\'', '-0.75\'', ''),
(90, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-1.00\'', '0', '+0.75\'', '-1.00\'', ''),
(91, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-1.25\'', '0', '+0.75\'', '-1.25\'', ''),
(92, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-1.50\'', '0', '+0.75\'', '-1.50\'', ''),
(93, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-1.75\'', '0', '+0.75\'', '-1.75\'', ''),
(94, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-2.00\'', '0', '+0.75\'', '-2.00\'', ''),
(95, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-2.25\'', '0', '+0.75\'', '-2.25\'', ''),
(96, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-2.50\'', '0', '+0.75\'', '-2.50\'', ''),
(97, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-2.75\'', '0', '+0.75\'', '-2.75\'', ''),
(98, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-3.00\'', '0', '+0.75\'', '-3.00\'', ''),
(99, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-3.25\'', '0', '+0.75\'', '-3.25\'', ''),
(100, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-3.50\'', '0', '+0.75\'', '-3.50\'', ''),
(101, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-3.75\'', '0', '+0.75\'', '-3.75\'', ''),
(102, 'Essilor', 'Ar Green', 'VS Terminado', '+0.75\'*-4.00\'', '0', '+0.75\'', '-4.00\'', ''),
(103, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*0.00 \'', '0', '+0.50\'', '0.00 \'', ''),
(104, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-0.25\'', '0', '+0.50\'', '-0.25\'', ''),
(105, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-0.50\'', '0', '+0.50\'', '-0.50\'', ''),
(106, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-0.75\'', '0', '+0.50\'', '-0.75\'', ''),
(107, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-1.00\'', '0', '+0.50\'', '-1.00\'', ''),
(108, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-1.25\'', '0', '+0.50\'', '-1.25\'', ''),
(109, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-1.50\'', '0', '+0.50\'', '-1.50\'', ''),
(110, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-1.75\'', '0', '+0.50\'', '-1.75\'', ''),
(111, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-2.00\'', '0', '+0.50\'', '-2.00\'', ''),
(112, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-2.25\'', '0', '+0.50\'', '-2.25\'', ''),
(113, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-2.50\'', '0', '+0.50\'', '-2.50\'', ''),
(114, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-2.75\'', '0', '+0.50\'', '-2.75\'', ''),
(115, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-3.00\'', '0', '+0.50\'', '-3.00\'', ''),
(116, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-3.25\'', '0', '+0.50\'', '-3.25\'', ''),
(117, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-3.50\'', '0', '+0.50\'', '-3.50\'', ''),
(118, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-3.75\'', '0', '+0.50\'', '-3.75\'', ''),
(119, 'Essilor', 'Ar Green', 'VS Terminado', '+0.50\'*-4.00\'', '0', '+0.50\'', '-4.00\'', ''),
(120, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*0.00 \'', '0', '+0.25\'', '0.00 \'', ''),
(121, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-0.25\'', '0', '+0.25\'', '-0.25\'', ''),
(122, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-0.50\'', '0', '+0.25\'', '-0.50\'', ''),
(123, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-0.75\'', '0', '+0.25\'', '-0.75\'', ''),
(124, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-1.00\'', '0', '+0.25\'', '-1.00\'', ''),
(125, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-1.25\'', '0', '+0.25\'', '-1.25\'', ''),
(126, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-1.50\'', '0', '+0.25\'', '-1.50\'', ''),
(127, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-1.75\'', '0', '+0.25\'', '-1.75\'', ''),
(128, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-2.00\'', '0', '+0.25\'', '-2.00\'', ''),
(129, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-2.25\'', '0', '+0.25\'', '-2.25\'', ''),
(130, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-2.50\'', '0', '+0.25\'', '-2.50\'', ''),
(131, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-2.75\'', '0', '+0.25\'', '-2.75\'', ''),
(132, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-3.00\'', '0', '+0.25\'', '-3.00\'', ''),
(133, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-3.25\'', '0', '+0.25\'', '-3.25\'', ''),
(134, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-3.50\'', '0', '+0.25\'', '-3.50\'', ''),
(135, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-3.75\'', '0', '+0.25\'', '-3.75\'', ''),
(136, 'Essilor', 'Ar Green', 'VS Terminado', '+0.25\'*-4.00\'', '0', '+0.25\'', '-4.00\'', ''),
(137, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*0.00 \'', '0', '0.00\'', '0.00 \'', ''),
(138, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-0.25\'', '0', '0.00\'', '-0.25\'', ''),
(139, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-0.50\'', '0', '0.00\'', '-0.50\'', ''),
(140, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-0.75\'', '0', '0.00\'', '-0.75\'', ''),
(141, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-1.00\'', '0', '0.00\'', '-1.00\'', ''),
(142, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-1.25\'', '0', '0.00\'', '-1.25\'', ''),
(143, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-1.50\'', '0', '0.00\'', '-1.50\'', ''),
(144, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-1.75\'', '0', '0.00\'', '-1.75\'', ''),
(145, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-2.00\'', '0', '0.00\'', '-2.00\'', ''),
(146, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-2.25\'', '0', '0.00\'', '-2.25\'', ''),
(147, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-2.50\'', '0', '0.00\'', '-2.50\'', ''),
(148, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-2.75\'', '0', '0.00\'', '-2.75\'', ''),
(149, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-3.00\'', '0', '0.00\'', '-3.00\'', ''),
(150, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-3.25\'', '0', '0.00\'', '-3.25\'', ''),
(151, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-3.50\'', '0', '0.00\'', '-3.50\'', ''),
(152, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-3.75\'', '0', '0.00\'', '-3.75\'', ''),
(153, 'Essilor', 'Ar Green', 'VS Terminado', '0.00\'*-4.00\'', '0', '0.00\'', '-4.00\'', ''),
(154, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*0.00 \'', '0', '-0.25\'', '0.00 \'', ''),
(155, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-0.25\'', '0', '-0.25\'', '-0.25\'', ''),
(156, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-0.50\'', '0', '-0.25\'', '-0.50\'', ''),
(157, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-0.75\'', '0', '-0.25\'', '-0.75\'', ''),
(158, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-1.00\'', '0', '-0.25\'', '-1.00\'', ''),
(159, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-1.25\'', '0', '-0.25\'', '-1.25\'', ''),
(160, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-1.50\'', '0', '-0.25\'', '-1.50\'', ''),
(161, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-1.75\'', '0', '-0.25\'', '-1.75\'', ''),
(162, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-2.00\'', '0', '-0.25\'', '-2.00\'', ''),
(163, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-2.25\'', '0', '-0.25\'', '-2.25\'', ''),
(164, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-2.50\'', '0', '-0.25\'', '-2.50\'', ''),
(165, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-2.75\'', '0', '-0.25\'', '-2.75\'', ''),
(166, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-3.00\'', '0', '-0.25\'', '-3.00\'', ''),
(167, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-3.25\'', '0', '-0.25\'', '-3.25\'', ''),
(168, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-3.50\'', '0', '-0.25\'', '-3.50\'', ''),
(169, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-3.75\'', '0', '-0.25\'', '-3.75\'', ''),
(170, 'Essilor', 'Ar Green', 'VS Terminado', '-0.25\'*-4.00\'', '0', '-0.25\'', '-4.00\'', ''),
(171, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*0.00 \'', '0', '-0.50\'', '0.00 \'', ''),
(172, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-0.25\'', '0', '-0.50\'', '-0.25\'', ''),
(173, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-0.50\'', '0', '-0.50\'', '-0.50\'', ''),
(174, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-0.75\'', '0', '-0.50\'', '-0.75\'', ''),
(175, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-1.00\'', '0', '-0.50\'', '-1.00\'', ''),
(176, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-1.25\'', '0', '-0.50\'', '-1.25\'', ''),
(177, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-1.50\'', '0', '-0.50\'', '-1.50\'', ''),
(178, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-1.75\'', '0', '-0.50\'', '-1.75\'', ''),
(179, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-2.00\'', '0', '-0.50\'', '-2.00\'', ''),
(180, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-2.25\'', '0', '-0.50\'', '-2.25\'', ''),
(181, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-2.50\'', '0', '-0.50\'', '-2.50\'', ''),
(182, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-2.75\'', '0', '-0.50\'', '-2.75\'', ''),
(183, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-3.00\'', '0', '-0.50\'', '-3.00\'', ''),
(184, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-3.25\'', '0', '-0.50\'', '-3.25\'', ''),
(185, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-3.50\'', '0', '-0.50\'', '-3.50\'', ''),
(186, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-3.75\'', '0', '-0.50\'', '-3.75\'', ''),
(187, 'Essilor', 'Ar Green', 'VS Terminado', '-0.50\'*-4.00\'', '0', '-0.50\'', '-4.00\'', ''),
(188, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*0.00 \'', '0', '-0.75\'', '0.00 \'', ''),
(189, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-0.25\'', '0', '-0.75\'', '-0.25\'', ''),
(190, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-0.50\'', '0', '-0.75\'', '-0.50\'', ''),
(191, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-0.75\'', '0', '-0.75\'', '-0.75\'', ''),
(192, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-1.00\'', '0', '-0.75\'', '-1.00\'', ''),
(193, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-1.25\'', '0', '-0.75\'', '-1.25\'', ''),
(194, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-1.50\'', '0', '-0.75\'', '-1.50\'', ''),
(195, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-1.75\'', '0', '-0.75\'', '-1.75\'', ''),
(196, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-2.00\'', '0', '-0.75\'', '-2.00\'', ''),
(197, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-2.25\'', '0', '-0.75\'', '-2.25\'', ''),
(198, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-2.50\'', '0', '-0.75\'', '-2.50\'', ''),
(199, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-2.75\'', '0', '-0.75\'', '-2.75\'', ''),
(200, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-3.00\'', '0', '-0.75\'', '-3.00\'', ''),
(201, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-3.25\'', '0', '-0.75\'', '-3.25\'', ''),
(202, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-3.50\'', '0', '-0.75\'', '-3.50\'', ''),
(203, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-3.75\'', '0', '-0.75\'', '-3.75\'', ''),
(204, 'Essilor', 'Ar Green', 'VS Terminado', '-0.75\'*-4.00\'', '0', '-0.75\'', '-4.00\'', ''),
(205, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*0.00 \'', '0', '-1.00\'', '0.00 \'', ''),
(206, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-0.25\'', '0', '-1.00\'', '-0.25\'', ''),
(207, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-0.50\'', '0', '-1.00\'', '-0.50\'', ''),
(208, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-0.75\'', '0', '-1.00\'', '-0.75\'', ''),
(209, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-1.00\'', '0', '-1.00\'', '-1.00\'', ''),
(210, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-1.25\'', '0', '-1.00\'', '-1.25\'', ''),
(211, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-1.50\'', '0', '-1.00\'', '-1.50\'', ''),
(212, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-1.75\'', '0', '-1.00\'', '-1.75\'', ''),
(213, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-2.00\'', '0', '-1.00\'', '-2.00\'', ''),
(214, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-2.25\'', '0', '-1.00\'', '-2.25\'', ''),
(215, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-2.50\'', '0', '-1.00\'', '-2.50\'', ''),
(216, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-2.75\'', '0', '-1.00\'', '-2.75\'', ''),
(217, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-3.00\'', '0', '-1.00\'', '-3.00\'', ''),
(218, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-3.25\'', '0', '-1.00\'', '-3.25\'', ''),
(219, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-3.50\'', '0', '-1.00\'', '-3.50\'', ''),
(220, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-3.75\'', '0', '-1.00\'', '-3.75\'', ''),
(221, 'Essilor', 'Ar Green', 'VS Terminado', '-1.00\'*-4.00\'', '0', '-1.00\'', '-4.00\'', ''),
(222, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*0.00 \'', '0', '-1.25\'', '0.00 \'', ''),
(223, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-0.25\'', '0', '-1.25\'', '-0.25\'', ''),
(224, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-0.50\'', '0', '-1.25\'', '-0.50\'', ''),
(225, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-0.75\'', '0', '-1.25\'', '-0.75\'', ''),
(226, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-1.00\'', '0', '-1.25\'', '-1.00\'', ''),
(227, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-1.25\'', '0', '-1.25\'', '-1.25\'', ''),
(228, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-1.50\'', '0', '-1.25\'', '-1.50\'', ''),
(229, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-1.75\'', '0', '-1.25\'', '-1.75\'', ''),
(230, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-2.00\'', '0', '-1.25\'', '-2.00\'', ''),
(231, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-2.25\'', '0', '-1.25\'', '-2.25\'', ''),
(232, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-2.50\'', '0', '-1.25\'', '-2.50\'', ''),
(233, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-2.75\'', '0', '-1.25\'', '-2.75\'', ''),
(234, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-3.00\'', '0', '-1.25\'', '-3.00\'', ''),
(235, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-3.25\'', '0', '-1.25\'', '-3.25\'', ''),
(236, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-3.50\'', '0', '-1.25\'', '-3.50\'', ''),
(237, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-3.75\'', '0', '-1.25\'', '-3.75\'', ''),
(238, 'Essilor', 'Ar Green', 'VS Terminado', '-1.25\'*-4.00\'', '0', '-1.25\'', '-4.00\'', ''),
(239, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*0.00 \'', '0', '-1.50\'', '0.00 \'', ''),
(240, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-0.25\'', '0', '-1.50\'', '-0.25\'', ''),
(241, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-0.50\'', '0', '-1.50\'', '-0.50\'', ''),
(242, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-0.75\'', '0', '-1.50\'', '-0.75\'', ''),
(243, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-1.00\'', '0', '-1.50\'', '-1.00\'', ''),
(244, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-1.25\'', '0', '-1.50\'', '-1.25\'', ''),
(245, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-1.50\'', '0', '-1.50\'', '-1.50\'', ''),
(246, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-1.75\'', '0', '-1.50\'', '-1.75\'', ''),
(247, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-2.00\'', '0', '-1.50\'', '-2.00\'', ''),
(248, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-2.25\'', '0', '-1.50\'', '-2.25\'', ''),
(249, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-2.50\'', '0', '-1.50\'', '-2.50\'', ''),
(250, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-2.75\'', '0', '-1.50\'', '-2.75\'', ''),
(251, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-3.00\'', '0', '-1.50\'', '-3.00\'', ''),
(252, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-3.25\'', '0', '-1.50\'', '-3.25\'', ''),
(253, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-3.50\'', '0', '-1.50\'', '-3.50\'', ''),
(254, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-3.75\'', '0', '-1.50\'', '-3.75\'', ''),
(255, 'Essilor', 'Ar Green', 'VS Terminado', '-1.50\'*-4.00\'', '0', '-1.50\'', '-4.00\'', ''),
(256, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*0.00 \'', '0', '-1.75\'', '0.00 \'', ''),
(257, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-0.25\'', '0', '-1.75\'', '-0.25\'', ''),
(258, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-0.50\'', '0', '-1.75\'', '-0.50\'', ''),
(259, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-0.75\'', '0', '-1.75\'', '-0.75\'', ''),
(260, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-1.00\'', '0', '-1.75\'', '-1.00\'', ''),
(261, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-1.25\'', '0', '-1.75\'', '-1.25\'', ''),
(262, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-1.50\'', '0', '-1.75\'', '-1.50\'', ''),
(263, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-1.75\'', '0', '-1.75\'', '-1.75\'', ''),
(264, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-2.00\'', '0', '-1.75\'', '-2.00\'', ''),
(265, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-2.25\'', '0', '-1.75\'', '-2.25\'', ''),
(266, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-2.50\'', '0', '-1.75\'', '-2.50\'', ''),
(267, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-2.75\'', '0', '-1.75\'', '-2.75\'', ''),
(268, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-3.00\'', '0', '-1.75\'', '-3.00\'', ''),
(269, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-3.25\'', '0', '-1.75\'', '-3.25\'', ''),
(270, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-3.50\'', '0', '-1.75\'', '-3.50\'', ''),
(271, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-3.75\'', '0', '-1.75\'', '-3.75\'', ''),
(272, 'Essilor', 'Ar Green', 'VS Terminado', '-1.75\'*-4.00\'', '0', '-1.75\'', '-4.00\'', ''),
(273, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*0.00 \'', '0', '-2.00\'', '0.00 \'', ''),
(274, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-0.25\'', '0', '-2.00\'', '-0.25\'', ''),
(275, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-0.50\'', '0', '-2.00\'', '-0.50\'', ''),
(276, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-0.75\'', '0', '-2.00\'', '-0.75\'', ''),
(277, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-1.00\'', '0', '-2.00\'', '-1.00\'', ''),
(278, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-1.25\'', '0', '-2.00\'', '-1.25\'', ''),
(279, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-1.50\'', '0', '-2.00\'', '-1.50\'', ''),
(280, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-1.75\'', '0', '-2.00\'', '-1.75\'', ''),
(281, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-2.00\'', '0', '-2.00\'', '-2.00\'', ''),
(282, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-2.25\'', '0', '-2.00\'', '-2.25\'', ''),
(283, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-2.50\'', '0', '-2.00\'', '-2.50\'', ''),
(284, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-2.75\'', '0', '-2.00\'', '-2.75\'', ''),
(285, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-3.00\'', '0', '-2.00\'', '-3.00\'', ''),
(286, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-3.25\'', '0', '-2.00\'', '-3.25\'', ''),
(287, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-3.50\'', '0', '-2.00\'', '-3.50\'', ''),
(288, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-3.75\'', '0', '-2.00\'', '-3.75\'', ''),
(289, 'Essilor', 'Ar Green', 'VS Terminado', '-2.00\'*-4.00\'', '0', '-2.00\'', '-4.00\'', ''),
(290, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*0.00 \'', '0', '-2.25\'', '0.00 \'', ''),
(291, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-0.25\'', '0', '-2.25\'', '-0.25\'', ''),
(292, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-0.50\'', '0', '-2.25\'', '-0.50\'', ''),
(293, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-0.75\'', '0', '-2.25\'', '-0.75\'', ''),
(294, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-1.00\'', '0', '-2.25\'', '-1.00\'', ''),
(295, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-1.25\'', '0', '-2.25\'', '-1.25\'', ''),
(296, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-1.50\'', '0', '-2.25\'', '-1.50\'', ''),
(297, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-1.75\'', '0', '-2.25\'', '-1.75\'', ''),
(298, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-2.00\'', '0', '-2.25\'', '-2.00\'', ''),
(299, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-2.25\'', '0', '-2.25\'', '-2.25\'', ''),
(300, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-2.50\'', '0', '-2.25\'', '-2.50\'', ''),
(301, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-2.75\'', '0', '-2.25\'', '-2.75\'', ''),
(302, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-3.00\'', '0', '-2.25\'', '-3.00\'', ''),
(303, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-3.25\'', '0', '-2.25\'', '-3.25\'', ''),
(304, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-3.50\'', '0', '-2.25\'', '-3.50\'', ''),
(305, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-3.75\'', '0', '-2.25\'', '-3.75\'', ''),
(306, 'Essilor', 'Ar Green', 'VS Terminado', '-2.25\'*-4.00\'', '0', '-2.25\'', '-4.00\'', ''),
(307, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*0.00 \'', '0', '-2.50\'', '0.00 \'', ''),
(308, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-0.25\'', '0', '-2.50\'', '-0.25\'', ''),
(309, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-0.50\'', '0', '-2.50\'', '-0.50\'', ''),
(310, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-0.75\'', '0', '-2.50\'', '-0.75\'', ''),
(311, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-1.00\'', '0', '-2.50\'', '-1.00\'', ''),
(312, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-1.25\'', '0', '-2.50\'', '-1.25\'', ''),
(313, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-1.50\'', '0', '-2.50\'', '-1.50\'', ''),
(314, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-1.75\'', '0', '-2.50\'', '-1.75\'', ''),
(315, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-2.00\'', '0', '-2.50\'', '-2.00\'', ''),
(316, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-2.25\'', '0', '-2.50\'', '-2.25\'', ''),
(317, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-2.50\'', '0', '-2.50\'', '-2.50\'', ''),
(318, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-2.75\'', '0', '-2.50\'', '-2.75\'', ''),
(319, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-3.00\'', '0', '-2.50\'', '-3.00\'', ''),
(320, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-3.25\'', '0', '-2.50\'', '-3.25\'', ''),
(321, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-3.50\'', '0', '-2.50\'', '-3.50\'', ''),
(322, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-3.75\'', '0', '-2.50\'', '-3.75\'', ''),
(323, 'Essilor', 'Ar Green', 'VS Terminado', '-2.50\'*-4.00\'', '0', '-2.50\'', '-4.00\'', ''),
(324, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*0.00 \'', '0', '-2.75\'', '0.00 \'', ''),
(325, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-0.25\'', '0', '-2.75\'', '-0.25\'', ''),
(326, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-0.50\'', '0', '-2.75\'', '-0.50\'', ''),
(327, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-0.75\'', '0', '-2.75\'', '-0.75\'', ''),
(328, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-1.00\'', '0', '-2.75\'', '-1.00\'', ''),
(329, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-1.25\'', '0', '-2.75\'', '-1.25\'', ''),
(330, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-1.50\'', '0', '-2.75\'', '-1.50\'', ''),
(331, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-1.75\'', '0', '-2.75\'', '-1.75\'', ''),
(332, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-2.00\'', '0', '-2.75\'', '-2.00\'', ''),
(333, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-2.25\'', '0', '-2.75\'', '-2.25\'', ''),
(334, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-2.50\'', '0', '-2.75\'', '-2.50\'', ''),
(335, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-2.75\'', '0', '-2.75\'', '-2.75\'', ''),
(336, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-3.00\'', '0', '-2.75\'', '-3.00\'', ''),
(337, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-3.25\'', '0', '-2.75\'', '-3.25\'', ''),
(338, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-3.50\'', '0', '-2.75\'', '-3.50\'', ''),
(339, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-3.75\'', '0', '-2.75\'', '-3.75\'', ''),
(340, 'Essilor', 'Ar Green', 'VS Terminado', '-2.75\'*-4.00\'', '0', '-2.75\'', '-4.00\'', ''),
(341, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*0.00 \'', '0', '-3.00\'', '0.00 \'', ''),
(342, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-0.25\'', '0', '-3.00\'', '-0.25\'', ''),
(343, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-0.50\'', '0', '-3.00\'', '-0.50\'', ''),
(344, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-0.75\'', '0', '-3.00\'', '-0.75\'', ''),
(345, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-1.00\'', '0', '-3.00\'', '-1.00\'', ''),
(346, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-1.25\'', '0', '-3.00\'', '-1.25\'', ''),
(347, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-1.50\'', '0', '-3.00\'', '-1.50\'', ''),
(348, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-1.75\'', '0', '-3.00\'', '-1.75\'', ''),
(349, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-2.00\'', '0', '-3.00\'', '-2.00\'', ''),
(350, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-2.25\'', '0', '-3.00\'', '-2.25\'', ''),
(351, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-2.50\'', '0', '-3.00\'', '-2.50\'', ''),
(352, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-2.75\'', '0', '-3.00\'', '-2.75\'', ''),
(353, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-3.00\'', '0', '-3.00\'', '-3.00\'', ''),
(354, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-3.25\'', '0', '-3.00\'', '-3.25\'', ''),
(355, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-3.50\'', '0', '-3.00\'', '-3.50\'', ''),
(356, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-3.75\'', '0', '-3.00\'', '-3.75\'', ''),
(357, 'Essilor', 'Ar Green', 'VS Terminado', '-3.00\'*-4.00\'', '0', '-3.00\'', '-4.00\'', ''),
(358, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*0.00 \'', '0', '-3.25\'', '0.00 \'', ''),
(359, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-0.25\'', '0', '-3.25\'', '-0.25\'', ''),
(360, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-0.50\'', '0', '-3.25\'', '-0.50\'', ''),
(361, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-0.75\'', '0', '-3.25\'', '-0.75\'', ''),
(362, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-1.00\'', '0', '-3.25\'', '-1.00\'', ''),
(363, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-1.25\'', '0', '-3.25\'', '-1.25\'', ''),
(364, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-1.50\'', '0', '-3.25\'', '-1.50\'', ''),
(365, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-1.75\'', '0', '-3.25\'', '-1.75\'', ''),
(366, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-2.00\'', '0', '-3.25\'', '-2.00\'', ''),
(367, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-2.25\'', '0', '-3.25\'', '-2.25\'', ''),
(368, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-2.50\'', '0', '-3.25\'', '-2.50\'', ''),
(369, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-2.75\'', '0', '-3.25\'', '-2.75\'', ''),
(370, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-3.00\'', '0', '-3.25\'', '-3.00\'', ''),
(371, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-3.25\'', '0', '-3.25\'', '-3.25\'', ''),
(372, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-3.50\'', '0', '-3.25\'', '-3.50\'', ''),
(373, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-3.75\'', '0', '-3.25\'', '-3.75\'', ''),
(374, 'Essilor', 'Ar Green', 'VS Terminado', '-3.25\'*-4.00\'', '0', '-3.25\'', '-4.00\'', ''),
(375, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*0.00 \'', '0', '-3.50\'', '0.00 \'', ''),
(376, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-0.25\'', '0', '-3.50\'', '-0.25\'', ''),
(377, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-0.50\'', '0', '-3.50\'', '-0.50\'', ''),
(378, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-0.75\'', '0', '-3.50\'', '-0.75\'', ''),
(379, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-1.00\'', '0', '-3.50\'', '-1.00\'', ''),
(380, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-1.25\'', '0', '-3.50\'', '-1.25\'', ''),
(381, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-1.50\'', '0', '-3.50\'', '-1.50\'', ''),
(382, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-1.75\'', '0', '-3.50\'', '-1.75\'', ''),
(383, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-2.00\'', '0', '-3.50\'', '-2.00\'', ''),
(384, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-2.25\'', '0', '-3.50\'', '-2.25\'', ''),
(385, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-2.50\'', '0', '-3.50\'', '-2.50\'', ''),
(386, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-2.75\'', '0', '-3.50\'', '-2.75\'', ''),
(387, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-3.00\'', '0', '-3.50\'', '-3.00\'', ''),
(388, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-3.25\'', '0', '-3.50\'', '-3.25\'', ''),
(389, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-3.50\'', '0', '-3.50\'', '-3.50\'', ''),
(390, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-3.75\'', '0', '-3.50\'', '-3.75\'', ''),
(391, 'Essilor', 'Ar Green', 'VS Terminado', '-3.50\'*-4.00\'', '0', '-3.50\'', '-4.00\'', ''),
(392, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*0.00 \'', '0', '-3.75\'', '0.00 \'', ''),
(393, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-0.25\'', '0', '-3.75\'', '-0.25\'', ''),
(394, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-0.50\'', '0', '-3.75\'', '-0.50\'', ''),
(395, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-0.75\'', '0', '-3.75\'', '-0.75\'', ''),
(396, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-1.00\'', '0', '-3.75\'', '-1.00\'', ''),
(397, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-1.25\'', '0', '-3.75\'', '-1.25\'', ''),
(398, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-1.50\'', '0', '-3.75\'', '-1.50\'', ''),
(399, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-1.75\'', '0', '-3.75\'', '-1.75\'', ''),
(400, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-2.00\'', '0', '-3.75\'', '-2.00\'', ''),
(401, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-2.25\'', '0', '-3.75\'', '-2.25\'', ''),
(402, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-2.50\'', '0', '-3.75\'', '-2.50\'', ''),
(403, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-2.75\'', '0', '-3.75\'', '-2.75\'', ''),
(404, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-3.00\'', '0', '-3.75\'', '-3.00\'', ''),
(405, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-3.25\'', '0', '-3.75\'', '-3.25\'', ''),
(406, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-3.50\'', '0', '-3.75\'', '-3.50\'', ''),
(407, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-3.75\'', '0', '-3.75\'', '-3.75\'', ''),
(408, 'Essilor', 'Ar Green', 'VS Terminado', '-3.75\'*-4.00\'', '0', '-3.75\'', '-4.00\'', ''),
(409, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*0.00 \'', '0', '-4.00\'', '0.00 \'', ''),
(410, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-0.25\'', '0', '-4.00\'', '-0.25\'', ''),
(411, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-0.50\'', '0', '-4.00\'', '-0.50\'', ''),
(412, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-0.75\'', '0', '-4.00\'', '-0.75\'', ''),
(413, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-1.00\'', '0', '-4.00\'', '-1.00\'', ''),
(414, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-1.25\'', '0', '-4.00\'', '-1.25\'', ''),
(415, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-1.50\'', '0', '-4.00\'', '-1.50\'', ''),
(416, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-1.75\'', '0', '-4.00\'', '-1.75\'', ''),
(417, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-2.00\'', '0', '-4.00\'', '-2.00\'', ''),
(418, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-2.25\'', '0', '-4.00\'', '-2.25\'', ''),
(419, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-2.50\'', '0', '-4.00\'', '-2.50\'', ''),
(420, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-2.75\'', '0', '-4.00\'', '-2.75\'', ''),
(421, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-3.00\'', '0', '-4.00\'', '-3.00\'', ''),
(422, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-3.25\'', '0', '-4.00\'', '-3.25\'', ''),
(423, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-3.50\'', '0', '-4.00\'', '-3.50\'', ''),
(424, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-3.75\'', '0', '-4.00\'', '-3.75\'', ''),
(425, 'Essilor', 'Ar Green', 'VS Terminado', '-4.00\'*-4.00\'', '0', '-4.00\'', '-4.00\'', ''),
(426, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*0.00 \'', '0', '-4.25\'', '0.00 \'', ''),
(427, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-0.25\'', '0', '-4.25\'', '-0.25\'', ''),
(428, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-0.50\'', '0', '-4.25\'', '-0.50\'', ''),
(429, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-0.75\'', '0', '-4.25\'', '-0.75\'', ''),
(430, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-1.00\'', '0', '-4.25\'', '-1.00\'', ''),
(431, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-1.25\'', '0', '-4.25\'', '-1.25\'', ''),
(432, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-1.50\'', '0', '-4.25\'', '-1.50\'', ''),
(433, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-1.75\'', '0', '-4.25\'', '-1.75\'', ''),
(434, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-2.00\'', '0', '-4.25\'', '-2.00\'', ''),
(435, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-2.25\'', '0', '-4.25\'', '-2.25\'', ''),
(436, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-2.50\'', '0', '-4.25\'', '-2.50\'', ''),
(437, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-2.75\'', '0', '-4.25\'', '-2.75\'', ''),
(438, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-3.00\'', '0', '-4.25\'', '-3.00\'', ''),
(439, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-3.25\'', '0', '-4.25\'', '-3.25\'', ''),
(440, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-3.50\'', '0', '-4.25\'', '-3.50\'', ''),
(441, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-3.75\'', '0', '-4.25\'', '-3.75\'', ''),
(442, 'Essilor', 'Ar Green', 'VS Terminado', '-4.25\'*-4.00\'', '0', '-4.25\'', '-4.00\'', ''),
(443, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*0.00 \'', '0', '-4.50\'', '0.00 \'', ''),
(444, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-0.25\'', '0', '-4.50\'', '-0.25\'', ''),
(445, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-0.50\'', '0', '-4.50\'', '-0.50\'', ''),
(446, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-0.75\'', '0', '-4.50\'', '-0.75\'', ''),
(447, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-1.00\'', '0', '-4.50\'', '-1.00\'', ''),
(448, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-1.25\'', '0', '-4.50\'', '-1.25\'', ''),
(449, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-1.50\'', '0', '-4.50\'', '-1.50\'', ''),
(450, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-1.75\'', '0', '-4.50\'', '-1.75\'', ''),
(451, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-2.00\'', '0', '-4.50\'', '-2.00\'', ''),
(452, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-2.25\'', '0', '-4.50\'', '-2.25\'', ''),
(453, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-2.50\'', '0', '-4.50\'', '-2.50\'', ''),
(454, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-2.75\'', '0', '-4.50\'', '-2.75\'', ''),
(455, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-3.00\'', '0', '-4.50\'', '-3.00\'', ''),
(456, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-3.25\'', '0', '-4.50\'', '-3.25\'', ''),
(457, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-3.50\'', '0', '-4.50\'', '-3.50\'', ''),
(458, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-3.75\'', '0', '-4.50\'', '-3.75\'', ''),
(459, 'Essilor', 'Ar Green', 'VS Terminado', '-4.50\'*-4.00\'', '0', '-4.50\'', '-4.00\'', ''),
(460, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*0.00 \'', '0', '-4.75\'', '0.00 \'', ''),
(461, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-0.25\'', '0', '-4.75\'', '-0.25\'', ''),
(462, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-0.50\'', '0', '-4.75\'', '-0.50\'', ''),
(463, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-0.75\'', '0', '-4.75\'', '-0.75\'', ''),
(464, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-1.00\'', '0', '-4.75\'', '-1.00\'', ''),
(465, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-1.25\'', '0', '-4.75\'', '-1.25\'', ''),
(466, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-1.50\'', '0', '-4.75\'', '-1.50\'', ''),
(467, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-1.75\'', '0', '-4.75\'', '-1.75\'', ''),
(468, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-2.00\'', '0', '-4.75\'', '-2.00\'', ''),
(469, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-2.25\'', '0', '-4.75\'', '-2.25\'', ''),
(470, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-2.50\'', '0', '-4.75\'', '-2.50\'', ''),
(471, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-2.75\'', '0', '-4.75\'', '-2.75\'', ''),
(472, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-3.00\'', '0', '-4.75\'', '-3.00\'', ''),
(473, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-3.25\'', '0', '-4.75\'', '-3.25\'', ''),
(474, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-3.50\'', '0', '-4.75\'', '-3.50\'', ''),
(475, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-3.75\'', '0', '-4.75\'', '-3.75\'', ''),
(476, 'Essilor', 'Ar Green', 'VS Terminado', '-4.75\'*-4.00\'', '0', '-4.75\'', '-4.00\'', ''),
(477, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*0.00 \'', '0', '-5.00\'', '0.00 \'', ''),
(478, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-0.25\'', '0', '-5.00\'', '-0.25\'', ''),
(479, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-0.50\'', '0', '-5.00\'', '-0.50\'', ''),
(480, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-0.75\'', '0', '-5.00\'', '-0.75\'', ''),
(481, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-1.00\'', '0', '-5.00\'', '-1.00\'', ''),
(482, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-1.25\'', '0', '-5.00\'', '-1.25\'', ''),
(483, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-1.50\'', '0', '-5.00\'', '-1.50\'', ''),
(484, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-1.75\'', '0', '-5.00\'', '-1.75\'', ''),
(485, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-2.00\'', '0', '-5.00\'', '-2.00\'', ''),
(486, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-2.25\'', '0', '-5.00\'', '-2.25\'', ''),
(487, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-2.50\'', '0', '-5.00\'', '-2.50\'', ''),
(488, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-2.75\'', '0', '-5.00\'', '-2.75\'', ''),
(489, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-3.00\'', '0', '-5.00\'', '-3.00\'', ''),
(490, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-3.25\'', '0', '-5.00\'', '-3.25\'', ''),
(491, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-3.50\'', '0', '-5.00\'', '-3.50\'', ''),
(492, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-3.75\'', '0', '-5.00\'', '-3.75\'', ''),
(493, 'Essilor', 'Ar Green', 'VS Terminado', '-5.00\'*-4.00\'', '0', '-5.00\'', '-4.00\'', ''),
(494, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*0.00 \'', '0', '-5.25\'', '0.00 \'', ''),
(495, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-0.25\'', '0', '-5.25\'', '-0.25\'', ''),
(496, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-0.50\'', '0', '-5.25\'', '-0.50\'', ''),
(497, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-0.75\'', '0', '-5.25\'', '-0.75\'', ''),
(498, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-1.00\'', '0', '-5.25\'', '-1.00\'', ''),
(499, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-1.25\'', '0', '-5.25\'', '-1.25\'', ''),
(500, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-1.50\'', '0', '-5.25\'', '-1.50\'', ''),
(501, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-1.75\'', '0', '-5.25\'', '-1.75\'', ''),
(502, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-2.00\'', '0', '-5.25\'', '-2.00\'', ''),
(503, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-2.25\'', '0', '-5.25\'', '-2.25\'', ''),
(504, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-2.50\'', '0', '-5.25\'', '-2.50\'', ''),
(505, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-2.75\'', '0', '-5.25\'', '-2.75\'', ''),
(506, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-3.00\'', '0', '-5.25\'', '-3.00\'', ''),
(507, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-3.25\'', '0', '-5.25\'', '-3.25\'', ''),
(508, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-3.50\'', '0', '-5.25\'', '-3.50\'', ''),
(509, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-3.75\'', '0', '-5.25\'', '-3.75\'', ''),
(510, 'Essilor', 'Ar Green', 'VS Terminado', '-5.25\'*-4.00\'', '0', '-5.25\'', '-4.00\'', ''),
(511, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*0.00 \'', '0', '-5.50\'', '0.00 \'', ''),
(512, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-0.25\'', '0', '-5.50\'', '-0.25\'', ''),
(513, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-0.50\'', '0', '-5.50\'', '-0.50\'', ''),
(514, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-0.75\'', '0', '-5.50\'', '-0.75\'', ''),
(515, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-1.00\'', '0', '-5.50\'', '-1.00\'', ''),
(516, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-1.25\'', '0', '-5.50\'', '-1.25\'', ''),
(517, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-1.50\'', '0', '-5.50\'', '-1.50\'', ''),
(518, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-1.75\'', '0', '-5.50\'', '-1.75\'', ''),
(519, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-2.00\'', '0', '-5.50\'', '-2.00\'', ''),
(520, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-2.25\'', '0', '-5.50\'', '-2.25\'', ''),
(521, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-2.50\'', '0', '-5.50\'', '-2.50\'', ''),
(522, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-2.75\'', '0', '-5.50\'', '-2.75\'', ''),
(523, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-3.00\'', '0', '-5.50\'', '-3.00\'', ''),
(524, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-3.25\'', '0', '-5.50\'', '-3.25\'', ''),
(525, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-3.50\'', '0', '-5.50\'', '-3.50\'', ''),
(526, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-3.75\'', '0', '-5.50\'', '-3.75\'', ''),
(527, 'Essilor', 'Ar Green', 'VS Terminado', '-5.50\'*-4.00\'', '0', '-5.50\'', '-4.00\'', ''),
(528, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*0.00 \'', '0', '-5.75\'', '0.00 \'', ''),
(529, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-0.25\'', '0', '-5.75\'', '-0.25\'', '');
INSERT INTO `lente_terminado` (`id_terminado`, `marca`, `diseno`, `lente`, `identificador`, `stock`, `esfera`, `cilindro`, `codigo`) VALUES
(530, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-0.50\'', '0', '-5.75\'', '-0.50\'', ''),
(531, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-0.75\'', '0', '-5.75\'', '-0.75\'', ''),
(532, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-1.00\'', '0', '-5.75\'', '-1.00\'', ''),
(533, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-1.25\'', '0', '-5.75\'', '-1.25\'', ''),
(534, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-1.50\'', '0', '-5.75\'', '-1.50\'', ''),
(535, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-1.75\'', '0', '-5.75\'', '-1.75\'', ''),
(536, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-2.00\'', '0', '-5.75\'', '-2.00\'', ''),
(537, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-2.25\'', '0', '-5.75\'', '-2.25\'', ''),
(538, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-2.50\'', '0', '-5.75\'', '-2.50\'', ''),
(539, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-2.75\'', '0', '-5.75\'', '-2.75\'', ''),
(540, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-3.00\'', '0', '-5.75\'', '-3.00\'', ''),
(541, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-3.25\'', '0', '-5.75\'', '-3.25\'', ''),
(542, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-3.50\'', '0', '-5.75\'', '-3.50\'', ''),
(543, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-3.75\'', '0', '-5.75\'', '-3.75\'', ''),
(544, 'Essilor', 'Ar Green', 'VS Terminado', '-5.75\'*-4.00\'', '0', '-5.75\'', '-4.00\'', ''),
(545, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*0.00 \'', '0', '-6.00\'', '0.00 \'', ''),
(546, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-0.25\'', '0', '-6.00\'', '-0.25\'', ''),
(547, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-0.50\'', '0', '-6.00\'', '-0.50\'', ''),
(548, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-0.75\'', '0', '-6.00\'', '-0.75\'', ''),
(549, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-1.00\'', '0', '-6.00\'', '-1.00\'', ''),
(550, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-1.25\'', '0', '-6.00\'', '-1.25\'', ''),
(551, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-1.50\'', '0', '-6.00\'', '-1.50\'', ''),
(552, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-1.75\'', '0', '-6.00\'', '-1.75\'', ''),
(553, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-2.00\'', '0', '-6.00\'', '-2.00\'', ''),
(554, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-2.25\'', '0', '-6.00\'', '-2.25\'', ''),
(555, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-2.50\'', '0', '-6.00\'', '-2.50\'', ''),
(556, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-2.75\'', '0', '-6.00\'', '-2.75\'', ''),
(557, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-3.00\'', '0', '-6.00\'', '-3.00\'', ''),
(558, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-3.25\'', '0', '-6.00\'', '-3.25\'', ''),
(559, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-3.50\'', '0', '-6.00\'', '-3.50\'', ''),
(560, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-3.75\'', '0', '-6.00\'', '-3.75\'', ''),
(561, 'Essilor', 'Ar Green', 'VS Terminado', '-6.00\'*-4.00\'', '0', '-6.00\'', '-4.00\'', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `optica`
--

CREATE TABLE `optica` (
  `id_optica` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `optica`
--

INSERT INTO `optica` (`id_optica`, `nombre`, `telefono`, `id_usuario`) VALUES
(1, 'Av Plus', NULL, 1),
(2, 'Opticas Cristal', NULL, NULL),
(3, 'óptica cv+', '22555888', 1),
(4, 'LA PRINCESA', '2220215', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id_orden` int(45) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `paciente` varchar(250) NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `fecha_creacion` varchar(25) DEFAULT NULL,
  `estado` varchar(3) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `tipo_lente` varchar(45) DEFAULT NULL,
  `id_optica` int(11) DEFAULT NULL,
  `tipo_orden` varchar(45) DEFAULT NULL,
  `trat_orden` varchar(50) NOT NULL,
  `contenedor` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id_orden`, `codigo`, `paciente`, `observaciones`, `usuario`, `fecha_creacion`, `estado`, `id_sucursal`, `tipo_lente`, `id_optica`, `tipo_orden`, `trat_orden`, `contenedor`) VALUES
(1, '0122-1', 'Lorena Hernandez', '', '1', '09-01-2022 12:45:55', '1', 3, 'Visión Sencilla', 2, 'Laboratorio', 'Alena', '58'),
(2, '0122-2', 'Georgina del Carmen Gutierres', '', '1', '09-01-2022 12:50:18', '1', 4, 'Bifocal', 2, 'Laboratorio', 'Alena', '71');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nombre`) VALUES
(1, 'Ordenes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rx_orden`
--

CREATE TABLE `rx_orden` (
  `codigo` varchar(45) DEFAULT NULL,
  `paciente` varchar(250) DEFAULT NULL,
  `odesferas` varchar(10) DEFAULT NULL,
  `odcindros` varchar(10) DEFAULT NULL,
  `odeje` varchar(10) DEFAULT NULL,
  `odadicion` varchar(10) DEFAULT NULL,
  `odprisma` varchar(10) DEFAULT NULL,
  `oiesferas` varchar(10) DEFAULT NULL,
  `oicindros` varchar(10) DEFAULT NULL,
  `oieje` varchar(10) DEFAULT NULL,
  `oiadicion` varchar(10) DEFAULT NULL,
  `oiprisma` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rx_orden`
--

INSERT INTO `rx_orden` (`codigo`, `paciente`, `odesferas`, `odcindros`, `odeje`, `odadicion`, `odprisma`, `oiesferas`, `oicindros`, `oieje`, `oiadicion`, `oiprisma`) VALUES
('0921-1', 'Gerardo Ernesto Guillen', '-2.00', '+2.00', '+3.25', '', '+3.00', '+2.00', '-1.25', '-2.00', '', '4'),
('0921-2', 'Rafael Guillen', '+2.00', '-1.25', '', '', '', '-1.00', '', '', '', ''),
('0921-3', 'Alejandro Sanz', '+2.00', '-0.50', '180', '', '', '', '', '', '', ''),
('1021-1', 'Liliana de Alvarenga', '+1.00', '-0.50', '180', '+1.00', '1 adentro', 'N', '-0.75', '165', '+1.00', ''),
('1121-1', 'ELETICIA AQUINO DE MARROQUIN', '+0.25', '', '', '', '+2.25', '+0.25', '', '', '', '+2.25'),
('1121-2', 'MARIA ADELA RUIZ DE CANALES', '0.00', '', '', '', '+2.50', '-0.25', '', '', '', '+2.50'),
('1121-3', 'Marcos Cruz de Soriano', '+0.25', '', '', '+2.25', '', '+0.25', '', '', '+2.25', ''),
('1121-4', 'Maria Ruiz de Canales', '+2.25', '', '', '+3.25', '', '+1.25', '', '', '', ''),
('1121-5', 'Leonicio Siguenza Menjivar', '+2.25', '+3.00', '', '', '', '+2.25', '', '', '', ''),
('1121-6', 'MARIA ELSA GONZALEZ ', '+2.00', '', '', '', '', '', '', '', '', ''),
('1121-7', 'Jose Manuel Tobar Peraza', '+2.00', '', '', '', '', '+3.25', '', '', '', ''),
('1121-8', 'Carlos José Corvera', '-2.00', 'e', '', '', '', '6', '', '', '', ''),
('1121-9', 'Jorge Gonzalez', '+2.00', '', '', '', '', '', '', '', '', ''),
('1121-10', 'Victorino Lopez', '+2.14', '', '', '', '', '-1.25', '', '', '', ''),
('1121-11', 'Estela Perez', '+2.00', '', '', '', '', '-1.25', '', '', '', ''),
('1121-12', 'Oscar Antonio Gonzalez', '-2.00', '', '', '', '', '+2.00', '', '', '', ''),
('1121-13', 'Roxana Lopez', '-2.00', '', '', '', '', '6', '', '', '', ''),
('1121-14', 'Marcos Rivera', '+2.00', 'e', '', '', '', '+3.00', '', '', '', ''),
('1121-15', 'Maria Elena Rivera', '+3.00', '', '', '', '', '', '', '', '', ''),
('1121-16', 'Alexandra Sosa', '-2.00', '', '', '', '', '+3.25', '', '', '', ''),
('1121-17', 'Ricardo Valladares', '-2.00', '', '', '', '', '+2.00', '', '', '', ''),
('1121-18', 'Oscar Gonzalez', '-2.00', '', '', '', '', '+2.00', '', '', '', ''),
('1121-19', 'Paciente prueba', '-2.00', '', '', '', '', '', '', '', '', ''),
('1121-20', 'paciente 3', '-2.00', '', '', '', '', '6', '', '', '', ''),
('1121-21', 'Maria Isabel Ramirez', '-2.00', '', '', '', '', '+2.25', '', '', '', ''),
('1121-22', 'Yolanda Edith Gatan', '-2.00', '', '', '', '', 'e', '', '', '', ''),
('1121-23', 'Ana Cecilia Lopez', '-2.00', '', '', '', '', '6', '', '', '', ''),
('1121-24', 'Nicolle Villalobos', '-2.00', '', '', '', '', '6', '', '', '', ''),
('1121-25', 'Mayra Anabella Enrriquez', '-2.00', '', '', '', '', '+3.25', '', '', '', ''),
('1121-26', 'Sonia Margarita Guevara', '+2.00', '', '', '', '', '-2.00', '', '', '', ''),
('1121-27', 'Reina Rivera de Quintanilla', '-2.00', '', '', '', '', '+2.00', '', '', '', ''),
('1121-28', 'Sandra Elizabeth Ramires', '+2.00', '-3.25', '', '', '', '+1.25', '-3.25', '', '', ''),
('1221-1', 'Jorge Alberto Sales', '-2.00', '+1.50', '', '', '', '+2.00', '+0.25', '', '', ''),
('0122-1', 'Mirian Francisca López', '+0.25', '', '-1.25', '', '', '+0.25', '', '', '', ''),
('0122-2', 'Antonio Alonso Gonzalez', '-1.50', '', '', '', '', '-0.50', '', '', '', ''),
('0122-3', 'Ana Guadalupe Martinez', '-1.50', '', '', '', '', '-1.25', '', '', '', ''),
('0122-4', 'Vicente Lopez', '-0.25', '', '', '', '', '-0.25', '', '', '', ''),
('0122-5', 'Rafael Eduardo Corvera', '+1.25', '', '', '', '', '+23.2', '', '', '', ''),
('0122-6', 'José Eduardo Pérez', '+0.25', '', '', '', '', '-1.25', '', '', '', ''),
('0122-7', 'Laura Dinora Martinez', '+2.25', '-1.25', '', '', '', '-2.15', '-1.00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_bases`
--

CREATE TABLE `stock_bases` (
  `codigo` varchar(75) NOT NULL,
  `identificador` varchar(45) DEFAULT NULL,
  `base` varchar(45) DEFAULT NULL,
  `stock_minimo` varchar(45) DEFAULT NULL,
  `stock` varchar(45) DEFAULT NULL,
  `id_tabla_base` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `stock_bases`
--

INSERT INTO `stock_bases` (`codigo`, `identificador`, `base`, `stock_minimo`, `stock`, `id_tabla_base`) VALUES
('21DS000C53702', 'base_2_1', '1.50', '', '33', 2),
('21DS000C53714', 'base_1_3', '6.00', '', '12', 1),
('21DS000C53725', 'base_3_1', '0.75', '', '36', 3),
('21DS000C53738', 'base_3_5', '6.25', '', '12', 3),
('21DS000C53743', 'base_1_1', '4.00', '', '45', 1),
('21DS000C53906', 'base_2_2', '3.25', '', '52', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_bases_adicion`
--

CREATE TABLE `stock_bases_adicion` (
  `id_stock` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `identificador` varchar(45) DEFAULT NULL,
  `base` varchar(45) DEFAULT NULL,
  `adicion` varchar(45) DEFAULT NULL,
  `stock_minimo` varchar(45) DEFAULT NULL,
  `stock` varchar(45) DEFAULT NULL,
  `ojo` varchar(45) DEFAULT NULL,
  `id_tabla_base` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `stock_bases_adicion`
--

INSERT INTO `stock_bases_adicion` (`id_stock`, `codigo`, `identificador`, `base`, `adicion`, `stock_minimo`, `stock`, `ojo`, `id_tabla_base`) VALUES
(1, '21DS000C53740', 'td_ftop_1713', '+3.00', '+1.00', '', '32', 'Derecho', 7),
(2, '21DS000C53697', 'td_ftop_1171.253', '+3.00', '+1.25', '', '36', 'Izquierdo', 7),
(3, '21DS000C53988', 'td_ftop_1371.753', '+3.00', '+1.75', '', '14', 'Izquierdo', 7),
(4, '21DS000C53993', 'td_ftop_672.253', '+3.00', '+2.25', '', '12', 'Derecho', 7),
(5, '21DS000C53986', 'td_ftop_1815', '+5.00', '+1.00', '', '36', 'Derecho', 8),
(6, '21DS000C54062', 'td_ftop_281.255', '+5.00', '+1.25', '', '36', 'Derecho', 8),
(7, '21DS000C53972', 'td_ftop_10815', '+5.00', '+1.00', '', '125', 'Izquierdo', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_terminados`
--

CREATE TABLE `stock_terminados` (
  `codigo` varchar(60) NOT NULL,
  `identificador` varchar(25) NOT NULL,
  `id_tabla_term` int(11) DEFAULT NULL,
  `esfera` varchar(15) DEFAULT NULL,
  `cilindro` varchar(15) DEFAULT NULL,
  `stock_min` varchar(5) DEFAULT NULL,
  `stock` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `stock_terminados`
--

INSERT INTO `stock_terminados` (`codigo`, `identificador`, `id_tabla_term`, `esfera`, `cilindro`, `stock_min`, `stock`) VALUES
('21DS000C53715', 'term_1_1', 1, '+2.00', '0.00', '-', '23'),
('21DS000C53739', 'term_1_19', 1, '+1.75', '-0.25', '-', '39'),
('21DS000C53741', 'term_1_69', 1, '+1.00', '0.00', '-', '89'),
('21DS000C54066', 'term_4_1', 4, '+2.00', '0.00', '-', '85');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal_optica`
--

CREATE TABLE `sucursal_optica` (
  `id_sucursal` int(11) NOT NULL,
  `nombre_sucursal` varchar(45) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `encargado` varchar(250) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `id_optica` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sucursal_optica`
--

INSERT INTO `sucursal_optica` (`id_sucursal`, `nombre_sucursal`, `direccion`, `telefono`, `correo`, `encargado`, `codigo`, `id_optica`, `id_usuario`) VALUES
(1, NULL, 'San Salvador', '2222222', '--', '--', '1006211', 1, NULL),
(2, NULL, 'Santa Ana', '--', '--', '---', '1006213', 1, NULL),
(3, NULL, 'San Jacinto', '2222222', '--', '--', '1006212', 2, NULL),
(4, NULL, 'Santo Tomas', '2652225222--', '--', '--', '1006213', 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablas_base`
--

CREATE TABLE `tablas_base` (
  `id_tabla_base` int(11) NOT NULL,
  `titulo` varchar(125) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `diseno` varchar(45) DEFAULT NULL,
  `min_base` varchar(45) DEFAULT NULL,
  `max_base` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tablas_base`
--

INSERT INTO `tablas_base` (`id_tabla_base`, `titulo`, `marca`, `diseno`, `min_base`, `max_base`) VALUES
(1, '1.56 PHOTOCROM GRIS', 'Divel', 'vs', '4', '6'),
(2, 'SFSV SPH AIRWEAR BLUE CAPTURE', 'Essilor', 'vs', '1.50', '5.50'),
(3, '1.67 ESFERICO', 'Divel', 'vs', '0', '3'),
(4, 'BASE SPH 9', 'Essilor', 'vs', '-', '-'),
(5, 'SINGLE VISION 1.56', 'Divel', 'vs', '-', '-'),
(6, 'SINGLE VISION 1.90 40MM', 'Divel', 'vs', '-', '.'),
(7, '1.56 BIFOCAL PHOTOCROM GRIS', 'Divel', 'bf', '-', '-'),
(8, 'BIFOCAL PHOTOCROM GREEN', 'Essilor', 'bf', '-', '-'),
(9, '1.56 BIFOCAL CR BLANCO', 'Divel', 'bf', '-', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablas_terminado`
--

CREATE TABLE `tablas_terminado` (
  `id_tabla_term` int(11) NOT NULL,
  `titulo` varchar(125) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `diseno` varchar(45) DEFAULT NULL,
  `min_cil` varchar(15) DEFAULT NULL,
  `max_cil` varchar(15) DEFAULT NULL,
  `min_esf` varchar(15) DEFAULT NULL,
  `max_esf` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tablas_terminado`
--

INSERT INTO `tablas_terminado` (`id_tabla_term`, `titulo`, `marca`, `diseno`, `min_cil`, `max_cil`, `min_esf`, `max_esf`) VALUES
(1, 'LENTE TERMINADO SPH GREEN ESSILOR', 'Essilor', 'Ar Green', '-4', '0', '-6.00', '2'),
(2, 'LENTE TERMINADO SPH BLUE CAPTURE ESSILOR', 'Essilor', 'Blue Capture', '-4', '0', '-6', '2'),
(3, ' LENTE TERMINADO SPH PHOTOCROM 1.56 GRAY DIVEL', 'Divel', 'SPH PHTOCROM 1.56', '-4.50', '0', '-6.50', '2'),
(4, 'LENTE TERMINADO SPH GENTEX', 'GENTEX', 'VISION SENCILLA', '-4', '0', '-6', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento_orden`
--

CREATE TABLE `tratamiento_orden` (
  `codigo` varchar(45) NOT NULL,
  `tratamiento` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tratamiento_orden`
--

INSERT INTO `tratamiento_orden` (`codigo`, `tratamiento`) VALUES
('1121-20', 'Blue Cap'),
('1121-20', 'No Uv'),
('1121-20', 'ARSH'),
('1121-20', 'Photocrom'),
('1121-22', NULL),
('1121-22', NULL),
('1121-22', NULL),
('1121-22', NULL),
('1121-24', 'Blue Cap'),
('1121-24', 'No Uv'),
('1121-24', 'ARSH'),
('1121-25', 'Blue Cap'),
('1121-25', 'No Uv'),
('1121-25', 'ARSH'),
('1121-25', 'Transitions'),
('1121-26', 'Blue Cap'),
('1121-27', 'Blue Cap'),
('1121-27', 'No Uv'),
('1121-27', 'ARSH'),
('1121-27', 'Blanco'),
('1121-28', 'Blue Cap'),
('1121-28', 'No Uv'),
('1121-28', 'Photocrom'),
('1221-1', 'Blue Cap'),
('1221-1', 'Photocrom'),
('0122-1', 'Blue Cap'),
('0122-2', 'Blanco'),
('0122-3', 'Blue Cap'),
('0122-3', 'No Uv'),
('0122-3', 'Blanco'),
('0122-4', 'ARSH'),
('0122-4', 'Blanco'),
('0122-5', 'Blue Cap'),
('0122-6', 'Blue Cap'),
('0122-6', 'Photocrom'),
('0122-7', 'Blue Cap'),
('0122-1', 'Blue Cap'),
('0122-1', 'Blanco'),
('0122-2', 'Blue Cap'),
('0122-2', 'Blanco'),
('0122-2', 'Blue Cap'),
('0122-2', 'No Uv'),
('0122-2', 'Photocrom');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(250) DEFAULT NULL,
  `telefono` varchar(40) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `dui` varchar(50) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `departamento` varchar(250) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `codigo_emp` varchar(40) DEFAULT NULL,
  `cargo` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `telefono`, `correo`, `dui`, `direccion`, `usuario`, `departamento`, `pass`, `categoria`, `estado`, `codigo_emp`, `cargo`) VALUES
(1, 'Oscar Antonio Gonzalez', '0000000', '----', '-------', 'ss', 'oscar', 'admin', 'oscar1411', 'Admin', '1', 'LT-211', ''),
(2, 'Jacelin Asuncion Molina', '000', 'jack@avplus.com', '0000', 'San Salvador ', 'jacky', 'ar', 'jack93', '1', '1', '11', '---');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `id_usuario_permiso` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`id_usuario_permiso`, `id_usuario`, `id_permiso`) VALUES
(1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones_orden`
--
ALTER TABLE `acciones_orden`
  ADD PRIMARY KEY (`id_accion`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `alturas_orden`
--
ALTER TABLE `alturas_orden`
  ADD KEY `codigo` (`codigo`),
  ADD KEY `paciente` (`paciente`);

--
-- Indices de la tabla `aro_orden`
--
ALTER TABLE `aro_orden`
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `codigos_lentes`
--
ALTER TABLE `codigos_lentes`
  ADD PRIMARY KEY (`id_codigo`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD UNIQUE KEY `id_lente` (`identificador_lente`);

--
-- Indices de la tabla `descargos`
--
ALTER TABLE `descargos`
  ADD PRIMARY KEY (`id_descargo`),
  ADD KEY `id_optica` (`id_optica`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `grad_tablas_base`
--
ALTER TABLE `grad_tablas_base`
  ADD PRIMARY KEY (`id_graduacion`),
  ADD KEY `id_tabla_base` (`id_tabla_base`);

--
-- Indices de la tabla `lente_terminado`
--
ALTER TABLE `lente_terminado`
  ADD PRIMARY KEY (`id_terminado`);

--
-- Indices de la tabla `optica`
--
ALTER TABLE `optica`
  ADD PRIMARY KEY (`id_optica`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id_orden`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_optica` (`id_optica`),
  ADD KEY `paciente` (`paciente`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `rx_orden`
--
ALTER TABLE `rx_orden`
  ADD UNIQUE KEY `codigo` (`codigo`) USING BTREE,
  ADD KEY `paciente` (`paciente`);

--
-- Indices de la tabla `stock_bases`
--
ALTER TABLE `stock_bases`
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_tabla_base_idx` (`id_tabla_base`);

--
-- Indices de la tabla `stock_bases_adicion`
--
ALTER TABLE `stock_bases_adicion`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_tabla_base` (`id_tabla_base`);

--
-- Indices de la tabla `stock_terminados`
--
ALTER TABLE `stock_terminados`
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  ADD KEY `id_tabla_term` (`id_tabla_term`);

--
-- Indices de la tabla `sucursal_optica`
--
ALTER TABLE `sucursal_optica`
  ADD PRIMARY KEY (`id_sucursal`),
  ADD KEY `id_optica` (`id_optica`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tablas_base`
--
ALTER TABLE `tablas_base`
  ADD PRIMARY KEY (`id_tabla_base`),
  ADD UNIQUE KEY `titulo` (`titulo`);

--
-- Indices de la tabla `tablas_terminado`
--
ALTER TABLE `tablas_terminado`
  ADD PRIMARY KEY (`id_tabla_term`),
  ADD UNIQUE KEY `titulo_UNIQUE` (`titulo`);

--
-- Indices de la tabla `tratamiento_orden`
--
ALTER TABLE `tratamiento_orden`
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`id_usuario_permiso`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_permiso` (`id_permiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones_orden`
--
ALTER TABLE `acciones_orden`
  MODIFY `id_accion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `codigos_lentes`
--
ALTER TABLE `codigos_lentes`
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `descargos`
--
ALTER TABLE `descargos`
  MODIFY `id_descargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grad_tablas_base`
--
ALTER TABLE `grad_tablas_base`
  MODIFY `id_graduacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `lente_terminado`
--
ALTER TABLE `lente_terminado`
  MODIFY `id_terminado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=562;

--
-- AUTO_INCREMENT de la tabla `optica`
--
ALTER TABLE `optica`
  MODIFY `id_optica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `stock_bases_adicion`
--
ALTER TABLE `stock_bases_adicion`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sucursal_optica`
--
ALTER TABLE `sucursal_optica`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tablas_base`
--
ALTER TABLE `tablas_base`
  MODIFY `id_tabla_base` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tablas_terminado`
--
ALTER TABLE `tablas_terminado`
  MODIFY `id_tabla_term` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `id_usuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acciones_orden`
--
ALTER TABLE `acciones_orden`
  ADD CONSTRAINT `acciones_orden_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `orden` (`codigo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `alturas_orden`
--
ALTER TABLE `alturas_orden`
  ADD CONSTRAINT `alturas_orden_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `orden` (`codigo`),
  ADD CONSTRAINT `alturas_orden_ibfk_2` FOREIGN KEY (`paciente`) REFERENCES `orden` (`paciente`);

--
-- Filtros para la tabla `aro_orden`
--
ALTER TABLE `aro_orden`
  ADD CONSTRAINT `aro_orden_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `orden` (`codigo`);

--
-- Filtros para la tabla `descargos`
--
ALTER TABLE `descargos`
  ADD CONSTRAINT `descargos_ibfk_1` FOREIGN KEY (`id_optica`) REFERENCES `optica` (`id_optica`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `descargos_ibfk_2` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal_optica` (`id_sucursal`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `descargos_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `grad_tablas_base`
--
ALTER TABLE `grad_tablas_base`
  ADD CONSTRAINT `grad_tablas_base_ibfk_1` FOREIGN KEY (`id_tabla_base`) REFERENCES `tablas_base` (`id_tabla_base`);

--
-- Filtros para la tabla `optica`
--
ALTER TABLE `optica`
  ADD CONSTRAINT `optica_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `id_sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal_optica` (`id_sucursal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`id_optica`) REFERENCES `optica` (`id_optica`);

--
-- Filtros para la tabla `rx_orden`
--
ALTER TABLE `rx_orden`
  ADD CONSTRAINT `rx_orden_ibfk_3` FOREIGN KEY (`codigo`) REFERENCES `orden` (`codigo`),
  ADD CONSTRAINT `rx_orden_ibfk_4` FOREIGN KEY (`paciente`) REFERENCES `orden` (`paciente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `stock_bases`
--
ALTER TABLE `stock_bases`
  ADD CONSTRAINT `id_tabla_base` FOREIGN KEY (`id_tabla_base`) REFERENCES `tablas_base` (`id_tabla_base`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stock_bases_adicion`
--
ALTER TABLE `stock_bases_adicion`
  ADD CONSTRAINT `stock_bases_adicion_ibfk_1` FOREIGN KEY (`id_tabla_base`) REFERENCES `tablas_base` (`id_tabla_base`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stock_terminados`
--
ALTER TABLE `stock_terminados`
  ADD CONSTRAINT `id_table_term` FOREIGN KEY (`id_tabla_term`) REFERENCES `tablas_terminado` (`id_tabla_term`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stock_terminados_ibfk_1` FOREIGN KEY (`id_tabla_term`) REFERENCES `tablas_terminado` (`id_tabla_term`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sucursal_optica`
--
ALTER TABLE `sucursal_optica`
  ADD CONSTRAINT `sucursal_optica_ibfk_1` FOREIGN KEY (`id_optica`) REFERENCES `optica` (`id_optica`),
  ADD CONSTRAINT `sucursal_optica_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tratamiento_orden`
--
ALTER TABLE `tratamiento_orden`
  ADD CONSTRAINT `tratamiento_orden_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `orden` (`codigo`);

--
-- Filtros para la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `id_permiso` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
