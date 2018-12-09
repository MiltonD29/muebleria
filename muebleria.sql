-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2018 a las 17:02:10
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `muebleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(7, 'Escritorios', '2018-12-06 08:24:34'),
(8, 'Sillones', '2018-12-06 08:24:46'),
(9, 'Sillas', '2018-12-06 08:25:04'),
(10, 'Camas', '2018-12-06 08:25:23'),
(11, 'Bufetero', '2018-12-06 08:25:39'),
(12, 'Comedores', '2018-12-08 23:10:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `fecha`) VALUES
(63, 7, '701', 'Escritorio 1', 'vistas/img/productos/701/188.png', 50, 3501, 4901.4, '2018-12-07 07:22:50'),
(64, 8, '801', 'Sofá Loveseat', 'vistas/img/productos/801/906.png', 20, 8199, 11478.6, '2018-12-07 07:44:12'),
(65, 9, '901', 'Silla de oficina', 'vistas/img/productos/901/273.png', 1, 1349, 1888.6, '2018-12-06 08:32:52'),
(66, 10, '1001', 'Cama king size', 'vistas/img/productos/1001/230.png', 1, 9999, 13998.6, '2018-12-06 08:33:32'),
(67, 8, '802', 'Sillon', 'vistas/img/productos/802/787.png', 1, 6129, 8580.6, '2018-12-06 08:36:06'),
(68, 7, '702', 'Escritorio 2', 'vistas/img/productos/702/406.png', 1, 4199, 5878.6, '2018-12-06 08:36:42'),
(69, 11, '1101', 'Bufetero', 'vistas/img/productos/1101/493.png', 1, 4390, 6146, '2018-12-06 08:37:32'),
(70, 9, '902', 'Silla alta', 'vistas/img/productos/902/417.png', 1, 1189, 1664.6, '2018-12-06 08:38:08'),
(71, 8, '803', 'Sillón 2', 'vistas/img/productos/803/881.png', 1, 12399, 17358.6, '2018-12-06 08:38:46'),
(72, 8, '804', 'Sillón reclinable', 'vistas/img/productos/804/428.png', 1, 2299, 3218.6, '2018-12-06 08:39:16'),
(73, 12, '1201', 'Comedor de madera', 'vistas/img/productos/1201/490.jpg', 200, 5000, 7000, '2018-12-08 23:11:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `estado`, `ultimo_login`, `fecha`) VALUES
(60, 'Administrador', 'admin2', '$2a$07$asxx54ahjppf45sd87a5auQiIkHFPxWl6.B8PXuM6ISTp3fo4ENAq', 'Administrador', 1, '2018-12-07 02:08:36', '2018-12-07 07:08:36'),
(61, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 1, '2018-12-08 18:09:58', '2018-12-08 23:09:58'),
(62, 'Administrador 3', 'admin3', '$2a$07$asxx54ahjppf45sd87a5auWU8FzNhVPWwQHqiIBrv31WdTj3u8mzO', 'Administrador', 1, '2018-12-08 18:10:38', '2018-12-08 23:10:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
