-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-12-2016 a las 08:17:16
-- Versión del servidor: 5.6.26-log
-- Versión de PHP: 5.6.23

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
(1, 'Administrador', 'admin@historietas.mx', '1'),
(2, 'Andrew', 'andrew@historietas.mx', '1ola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `id_catalogo` int(11) NOT NULL,
  `nombre_catalogo` varchar(70) NOT NULL,
  `descripcion_catalogo` varchar(140) NOT NULL DEFAULT '',
  `imagen_catalogo` varchar(70) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`id_catalogo`, `nombre_catalogo`, `descripcion_catalogo`, `imagen_catalogo`) VALUES
(1, 'Las Chambeadoras', 'Las chambeadoras Catalogo																																													', 'Boceto.png'),
(2, 'Erótika', 'Descripcion Catlogo 2 weroticq', '07.jpg'),
(3, 'Los Vaqueros', 'Este es un catalogo numero 3', 'onepiece1-598.jpg'),
(4, 'Prueba Vaquera', 'Libros Vaqueros		', 'Portada_capitulo_651.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestras`
--

CREATE TABLE `muestras` (
  `id_muestra` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `descripcion` varchar(140) NOT NULL DEFAULT '',
  `imagen` varchar(140) NOT NULL DEFAULT '',
  `documento` varchar(140) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 2, 'Piel de Ébano en Apareamiento', 117, 'Prueba de información extra de la revista', 'Revistas/2_Erotika/img/Erotika1.jpg', 'Revistas/2_Erotika/pdf/Erotika1.pdf', 1),
(2, 2, 'Olores Íntimos', 6, 'Otra información de la revista.', 'Revistas/2_Erotika/img/Erotika2.jpg', 'Revistas/2_Erotika/pdf/Erotika2.pdf', 1),
(3, 2, 'La neta: ¡Que güena está Petra!', 237, 'Petra está bien buena.', 'Revistas/1_Chambeadoras/img/Chambeadoras.jpg', 'Revistas/1_Chambeadoras/pdf/Chambeadoras.pdf', 1);

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
(11, 'Andy', 'correoPrueba@correo.com', 'ola90', '2', 20, 0, '47955');

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
(5, 11, '0', '2016-12-12 23:49:26');

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
  MODIFY `id_muestra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `revistas`
--
ALTER TABLE `revistas`
  MODIFY `id_revista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `suscriptores_mail`
--
ALTER TABLE `suscriptores_mail`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `wallett`
--
ALTER TABLE `wallett`
  MODIFY `id_wallet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
