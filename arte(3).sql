-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2022 a las 04:49:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artesania`
--

CREATE TABLE `artesania` (
  `idartesania` bigint(20) NOT NULL,
  `nombreartesania` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `idartesano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artesano`
--

CREATE TABLE `artesano` (
  `idartesano` int(11) NOT NULL,
  `nombreartesano` varchar(100) NOT NULL,
  `direccionartesano` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `sitio_web` varchar(100) NOT NULL,
  `idmunicipio` int(11) NOT NULL,
  `idusuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(5, 'Dashboard', 'Dashboard', 1),
(6, 'Usuarios', 'Todos los usuario', 1),
(7, 'Artesanos', 'Todos los artesanos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `idmunicipio` bigint(20) NOT NULL,
  `municipio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`idmunicipio`, `municipio`) VALUES
(1, 'Acajete'),
(2, 'Acateno'),
(3, 'Acatlán'),
(4, 'Acatzingo'),
(5, 'Acteopan'),
(6, 'Ahuacatlán'),
(7, 'Ahuatlán'),
(8, 'Ahuazotepec'),
(9, 'Ahuehuetitla'),
(10, 'Ajalpan'),
(11, 'Albino Zertuche'),
(12, 'Aljojuca'),
(13, 'Altepexi'),
(14, 'Amixtlán'),
(15, 'Amozoc'),
(16, 'Aquixtla'),
(17, 'Atempan'),
(18, 'Atexcal'),
(19, 'Atlixco'),
(20, 'Atoyatempan'),
(21, 'Atzala'),
(22, 'Atzitzihuacán'),
(23, 'Atzitzintla'),
(24, 'Axutla'),
(25, 'Ayotoxco de Guerrero'),
(26, 'Calpan'),
(27, 'Caltepec'),
(28, 'Camocuautla'),
(29, 'Caxhuacan'),
(30, 'Coatepec'),
(31, 'Coatzingo'),
(32, 'Cohetzala'),
(33, 'Cohuecan'),
(34, 'Coronango'),
(35, 'Coxcatlán'),
(36, 'Coyomeapan'),
(37, 'Coyotepec'),
(38, 'Cuapiaxtla de Madero'),
(39, 'Cuautempan'),
(40, 'Cuautinchán'),
(41, 'Cuautlancingo'),
(42, 'Cuayuca de Andrade'),
(43, 'Cuetzalan del Progreso'),
(44, 'Cuyoaco'),
(45, 'Chalchicomula de Sesma'),
(46, 'Chapulco'),
(47, 'Chiautla'),
(48, 'Chiautzingo'),
(49, 'Chiconcuautla'),
(50, 'Chichiquila'),
(51, 'Chietla'),
(52, 'Chigmecatitlán'),
(53, 'Chignahuapan'),
(54, 'Chignautla'),
(55, 'Chila'),
(56, 'Chila de la Sal'),
(57, 'Honey'),
(58, 'Chilchotla'),
(59, 'Chinantla'),
(60, 'Domingo Arenas'),
(61, 'Eloxochitlán'),
(62, 'Epatlán'),
(63, 'Esperanza'),
(64, 'Francisco Z. Mena'),
(65, 'General Felipe Ángeles'),
(66, 'Guadalupe'),
(67, 'Guadalupe Victoria'),
(68, 'Hermenegildo Galeana'),
(69, 'Huaquechula'),
(70, 'Huatlatlauca'),
(71, 'Huauchinango'),
(72, 'Huehuetla'),
(73, 'Huehuetlán el Chico'),
(74, 'Huejotzingo'),
(75, 'Hueyapan'),
(76, 'Hueytamalco'),
(77, 'Hueytlalpan'),
(78, 'Huitzilan de Serdán'),
(79, 'Huitziltepec'),
(80, 'Atlequizayan'),
(81, 'Ixcamilpa de Guerrero'),
(82, 'Ixcaquixtla'),
(83, 'Ixtacamaxtitlán'),
(84, 'Ixtepec'),
(85, 'Izúcar de Matamoros'),
(86, 'Jalpan'),
(87, 'Jolalpan'),
(88, 'Jonotla'),
(89, 'Jopala'),
(90, 'Juan C. Bonilla'),
(91, 'Juan Galindo'),
(92, 'Juan N. Méndez'),
(93, 'Lafragua'),
(94, 'Libres'),
(95, 'La Magdalena Tlatlauquitepec'),
(96, 'Mazapiltepec de Juárez'),
(97, 'Mixtla'),
(98, 'Molcaxac'),
(99, 'Cañada Morelos'),
(100, 'Naupan'),
(101, 'Nauzontla'),
(102, 'Nealtican'),
(103, 'Nicolás Bravo'),
(104, 'Nopalucan'),
(105, 'Ocotepec'),
(106, 'Ocoyucan'),
(107, 'Olintla'),
(108, 'Oriental'),
(109, 'Pahuatlán'),
(110, 'Palmar de Bravo'),
(111, 'Pantepec'),
(112, 'Petlalcingo'),
(113, 'Piaxtla'),
(114, 'Puebla'),
(115, 'Quecholac'),
(116, 'Quimixtlán'),
(117, 'Rafael Lara Grajales'),
(118, 'Los Reyes de Juárez'),
(119, 'San Andrés Cholula'),
(120, 'San Antonio Cañada'),
(121, 'San Diego la Mesa Tochimiltzingo'),
(122, 'San Felipe Teotlalcingo'),
(123, 'San Felipe Tepatlán'),
(124, 'San Gabriel Chilac'),
(125, 'San Gregorio Atzompa'),
(126, 'San Jerónimo Tecuanipan'),
(127, 'San Jerónimo Xayacatlán'),
(128, 'San José Chiapa'),
(129, 'San José Miahuatlán'),
(130, 'San Juan Atenco'),
(131, 'San Juan Atzompa'),
(132, 'San Martín Texmelucan'),
(133, 'San Martín Totoltepec'),
(134, 'San Matías Tlalancaleca'),
(135, 'San Miguel Ixitlán'),
(136, 'San Miguel Xoxtla'),
(137, 'San Nicolás Buenos Aires'),
(138, 'San Nicolás de los Ranchos'),
(139, 'San Pablo Anicano'),
(140, 'San Pedro Cholula'),
(141, 'San Pedro Yeloixtlahuaca'),
(142, 'San Salvador el Seco'),
(143, 'San Salvador el Verde'),
(144, 'San Salvador Huixcolotla'),
(145, 'San Sebastián Tlacotepec'),
(146, 'Santa Catarina Tlaltempan'),
(147, 'Santa Inés Ahuatempan'),
(148, 'Santa Isabel Cholula'),
(149, 'Santiago Miahuatlán'),
(150, 'Huehuetlán el Grande'),
(151, 'Santo Tomás Hueyotlipan'),
(152, 'Soltepec'),
(153, 'Tecali de Herrera'),
(154, 'Tecamachalco'),
(155, 'Tecomatlán'),
(156, 'Tehuacán'),
(157, 'Tehuitzingo'),
(158, 'Tenampulco'),
(159, 'Teopantlán'),
(160, 'Teotlalco'),
(161, 'Tepanco de López'),
(162, 'Tepango de Rodríguez'),
(163, 'Tepatlaxco de Hidalgo'),
(164, 'Tepeaca'),
(165, 'Tepemaxalco'),
(166, 'Tepeojuma'),
(167, 'Tepetzintla'),
(168, 'Tepexco'),
(169, 'Tepexi de Rodríguez'),
(170, 'Tepeyahualco'),
(171, 'Tepeyahualco de Cuauhtémoc'),
(172, 'Tetela de Ocampo'),
(173, 'Teteles de Avila Castillo'),
(174, 'Teziutlán'),
(175, 'Tianguismanalco'),
(176, 'Tilapa'),
(177, 'Tlacotepec de Benito Juárez'),
(178, 'Tlacuilotepec'),
(179, 'Tlachichuca'),
(180, 'Tlahuapan'),
(181, 'Tlaltenango'),
(182, 'Tlanepantla'),
(183, 'Tlaola'),
(184, 'Tlapacoya'),
(185, 'Tlapanalá'),
(186, 'Tlatlauquitepec'),
(187, 'Tlaxco'),
(188, 'Tochimilco'),
(189, 'Tochtepec'),
(190, 'Totoltepec de Guerrero'),
(191, 'Tulcingo'),
(192, 'Tuzamapan de Galeana'),
(193, 'Tzicatlacoyan'),
(194, 'Venustiano Carranza'),
(195, 'Vicente Guerrero'),
(196, 'Xayacatlán de Bravo'),
(197, 'Xicotepec'),
(198, 'Xicotlán'),
(199, 'Xiutetelco'),
(200, 'Xochiapulco'),
(201, 'Xochiltepec'),
(202, 'Xochitlán de Vicente Suárez'),
(203, 'Xochitlán Todos Santos'),
(204, 'Yaonáhuac'),
(205, 'Yehualtepec'),
(206, 'Zacapala'),
(207, 'Zacapoaxtla'),
(208, 'Zacatlán'),
(209, 'Zapotitlán'),
(210, 'Zapotitlán de Méndez'),
(211, 'Zaragoza'),
(212, 'Zautla'),
(213, 'Zihuateutla'),
(214, 'Zinacatepec'),
(215, 'Zongozotla'),
(216, 'Zoquiapan'),
(217, 'Zoquitlán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(89, 14, 5, 0, 0, 0, 0),
(90, 14, 6, 1, 0, 1, 0),
(91, 14, 7, 1, 0, 1, 0),
(104, 13, 5, 1, 1, 1, 1),
(105, 13, 6, 1, 1, 1, 1),
(106, 13, 7, 1, 1, 1, 1),
(107, 22, 5, 1, 1, 1, 1),
(108, 22, 6, 1, 0, 1, 1),
(109, 22, 7, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` bigint(20) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `nombrecompleto` varchar(100) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `contraseña` varchar(75) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `sitio_web` varchar(100) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `municipioid` bigint(20) NOT NULL,
  `token` varchar(80) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `artesaniaid` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `permiso` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `usuario`, `nombrecompleto`, `email_usuario`, `contraseña`, `telefono`, `facebook`, `twitter`, `instagram`, `sitio_web`, `domicilio`, `empresa`, `municipioid`, `token`, `rolid`, `artesaniaid`, `status`, `permiso`) VALUES
