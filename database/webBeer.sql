-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2017 a las 22:40:22
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
  `nombre_cerveza` varchar(25) NOT NULL,
  `alc` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cerveza`
--

INSERT INTO `cerveza` (`id_cerveza`, `id_estilo`, `nombre_cerveza`, `alc`, `descripcion`) VALUES
(1, 4, 'Sweet Stout', 5, 'Una cerveza muy rica, suave, cremosa y dulce. perfecta para tomar de postre si quieres algo oscuro, con sabor y cuerpo. A menudo tiene gusto tipo café express.'),
(2, 5, 'Brown Porter', 4, 'Estamos ante una cerveza de color marrón con un carácter moderadamente tostado y amargo. '),
(3, 1, 'India Pale Ale', 4, 'Cerveza de tradición inglesa que se caracteriza como una ale pálida y espumosa con un alto nivel del alcohol y de lúpulo.'),
(4, 4, 'Imperial Stout', 9, 'Es una variante del estilo Stout que se caracteriza por tener una mayor cantidad de alcohol por volumen y una mayor concentración de lúpulo y/o malta.'),
(5, 2, 'American Lite', 9, 'Es una cerveza muy refrescante y con una caracteristicas diferenciadora de saciadora de la sed, careciendo de sabores fuertes.'),
(6, 1, 'Scotch Ale', 8, 'Sabrosa, maltosa y usualmente dulce, lo cual puede sugerir un postre. Los sabores complejos secundarios previenen una impresion unidimensional. La fuerza y la maltosidad pueden variar.'),
(7, 1, 'Weizenbier', 7, 'Aroma afrutado, a plátano, con acabado a levadura. Poco amarga, ligeramente ácida y muy refrescante. ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarioscerveza`
--

CREATE TABLE `comentarioscerveza` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `id_cerveza` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarioscerveza`
--

INSERT INTO `comentarioscerveza` (`id_comentario`, `comentario`, `id_cerveza`, `id_usuario`) VALUES
(2, 'Comentario prueba.', 2, 1),
(3, 'Probando POST', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilocerveza`
--

CREATE TABLE `estilocerveza` (
  `id_estilo` int(11) NOT NULL,
  `nombre_estilo` varchar(25) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estilocerveza`
--

INSERT INTO `estilocerveza` (`id_estilo`, `nombre_estilo`, `descripcion`) VALUES
(1, 'Ale', 'Cervezas de fermentación alta, y por ello el proceso de fermentación ocurre en la superficie del líquido. Las cervezas Ales tienen mayor graduación alcohólica y un sabor más complejo que otras. '),
(2, 'Lager', 'Es un tipo de cerveza con sabor acentuado que se sirve fría, caracterizada por fermentar en condiciones lentas, empleando levaduras especiales, conocidas como levaduras de fermentación baja.'),
(3, 'Trigo', 'Las cervezas de trigo también se conocen como cervezas blancas por su aspecto, cuando no están filtradas. La mayor parte del tiempo son de alta fermentación.'),
(4, 'Stout', 'Stout es el nombre de un estilo de cerveza, tipo ale, muy oscura, originario de las islas británicas. Era el nombre utilizado para la cerveza más fuerte(7 u 8 %alc) producido por cada cervecería.'),
(5, 'Porter', 'La porter es un tipo de ale (cerveza). Tiene el aroma del malteado y el amargor del lúpulo. Es generalmente fuerte y oscura. Se elabora preferentemente con aguas de bajo contenido en calcio (blandas).');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `id_cerveza` int(11) NOT NULL,
  `ruta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `id_cerveza`, `ruta`) VALUES
(14, 1, 'images/Sweet stout.jpg'),
(15, 2, 'images/Brown Porter.jpg'),
(16, 3, 'images/India Pale Ale.jpg'),
(17, 4, 'images/Imperial Stout.jpg'),
(18, 5, 'images/American Lite.jpg'),
(19, 6, 'images/Scotch Ale.jpg'),
(20, 7, 'images/Weizenbier.jpg'),
(21, 2, 'images/Sweet stout.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loginusuario`
--

CREATE TABLE `loginusuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `esAdmin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `loginusuario`
--

INSERT INTO `loginusuario` (`id_usuario`, `usuario`, `password`, `nombre`, `apellido`, `esAdmin`) VALUES
(1, 'ameliendrez', '$2y$10$khMVNrxI/4hXw/6SotjuUeMI9z6fhectVye2djPIWfEGQpw.nNPO2', 'agustin', 'meliendrez', 1),
(3, 'santirampoldi', '$2y$10$t7LOzSkfb.hvUPvaVZYRruClD0m4xufe/rb2VNt56A1vd6TlI1/o2', 'santiago', 'rampoldi', 1),
(4, 'santirampoldi@hotmail.com', '$2y$10$8XpR2hf3zG24JF.3yIvsMeKy.sf5BJYC/judVUoxjh85FPFy4NCXS', 'probando', 'user', 0);

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
-- Indices de la tabla `comentarioscerveza`
--
ALTER TABLE `comentarioscerveza`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_cerveza` (`id_cerveza`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `estilocerveza`
--
ALTER TABLE `estilocerveza`
  ADD PRIMARY KEY (`id_estilo`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_cerveza` (`id_cerveza`);

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
  MODIFY `id_cerveza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `comentarioscerveza`
--
ALTER TABLE `comentarioscerveza`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `estilocerveza`
--
ALTER TABLE `estilocerveza`
  MODIFY `id_estilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1994;
--
-- AUTO_INCREMENT de la tabla `loginusuario`
--
ALTER TABLE `loginusuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cerveza`
--
ALTER TABLE `cerveza`
  ADD CONSTRAINT `cerveza_ibfk_1` FOREIGN KEY (`id_estilo`) REFERENCES `estilocerveza` (`id_estilo`);

--
-- Filtros para la tabla `comentarioscerveza`
--
ALTER TABLE `comentarioscerveza`
  ADD CONSTRAINT `comentarioscerveza_ibfk_1` FOREIGN KEY (`id_cerveza`) REFERENCES `cerveza` (`id_cerveza`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarioscerveza_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `loginusuario` (`id_usuario`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`id_cerveza`) REFERENCES `cerveza` (`id_cerveza`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
