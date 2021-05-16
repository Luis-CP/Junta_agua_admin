-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2020 a las 13:58:33
-- Versión del servidor: 5.6.21-log
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pago_agua`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
`id_admin` int(1) NOT NULL,
  `usuario_admin` varchar(255) NOT NULL,
  `clave_admin` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `usuario_admin`, `clave_admin`) VALUES
(1, 'admin', '123'),
(2, 'leo', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartola`
--

CREATE TABLE IF NOT EXISTS `cartola` (
`id` int(11) NOT NULL,
  `idMedidor` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `socio` varchar(255) NOT NULL,
  `costo` varchar(255) NOT NULL,
  `mes` varchar(255) NOT NULL,
  `anio` int(4) NOT NULL,
  `estado` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cartola`
--

INSERT INTO `cartola` (`id`, `idMedidor`, `numero`, `direccion`, `socio`, `costo`, `mes`, `anio`, `estado`) VALUES
(1, 6, '1', 'la  mana ', '5', '1', 'enero', 2019, 1),
(2, 7, '2', 'latacunga', '6', '2', 'enero', 2019, 1),
(3, 9, '444', 'latacunga', '137', '3', 'enero', 2019, 1),
(4, 15, '999', 'Centro', '14', '4', 'enero', 2019, 1),
(5, 16, '777', 'centro', '18', '1', 'enero', 2019, 1),
(6, 17, '555', 'Universidad', '10', '2', 'enero', 2019, 1),
(7, 18, '2323', 'centro', '110', '3', 'enero', 2019, 1),
(8, 6, '1', 'la  mana ', '5', '9', 'febrero', 2019, 1),
(9, 7, '2', 'latacunga', '6', '8', 'febrero', 2019, 1),
(10, 9, '444', 'latacunga', '137', '7', 'febrero', 2019, 1),
(11, 15, '999', 'Centro', '14', '6', 'febrero', 2019, 1),
(12, 16, '777', 'centro', '18', '5', 'febrero', 2019, 0),
(13, 17, '555', 'Universidad', '10', '4', 'febrero', 2019, 1),
(14, 18, '2323', 'centro', '110', '3', 'febrero', 2019, 1),
(15, 6, '1', 'la  mana ', '5', '7', 'marzo', 2019, 1),
(16, 7, '2', 'latacunga', '6', '8', 'marzo', 2019, 0),
(17, 9, '444', 'latacunga', '137', '6', 'marzo', 2019, 1),
(18, 15, '999', 'Centro', '14', '5', 'marzo', 2019, 1),
(19, 16, '777', 'centro', '18', '4', 'marzo', 2019, 1),
(20, 17, '555', 'Universidad', '10', '3', 'marzo', 2019, 0),
(21, 18, '2323', 'centro', '110', '2', 'marzo', 2019, 1),
(22, 6, '1', 'la  mana ', '5', '1', 'abril', 2019, 1),
(23, 7, '2', 'latacunga', '6', '3', 'abril', 2019, 0),
(24, 9, '444', 'latacunga', '137', '4', 'abril', 2019, 1),
(25, 15, '999', 'Centro', '14', '5', 'abril', 2019, 0),
(26, 16, '777', 'centro', '18', '6', 'abril', 2019, 0),
(27, 17, '555', 'Universidad', '10', '7', 'abril', 2019, 0),
(28, 18, '2323', 'centro', '110', '8', 'abril', 2019, 0),
(29, 6, '1', 'la  mana ', '5', '12', 'mayo', 2019, 1),
(30, 7, '2', 'latacunga', '6', '13', 'mayo', 2019, 0),
(31, 9, '444', 'latacunga', '137', '14', 'mayo', 2019, 0),
(32, 15, '999', 'Centro', '14', '15', 'mayo', 2019, 0),
(33, 16, '777', 'centro', '18', '16', 'mayo', 2019, 0),
(34, 17, '555', 'Universidad', '10', '17', 'mayo', 2019, 0),
(35, 18, '2323', 'centro', '110', '18', 'mayo', 2019, 0),
(43, 6, '1', 'la  mana ', '5', '23', 'junio', 2019, 1),
(44, 7, '2', 'latacunga', '6', '21', 'junio', 2019, 0),
(45, 9, '444', 'latacunga', '137', '23', 'junio', 2019, 0),
(46, 15, '999', 'Centro', '14', '32', 'junio', 2019, 0),
(47, 16, '777', 'centro', '18', '12', 'junio', 2019, 0),
(48, 17, '555', 'Universidad', '10', '22', 'junio', 2019, 0),
(49, 18, '2323', 'centro', '110', '33', 'junio', 2019, 0),
(50, 19, '111', 'latacunga', '138', '12', 'junio', 2019, 0),
(51, 20, '222', 'latacunga', '138', '12', 'junio', 2019, 0),
(67, 6, '1', 'la  mana ', '5', '12', 'julio', 2019, 1),
(68, 7, '2', 'latacunga', '6', '23', 'julio', 2019, 0),
(69, 9, '444', 'latacunga', '137', '34', 'julio', 2019, 0),
(70, 15, '999', 'Centro', '14', '35', 'julio', 2019, 0),
(71, 16, '777', 'centro', '18', '23', 'julio', 2019, 0),
(72, 17, '555', 'Universidad', '10', '56', 'julio', 2019, 0),
(73, 18, '2323', 'centro', '110', '67', 'julio', 2019, 0),
(74, 19, '111', 'latacunga', '138', '76', 'julio', 2019, 0),
(75, 20, '222', 'latacunga', '138', '87', 'julio', 2019, 0),
(76, 21, '777', 'latacunga', '139', '11', 'julio', 2019, 1),
(77, 22, '888', 'latacunga', '139', '21', 'julio', 2019, 1),
(157, 6, '1', 'la  mana ', '5', '34', 'septiembre', 2019, 1),
(158, 7, '2', 'latacunga', '6', '54', 'septiembre', 2019, 0),
(159, 9, '444', 'latacunga', '137', '33', 'septiembre', 2019, 0),
(160, 15, '999', 'Centro', '14', '2', 'septiembre', 2019, 0),
(161, 16, '777', 'centro', '18', '4', 'septiembre', 2019, 0),
(162, 17, '555', 'Universidad', '10', '5', 'septiembre', 2019, 0),
(163, 18, '2323', 'centro', '110', '6', 'septiembre', 2019, 0),
(164, 19, '111', 'latacunga', '138', '5', 'septiembre', 2019, 0),
(165, 20, '222', 'latacunga', '138', '7', 'septiembre', 2019, 0),
(166, 21, '777', 'latacunga', '139', '4', 'septiembre', 2019, 0),
(167, 22, '888', 'latacunga', '139', '5', 'septiembre', 2019, 0),
(168, 23, '123', 'latacunga', '140', '44', 'septiembre', 2019, 1),
(169, 24, '124', 'latacunga', '140', '55', 'septiembre', 2019, 0),
(172, 6, '1', 'la  mana ', '5', '34', 'octubre', 2019, 1),
(173, 7, '2', 'latacunga', '6', '32', 'octubre', 2019, 0),
(174, 9, '444', 'latacunga', '137', '3', 'octubre', 2019, 0),
(175, 15, '999', 'Centro', '14', '4', 'octubre', 2019, 0),
(176, 16, '777', 'centro', '18', '2', 'octubre', 2019, 0),
(177, 17, '555', 'Universidad', '10', '3', 'octubre', 2019, 0),
(178, 18, '2323', 'centro', '110', '1', 'octubre', 2019, 0),
(179, 19, '111', 'latacunga', '138', '1', 'octubre', 2019, 0),
(180, 20, '222', 'latacunga', '138', '2', 'octubre', 2019, 0),
(181, 21, '777', 'latacunga', '139', '3', 'octubre', 2019, 0),
(182, 22, '888', 'latacunga', '139', '4', 'octubre', 2019, 0),
(183, 23, '123', 'latacunga', '140', '21', 'octubre', 2019, 1),
(184, 24, '124', 'latacunga', '140', '11', 'octubre', 2019, 0),
(188, 7, '2', 'latacunga', '6', '4', 'noviembre', 2019, 0),
(189, 9, '444', 'latacunga', '137', '3', 'noviembre', 2019, 0),
(190, 15, '999', 'Centro', '14', '5', 'noviembre', 2019, 0),
(191, 16, '777', 'centro', '18', '5', 'noviembre', 2019, 0),
(192, 17, '555', 'Universidad', '10', '6', 'noviembre', 2019, 0),
(193, 18, '2323', 'centro', '110', '7', 'noviembre', 2019, 0),
(194, 19, '111', 'latacunga', '138', '8', 'noviembre', 2019, 0),
(195, 20, '222', 'latacunga', '138', '43', 'noviembre', 2019, 0),
(196, 21, '777', 'latacunga', '139', '3', 'noviembre', 2019, 0),
(197, 22, '888', 'latacunga', '139', '2', 'noviembre', 2019, 0),
(198, 23, '123', 'latacunga', '140', '23', 'noviembre', 2019, 1),
(199, 24, '124', 'latacunga', '140', '24', 'noviembre', 2019, 0),
(200, 6, '1', 'la  mana ', '5', '1', 'diciembre', 2019, 0),
(201, 7, '2', 'latacunga', '6', '1', 'diciembre', 2019, 0),
(202, 9, '444', 'latacunga', '137', '1', 'diciembre', 2019, 0),
(203, 15, '999', 'Centro', '14', '1', 'diciembre', 2019, 0),
(204, 16, '777', 'centro', '18', '1', 'diciembre', 2019, 0),
(205, 17, '555', 'Universidad', '10', '1', 'diciembre', 2019, 0),
(207, 19, '111', 'latacunga', '138', '1', 'diciembre', 2019, 0),
(208, 20, '222', 'latacunga', '138', '1', 'diciembre', 2019, 0),
(209, 21, '777', 'latacunga', '139', '1', 'diciembre', 2019, 0),
(210, 22, '888', 'latacunga', '139', '1', 'diciembre', 2019, 0),
(211, 23, '123', 'latacunga', '140', '1', 'diciembre', 2019, 0),
(212, 24, '124', 'latacunga', '140', '1', 'diciembre', 2019, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
`id_con` int(11) NOT NULL,
  `fecha_con` varchar(255) NOT NULL,
  `precio_con` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id_con`, `fecha_con`, `precio_con`) VALUES
