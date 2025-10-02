-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2025 a las 03:24:06
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
-- Base de datos: `websiste`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `ID` int(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_configuraciones`
--

CREATE TABLE `tbl_configuraciones` (
  `ID` int(20) NOT NULL,
  `NOMBRECONFIGURACION` varchar(255) NOT NULL,
  `VALOR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_entradas`
--

CREATE TABLE `tbl_entradas` (
  `ID` int(20) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_entradas`
--

INSERT INTO `tbl_entradas` (`ID`, `fecha`, `titulo`, `descripcion`, `imagen`) VALUES
(10, '2013 - 2017', 'NUESTRO INICIO', 'Derecho Laboral, Seguridad Social, Seguridad y Salud en el Trabajo y Medio Ambiente ', '1758980347_baja energia - copia.JPG'),
(11, '2018 - 2022', 'FORTALECIMIENTO E INNOVACION ', 'Servicio se consolidad en tres componentes del Derecho Sustatnivo Laboral, Seguridad Social, Seguridad y Salud en el Trabajo y Medio Ambiente, en donde se analizaran la contractualidad fundamental entre la relaciones laborales individuales ', '1720364213_3.jpg'),
(12, '2023 - 2025', 'ACREDITACION Y MADUREZ', 'Aquirida en negocio mediante la proyeccion de nuevos retos ', '1720364236_4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_equipo`
--

CREATE TABLE `tbl_equipo` (
  `ID` int(20) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombrecompleto` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_equipo`
--

INSERT INTO `tbl_equipo` (`ID`, `imagen`, `nombrecompleto`, `cargo`, `twitter`, `facebook`, `linkedin`) VALUES
(6, '1.jpg', 'DEHIBY MENDOZA DUEÑAS', 'CEO - Representante Legal', '@dmd1983', '@dmd1983', '@dmd1983'),
(7, '2.jpg', 'LILIANA BARBOSA DUEÑAS', 'Metrologa Ocupacional', '@labd1979', '@labd1979', '@labd1979'),
(8, '3.jpg', 'EDWIN MENDOZA DUEÑAS', 'CEO - Socio investigador', '@emd1981', '@emd1981', '@emd1981');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_portafolio`
--

CREATE TABLE `tbl_portafolio` (
  `ID` int(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_portafolio`
--

INSERT INTO `tbl_portafolio` (`ID`, `titulo`, `subtitulo`, `imagen`, `descripcion`, `cliente`, `categoria`, `url`) VALUES
(73, 'ASESORIAS, CONSULTORIA & ASISTENCIA TECNICA LEGAL', 'DISEÑO, IMPLENTACION, INTERVENTORIA, ADMINISTRACIÓN O ASISTENCIA TECNICA, PROFESIONAL O ESPECIALIZADA', '1717460676_Imagen_carpeta.png', 'Servicio de evaluación del cumplimiento tecnico legal en recursos humanos, seguridad social, seguridad y salud en el Trabajo y medio ambiente en todas la indoles, es pecialmente en la industrias de manofacturera, construcción, servicios y educación', 'GENERALk', 'Derecho Laboral', 'https://getbootstrap.com/docs/5.0/forms/floating-labels/'),
(75, 'AUDITORIA DE CUMPLIMIENTO TECNICO LEGAL & PERITAJE JUDICIAL LABORAL Y SEGURIDAD SOCIAL', 'DERECHO LABORAL, SEGURIDAD SOCIAL, SEGURIDAD Y SALUD EN EL TRABAJO Y MEDIO AMBIENTE', '1723170030_Imagen_carpeta.png', 'Servicio se consolidad en tres componentes del Derecho Sustatnivo Laboral, Seguridad Social, Seguridad y Salud en el Trabajo y Medio Ambiente, en donde se analizaran la contractualidad fundamental entre la relaciones laborales individuales ', 'GENERAL', 'Derecho Laboral', 'https://getbootstrap.com/docs/5.0/forms/floating-labels/'),
(76, 'INVESTIGACIÓN DE ACCIDENTES DE TRABAJO Y DE ENFERMEDADES LABORALES & SEGUIMIENTO OCUPACIONAL', 'Servicio de desarollo, gestion y pruebas de sOFTWARE ', '1723172732_Imagen_carpeta.png', 'Derecho Laboral, Seguridad Social, Seguridad y Salud en el Trabajo y Medio Ambiente ', 'Solucion de conflictos y aspectos de las relaciones laborales ', 'EMPRESARAILES', 'https://getbootstrap.com/docs/5.0/forms/floating-labels/'),
(80, 'ESTUDIOS, MEDIOCNES E INVESTIGACION Y DESARROLLO  TECNOLOGICO Y SERVICIO TIC ', 'SERVICIO DE CONSULTORIA ', '1735235720_Imagen_carpeta.png', 'De accidentes de trabajo graves o mortales, enfermedades laborales ', 'GENERAL', 'EMPRESARAL', 'https://getbootstrap.com/docs/5.0/forms/floating-labels/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_servicios`
--

CREATE TABLE `tbl_servicios` (
  `ID` int(20) NOT NULL,
  `icono` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_servicios`
--

INSERT INTO `tbl_servicios` (`ID`, `icono`, `titulo`, `descripcion`) VALUES
(44, 'fa-users', 'ASESORÍAS & CONSULTORÍAS', 'En Derecho Laboral, Seguridad social, Seguridad y salud en el trabajo, Higiene y seguridad industrial, Metrología, Ambiente e innovación'),
(50, 'fa-books', 'ESTUDIOS, INVESTIGACIÓN & PERITAJE TÉCNICO LEGAL', 'Analisis de puestos de trabajo con enfasis en factores de reisgos y carga de exfuerzos, Investigación de accidentes de trabajo (leve, grave, mortal), calificación del origen y pérdida de capacidad laboral.'),
(51, 'fa-lock', 'MEDICIONES & DIAGNOSTICO HIGIÉNICO-OCUPACIONAL Y AMBIENTE ', ''),
(52, 'fa fa-black-tie', 'DISEÑO, IMPLEMENTACIÓN, ADMINISTRACIÓN O ASISTENCIA EN SEGURIDAD Y SALUD EN EL TRABAJO Y MEDIO AMBIENTE', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `ID` int(20) NOT NULL,
  `USUARIO` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `CORREO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_configuraciones`
--
ALTER TABLE `tbl_configuraciones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_entradas`
--
ALTER TABLE `tbl_entradas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_equipo`
--
ALTER TABLE `tbl_equipo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_portafolio`
--
ALTER TABLE `tbl_portafolio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_servicios`
--
ALTER TABLE `tbl_servicios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_configuraciones`
--
ALTER TABLE `tbl_configuraciones`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_entradas`
--
ALTER TABLE `tbl_entradas`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_equipo`
--
ALTER TABLE `tbl_equipo`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_portafolio`
--
ALTER TABLE `tbl_portafolio`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `tbl_servicios`
--
ALTER TABLE `tbl_servicios`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
