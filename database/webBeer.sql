-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2017 a las 17:20:07
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
(1, 4, 'Sweet Stout', 5, 'Una cerveza muy rica, suave, cremosa y dulce. perfecta para tomar de postre si quieres algo oscuro, con sabor y cuerpo. A menudo tiene gusto tipo café express.'),
(2, 5, 'Brown Porter', 4, 'Estamos ante una cerveza de color marrón con un carácter moderadamente tostado y amargo. '),
(3, 1, 'India Pale Ale', 4, 'Cerveza de tradición inglesa que se caracteriza como una ale pálida y espumosa con un alto nivel del alcohol y de lúpulo.'),
(4, 4, 'Imperial Stout', 9, 'Es una variante del estilo Stout que se caracteriza por tener una mayor cantidad de alcohol por volumen y una mayor concentración de lúpulo y/o malta.'),
(5, 2, 'American Lite', 9, 'Es una cerveza muy refrescante y con una caracteristicas diferenciadora de saciadora de la sed, careciendo de sabores fuertes.'),
(6, 1, 'Scotch Ale', 8, 'Sabrosa, maltosa y usualmente dulce, lo cual puede sugerir un postre. Los sabores complejos secundarios previenen una impresion unidimensional. La fuerza y la maltosidad pueden variar.'),
(7, 3, 'Weizenbier', 7, 'Aroma afrutado, a plátano, con acabado a levadura. Poco amarga, ligeramente ácida y muy refrescante. '),
(8, 1, 'aslgo', 7, 'odro,');

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
(1, 'Ale', 'cervezas de fermentación alta, y por ello el proceso de fermentación ocurre en la superficie del líquido. Las cervezas Ales tienen mayor graduación alcohólica y un sabor más complejo que otras. '),
(2, 'Lager', 'Es un tipo de cerveza con sabor acentuado que se sirve fría, caracterizada por fermentar en condiciones lentas, empleando levaduras especiales, conocidas como levaduras de fermentación baja.'),
(3, 'Trigo', 'Las cervezas de trigo también se conocen como cervezas blancas por su aspecto, cuando no están filtradas. La mayor parte del tiempo son de alta fermentación.'),
(4, 'Stout', 'Stout es el nombre de un estilo de cerveza, tipo ale, muy oscura, originario de las islas británicas. Era el nombre utilizado para la cerveza más fuerte(7 u 8 %alc) producido por cada cervecería.'),
(5, 'Porter', 'La porter es un tipo de ale (cerveza). Tiene el aroma del malteado y el amargor del lúpulo. Es generalmente fuerte y oscura. Se elabora preferentemente con aguas de bajo contenido en calcio (blandas).');

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

CREATE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY INVOKER VIEW `cervezavw`  AS  select `cerveza`.`id_cerveza` AS `id_cerveza`,`cerveza`.`nombre` AS `nombreCerveza`,`estilocerveza`.`nombre` AS `estilo`,`cerveza`.`%alc` AS `porcentajeALC`,`cerveza`.`descripcion` AS `descripcion` from (`cerveza` join `estilocerveza`) where (`cerveza`.`id_estilo` = `estilocerveza`.`id_estilo`) WITH CASCADED CHECK OPTION ;

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
  MODIFY `id_cerveza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `estilocerveza`
--
ALTER TABLE `estilocerveza`
  MODIFY `id_estilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
