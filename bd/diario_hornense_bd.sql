-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33065
-- Tiempo de generación: 18-11-2020 a las 21:56:24
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diario_hornense_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `perfil` text NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `perfil`, `nombre`, `usuario`, `password`, `estado`, `fecha`) VALUES
(1, 'Administrador', 'Francisco', 'admin', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 1, '2020-09-16 09:09:16'),
(2, 'Editor-Noticias-Sociales-Galerias', 'Nombre', 'editor1', '$2a$07$asxx54ahjppf45sd87a5audfg3TgdEQLJ1gdiQSmq2OvcDnShNyA6', 1, '2020-09-16 09:20:20'),
(3, 'Editor-Clasificados', 'Nombre', 'editor2', '$2a$07$asxx54ahjppf45sd87a5au.dJ21RRNUGmPU1feXSgJTnazxtj7WMi', 1, '2020-09-16 09:20:23'),
(4, 'Editor-Publicidad', 'Nombre', 'editor3', '$2a$07$asxx54ahjppf45sd87a5auk5yEjkP6bjZRjoz4Y2qslSnO7WctGxS', 1, '2020-09-16 09:20:26'),
(5, 'Editor-Sociales-Newsletter', 'Nombre', 'editor4', '$2a$07$asxx54ahjppf45sd87a5audTMZpEschLaJLFYSVxuPJhjC46imGjG', 1, '2020-09-16 09:20:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `titulo_categoria` text NOT NULL,
  `descripcion_categoria` text NOT NULL,
  `p_claves_categoria` text NOT NULL,
  `ruta_categoria` text NOT NULL,
  `fecha_categoria` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `titulo_categoria`, `descripcion_categoria`, `p_claves_categoria`, `ruta_categoria`, `fecha_categoria`) VALUES
