-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2017 a las 02:46:51
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `historietasmx`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(70) NOT NULL,
  `correo_usuario` varchar(70) NOT NULL,
  `contrasena` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_usuario`, `nombre_usuario`, `correo_usuario`, `contrasena`) VALUES
(1, 'Administrador', 'admin@historietas.mx', '1234'),
(2, 'Andrew', 'andrew@historietas.mx', '1ola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `id_catalogo` int(11) NOT NULL,
  `nombre_catalogo` varchar(70) NOT NULL,
  `descripcion_catalogo` varchar(140) NOT NULL DEFAULT '',
  `imagen_catalogo` varchar(70) NOT NULL DEFAULT '',
  `carpeta_cat_revistas` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`id_catalogo`, `nombre_catalogo`, `descripcion_catalogo`, `imagen_catalogo`, `carpeta_cat_revistas`) VALUES
(1, 'Las Chambeadoras', 'Las chambeadoras																																												', 'Catalogo/elteo.jpg', 'Revistas/1_Chambeadoras'),
(2, 'Erótika', 'Descripcion Catlogo 2 weroticq', 'Catalogo/reubir.png', 'Revistas/2_Erotika'),
(3, 'Erótika 3', 'Este es un catalogo numero 3 con una imagen', 'Catalogo/unnamed.jpg', 'Revistas/3_Catalogo3'),
(4, 'Catalogo 4', 'Prueba', 'Catalogo/67838f91b77f41d637d0537ca43474b8.jpg', 'Revistas/4_Catalogo4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestras`
--

