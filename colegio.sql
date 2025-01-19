-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2025 a las 19:59:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `dni`, `nombre`) VALUES
(1, '12312312A', 'Alejandro Aguayo'),
(2, '11122233B', 'Manuel Romero'),
(3, '12121212B', 'Maite Correa'),
(4, '12121212A', 'Jaled Jefe'),
(5, '69696969X', 'Ana Khalifa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alu_asig`
--

CREATE TABLE `alu_asig` (
  `nota` float(3,1) DEFAULT NULL,
  `id_alum` int(11) NOT NULL,
  `id_asig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alu_asig`
--

INSERT INTO `alu_asig` (`nota`, `id_alum`, `id_asig`) VALUES
(0.0, 2, 1),
(0.0, 2, 3),
(0.0, 5, 2),
(0.0, 1, 3),
(0.0, 4, 3),
(0.0, 4, 4),
(0.0, 1, 2),
(0.0, 1, 1),
(0.0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `modulo` varchar(20) NOT NULL,
  `curso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `nombre`, `modulo`, `curso`) VALUES
(1, 'PHP', 'D.A.Web', 2),
(2, 'JavaScript', 'D.A.Multiplataforma', 2),
(3, 'Java', 'D.A.Web', 1),
(4, 'SIS', 'D.A.Multiplataforma', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alu_asig`
--
ALTER TABLE `alu_asig`
  ADD KEY `fk_idAlum_id` (`id_alum`),
  ADD KEY `fk_idAsig_id` (`id_asig`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alu_asig`
--
ALTER TABLE `alu_asig`
  ADD CONSTRAINT `fk_idAlum_id` FOREIGN KEY (`id_alum`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idAsig_id` FOREIGN KEY (`id_asig`) REFERENCES `asignaturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