(1, '2019-07-04', '1.25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pago`
--

CREATE TABLE IF NOT EXISTS `detalle_pago` (
`id_detalle` int(11) NOT NULL,
  `fecha_detalle` varchar(255) NOT NULL,
  `consumo_detalle` varchar(255) NOT NULL,
  `estado_detalle` varchar(255) NOT NULL,
  `id_medidor` int(11) NOT NULL,
  `id_pago` int(11) NOT NULL,
  `id_cartola` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_pago`
--

INSERT INTO `detalle_pago` (`id_detalle`, `fecha_detalle`, `consumo_detalle`, `estado_detalle`, `id_medidor`, `id_pago`, `id_cartola`) VALUES
(1, '2019-07-29', '1', '1', 6, 1, 1),
(2, '2019-07-29', '9', '1', 6, 1, 8),
(3, '2019-07-29', '3', '1', 18, 2, 14),
(4, '2019-07-29', '3', '1', 18, 3, 7),
(5, '2019-07-29', '2', '1', 18, 3, 21),
(6, '2019-07-29', '1', '1', 16, 4, 5),
(7, '2019-07-29', '4', '1', 16, 4, 19),
(8, '2019-07-29', '2', '1', 7, 5, 2),
(9, '2019-07-29', '8', '1', 7, 6, 9),
(10, '2019-07-29', '1', '1', 6, 7, 22),
(11, '2019-07-29', '4', '1', 15, 8, 4),
(12, '2019-07-29', '6', '1', 15, 8, 11),
(13, '2019-07-29', '5', '1', 15, 8, 18),
(14, '2019-07-29', '7', '1', 6, 9, 15),
(15, '2019-07-29', '12', '1', 6, 10, 29),
(16, '2019-07-29', '23', '1', 6, 10, 43),
(21, '2019-07-31', '2', '1', 17, 13, 6),
(22, '2019-07-31', '4', '1', 17, 14, 13),
(28, '2019-10-21', '12', '1', 6, 19, 67),
(29, '2019-10-21', '34', '1', 6, 19, 157),
(30, '2019-10-21', '34', '1', 6, 19, 172);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidor`
--

CREATE TABLE IF NOT EXISTS `medidor` (
`id_medidor` int(11) NOT NULL,
  `numero_medidor` varchar(255) NOT NULL,
  `direccion_medidor` varchar(255) NOT NULL,
  `id_socio` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medidor`
--

INSERT INTO `medidor` (`id_medidor`, `numero_medidor`, `direccion_medidor`, `id_socio`) VALUES
(6, '1', 'la  mana ', 5),
(7, '2', 'latacunga', 6),
(15, '999', 'Centro', 14),
(16, '777', 'centro', 18),
(17, '555', 'Universidad', 10),
(18, '2323', 'centro', 110),
(19, '005', 'veci', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
`id_pago` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `id_socio` int(11) NOT NULL,
  `hora_pago` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `fecha_pago`, `id_socio`, `hora_pago`) VALUES
(1, '2019-07-29', 5, ''),
(2, '2019-07-29', 110, ''),
(3, '2019-07-29', 110, ''),
(4, '2019-07-29', 18, ''),
(5, '2019-07-29', 6, ''),
(6, '2019-07-29', 6, ''),
(7, '2019-07-29', 5, ''),
(8, '2019-07-29', 14, ''),
(9, '2019-07-29', 5, ''),
(10, '2019-07-29', 5, ''),
(13, '2019-07-31', 10, ''),
(14, '2019-07-31', 10, ''),
(19, '2019-10-21', 5, '15:17:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE IF NOT EXISTS `socio` (
`id_socio` int(11) NOT NULL,
  `nombre_socio` varchar(255) NOT NULL,
  `apellido_socio` varchar(255) NOT NULL,
  `cedula_socio` varchar(255) NOT NULL,
  `direccion_socio` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`id_socio`, `nombre_socio`, `apellido_socio`, `cedula_socio`, `direccion_socio`) VALUES
(5, 'ALEJANDRO ', 'SANTANDER ', '0707070700', 'LA MANA '),
(6, 'ROSA MATILDE', 'ALVARADO QUINATOA', '050188151-0', 'TANDACATO'),
(7, 'MESIAS GARMANICO', 'ALVARADO TOAQUIZA', '0502336799-8', 'SAN JOSE DE YANAYACU'),
(8, 'ELVIA MARIA', 'ARIAS PILA', '050188149-9', 'TANDACATO'),
(9, 'PEDRO PABLO', 'ARIAS ANALUISA', '170437153-1', 'SAN JOSE DE YANAYACU'),
(10, 'JORGE ', 'ARIAS SANCHEZ', '050010779-2', 'TANDACO'),
(11, 'RAUL ', 'ARIAS ANALUISA', '050006124-7', 'SAN JOSE DE YANAYACU'),
(12, 'RAUL', 'ARIAS ALVARADO', '050006124-7', 'SAN JOSE DE YANAYACU'),
(13, 'LUIS NELSON', 'ARIAS PILA', '050111349-2', 'EL HUASIPUNGO'),
(14, 'HEIDY ELBA', 'ARIAS TOAZA', '050298397-6', 'SAN JOSE DE YANAYACU'),
(15, 'DIANA JUDITH', 'ARIAS TOAZA', '050348657-3', 'SAN JOSE DE YANAYACU'),
(16, 'BLANCA CORINA', 'ARIAS TOAPANTA', '050098097-4', 'SAN JOSE DE YANAYACU'),
(17, 'CELIA AMERICA', 'ARIAS PILA', '050165344-8', 'SAN ANTONIO DE TAND.'),
(18, 'SIXTO ', 'ARIAS PILA', '050071088-4', 'SAN ANTONIO DE TAND.'),
(19, 'LUIS ALFREDO', 'ORTIZ ORTIZ', '17214338826', 'TANDACO'),
(20, 'LUZ OFELIA', 'BENITES ORTIZ', '501250856', 'TANDACATO'),
(21, 'NELLY GRACIELA', 'BUSTILLOS ZAPATA', '1705144879', 'TANDACATO'),
(22, 'HECTOR ARMANDO', 'CRESPO ', '500571625', 'TANDACATO'),
(23, 'PEDRO PABLO', 'CARRERA CHIRIBOGA', '502203011', 'SAN JOSE DE YANAYACU'),
(24, 'HECTOR MAURICIO', 'CARRERA ESCOBAR', '501955710', 'SAN JOSE DE YANAYACU'),
(25, 'HECTOR MAURICIO', 'CARRERA ESCOBAR', '504072190', 'SAN JOSE DE YANAYACU'),
(26, 'CARLOS RANULFO', 'CARRERA VENEGAS', '501331854', 'SAN JOSE DE YANAYACU'),
(27, 'MARTHA YOLANDA', 'CARRERA VENEGAS', '502661143', 'TANDACATO'),
(28, 'VILMA PATRICIA', 'CARRERA BUSTAMANTE', '501866644', 'SAN JOSE DE YANAYACU'),
(29, 'FERNANDO ', 'CARRERA ESCAOBAR', '500075205', 'SAN JOSE DE YANAYACU'),
(30, 'CELSO ', 'CARRERA VENEGAS', '501969729', 'TANDACATO'),
(31, 'JULIO CESAR', 'CARRERA VENEGAS', '501163489', 'TANDACATO'),
(32, 'AURELIO ', 'CARRERA CARRERA', '500983317', 'SAN JOSE DE YANAYACU'),
(33, 'EDISON RAMIRO', 'CLAVIJO ', '502599475', 'SAN JOSE DE YANAYACU'),
(34, 'ALBERTO ', 'CAÑIZARES PEREZ', '1704147576', 'SAN JOSE DE YANAYACU'),
(35, 'LINO DAVID', 'CUNDIMAITA TIPAN', '501787832', 'SAN JOSE DE YANAYACU'),
(36, 'JENNY VERENISSE', 'CUNDIMAITA TAPIA', '1715752646', 'SAN JOSE DE YANAYACU'),
(37, 'VICTOR AURELIO', 'CONDEMAITA TIAN', '500103965', 'SAN JOSE DE YANAYACU'),
(38, 'IGNACIO ', 'CONDEMAITA TOCTAGUANO', '500446307', 'TANDACATO'),
(39, 'WILSON ENRIQUE', 'RODRIGUES LOACHAMIN', '1711044691', 'SAN JOSE DE YANAYACU'),
(40, 'WALTER DARIO', 'CHIRIBOGA COELLO', '502684277', 'SAN JOSE DE YANAYACU'),
(41, 'MARIA DOLORES', 'CHANCO ARIAS', '600814917', 'SAN JOSE DE YANAYACU'),
(42, 'LUIS GERMANICO', 'CHANCO CHANCO', '502317654', 'SAN JOSE DE YANAYACU'),
(43, 'JORGUE RODRIGO', 'CHANCO MORETA', '501398838', 'SAN JOSE DE YANAYACU'),
(44, 'SEGUNDO HUMBERTO', 'GUANANGA VARGAS', '170441367-1', 'SAN JOSE DE YANAYACU'),
(45, 'EDISON FABIAN', 'LESCANO MORETA', '050257804-0', 'SAN JOSE DE YANAYACU'),
(46, 'SEGUNDO RAUL', 'HIDALGO TOAQUIZA', '050288512-2', 'SAN JOSE DE YANAYACU'),
(47, 'ROCIO ', 'IZA ROBALINO', '050231114-5', 'TANDACATO'),
(48, 'SEGUNDO JOSE', 'IZA PILA', '050045837-7', 'TANDACATO'),
(49, 'LOURDES MARGOTH', 'ARIAS TOAPANTA', '050264212-7', 'TANDACATO'),
(50, 'ADELA ', 'LLANO PUCO', '170451856-0', 'TANDACATO'),
(51, 'LUZ ANGELICA', 'MOLINA GUALCO', '050261180-9', 'SAN JOSE DE YANAYACU'),
(52, 'EDISON EDMUNDO', 'MOLINA QUISHPE', '050236969-7', 'TANDACATO'),
(53, 'ELSA MARINA', 'TOCTAGUANO ', '050161860-7', 'TANDACATO'),
(54, 'ROSARIO PIEDAD', 'MONTA TOAPANTA', '050172751-5', 'TANDACATO'),
(55, 'MILTON EDMUNDO', 'ORTIZ AYNUCA', '050250025-9', 'TANDACATO'),
(56, 'MAARIA SALOME', 'ORTIZ IZA', '050208615-0', 'TANDACATO'),
(57, 'GLORIA SABINA', 'ORTIZ IZA', '050146801-1', 'TANDACATO'),
(58, 'ALICIA ', 'ORTIZ IZA', '050163733-4', 'SAN ANTONIO DE TAND.'),
(59, 'SERGIO ALCIDES', 'IZA ROBAYO', '050010214-0', 'SAN ANTONIO DE TAND.'),
(60, 'OLMEDO ', 'ORTIZ PILA', '050095990-3', 'TANDACATO'),
(61, 'MARIA FERNANDA', 'ORTIZ PILA', '050309091-2', 'SAN ANTONIO DE TAND.'),
(62, 'MARIA ELVA', 'ORTIZ ARIAS', '170537717-2', 'SAN ANTONIO DE TAND.'),
(63, 'DORA AMADA', 'ORTIZ VICTOR', '050194092-8', 'SAN ANTONIO DE TAND.'),
(64, 'NORMA VERONICA', 'ORTIZ ORTIZ', '050184446-8', 'SAN ANTONIO DE TAND.'),
(65, 'RAFAEL ', 'ORTIZ TOCTAGUANO', '050309253-8', 'SAN ANTONIO DE TAND.'),
(66, 'MARIA GRACIELA', 'ORTIZ AYNUCA', '050143445-0', 'SAN JOSE DE YANAYACU'),
(67, 'Fransisco ', 'ORTIZ CHICAIZA', '050005053-9', 'SAN ANTONIO DE TAND.'),
(68, 'Rosa Elvira', 'PUNINA RAMOS', '050117930-3', 'San Jose de Tandacato'),
(69, 'Rosa Elvira', 'PILA ALVARADO', '050165652-4', 'San Jose de Tandacato'),
(70, 'Erika Gabriela', 'Pila Alvarado', '050313673-1', 'San Jose de Tandacato'),
(71, 'Elsa Beatriz', 'Pila Alvarado', '050188612-1', 'San Jose de Tandacato'),
(72, 'Maria Encarnacion', 'Pila Alvarado', '050123905-7', 'San Jose de Tandacato'),
(73, 'Jorge Enrique', 'Roldan Pila', '170874675-3', 'San Jose de Tandacato'),
(74, 'Blanca Cleotilde', 'Pila Alvarado', '050191807-2', 'San Jose de Tandacato'),
(75, 'Rosa Isabel', 'Pila Arias', '050182253-0', 'San Jose de Yanayacu'),
(76, 'Maria Elvira', 'Pila ', '050083971-7', 'San Jose de Yanayacu'),
(77, 'Segundo Augusto', 'Pila Pila', '050099636-8', 'San Jose de Yanayacu'),
(78, 'Nicolas ', 'Pila Toapanta', '050116652-4', 'Tandacato'),
(79, 'Maria Aurora', 'Pila Iza', '050125459-3', 'San Jose de Yanayacu'),
(80, 'Maria Piedad', 'Pila Toctaguano', '050179412-7', 'Tandacato'),
(81, 'Alcides Rolando', 'Quinatoa ', '50268020-0', 'Tandacato'),
(82, 'Humberto ', 'Condemaita Tipan', '050024827-3', 'San Jose de Yanayacu'),
(83, 'Maria Juana', 'Rivera Concemaita', '050159091-3', 'San Jose de Yanayacu'),
(84, 'Maria Juana', 'Rivera Concemaita', '050299930-3', 'San Jose de Yanayacu'),
(85, 'Milton Ivan', 'Robalino Centeno', '050219860-9', 'San Jose de Yanayacu'),
(86, 'Gladys Maria', 'Condemaita Tipan', '050087672-7', 'San Jose de Yanayacu'),
(87, 'Diana Estefania', 'Condemaita Tipan', '050328831-8', 'Tandacato'),
(88, 'Angel Homero', 'Rocha Alvarado', '170445974-0', 'Tandacato'),
(89, 'Segundo Augusto', 'Rocha Alvarado', '050083898-2', 'San Jose de Yanayacu'),
(90, 'Dora Maria', 'Salgado Yanez', '050191639-9', 'San Jose de Yanayacu'),
(91, 'Nelson Ivan', 'Salgado Carrera', '050109810-6', 'San Jose de Yanayacu'),
(92, 'Rosa Matilde', 'Toctaguano Iza', '050162213-8', 'San Jose de Yanayacu'),
(93, 'Lidia Judith', 'Toctaguano Pila', '050198688-8', 'San Jose de Yanayacu'),
(94, 'Maria Dolores', 'Toctaguano Pila', '050199521-1', 'San Jose de Yanayacu'),
(95, 'Segundo Alfredo', 'Toctaguano ', '050171124-6', 'San Jose de Yanayacu'),
(96, 'Maria Mercedes', 'Toctaguano Iza', '500603936-7', 'San Jose de Yanayacu'),
(97, 'Maria Zoila', 'Toctaguano Velasquez', '050174547-5', 'San Jose de Yanayacu'),
(98, 'Sebastian ', 'Tocte Toctaguano', '050047279-0', 'Tandacato'),
(99, 'Ana Maria', 'Tocte Toctaguano', '050255436-3', 'Tandacato'),
(100, 'Marco Antonio', 'Toasa Ramirez', '050234246-2', 'San Jose de Yanayacu'),
(101, 'Noemi Del Pilar', 'Toasa Tumbaco', '050307956-8', 'San Jose de Yanayacu'),
(102, 'Fernando ', 'Toasa Alvarado', '050225208-3', 'Tandacato'),
(103, 'JOSE OSWALDO', 'Viracocha Tocte', '130723450-9', 'TANDACATO'),
(104, 'SIXTO ANIBAL', 'Villaroel Ortiz', '050178788-1', 'SAN ANTONIO DE TANDACATO'),
(105, 'LUIS CRISTOBAL', 'Vargas ', '050149242-5', 'TANDACATO'),
(106, 'TARGELIA ', 'ZAMBRANO MACIAS', '170630812-7', 'SAN ANTONIO DE TANDACATO'),
(107, 'NELSON IVAN', 'ZAPATA JACOME', '050209810-6', 'SAN ANTONIO DE TANDACATO'),
(108, 'FRANKLIN ALFONSO', 'OILA ', '050311984-4', 'TANDACATO'),
(109, 'MARIA YOLANDA', 'ALIAGA ALVARADO', '050316665-4', 'SAN JOSE DE YANAYACU'),
(110, 'MARIA YOLANDA', 'TOCTAGUANO PILA', '141110155-8', 'SAN JOSE DE YANAYACU'),
(111, 'PEDRO PABLO', 'CHANGO MORETA', '050301189-2', 'SAN ANTONIO DE TANDACATO'),
(112, 'WILSON ALCIVAR', 'TOCTE IZA', '050329949-7', 'SAN JOSE DE YANAYACU'),
(113, 'SEGUNDO FABIAN', 'TOCTAGUANO VELASQUEZ', '050191634-0', 'SAN JOSE DE YANAYACU'),
(114, 'FAUSTO ', 'ARIAS ORTEGA', '170351678-9', 'SAN JOSE DE YANAYACU'),
(115, 'MILTON BOLIVAR', 'QUINATOA PILATASI', '171573982-5', 'SAN JOSE DE TANDACATO'),
(116, 'MARIO ALBERTO', 'QUINATOA QUINATOA', '131189423-0', 'SAN JOSE DE TANDACATO'),
(117, 'LIDIA MARLENE', 'GERVIS ', '050397441-2', 'SAN JOSE DE TANDACATO'),
(118, 'LIDIA MARLENE', 'TOCTE QUINATOA', '050288516-3', 'TANDACATO'),
(119, 'SEGUNDO RUBEN', 'FRANCO ZAMBRANO', '050344138-8', 'SAN JOSE DE YANAYACU'),
(120, 'EDISON ', 'QUINATOA PILA', '172058815-4', 'SAN JOSE DE YANAYACU'),
(121, 'ELSA MARINA', 'TOCTE IZA', '050046415-1', 'SAN JOSE DE YANAYACU'),
(122, 'ALVARO RENE', 'CASA PUCO', '050343072-0', 'SAN ANTONIO DE TANDACATO'),
(123, 'ERIKA CRISTINA', 'CENTENO ', '050369753-4', 'TANDACATO'),
(124, 'NATHALI SILVANA', 'ORTIZ ORTIZ', '050369934-0', 'SAN JOSE DE YANAYACU'),
(125, 'MARCO VINICIO', 'ARIAS PILA', '171346024-2', 'TANDACATO'),
(126, 'SUSANA MARIBEL', 'ARIAS PILA', '050303010-8', 'SAN JOSE DE YANAYACU'),
(127, 'ZULMA MARGARITA', 'MOLINA QUISHPE', '050290436-0', 'SAN JOSE DE YANAYACU'),
(128, 'CESAR PATRICIO', 'CAZA VASCONEZ', '050189685-6', 'SAN JOSE DE YANAYACU'),
(129, 'MARIA CARMEN', 'CONDEMAITA TOCTAGUANO', '050046147-9', 'TANDACATO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `cartola`
--
ALTER TABLE `cartola`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_cartola` (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
 ADD PRIMARY KEY (`id_con`);

--
-- Indices de la tabla `detalle_pago`
--
ALTER TABLE `detalle_pago`
 ADD PRIMARY KEY (`id_detalle`), ADD UNIQUE KEY `id_cartola` (`id_cartola`), ADD KEY `A3` (`id_medidor`), ADD KEY `A4` (`id_pago`);

--
-- Indices de la tabla `medidor`
--
ALTER TABLE `medidor`
 ADD PRIMARY KEY (`id_medidor`), ADD KEY `A1` (`id_socio`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
 ADD PRIMARY KEY (`id_pago`), ADD KEY `A2` (`id_socio`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
 ADD PRIMARY KEY (`id_socio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
MODIFY `id_admin` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cartola`
--
ALTER TABLE `cartola`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=213;
--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
MODIFY `id_con` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `detalle_pago`
--
ALTER TABLE `detalle_pago`
MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `medidor`
--
ALTER TABLE `medidor`
MODIFY `id_medidor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `socio`
--
ALTER TABLE `socio`
MODIFY `id_socio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pago`
--
ALTER TABLE `detalle_pago`
ADD CONSTRAINT `A3` FOREIGN KEY (`id_medidor`) REFERENCES `medidor` (`id_medidor`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `A4` FOREIGN KEY (`id_pago`) REFERENCES `pago` (`id_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `detalle_pago_ibfk_1` FOREIGN KEY (`id_cartola`) REFERENCES `cartola` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medidor`
--
ALTER TABLE `medidor`
ADD CONSTRAINT `A1` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
ADD CONSTRAINT `A2` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
