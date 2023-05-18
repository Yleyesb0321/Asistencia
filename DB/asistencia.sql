-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 16-05-2023 a las 04:37:23
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `Id_Materia` int(5) NOT NULL,
  `Nombre_Materia` varchar(35) NOT NULL,
  `Id_Docente` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`Id_Materia`, `Nombre_Materia`, `Id_Docente`) VALUES
(3, 'Arquitectura', 4),
(12, 'Comunicación', 1),
(23, 'Software', 2),
(26, 'Gestion_Empresarial', 4),
(67, 'Lengua Extranjera', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `Id_Docente` int(2) NOT NULL,
  `Nombre_Docente` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`Id_Docente`, `Nombre_Docente`) VALUES
(1, 'CAMILO TORRES'),
(2, 'DANIELA HERNANDEZ'),
(3, 'LAURA HURTADO'),
(4, 'Sandra Bullock');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `Id_estudiante` int(2) NOT NULL,
  `Fecha_ingreso` date NOT NULL,
  `Tipo_documento` text NOT NULL,
  `Documento` int(20) NOT NULL,
  `Nombres` text NOT NULL,
  `Apellidos` text NOT NULL,
  `Edad` int(2) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Telefono` int(12) NOT NULL,
  `Id_Materia` int(5) NOT NULL,
  `Nombre_Materia` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`Id_estudiante`, `Fecha_ingreso`, `Tipo_documento`, `Documento`, `Nombres`, `Apellidos`, `Edad`, `Correo`, `Telefono`, `Id_Materia`, `Nombre_Materia`) VALUES
(1, '2023-04-27', 'Cedula', 105234567, 'Daniel ', 'Quintero Perez', 20, 'daniel_quintero@estudiante.com', 232323232, 23, 'Software'),
(2, '2023-04-28', 'Cedula Extranjeria', 1324780998, 'Cristina Andrea', 'Aguilera Gomez', 22, 'cristina22@estudiante.com', 1234567, 67, 'Lengua Extranjera'),
(3, '2023-05-02', 'Tarjeta Identidad', 1052345678, 'Claudia ', 'Bahamon ', 16, 'claudiaB16@correo.com', 321444444, 12, 'Comunicacion');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`Id_Materia`),
  ADD KEY `Id_Docente` (`Id_Docente`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`Id_Docente`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`Id_estudiante`),
  ADD KEY `Id_Materia` (`Id_Materia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `Id_estudiante` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`Id_Docente`) REFERENCES `docentes` (`Id_Docente`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`Id_Materia`) REFERENCES `asignaturas` (`Id_Materia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
