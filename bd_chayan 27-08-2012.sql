-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-08-2012 a las 23:27:51
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_chayan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresia`
--

CREATE TABLE IF NOT EXISTS `membresia` (
  `idmembresia` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `idtipocriterio` int(11) NOT NULL,
  `tipo` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'I->entrada, O->Salida',
  `tipocontrol` char(1) COLLATE utf8_spanish_ci NOT NULL COMMENT 'O->Opcion, V->valor',
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`idmembresia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `membresia`
--

INSERT INTO `membresia` (`idmembresia`, `descripcion`, `comentario`, `idtipocriterio`, `tipo`, `tipocontrol`, `estado`) VALUES
(1, 'EDAD DEL PACIENTE', 'EDAD', 1, 'I', 'V', 'N'),
(2, 'HERENCIA FAMILIAR', 'ANTECEDENTES DE ENFERMEDAD POR HERENCIA FAMILIAR', 1, 'I', 'O', 'N'),
(3, 'OBECIDAD DEL PACIENTE', 'AUMENTO DE MASA CORPORAL DEL PACIENTE', 1, 'I', 'O', 'N'),
(4, 'REALIZA EJERCICIOS', 'ACTIVIDAD FISICA DEL PACIENTE DE 0 A 40 MIN', 1, 'I', 'V', 'N'),
(5, 'CANTIDAD DE CIGARROS', 'CANTIDAD DE CIGARRILLOS QUE CONSUME EL PACIENTE', 1, 'I', 'V', 'N'),
(6, 'AUMENTO DE ORINA', 'AUMENTO DE ORINA EN EL PACIENTE', 1, 'I', 'O', 'N'),
(7, 'AUMENTO DE SED', 'EL PACIENTE PRESENTA AUMENTO DE CONSUMO DE LIQUIDO', 1, 'I', 'O', 'N'),
(8, 'AUMENTO DE HAMBRE', 'AUMENTO DE APETITO DEL PACIENTE', 1, 'I', 'O', 'N'),
(9, 'VISION BORROSA', 'PRESENTA CEGUERA EL PACIENTE', 1, 'I', 'O', 'N'),
(10, 'PRESENTA FATIGA', 'PACIENTE PRESENTA CANSANCIO CONSECUTIVAMENTE', 1, 'I', 'O', 'N'),
(11, 'ENTUSIMIENTO MANOS Y PIES', '', 1, 'I', 'O', 'N'),
(12, 'INFECCIONES DE VEJIGA, RIÑÓN ', 'HERIDAS NO SANAN DESPUÉS DE MUCHO TIEMPO', 1, 'I', 'O', 'N'),
(13, 'PRESENTA MANCHAS', '', 1, 'I', 'O', 'N'),
(14, 'ENFERMEDAD POR HERENCIA', 'FAMILIARES PRESENTA DEL PACIENTE PRESENTA ENFERMEDAD', 2, 'O', 'V', 'N'),
(15, 'INDICE DE MASA CORPORAL', '', 2, 'O', 'V', 'N'),
(16, 'CONDICIÓN FISICA', '', 2, 'O', 'V', 'N'),
(17, 'ADICIÓN POR LOS CIGARRILLOS', '', 2, 'O', 'V', 'N'),
(18, 'MICCIÓN FRECUENTE', 'AUMENTO DE ORINA DEL PACIENTE', 2, 'O', 'V', 'N'),
(19, 'AUMENTO DE SED Y OBECIDAD', '', 2, 'O', 'V', 'N'),
(20, 'AUMENTO DE APETITO', '', 2, 'O', 'V', 'N'),
(21, 'PERDIDA DE VISIÓN', 'PACIENTE TIENE VISIÓN BORROSA', 2, 'O', 'V', 'N'),
(22, 'PERDIDA DE SENSACIÓN', 'PACIENTE ESTA PERDIENDO ', 2, 'O', 'V', 'N'),
(23, 'INFECCIONES Y MANCHAS', '', 2, 'O', 'V', 'N'),
(24, 'PESO EXCESIVO', '', 3, 'O', 'V', 'N'),
(25, 'SALUDABLE PACIENTE', '', 3, 'O', 'V', 'N'),
(26, 'MICCIÓN FRECUENTE DE PACIENTE', '', 3, 'O', 'V', 'N'),
(27, 'VISIÓN Y SENSACIÓN ', '', 3, 'O', 'V', 'N'),
(28, 'PIE DIABETICO', '', 3, 'O', 'V', 'N'),
(29, 'CONTROL DE PESO', '', 4, 'O', 'V', 'N'),
(30, 'ALIMENTACIÓN DE PACIENTE', '', 4, 'O', 'V', 'N'),
(31, 'INFECCIONES FRECUENTE', '', 4, 'O', 'V', 'N'),
(32, 'DIABETIS', '', 5, 'O', 'V', 'N'),
(33, 'SINTOMAS DE LAS P', 'POLIURIA, POLIDIPSIA, POLIFASIA', 5, 'O', 'V', 'N'),
(34, 'DIABETES MILITUS 2', '', 6, 'O', 'V', 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE IF NOT EXISTS `parametro` (
  `idparametro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `valor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idparametro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`idparametro`, `nombre`, `descripcion`, `valor`) VALUES
(1, 'MEMBRESIA DE SALIDA FINAL', 'MEMBRESIA DE SALIDA FINAL', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'P' COMMENT 'P->Paciente, M->Medico (incluye al administrador)',
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `apellidopaterno` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellidomaterno` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fechanacimiento` date NOT NULL,
  `lugarnacimiento` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nrodoc` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estadocivil` char(1) COLLATE utf8_spanish_ci NOT NULL COMMENT 'S->Soltero,C->Casado,D->Divorsiado,V-Viudo',
  `telefonofijo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `celular` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idpersona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `tipo`, `codigo`, `apellidopaterno`, `apellidomaterno`, `nombres`, `fechanacimiento`, `lugarnacimiento`, `sexo`, `nrodoc`, `direccion`, `estadocivil`, `telefonofijo`, `celular`, `email`, `estado`, `foto`) VALUES
(1, 'M', '001', 'MONTENEGRO', 'COCHAS', 'GEYNEN', '1987-10-07', 'Lonya Grande', 'M', '44611543', 'Jr.Colombia 217 Chiclayo', 'S', '', '979368623', 'geynen_0710@hotmail.com', 'N', ''),
(2, 'P', '002', 'QUINTANA', 'PEREZ', 'RONNIE', '2011-11-24', '', 'M', '11111111', 'XX', 'S', 'x', 'x', 'x', 'N', ''),
(6, 'M', '000003', 'MONTENEGRO', 'COCHAS', 'JEFFER', '2011-12-12', '', 'M', '43434343', '', 'S', '', '', '', 'N', ''),
(7, 'P', '003', 'TINEO', 'CONTRERAS', 'RICARDO', '1965-01-01', 'chiclayo', 'M', '11111111', 'xxx', 'S', '', '', '', 'N', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reglas`
--

CREATE TABLE IF NOT EXISTS `reglas` (
  `idregla` int(11) NOT NULL AUTO_INCREMENT,
  `membresia_input1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `variable_input1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `operadorlogico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `membresia_input2` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `variable_input2` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `membresia_output` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `variable_output` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idregla`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=336 ;

--
-- Volcado de datos para la tabla `reglas`
--

INSERT INTO `reglas` (`idregla`, `membresia_input1`, `variable_input1`, `operadorlogico`, `membresia_input2`, `variable_input2`, `membresia_output`, `variable_output`) VALUES
(1, '1', '1', 'AND', '2', '5', '14', '53'),
(2, '1', '2', 'AND', '2', '5', '14', '53'),
(3, '1', '3', 'AND', '2', '5', '14', '53'),
(4, '1', '4', 'AND', '2', '5', '14', '53'),
(5, '1', '1', 'AND', '2', '6', '14', '54'),
(6, '1', '2', 'AND', '2', '6', '14', '54'),
(7, '1', '3', 'AND', '2', '6', '14', '54'),
(8, '1', '4', 'AND', '2', '6', '14', '54'),
(9, '1', '1', 'AND', '2', '7', '14', '54'),
(10, '1', '2', 'AND', '2', '7', '14', '54'),
(11, '1', '3', 'AND', '2', '7', '14', '55'),
(12, '1', '4', 'AND', '2', '7', '14', '55'),
(13, '1', '1', 'AND', '2', '8', '14', '55'),
(14, '1', '2', 'AND', '2', '8', '14', '55'),
(15, '1', '3', 'AND', '2', '8', '14', '56'),
(16, '1', '4', 'AND', '2', '8', '14', '56'),
(17, '1', '1', 'AND', '3', '9', '15', '57'),
(18, '1', '2', 'AND', '3', '9', '15', '57'),
(19, '1', '3', 'AND', '3', '9', '15', '57'),
(20, '1', '4', 'AND', '3', '9', '15', '57'),
(21, '1', '1', 'AND', '3', '10', '15', '57'),
(22, '1', '2', 'AND', '3', '10', '15', '57'),
(23, '1', '3', 'AND', '3', '10', '15', '58'),
(24, '1', '4', 'AND', '3', '10', '15', '58'),
(25, '1', '1', 'AND', '3', '11', '15', '59'),
(26, '1', '2', 'AND', '3', '11', '15', '59'),
(27, '1', '3', 'AND', '3', '11', '15', '60'),
(28, '1', '4', 'AND', '3', '11', '15', '60'),
(29, '1', '1', 'AND', '3', '12', '15', '60'),
(30, '1', '2', 'AND', '3', '12', '15', '60'),
(31, '1', '3', 'AND', '3', '12', '15', '60'),
(32, '1', '4', 'AND', '3', '12', '15', '60'),
(33, '1', '1', 'AND', '4', '13', '16', '61'),
(34, '1', '2', 'AND', '4', '13', '16', '61'),
(35, '1', '3', 'AND', '4', '13', '16', '61'),
(36, '1', '4', 'AND', '4', '13', '16', '61'),
(37, '1', '1', 'AND', '4', '14', '16', '61'),
(38, '1', '2', 'AND', '4', '14', '16', '61'),
(39, '1', '3', 'AND', '4', '14', '16', '62'),
(40, '1', '4', 'AND', '4', '14', '16', '62'),
(41, '1', '1', 'AND', '4', '15', '16', '63'),
(42, '1', '2', 'AND', '4', '15', '16', '63'),
(43, '1', '3', 'AND', '4', '15', '16', '63'),
(44, '1', '4', 'AND', '4', '15', '16', '63'),
(45, '1', '1', 'AND', '4', '16', '16', '64'),
(46, '1', '2', 'AND', '4', '16', '16', '64'),
(47, '1', '3', 'AND', '4', '16', '16', '64'),
(48, '1', '4', 'AND', '4', '16', '16', '64'),
(49, '1', '1', 'AND', '5', '17', '17', '65'),
(50, '1', '2', 'AND', '5', '17', '17', '65'),
(51, '1', '3', 'AND', '5', '17', '17', '65'),
(52, '1', '4', 'AND', '5', '17', '17', '65'),
(53, '1', '1', 'AND', '5', '18', '17', '65'),
(54, '1', '2', 'AND', '5', '18', '17', '65'),
(55, '1', '3', 'AND', '5', '18', '17', '66'),
(56, '1', '4', 'AND', '5', '18', '17', '66'),
(57, '1', '1', 'AND', '5', '19', '17', '67'),
(58, '1', '2', 'AND', '5', '19', '17', '67'),
(59, '1', '3', 'AND', '5', '19', '17', '67'),
(60, '1', '4', 'AND', '5', '19', '17', '68'),
(61, '1', '1', 'AND', '5', '20', '17', '67'),
(62, '1', '2', 'AND', '5', '20', '17', '68'),
(63, '1', '3', 'AND', '5', '20', '17', '68'),
(64, '1', '4', 'AND', '5', '20', '17', '68'),
(65, '1', '1', 'AND', '6', '21', '18', '69'),
(66, '1', '2', 'AND', '6', '21', '18', '69'),
(67, '1', '3', 'AND', '6', '21', '18', '69'),
(68, '1', '4', 'AND', '6', '21', '18', '69'),
(69, '1', '1', 'AND', '6', '22', '18', '69'),
(70, '1', '2', 'AND', '6', '22', '18', '69'),
(71, '1', '3', 'AND', '6', '22', '18', '70'),
(72, '1', '4', 'AND', '6', '22', '18', '70'),
(73, '1', '1', 'AND', '6', '23', '18', '70'),
(74, '1', '2', 'AND', '6', '23', '18', '70'),
(75, '1', '3', 'AND', '6', '23', '18', '71'),
(76, '1', '4', 'AND', '6', '23', '18', '71'),
(77, '1', '1', 'AND', '6', '24', '18', '71'),
(78, '1', '2', 'AND', '6', '24', '18', '72'),
(79, '1', '3', 'AND', '6', '24', '18', '72'),
(80, '1', '4', 'AND', '6', '24', '18', '72'),
(81, '7', '25', 'AND', '3', '9', '19', '73'),
(82, '7', '26', 'AND', '3', '9', '19', '73'),
(83, '7', '27', 'AND', '3', '9', '19', '73'),
(84, '7', '28', 'AND', '3', '9', '19', '73'),
(85, '7', '25', 'AND', '3', '10', '19', '73'),
(86, '7', '26', 'AND', '3', '10', '19', '73'),
(87, '7', '27', 'AND', '3', '10', '19', '75'),
(88, '7', '28', 'AND', '3', '10', '19', '75'),
(89, '7', '25', 'AND', '3', '11', '19', '74'),
(90, '7', '26', 'AND', '3', '11', '19', '74'),
(91, '7', '27', 'AND', '3', '11', '19', '75'),
(92, '7', '28', 'AND', '3', '11', '19', '75'),
(93, '7', '25', 'AND', '3', '12', '19', '75'),
(94, '7', '26', 'AND', '3', '12', '19', '75'),
(95, '7', '27', 'AND', '3', '12', '19', '76'),
(96, '7', '28', 'AND', '3', '12', '19', '76'),
(97, '1', '1', 'AND', '8', '29', '20', '77'),
(98, '1', '2', 'AND', '8', '29', '20', '77'),
(99, '1', '3', 'AND', '8', '29', '20', '77'),
(100, '1', '4', 'AND', '8', '29', '20', '77'),
(101, '1', '1', 'AND', '8', '30', '20', '77'),
(102, '1', '2', 'AND', '8', '30', '20', '77'),
(103, '1', '3', 'AND', '8', '30', '20', '78'),
(104, '1', '4', 'AND', '8', '30', '20', '78'),
(105, '1', '1', 'AND', '8', '31', '20', '78'),
(106, '1', '2', 'AND', '8', '31', '20', '79'),
(107, '1', '3', 'AND', '8', '31', '20', '79'),
(108, '1', '4', 'AND', '8', '31', '20', '79'),
(109, '1', '1', 'AND', '8', '32', '20', '79'),
(110, '1', '2', 'AND', '8', '32', '20', '79'),
(111, '1', '3', 'AND', '8', '32', '20', '80'),
(112, '1', '4', 'AND', '8', '32', '20', '80'),
(113, '1', '1', 'AND', '9', '33', '21', '81'),
(114, '1', '2', 'AND', '9', '33', '21', '81'),
(115, '1', '3', 'AND', '9', '33', '21', '81'),
(116, '1', '4', 'AND', '9', '33', '21', '81'),
(117, '1', '1', 'AND', '9', '34', '21', '81'),
(118, '1', '2', 'AND', '9', '34', '21', '81'),
(119, '1', '3', 'AND', '9', '34', '21', '82'),
(120, '1', '4', 'AND', '9', '34', '21', '82'),
(121, '1', '1', 'AND', '9', '35', '21', '82'),
(122, '1', '2', 'AND', '9', '35', '21', '82'),
(123, '1', '3', 'AND', '9', '35', '21', '83'),
(124, '1', '4', 'AND', '9', '35', '21', '83'),
(125, '1', '1', 'AND', '9', '36', '21', '83'),
(126, '1', '2', 'AND', '9', '36', '21', '83'),
(127, '1', '3', 'AND', '9', '36', '21', '84'),
(128, '1', '4', 'AND', '9', '36', '21', '84'),
(129, '10', '37', 'AND', '11', '41', '22', '85'),
(130, '10', '38', 'AND', '11', '41', '22', '85'),
(131, '10', '39', 'AND', '11', '41', '22', '85'),
(132, '10', '40', 'AND', '11', '41', '22', '85'),
(133, '10', '37', 'AND', '11', '42', '22', '85'),
(134, '10', '38', 'AND', '11', '42', '22', '85'),
(135, '10', '39', 'AND', '11', '42', '22', '86'),
(136, '10', '40', 'AND', '11', '42', '22', '86'),
(137, '10', '37', 'AND', '11', '43', '22', '86'),
(138, '10', '38', 'AND', '11', '43', '22', '86'),
(139, '10', '39', 'AND', '11', '43', '22', '87'),
(140, '10', '40', 'AND', '11', '43', '22', '87'),
(141, '10', '37', 'AND', '11', '44', '22', '87'),
(142, '10', '38', 'AND', '11', '44', '22', '87'),
(143, '10', '39', 'AND', '11', '44', '22', '88'),
(144, '10', '40', 'AND', '11', '44', '22', '88'),
(145, '12', '45', 'AND', '13', '49', '23', '89'),
(146, '12', '46', 'AND', '13', '50', '23', '89'),
(147, '12', '47', 'AND', '13', '49', '23', '89'),
(148, '12', '48', 'AND', '13', '49', '23', '89'),
(149, '12', '45', 'AND', '13', '50', '23', '89'),
(150, '12', '46', 'AND', '13', '50', '23', '89'),
(151, '12', '47', 'AND', '13', '50', '23', '90'),
(152, '12', '48', 'AND', '13', '50', '23', '90'),
(153, '12', '45', 'AND', '13', '51', '23', '90'),
(154, '12', '46', 'AND', '13', '51', '23', '90'),
(155, '12', '47', 'AND', '13', '51', '23', '91'),
(156, '12', '48', 'AND', '13', '51', '23', '91'),
(157, '12', '45', 'AND', '13', '52', '23', '91'),
(158, '12', '46', 'AND', '13', '52', '23', '91'),
(159, '12', '47', 'AND', '13', '52', '23', '92'),
(160, '12', '48', 'AND', '13', '52', '23', '92'),
(161, '14', '53', 'AND', '15', '57', '24', '93'),
(162, '14', '54', 'AND', '15', '57', '24', '93'),
(163, '14', '55', 'AND', '15', '57', '24', '94'),
(164, '14', '56', 'AND', '15', '57', '24', '94'),
(165, '14', '53', 'AND', '15', '58', '24', '93'),
(166, '14', '54', 'AND', '15', '58', '24', '93'),
(167, '14', '55', 'AND', '15', '58', '24', '93'),
(168, '14', '56', 'AND', '15', '58', '24', '94'),
(169, '14', '53', 'AND', '15', '59', '24', '94'),
(170, '14', '54', 'AND', '15', '59', '24', '95'),
(171, '14', '55', 'AND', '15', '59', '24', '96'),
(172, '14', '56', 'AND', '15', '59', '24', '96'),
(173, '14', '53', 'AND', '15', '60', '24', '95'),
(174, '14', '54', 'AND', '15', '60', '24', '96'),
(175, '14', '55', 'AND', '15', '60', '24', '96'),
(176, '14', '56', 'AND', '15', '60', '24', '96'),
(177, '16', '61', 'AND', '17', '65', '25', '97'),
(178, '16', '62', 'AND', '17', '65', '25', '97'),
(179, '16', '63', 'AND', '17', '65', '25', '97'),
(180, '16', '64', 'AND', '17', '65', '25', '97'),
(181, '16', '61', 'AND', '17', '66', '25', '97'),
(182, '16', '62', 'AND', '17', '66', '25', '97'),
(183, '16', '63', 'AND', '17', '66', '25', '99'),
(184, '16', '64', 'AND', '17', '66', '25', '99'),
(185, '16', '61', 'AND', '17', '67', '25', '99'),
(186, '16', '62', 'AND', '17', '67', '25', '99'),
(187, '16', '63', 'AND', '17', '67', '25', '100'),
(188, '16', '64', 'AND', '17', '67', '25', '100'),
(189, '16', '61', 'AND', '17', '68', '25', '99'),
(190, '16', '62', 'AND', '17', '68', '25', '100'),
(191, '16', '63', 'AND', '17', '68', '25', '100'),
(192, '16', '64', 'AND', '17', '68', '25', '100'),
(193, '18', '69', 'AND', '20', '77', '26', '101'),
(194, '18', '70', 'AND', '20', '77', '26', '101'),
(195, '18', '71', 'AND', '20', '77', '26', '101'),
(196, '18', '72', 'AND', '20', '77', '26', '101'),
(197, '18', '69', 'AND', '20', '78', '26', '101'),
(198, '18', '70', 'AND', '20', '78', '26', '101'),
(199, '18', '71', 'AND', '20', '78', '26', '102'),
(200, '18', '72', 'AND', '20', '78', '26', '102'),
(201, '18', '69', 'AND', '20', '79', '26', '102'),
(202, '18', '70', 'AND', '20', '79', '26', '102'),
(203, '18', '71', 'AND', '20', '79', '26', '103'),
(204, '18', '72', 'AND', '20', '79', '26', '103'),
(205, '18', '69', 'AND', '20', '80', '26', '103'),
(206, '18', '70', 'AND', '20', '80', '26', '103'),
(207, '18', '71', 'AND', '20', '80', '26', '104'),
(208, '18', '72', 'AND', '20', '80', '26', '104'),
(209, '21', '81', 'AND', '22', '85', '27', '105'),
(210, '21', '82', 'AND', '22', '85', '27', '105'),
(211, '21', '83', 'AND', '22', '85', '27', '105'),
(212, '21', '84', 'AND', '22', '85', '27', '105'),
(213, '21', '81', 'AND', '22', '86', '27', '105'),
(214, '21', '82', 'AND', '22', '86', '27', '105'),
(215, '21', '83', 'AND', '22', '86', '27', '106'),
(216, '21', '84', 'AND', '22', '86', '27', '106'),
(217, '21', '81', 'AND', '22', '87', '27', '106'),
(218, '21', '82', 'AND', '22', '87', '27', '106'),
(219, '21', '83', 'AND', '22', '87', '27', '107'),
(220, '21', '84', 'AND', '22', '87', '27', '107'),
(221, '21', '81', 'AND', '22', '88', '27', '107'),
(222, '21', '82', 'AND', '22', '88', '27', '107'),
(223, '21', '83', 'AND', '22', '88', '27', '108'),
(224, '21', '84', 'AND', '22', '88', '27', '108'),
(225, '20', '77', 'AND', '23', '89', '28', '109'),
(226, '20', '78', 'AND', '23', '89', '28', '109'),
(227, '20', '79', 'AND', '23', '89', '28', '109'),
(228, '20', '80', 'AND', '23', '89', '28', '109'),
(229, '20', '77', 'AND', '23', '90', '28', '109'),
(230, '20', '78', 'AND', '23', '90', '28', '109'),
(231, '20', '79', 'AND', '23', '90', '28', '110'),
(232, '20', '80', 'AND', '23', '90', '28', '110'),
(233, '20', '77', 'AND', '23', '91', '28', '110'),
(234, '20', '78', 'AND', '23', '91', '28', '110'),
(235, '20', '79', 'AND', '23', '91', '28', '111'),
(236, '20', '80', 'AND', '23', '91', '28', '111'),
(237, '20', '77', 'AND', '23', '92', '28', '111'),
(238, '20', '78', 'AND', '23', '92', '28', '111'),
(239, '20', '79', 'AND', '23', '92', '28', '112'),
(240, '20', '80', 'AND', '23', '92', '28', '112'),
(242, '1', '1', 'AND', '24', '93', '29', '113'),
(243, '1', '2', 'AND', '24', '93', '29', '113'),
(244, '1', '3', 'AND', '24', '93', '29', '113'),
(245, '1', '4', 'AND', '24', '93', '29', '113'),
(246, '1', '1', 'AND', '24', '94', '29', '113'),
(247, '1', '2', 'AND', '24', '94', '29', '113'),
(248, '1', '3', 'AND', '24', '94', '29', '114'),
(249, '1', '4', 'AND', '24', '94', '29', '114'),
(250, '1', '1', 'AND', '24', '95', '29', '115'),
(251, '1', '2', 'AND', '24', '95', '29', '115'),
(252, '1', '3', 'AND', '24', '95', '29', '116'),
(253, '1', '4', 'AND', '24', '95', '29', '116'),
(254, '1', '1', 'AND', '24', '96', '29', '115'),
(255, '1', '2', 'AND', '24', '96', '29', '116'),
(256, '1', '3', 'AND', '24', '96', '29', '116'),
(257, '1', '4', 'AND', '24', '96', '29', '116'),
(258, '25', '97', 'AND', '26', '101', '30', '117'),
(259, '25', '98', 'AND', '26', '101', '30', '117'),
(260, '25', '99', 'AND', '26', '101', '30', '117'),
(261, '25', '100', 'AND', '26', '101', '30', '117'),
(262, '25', '97', 'AND', '26', '102', '30', '117'),
(263, '25', '98', 'AND', '26', '102', '30', '117'),
(264, '25', '99', 'AND', '26', '102', '30', '118'),
(265, '25', '100', 'AND', '26', '102', '30', '118'),
(266, '25', '97', 'AND', '26', '103', '30', '119'),
(267, '25', '98', 'AND', '26', '103', '30', '119'),
(268, '25', '99', 'AND', '26', '103', '30', '120'),
(269, '25', '100', 'AND', '26', '103', '30', '120'),
(270, '25', '97', 'AND', '26', '104', '30', '119'),
(271, '25', '98', 'AND', '26', '104', '30', '120'),
(272, '25', '99', 'AND', '26', '104', '30', '120'),
(273, '25', '100', 'AND', '26', '104', '30', '120'),
(274, '27', '105', 'AND', '28', '109', '31', '121'),
(275, '27', '106', 'AND', '28', '109', '31', '121'),
(276, '27', '107', 'AND', '28', '109', '31', '121'),
(277, '27', '108', 'AND', '28', '109', '31', '121'),
(278, '27', '105', 'AND', '28', '110', '31', '121'),
(279, '27', '106', 'AND', '28', '110', '31', '122'),
(280, '27', '107', 'AND', '28', '110', '31', '123'),
(281, '27', '108', 'AND', '28', '110', '31', '123'),
(282, '27', '105', 'AND', '28', '111', '31', '122'),
(283, '27', '106', 'AND', '28', '111', '31', '123'),
(284, '27', '107', 'AND', '28', '111', '31', '123'),
(285, '27', '108', 'AND', '28', '111', '31', '123'),
(286, '27', '105', 'AND', '28', '112', '31', '122'),
(287, '27', '106', 'AND', '28', '112', '31', '124'),
(288, '27', '107', 'AND', '28', '112', '31', '124'),
(289, '27', '108', 'AND', '28', '112', '31', '124'),
(290, '1', '1', 'AND', '30', '117', '32', '125'),
(291, '1', '2', 'AND', '30', '117', '32', '125'),
(292, '1', '3', 'AND', '30', '117', '32', '125'),
(293, '1', '4', 'AND', '30', '117', '32', '125'),
(294, '1', '1', 'AND', '30', '118', '32', '125'),
(295, '1', '2', 'AND', '30', '118', '32', '125'),
(296, '1', '3', 'AND', '30', '118', '32', '125'),
(297, '1', '4', 'AND', '30', '118', '32', '125'),
(298, '1', '1', 'AND', '30', '119', '32', '126'),
(299, '1', '2', 'AND', '30', '119', '32', '126'),
(300, '1', '3', 'AND', '30', '119', '32', '127'),
(301, '1', '4', 'AND', '30', '119', '32', '127'),
(302, '1', '1', 'AND', '30', '120', '32', '126'),
(303, '1', '2', 'AND', '30', '120', '32', '128'),
(304, '1', '3', 'AND', '30', '120', '32', '128'),
(305, '1', '4', 'AND', '30', '120', '32', '128'),
(306, '29', '113', 'AND', '31', '121', '33', '129'),
(307, '29', '114', 'AND', '31', '121', '33', '129'),
(308, '29', '115', 'AND', '31', '121', '33', '130'),
(309, '29', '116', 'AND', '31', '121', '33', '130'),
(310, '29', '113', 'AND', '31', '122', '33', '130'),
(311, '29', '114', 'AND', '31', '122', '33', '130'),
(312, '29', '115', 'AND', '31', '122', '33', '131'),
(313, '29', '116', 'AND', '31', '122', '33', '131'),
(314, '29', '113', 'AND', '31', '123', '33', '131'),
(315, '29', '114', 'AND', '31', '123', '33', '131'),
(316, '29', '115', 'AND', '31', '123', '33', '132'),
(317, '29', '116', 'AND', '31', '123', '33', '132'),
(318, '29', '113', 'AND', '31', '124', '33', '131'),
(319, '29', '114', 'AND', '31', '124', '33', '132'),
(320, '29', '115', 'AND', '31', '124', '33', '132'),
(321, '29', '116', 'AND', '31', '124', '33', '132'),
(322, '32', '125', 'AND', '33', '129', '34', '133'),
(323, '32', '126', 'AND', '33', '129', '34', '133'),
(324, '32', '127', 'AND', '33', '129', '34', '134'),
(325, '32', '128', 'AND', '33', '129', '34', '134'),
(326, '32', '125', 'AND', '33', '130', '34', '133'),
(327, '32', '126', 'AND', '33', '130', '34', '134'),
(328, '32', '127', 'AND', '33', '130', '34', '134'),
(329, '32', '128', 'AND', '33', '130', '34', '135'),
(330, '32', '125', 'AND', '33', '131', '34', '135'),
(331, '32', '126', 'AND', '33', '131', '34', '135'),
(332, '32', '127', 'AND', '33', '131', '34', '136'),
(333, '32', '128', 'AND', '33', '131', '34', '136'),
(334, '32', '125', 'AND', '33', '132', '34', '135'),
(335, '32', '126', 'AND', '33', '132', '34', '136');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE IF NOT EXISTS `respuestas` (
  `idrespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(11) NOT NULL,
  `idmembresia` int(11) NOT NULL,
  `idvariable` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idrespuesta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=66 ;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`idrespuesta`, `idpersona`, `idmembresia`, `idvariable`, `valor`) VALUES
(1, 1, 1, 0, '40.00'),
(2, 1, 2, 8, '90.00'),
(3, 1, 3, 11, '25.00'),
(4, 1, 4, 0, '10.00'),
(5, 1, 5, 0, '17.00'),
(6, 1, 6, 24, '90.00'),
(7, 1, 7, 27, '240.00'),
(8, 1, 8, 31, '60.00'),
(9, 1, 9, 36, '90.00'),
(10, 1, 10, 39, '60.00'),
(11, 1, 11, 41, '25.00'),
(12, 1, 12, 48, '85.00'),
(13, 1, 13, 51, '120.00'),
(14, 2, 1, 0, '40.00'),
(15, 2, 2, 6, '35.00'),
(16, 2, 3, 11, '25.00'),
(17, 2, 4, 0, '0.00'),
(18, 2, 5, 0, '0.00'),
(19, 2, 6, 23, '60.00'),
(20, 2, 7, 27, '240.00'),
(21, 2, 8, 30, '30.00'),
(22, 2, 9, 34, '30.00'),
(23, 2, 10, 39, '60.00'),
(24, 2, 11, 42, '70.00'),
(25, 2, 12, 46, '30.00'),
(26, 2, 13, 51, '120.00'),
(27, 6, 1, 0, '50.00'),
(28, 6, 2, 7, '65.00'),
(29, 6, 3, 11, '25.00'),
(30, 6, 4, 0, '10.00'),
(31, 6, 5, 0, '20.00'),
(32, 6, 6, 22, '30.00'),
(33, 6, 7, 27, '240.00'),
(34, 6, 8, 32, '90.00'),
(35, 6, 9, 35, '60.00'),
(36, 6, 10, 39, '60.00'),
(37, 6, 11, 42, '70.00'),
(38, 6, 12, 47, '60.00'),
(39, 6, 13, 50, '70.00'),
(40, 7, 1, 0, '70.00'),
(41, 7, 2, 7, '65.00'),
(42, 7, 3, 10, '19.00'),
(43, 7, 4, 0, '0.00'),
(44, 7, 5, 0, '15.00'),
(45, 7, 6, 23, '60.00'),
(46, 7, 7, 27, '240.00'),
(47, 7, 8, 30, '30.00'),
(48, 7, 9, 34, '30.00'),
(49, 7, 10, 38, '30.00'),
(50, 7, 11, 42, '70.00'),
(51, 7, 12, 46, '30.00'),
(52, 7, 13, 49, '25.00'),
(53, 7, 1, 0, '65.00'),
(54, 7, 2, 8, '90.00'),
(55, 7, 3, 11, '25.00'),
(56, 7, 4, 0, '5.00'),
(57, 7, 5, 0, '18.00'),
(58, 7, 6, 23, '60.00'),
(59, 7, 7, 28, '320.00'),
(60, 7, 8, 32, '90.00'),
(61, 7, 9, 34, '30.00'),
(62, 7, 10, 39, '60.00'),
(63, 7, 11, 43, '120.00'),
(64, 7, 12, 47, '60.00'),
(65, 7, 13, 50, '70.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_criterio`
--

CREATE TABLE IF NOT EXISTS `tipo_criterio` (
  `idtipocriterio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipocriterio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tipo_criterio`
--

INSERT INTO `tipo_criterio` (`idtipocriterio`, `descripcion`, `comentario`, `estado`) VALUES
(1, 'DATOS DEL PACIENTE', '', 'N'),
(2, 'PROCESO DE EVALUACIÓN 1', '', 'N'),
(3, 'PROCESO DE EVALUACIÓN 2', 'FASE 2 DEL PROCESO DE EVALUACIÓN', 'N'),
(4, 'PROCESO DE EVALUACIÓN 3', 'FASE 3 DEL PROCESO DE EVALUACIÓN', 'N'),
(5, 'PROCESO DE EVALUACIÓN 4', 'FASE 4 DEL PROCESO DE EVALUACIÓN', 'N'),
(6, 'PROCESO DE EVALUACIÓN 5', 'FASE 5 DEL PROCESO DE EVALUACIÓN', 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_membresia`
--

CREATE TABLE IF NOT EXISTS `tipo_membresia` (
  `idtipomembresia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` varchar(10000) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipomembresia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipo_membresia`
--

INSERT INTO `tipo_membresia` (`idtipomembresia`, `nombre`, `comentario`) VALUES
(1, 'LINFINITY', ''),
(2, 'TRIANGLE', ''),
(3, 'RINFINITY', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idtipousuario`, `descripcion`, `estado`) VALUES
(1, 'Administrador', 'N'),
(2, 'Médico', 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(11) NOT NULL,
  `login` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idpersona`, `login`, `clave`, `idtipousuario`) VALUES
(1, 1, 'admin', '202cb962ac59075b964b07152d234b70', 1),
(2, 6, 'medico', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variable_linguistica`
--

CREATE TABLE IF NOT EXISTS `variable_linguistica` (
  `idvariable` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `valorinicial` decimal(10,2) NOT NULL,
  `valormedio` decimal(10,2) NOT NULL,
  `valorfinal` decimal(10,2) NOT NULL,
  `idtipomembresia` int(11) NOT NULL,
  `idmembresia` int(11) NOT NULL,
  PRIMARY KEY (`idvariable`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=137 ;

--
-- Volcado de datos para la tabla `variable_linguistica`
--

INSERT INTO `variable_linguistica` (`idvariable`, `nombre`, `valorinicial`, `valormedio`, `valorfinal`, `idtipomembresia`, `idmembresia`) VALUES
(1, 'NIÑEZ', '0.00', '7.00', '12.00', 1, 1),
(2, 'ADOLECENTE - JOVEN', '10.00', '20.00', '29.00', 2, 1),
(3, 'ADULTO', '25.00', '42.00', '60.00', 2, 1),
(4, 'VIEJO', '50.00', '65.00', '80.00', 3, 1),
(5, 'NO TIENE', '0.00', '10.00', '25.00', 1, 2),
(6, 'SOLO DE MADRE', '15.00', '35.00', '55.00', 2, 2),
(7, 'PADRE Y MADRE', '45.00', '65.00', '85.00', 2, 2),
(8, 'CASI TODA LA FAMILIA', '75.00', '90.00', '100.00', 3, 2),
(9, 'BAJO', '0.00', '9.00', '18.50', 1, 3),
(10, 'REGULAR', '15.00', '19.00', '24.00', 2, 3),
(11, 'ELEVADO', '20.00', '25.00', '29.90', 2, 3),
(12, 'MUY ELEVADO', '27.00', '30.00', '35.00', 3, 3),
(13, 'MUY POCO ', '0.00', '4.00', '10.00', 1, 4),
(14, 'POCO ', '8.00', '14.00', '20.00', 2, 4),
(15, 'SI HACE', '17.00', '23.00', '30.00', 2, 4),
(16, 'HACE CON FRECUENCIA ', '26.00', '32.00', '40.00', 3, 4),
(17, 'NO CONSUME', '0.00', '1.00', '3.00', 1, 5),
(18, 'CONSUME POCO ', '2.00', '5.00', '10.00', 2, 5),
(19, 'CONSUME REGULAR  ', '7.00', '14.00', '20.00', 2, 5),
(20, 'CONSUME DEMASIADO ', '17.00', '24.00', '30.00', 3, 5),
(21, 'NO PRESENTA', '0.00', '10.00', '25.00', 1, 6),
(22, 'PRESENTA POCO', '15.00', '30.00', '50.00', 2, 6),
(23, 'PRESENTA', '40.00', '60.00', '80.00', 2, 6),
(24, 'TIENE MUCHA', '70.00', '90.00', '100.00', 3, 6),
(25, 'POCO', '0.00', '50.00', '100.00', 1, 7),
(26, 'NORMAL', '70.00', '140.00', '200.00', 2, 7),
(27, 'TIENE SED ', '170.00', '240.00', '300.00', 2, 7),
(28, 'MUCHA SED', '260.00', '320.00', '350.00', 3, 7),
(29, 'NO PRESENTA', '0.00', '10.00', '25.00', 1, 8),
(30, 'PRESENTA', '15.00', '30.00', '50.00', 2, 8),
(31, 'SIEMPRE', '40.00', '60.00', '80.00', 2, 8),
(32, 'CASI SIEMPRE', '70.00', '90.00', '100.00', 3, 8),
(33, 'NO PRESENTA', '0.00', '10.00', '25.00', 1, 9),
(34, 'PRESENTA POCO', '15.00', '30.00', '50.00', 2, 9),
(35, 'PRESENTA DIFICUTAL', '40.00', '60.00', '80.00', 2, 9),
(36, 'TIENE MUCHA DIFICULTA', '70.00', '90.00', '100.00', 3, 9),
(37, 'NO PRESENTA', '0.00', '10.00', '20.00', 1, 10),
(38, 'PRESENTA POCO', '15.00', '30.00', '50.00', 2, 10),
(39, 'SI PRESENTA', '40.00', '60.00', '80.00', 2, 10),
(40, 'TIENE MUCHA', '70.00', '90.00', '100.00', 3, 10),
(41, 'NO TIENE', '0.00', '25.00', '50.00', 1, 11),
(42, 'TIENE POCO', '35.00', '70.00', '100.00', 2, 11),
(43, 'SI TIENE', '80.00', '120.00', '150.00', 2, 11),
(44, 'TIENE MUCHO', '135.00', '170.00', '200.00', 3, 11),
(45, 'NO PRESENTA', '0.00', '10.00', '20.00', 1, 12),
(46, 'PRESENTA POCO', '15.00', '30.00', '50.00', 2, 12),
(47, 'SI PRESENTA', '40.00', '60.00', '80.00', 2, 12),
(48, 'SI TIENE', '70.00', '85.00', '100.00', 2, 12),
(49, 'NO TIENE', '0.00', '25.00', '50.00', 1, 13),
(50, 'TIENE POCO', '37.00', '70.00', '100.00', 2, 13),
(51, 'SI TIENE', '85.00', '120.00', '150.00', 2, 13),
(52, 'TIENE MUCHO', '137.00', '170.00', '200.00', 3, 13),
(53, 'NO PRESENTA', '0.00', '10.00', '25.00', 1, 14),
(54, 'PUEDE PRESENTAR', '15.00', '35.00', '50.00', 2, 14),
(55, 'PRESENTA', '40.00', '60.00', '75.00', 2, 14),
(56, 'TIENE DIABETES', '65.00', '85.00', '100.00', 3, 14),
(57, 'BAJO PESO', '0.00', '9.00', '18.50', 1, 15),
(58, 'NORMAL', '15.00', '19.00', '24.00', 2, 15),
(59, 'SOBREPESO', '20.00', '25.00', '29.90', 2, 15),
(60, 'OBECIDAD', '27.00', '30.00', '35.00', 3, 15),
(61, 'NO ADECUADO', '0.00', '10.00', '26.00', 1, 16),
(62, 'POCO ADECUADO', '14.00', '32.00', '48.00', 2, 16),
(63, 'ADECUADO', '36.00', '54.00', '70.00', 2, 16),
(64, 'MUY ADECUADO', '62.00', '76.00', '100.00', 3, 16),
(65, 'NO TIENE', '0.00', '10.00', '20.00', 1, 17),
(66, 'PUEDE TENER', '15.00', '25.00', '35.00', 2, 17),
(67, 'SI TIENE', '30.00', '40.00', '50.00', 2, 17),
(68, 'TIENE MUCHA', '45.00', '55.00', '70.00', 3, 17),
(69, 'NO PRESENTA', '0.00', '10.00', '25.00', 1, 18),
(70, 'PRESENTA POCO', '14.00', '32.00', '48.00', 2, 18),
(71, 'PRESENTA', '36.00', '54.00', '70.00', 2, 18),
(72, 'TIENE MUCHA', '62.00', '76.00', '100.00', 3, 18),
(73, 'NORMAL', '0.00', '10.00', '20.00', 1, 19),
(74, 'ALGO ANORMAL', '15.00', '25.00', '35.00', 2, 19),
(75, 'ANORMAL', '30.00', '40.00', '50.00', 2, 19),
(76, 'MUY ANORMAL', '45.00', '55.00', '70.00', 3, 19),
(77, 'NO PRESENTA', '0.00', '10.00', '25.00', 1, 20),
(78, 'PRESENTA POCO', '15.00', '35.00', '50.00', 2, 20),
(79, 'PRESENTA', '40.00', '55.00', '75.00', 2, 20),
(80, 'SI PRESENTA', '65.00', '85.00', '100.00', 3, 20),
(81, 'NO TIENE', '0.00', '10.00', '20.00', 1, 21),
(82, 'TIENE POCO', '15.00', '25.00', '35.00', 2, 21),
(83, 'SI TIENE', '30.00', '40.00', '50.00', 2, 21),
(84, 'TIENE MUCHA', '45.00', '55.00', '70.00', 3, 21),
(85, 'NO PRESENTA', '0.00', '8.00', '20.00', 1, 22),
(86, 'PRESENTA POCO', '13.00', '28.00', '53.00', 2, 22),
(87, 'PRESENTA', '40.00', '60.00', '86.00', 2, 22),
(88, 'TIENE MUCHA', '79.00', '89.00', '100.00', 3, 22),
(89, 'NO PRESENTA', '0.00', '10.00', '20.00', 1, 23),
(90, 'PRESENTA POCO', '15.00', '25.00', '40.00', 2, 23),
(91, 'PRESENTA', '35.00', '45.00', '60.00', 2, 23),
(92, 'TIENE MUCHA', '55.00', '65.00', '70.00', 3, 23),
(93, 'NO PRESENTA', '0.00', '8.00', '20.00', 1, 24),
(94, 'PUEDE PRESENTAR', '13.00', '35.00', '53.00', 2, 24),
(95, 'PRESENTA', '46.00', '65.00', '90.00', 2, 24),
(96, 'MUCHO PESO', '75.00', '89.00', '100.00', 3, 24),
(97, 'MUY SALUDABLE', '0.00', '10.00', '25.00', 1, 25),
(98, 'SALUDABLE', '20.00', '35.00', '50.00', 2, 25),
(99, 'POCO SALUDABLE', '40.00', '55.00', '70.00', 2, 25),
(100, 'NADA SALUDABLE', '60.00', '75.00', '100.00', 3, 25),
(101, 'NO PRESENTA', '0.00', '10.00', '26.00', 1, 26),
(102, 'PUEDE PRESENTAR', '14.00', '32.00', '46.00', 2, 26),
(103, 'PRESENTA', '36.00', '54.00', '70.00', 2, 26),
(104, 'PRESENTA MUCHA', '62.00', '76.00', '100.00', 3, 26),
(105, 'NO PRESENTA', '0.00', '15.00', '25.00', 1, 27),
(106, 'PUEDE PRESENTAR', '20.00', '35.00', '50.00', 2, 27),
(107, 'PRESENTA', '45.00', '60.00', '75.00', 2, 27),
(108, 'PRESENTA MUCHA', '70.00', '85.00', '100.00', 3, 27),
(109, 'NO PRESENTA', '0.00', '10.00', '26.00', 1, 28),
(110, 'PUEDE PRESENTAR', '14.00', '32.00', '48.00', 2, 28),
(111, 'PRESENTA', '36.00', '54.00', '70.00', 2, 28),
(112, 'TIENE DIABETES', '62.00', '72.00', '100.00', 3, 28),
(113, 'MUY ADECUADO', '0.00', '10.00', '26.00', 1, 29),
(114, 'ADECUADO', '14.00', '32.00', '48.00', 2, 29),
(115, 'POCO ADECUADO', '34.00', '54.00', '70.00', 2, 29),
(116, 'NO ADECUADO', '62.00', '76.00', '100.00', 3, 29),
(117, 'TIENE BUENA', '0.00', '15.00', '25.00', 1, 30),
(118, 'SI TIENE', '20.00', '35.00', '50.00', 2, 30),
(119, 'PRESENTA POCO', '45.00', '60.00', '75.00', 2, 30),
(120, 'NO PRESENTA', '70.00', '85.00', '100.00', 3, 30),
(121, 'NO PRESENTA', '0.00', '10.00', '26.00', 1, 31),
(122, 'PUEDE PRESENTAR', '14.00', '32.00', '48.00', 2, 31),
(123, 'PRESENTA', '36.00', '54.00', '70.00', 2, 31),
(124, 'TIENE DEMASIADO', '62.00', '76.00', '100.00', 3, 31),
(125, 'NO PRESENTA', '0.00', '10.00', '26.00', 1, 32),
(126, 'PUEDE PRESENTAR', '14.00', '32.00', '48.00', 2, 32),
(127, 'PRESENTA', '36.00', '54.00', '70.00', 2, 32),
(128, 'TIENE DIABETES', '62.00', '76.00', '100.00', 3, 32),
(129, 'NO PRESENTA', '0.00', '15.00', '25.00', 1, 33),
(130, 'PUEDE PRESENTAR', '20.00', '35.00', '50.00', 2, 33),
(131, 'PRESENTA', '45.00', '60.00', '75.00', 2, 33),
(132, 'PRESENTA ELEVADO', '70.00', '85.00', '100.00', 3, 33),
(133, 'NO PRESENTA', '0.00', '15.00', '25.00', 1, 34),
(134, 'PUEDE PRESENTAR', '20.00', '35.00', '50.00', 2, 34),
(135, 'PRESENTA', '45.00', '60.00', '75.00', 2, 34),
(136, 'TIENE DIABETES', '70.00', '85.00', '100.00', 3, 34);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