(1, 'INICIO', '', '', 'inicio', '2020-11-18 20:42:55'),
(2, 'NOSOTROS', '', '', 'nosotros', '2020-11-18 20:42:55'),
(3, 'ACTUALIDAD', '', '', 'actualidad', '2020-11-18 20:42:55'),
(4, 'TRADICION', '', '', 'tradicion', '2020-11-18 21:14:44'),
(5, 'SOCIALES', '', '', 'sociales', '2020-11-18 20:42:55'),
(6, 'SALUD', '', '', 'salud', '2020-11-18 20:42:55'),
(7, 'MUNDO ANIMAL', '', '', 'mundo-animal', '2020-11-18 20:42:55'),
(8, 'ESPACIO MUSICAL', '', '', 'espacio-musical', '2020-11-18 20:42:55'),
(9, 'ESPACIO VERDE', '', '', 'espacio-verde', '2020-11-18 20:42:55'),
(10, 'ESPACIO INFANTIL', '', '', 'espacio-infantil', '2020-11-18 20:42:55'),
(11, 'CLASIFICADOS', '', '', 'clasificados', '2020-11-18 21:12:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_clasificados`
--

CREATE TABLE `categorias_clasificados` (
  `id_categoria_cla` int(11) NOT NULL,
  `titulo_categoria_cla` text NOT NULL,
  `ruta_categoria_cla` text NOT NULL,
  `ruta_icono` text NOT NULL,
  `fecha_categoria_cla` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias_clasificados`
--

INSERT INTO `categorias_clasificados` (`id_categoria_cla`, `titulo_categoria_cla`, `ruta_categoria_cla`, `ruta_icono`, `fecha_categoria_cla`) VALUES
(1, 'INMUEBLES', 'inmuebles', 'vista/img/clasificados/icon_inmueble_default.png', '2020-11-18 20:52:06'),
(2, 'SALUD', 'salud', 'vista/img/clasificados/icon_salud_default.png', '2020-11-18 20:52:06'),
(3, 'TRANSPORTES Y FLETES', 'transportes-y-fletes', 'vista/img/clasificados/icon_fletes_default.png', '2020-11-18 20:52:06'),
(4, 'COMPRA Y VENTA DE ARTICULOS', 'compra-y-venta-de-articulos', 'vista/img/clasificados/icon_compra-venta_default.png', '2020-11-18 20:52:06'),
(5, 'AUTOMOTORES', 'automotores', 'vista/img/clasificados/icon_automotores_default.png', '2020-11-18 20:52:06'),
(6, 'SERVICIOS', 'servicios', 'vista/img/clasificados/icon_servicios_default.png', '2020-11-18 20:52:06'),
(7, 'VETERINARIAS', 'veterinarias', 'vista/img/clasificados/icon_veterinaria_default.png', '2020-11-18 20:52:06'),
(8, 'JARDINERIA Y VIVEROS', 'jardineria-y-viveros', 'vista/img/clasificados/icon_jardineria_default.png', '2020-11-18 20:52:06'),
(9, 'EMPLEOS', 'empleos', 'vista/img/clasificados/icon_empleo_default.png', '2020-11-18 20:52:06'),
(10, 'OFICIOS OFRECIDOS', 'oficios-ofrecidos', 'vista/img/clasificados/icon_oficios_default.png', '2020-11-18 20:52:06'),
(11, 'LEGALES', 'legales', 'vista/img/clasificados/icon_legales_default.png', '2020-11-18 20:52:06'),
(12, 'VARIOS', 'varios', 'vista/img/clasificados/icon_varios_default.png', '2020-11-18 20:52:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificados`
--

CREATE TABLE `clasificados` (
  `id_clasificado` int(11) NOT NULL,
  `id_categoria_clasificado` text NOT NULL,
  `caracteristica` text NOT NULL,
  `operacion` text NOT NULL,
  `dia` text NOT NULL,
  `detalles_clasificado` text,
  `ruta_img_clasificado` text,
  `url_clasificado` text,
  `fecha_clasificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_imagen`
--

CREATE TABLE `galeria_imagen` (
  `id_imagen` int(11) NOT NULL,
  `id_categoria_img` text NOT NULL,
  `titulo_imagen` text NOT NULL,
  `ruta_imagen` text NOT NULL,
  `epigrafe_imagen` text NOT NULL,
  `descripcion_img_galeria` text NOT NULL,
  `fecha_galeria_img` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_tapa`
--

CREATE TABLE `galeria_tapa` (
  `id_tapa` int(11) NOT NULL,
  `ruta_img_tapa` text NOT NULL,
  `descripcion_tapa` text NOT NULL,
  `fecha_tapa` text NOT NULL,
  `fecha_galeria_tapa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_video`
--

CREATE TABLE `galeria_video` (
  `id_video` int(11) NOT NULL,
  `id_categoria_video` text NOT NULL,
  `titulo_video` text NOT NULL,
  `codigo_video` text NOT NULL,
  `fecha_galeria_video` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletter`
--

CREATE TABLE `newsletter` (
  `id_newsletter` int(11) NOT NULL,
  `email` text NOT NULL,
  `fecha_newsletter` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `id_categoria_noticia` text NOT NULL,
  `ruta_inicio` text,
  `volanta` text NOT NULL,
  `titulo_noticia` text NOT NULL,
  `bajada` text NOT NULL,
  `ruta_noticia` text NOT NULL,
  `p_claves` text NOT NULL,
  `img_portada_ruta` text,
  `epigrafe_portada` text,
  `descripcion_portada` text,
  `video_codigo` text,
  `contenido_noticia` text NOT NULL,
  `cantidad_vistas` int(11) NOT NULL,
  `fecha_noticia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `id_publicidad` int(11) NOT NULL,
  `id_categoria_publi` text NOT NULL,
  `disposicion` text NOT NULL,
  `ruta_img_publicidad` text NOT NULL,
  `url_publicidad` text NOT NULL,
  `fecha_publicidad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sociales`
--

CREATE TABLE `sociales` (
  `id_social` int(11) NOT NULL,
  `titulo_social` text NOT NULL,
  `imagen_social_ruta` text NOT NULL,
  `epigrafe_social_uno` text NOT NULL,
  `descripcion_img_social` text NOT NULL,
  `imagen_social_rutados` text,
  `epigrafe_social_dos` text,
  `descripcion_img_social_dos` text,
  `imagen_social_rutatres` text,
  `epigrafe_social_tres` text,
  `descripcion_img_social_tres` text,
  `imagen_social_rutacuatro` text,
  `epigrafe_social_cuatro` text,
  `descripcion_img_social_cuatro` text,
  `contenido_social` text NOT NULL,
  `fecha_social` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `categorias_clasificados`
--
ALTER TABLE `categorias_clasificados`
  ADD PRIMARY KEY (`id_categoria_cla`);

--
-- Indices de la tabla `clasificados`
--
ALTER TABLE `clasificados`
  ADD PRIMARY KEY (`id_clasificado`);

--
-- Indices de la tabla `galeria_imagen`
--
ALTER TABLE `galeria_imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `galeria_tapa`
--
ALTER TABLE `galeria_tapa`
  ADD PRIMARY KEY (`id_tapa`);

--
-- Indices de la tabla `galeria_video`
--
ALTER TABLE `galeria_video`
  ADD PRIMARY KEY (`id_video`);

--
-- Indices de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id_newsletter`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`id_publicidad`);

--
-- Indices de la tabla `sociales`
--
ALTER TABLE `sociales`
  ADD PRIMARY KEY (`id_social`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categorias_clasificados`
--
ALTER TABLE `categorias_clasificados`
  MODIFY `id_categoria_cla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `clasificados`
--
ALTER TABLE `clasificados`
  MODIFY `id_clasificado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galeria_imagen`
--
ALTER TABLE `galeria_imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galeria_tapa`
--
ALTER TABLE `galeria_tapa`
  MODIFY `id_tapa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galeria_video`
--
ALTER TABLE `galeria_video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id_newsletter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `id_publicidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sociales`
--
ALTER TABLE `sociales`
  MODIFY `id_social` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
