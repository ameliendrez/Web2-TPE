-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2017 a las 23:24:37
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webbeer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cerveza`
--

CREATE TABLE `cerveza` (
  `id_cerveza` int(11) NOT NULL,
  `id_estilo` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `%alc` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cerveza`
--

INSERT INTO `cerveza` (`id_cerveza`, `id_estilo`, `nombre`, `%alc`, `descripcion`) VALUES
(1, 1, 'cerv1', 21, 'algo1'),
(2, 1, 'cerv1', 21, 'algo1'),
(3, 1, 'cerv2', 22, 'algo2'),
(4, 2, 'cerv3', 23, 'algo3');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `cervezavw`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `cervezavw` (
`id_cerveza` int(11)
,`nombreCerveza` varchar(25)
,`estilo` varchar(25)
,`porcentajeALC` int(11)
,`descripcion` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilocerveza`
--

CREATE TABLE `estilocerveza` (
  `id_estilo` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estilocerveza`
--

INSERT INTO `estilocerveza` (`id_estilo`, `nombre`, `descripcion`) VALUES
(1, 'stout', 'muy stout'),
(2, 'stout', 'muy stout');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loginusuario`
--

CREATE TABLE `loginusuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(250) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `loginusuario`
--

INSERT INTO `loginusuario` (`id_usuario`, `usuario`, `contraseña`, `nombre`, `apellido`) VALUES
(1, 'ameliendrez', '$2y$10$khMVNrxI/4hXw/6SotjuUeMI9z6fhectVye2djPIWfEGQpw.nNPO2', 'Agustin', 'Meliendrez'),
(3, 'santirampoldi', '$2y$10$t7LOzSkfb.hvUPvaVZYRruClD0m4xufe/rb2VNt56A1vd6TlI1/o2', 'santiago', 'rampoldi');

-- --------------------------------------------------------

--
-- Estructura para la vista `cervezavw`
--
DROP TABLE IF EXISTS `cervezavw`;

CREATE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY INVOKER VIEW `cervezavw`  AS  select `db_tpe`.`cerveza`.`id_cerveza` AS `id_cerveza`,`db_tpe`.`cerveza`.`nombre` AS `nombreCerveza`,`db_tpe`.`estilocerveza`.`nombre` AS `estilo`,`db_tpe`.`cerveza`.`%alc` AS `porcentajeALC`,`db_tpe`.`cerveza`.`descripcion` AS `descripcion` from (`db_tpe`.`cerveza` join `db_tpe`.`estilocerveza`) where (`db_tpe`.`cerveza`.`id_estilo` = `db_tpe`.`estilocerveza`.`id_estilo`) WITH CASCADED CHECK OPTION ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cerveza`
--
ALTER TABLE `cerveza`
  ADD PRIMARY KEY (`id_cerveza`),
  ADD KEY `id_estilo` (`id_estilo`);

--
-- Indices de la tabla `estilocerveza`
--
ALTER TABLE `estilocerveza`
  ADD PRIMARY KEY (`id_estilo`);

--
-- Indices de la tabla `loginusuario`
--
ALTER TABLE `loginusuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cerveza`
--
ALTER TABLE `cerveza`
  MODIFY `id_cerveza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estilocerveza`
--
ALTER TABLE `estilocerveza`
  MODIFY `id_estilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `loginusuario`
--
ALTER TABLE `loginusuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cerveza`
--
ALTER TABLE `cerveza`
  ADD CONSTRAINT `cerveza_ibfk_1` FOREIGN KEY (`id_estilo`) REFERENCES `estilocerveza` (`id_estilo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