CREATE TABLE `muestras` (
  `id_muestra` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `descripcion` varchar(140) NOT NULL DEFAULT '',
  `imagen` varchar(140) NOT NULL DEFAULT '',
  `documento` varchar(140) NOT NULL DEFAULT '',
  `activo` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `muestras`
--

INSERT INTO `muestras` (`id_muestra`, `titulo`, `descripcion`, `imagen`, `documento`, `activo`) VALUES
(1, 'Muestra chambeadoras', 'Muestra chambeadoras', 'Prueba/imagen/Chambeadoras.jpg', 'Prueba/documento/Chambeadoras.pdf', 1),
(2, 'Muestra erotika 1', 'Muestra erotika 1', 'Prueba/imagen/Erotika1.jpg', 'muestra2.pdf', 1),
(3, 'Muestra erotika 2', 'Muestra erotika 2', 'Prueba/imagen/Erotika2.jpg', 'muestra3.pdf', 1),
(4, 'Muestra erotika 4', 'The Crimson Sunbird', 'Prueba/imagen/HeaderDW.png', 'Prueba/documento/Ensayo - Grandes Industrias.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revistas`
--

CREATE TABLE `revistas` (
  `id_revista` int(11) NOT NULL,
  `id_catalogo` int(11) NOT NULL,
  `nombre_revista` varchar(70) NOT NULL,
  `numero_revista` int(11) NOT NULL,
  `info_revista` text NOT NULL,
  `img_revista` varchar(120) NOT NULL,
  `pdf_revista` varchar(120) NOT NULL,
  `activo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `revistas`
--

INSERT INTO `revistas` (`id_revista`, `id_catalogo`, `nombre_revista`, `numero_revista`, `info_revista`, `img_revista`, `pdf_revista`, `activo`) VALUES
(1, 2, 'Piel de Ébano en Apareamiento x', 90, 'Prueba de información extra de la revista x', 'Revistas/2_Erotika/img/Erotika2.jpg', 'Revistas/2_Erotika/pdf/Chambeadoras.pdf', 1),
(2, 2, 'Olores Íntimos', 6, 'Otra información de la revista.', 'Revistas/2_Erotika/img/Erotika2.jpg', 'Revistas/2_Erotika/pdf/Erotika2.pdf', 0),
(6, 4, 'Prueba revista c4', 100, 'Descripcion de la revista de catalogo 4', 'Revistas/4_Catalogo4/img/310795.jpg', 'Revistas/2_Erotika/pdf/Erotika2.pdf', 1),
(8, 1, 'El lobo de Wall Street', 44, 'Contratos con USR', 'Revistas/1_Chambeadoras/img/Central-Park-Wallpapers-Amazing.jpeg', 'Revistas/1_Chambeadoras/pdf/Diseño de niveles.pdf', 1),
(9, 1, 'Yo Robot', 4, 'Yo soy un fucking Robot', 'Revistas/1_Chambeadoras/img/unnamed.jpg', 'Revistas/1_Chambeadoras/pdf/Legendary Battles.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores_mail`
--

CREATE TABLE `suscriptores_mail` (
  `id_usuario` int(11) NOT NULL,
  `mail` varchar(140) NOT NULL DEFAULT '',
  `nombre` varchar(140) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(70) NOT NULL,
  `correo_usuario` varchar(70) NOT NULL,
  `contrasena` varchar(70) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `edad` int(20) NOT NULL,
  `premium` int(2) NOT NULL,
  `API` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `correo_usuario`, `contrasena`, `sexo`, `edad`, `premium`, `API`) VALUES
(4, 'Richard VelRo', 'rvelazquez@devworms.com', 'abcdefg', '2', 27, 1, '10055'),
(5, 'Juan', 'juan@1234.com', 'abcdefg', '2', 25, 0, '68585'),
(6, 'Pepe Mujica', 'pep@jicama.com', '12345', '2', 48, 0, '22143'),
(7, 'Juan Perez', 'correo@1234.com', '1234', '2', 17, 0, 'ac18cee5b94c53344d24cd501911835f'),
(8, 'Prueba', 'admin@historietas.mx', '1234', '2', 30, 0, '38995'),
(9, 'OtroUsuario', 'andrewala@laala.com', 'aBc124', '2', 50, 0, '66373'),
(11, 'Andy', 'correoPrueba@correo.com', 'ola90', '2', 20, 1, '47955'),
(12, 'Luis Oramas', 'luis.oramas@devolada.com', '!!!luis', '2', 29, 1, 'ihbuibuh'),
(13, 'Luis Oramas', 'luis.angel.oramas@gmail.com', 'Luis4ngel', '2', 29, 1, 'skdlijbsiujdh'),
(14, 'Jaime Flores', 'jaime@devolada.com', 'jaime1234', '2', 29, 1, 'jsdygvsiyb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wallett`
--

CREATE TABLE `wallett` (
  `id_wallet` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `numero_tarjeta` varchar(16) NOT NULL,
  `fecha_caducidad` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `wallett`
--

INSERT INTO `wallett` (`id_wallet`, `id_usuario`, `numero_tarjeta`, `fecha_caducidad`) VALUES
(1, 1, '4444555599998888', '2016-11-30 02:49:10'),
(2, 8, '0', '2016-12-12 23:13:11'),
(3, 9, '0', '2016-12-12 23:24:03'),
(4, 10, '0', '2016-12-12 23:47:21'),
(5, 11, '4444555599998888', '2017-12-12 23:49:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`id_catalogo`);

--
-- Indices de la tabla `muestras`
--
ALTER TABLE `muestras`
  ADD PRIMARY KEY (`id_muestra`);

--
-- Indices de la tabla `revistas`
--
ALTER TABLE `revistas`
  ADD PRIMARY KEY (`id_revista`),
  ADD KEY `id_catalogo` (`id_catalogo`);

--
-- Indices de la tabla `suscriptores_mail`
--
ALTER TABLE `suscriptores_mail`
  ADD PRIMARY KEY (`id_usuario`,`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `API` (`API`);

--
-- Indices de la tabla `wallett`
--
ALTER TABLE `wallett`
  ADD PRIMARY KEY (`id_wallet`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `id_catalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `muestras`
--
ALTER TABLE `muestras`
  MODIFY `id_muestra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `revistas`
--
ALTER TABLE `revistas`
  MODIFY `id_revista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `suscriptores_mail`
--
ALTER TABLE `suscriptores_mail`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `wallett`
--
ALTER TABLE `wallett`
  MODIFY `id_wallet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