(57, 'Nico', 'Nicolas Urrutia', 'nicolas@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 2381285345, 'facebook@nicolas', 'twitter@nicolas', 'instagram@nicolas', '', 'Avenida Benito Juares No 54', '', 156, '', 13, 0, 1, 0),
(58, 'Juano', 'Juan Perez', 'juan@gmail.com', 'b3a8e0e1f9ab1bfe3a36f231f676f78bb30a519d2b21e6c530c0eee8ebb4a5d0', 123456789, 'facebook@juano', '', '', '', 'Avenida Siempre viva #305', '', 10, '', 14, 0, 1, 0),
(59, 'Jos', 'Jose Gutierrez', 'jose@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1232123345, 'facebook@jos', '', '', '', 'Calle Jose Maria Morelos No. 322', '', 209, '', 14, 0, 1, 0),
(60, 'Pecas', 'Pedro Soliz', 'pedro@gmail.com', '1abe77d582d53d988473aecc242c9680f9887adc578b8935fdec55fa67528c6e', 3457543456, 'facebook@pedro', '', '', '', 'Avenida los pinos No. 3', '', 57, '', 14, 0, 1, 0),
(61, 'Moni', 'Monica Juarez', 'monica@gmail.com', 'ef96b98100d21d3a116037ce8527c68f9d619bc8515be080044c42f2e19159e1', 2381285940, 'facebook@monica', '', '', '', 'Calle 11 Poniente #21', '', 142, '', 14, 0, 1, 0),
(62, 'Mari', 'Maria Perez', 'maria@gmail.com', '43426e28c05e024368cff9cbb1f2c4e0eed1d9a9711f386fe16c94ebc0e60bc8', 2381719961, 'facebook@maria', '', '', '', 'Avenida Mexico No.435', '', 13, '', 14, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(13, 'Administrador', 'Administra todo el sistema verificando que los datos sean validos', 1),
(14, 'Usuario', 'Registrar y publica informacio', 1),
(22, 'Maestro', 'Verifica registros', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artesania`
--
ALTER TABLE `artesania`
  ADD PRIMARY KEY (`idartesania`);

--
-- Indices de la tabla `artesano`
--
ALTER TABLE `artesano`
  ADD PRIMARY KEY (`idartesano`),
  ADD KEY `idmunicipio` (`idmunicipio`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`idmunicipio`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `municipioid` (`municipioid`),
  ADD KEY `artesaniaid` (`artesaniaid`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artesania`
--
ALTER TABLE `artesania`
  MODIFY `idartesania` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `artesano`
--
ALTER TABLE `artesano`
  MODIFY `idartesano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `artesania`
--
ALTER TABLE `artesania`
  ADD CONSTRAINT `artesania_ibfk_1` FOREIGN KEY (`idartesania`) REFERENCES `persona` (`artesaniaid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `roles` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `roles` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`municipioid`) REFERENCES `municipios` (`idmunicipio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
