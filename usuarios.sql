-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb1034.awardspace.net
-- Tiempo de generación: 31-08-2025 a las 19:22:11
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `4667274_academia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `fecha_registro`) VALUES
(1, 'pedro', 'pedro.rdz@gmail.com', '$2y$10$AyrD6TuOI958IQGszIR2bez1/qVWm.Bs1S2WEUIVeg04zyebDYgi.', '2025-08-29 15:33:55'),
(2, 'Ramiro', 'ramiro.ad@gmail.com', '$2y$10$9fUfP0paVjY8bURY93b2mOVHTfoaShPD.7L2FDNJLx0bip9Y7TkOi', '2025-08-29 15:34:22'),
(3, 'Eduardo', 'eduardo@gmail.com', '$2y$10$2wIjh1dVPkZ.i0LllmquV.Gk5E0UZgVgQNNuUCjyGpz0k6U28/D36', '2025-08-29 16:10:13'),
(4, 'alan', 'alan@gmail.com', '$2y$10$l1ORV0aLFZOM9GlANRbX9Oa1cWcXImRWFn3tE8EDsZKeIu9/j9XPC', '2025-08-29 16:17:05'),
(5, 'test', 'test@gmail.com', '$2y$10$OCabAC9aOFSFJ0wCGhVKp.H7TxsCo7b18TnvxZMfI6NZKBtZ9w3n6', '2025-08-29 16:28:48'),
(6, 'Adam', 'adam.kmn@gmail.com', '$2y$10$yjmi0AfTjVsDU3KKkwieOuQymEhILwZUDYh2JQyt0BrUKfIi0/i3C', '2025-08-30 00:07:15'),
(7, 'Cruz', 'adam.crz@gmail.com', '$2y$10$ItyfZQABvqcCzjauiFo46eRmzn4DnLGtFzpA813V5GeF78GQwRFVW', '2025-08-30 00:11:41'),
(8, 'Pedro', 'pedrito@gmail.com', '$2y$10$qA/BYonmLrw9wd3.7oOFf.fwykPh7a7hB.z34qiKLEejXayDlP5F.', '2025-08-30 00:14:55'),
(9, 'mariano', 'mariano.elmarciano@gmail.com', '$2y$10$LX9TZJvxIIp34FcNznp.KeMtFGMA3rzBBstaeOoY5r/E/VtibUBvC', '2025-08-30 00:51:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
