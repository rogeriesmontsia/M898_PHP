-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 20-05-2023 a las 20:02:46
-- Versión del servidor: 10.5.2-MariaDB-1:10.5.2+maria~bionic
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `testdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumnes`
--

CREATE TABLE `Alumnes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `cognom1` varchar(50) NOT NULL,
  `cognom2` varchar(50) DEFAULT NULL,
  `correu` varchar(50) NOT NULL,
  `grupClasse` varchar(10) NOT NULL,
  `esProfe` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Alumnes`
--

INSERT INTO `Alumnes` (`id`, `nom`, `cognom1`, `cognom2`, `correu`, `grupClasse`, `esProfe`) VALUES
(1, 'Eric', 'Eiximeno', NULL, 'eric@eric.es', '1a', 0),
(2, 'Laura', 'González', 'Pérez', 'laura@gmail.com', '2b', 0),
(3, 'Carlos', 'Sánchez', 'Martínez', 'carlos@hotmail.com', '3c', 0),
(4, 'María', 'López', 'Fernández', 'maria@outlook.com', '1a', 0),
(5, 'Juan', 'Rodríguez', 'Gómez', 'juan@juan.es', '2b', 0),
(6, 'Ana', 'Torres', 'Ruiz', 'ana@gmail.com', '3c', 0),
(7, 'Pedro', 'Hernández', 'Jiménez', 'pedro@hotmail.com', '1a', 0),
(8, 'Sofía', 'García', 'Vargas', 'sofia@outlook.com', '2b', 0),
(9, 'Alejandro', 'Morales', 'Ramírez', 'alejandro@alejandro.es', '3c', 0),
(10, 'Marta', 'Pérez', 'González', 'marta@gmail.com', '1a', 0),
(88, 'franco', 'eth', NULL, 'franko@frankey.eth', '1a', 1),
(47857777, 'roger', 'arques', NULL, 'roger@arqu.es', '1a', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Assignacions`
--

CREATE TABLE `Assignacions` (
  `id` int(11) NOT NULL,
  `idMaterial` int(11) NOT NULL,
  `idAlumne` int(11) NOT NULL,
  `dataInici` date NOT NULL,
  `dataFinal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Assignacions`
--

INSERT INTO `Assignacions` (`id`, `idMaterial`, `idAlumne`, `dataInici`, `dataFinal`) VALUES
(1, 1, 47857777, '2023-05-01', '2023-06-30'),
(2, 2, 1, '2023-05-03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estats`
--

CREATE TABLE `Estats` (
  `id` int(11) NOT NULL,
  `estat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Incidencies`
--

CREATE TABLE `Incidencies` (
  `id` int(11) NOT NULL,
  `informacio` varchar(5000) DEFAULT NULL,
  `dataOberta` date DEFAULT NULL,
  `dataTancada` date DEFAULT NULL,
  `idAlumne` int(11) DEFAULT NULL,
  `idDispositiu` int(11) DEFAULT NULL,
  `idEstat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Incidencies`
--

INSERT INTO `Incidencies` (`id`, `informacio`, `dataOberta`, `dataTancada`, `idAlumne`, `idDispositiu`, `idEstat`) VALUES
(1, 'no funciona la pantalla', '2023-05-20', NULL, 47857777, 1, NULL),
(2, 'lo androide eiximÃ¨', '2023-05-20', NULL, 47857777, 1, NULL),
(3, 'es gay', '2023-05-20', NULL, 47857777, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Material`
--

CREATE TABLE `Material` (
  `id` int(11) NOT NULL,
  `idTipus` int(11) NOT NULL,
  `idInventari` varchar(10) DEFAULT NULL,
  `etiquetaDepInf` varchar(50) DEFAULT NULL,
  `numSerie` varchar(50) DEFAULT NULL,
  `macEthernet` varchar(50) DEFAULT NULL,
  `macWifi` varchar(50) DEFAULT NULL,
  `SACE` varchar(50) DEFAULT NULL,
  `dataAdquisicio` date DEFAULT NULL,
  `idUbicacio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Material`
--

INSERT INTO `Material` (`id`, `idTipus`, `idInventari`, `etiquetaDepInf`, `numSerie`, `macEthernet`, `macWifi`, `SACE`, `dataAdquisicio`, `idUbicacio`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipusMaterial`
--

CREATE TABLE `TipusMaterial` (
  `id` int(11) NOT NULL,
  `tipus` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `origen` enum('GENE','DEP') DEFAULT 'DEP'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `TipusMaterial`
--

INSERT INTO `TipusMaterial` (`id`, `tipus`, `model`, `origen`) VALUES
(1, 'Ordinador', 'Lenovo', 'DEP'),
(2, 'Tablet', 'Samsung', 'DEP'),
(3, 'Ordinador Portatil', 'Lenovo x250', 'DEP'),
(4, 'Ordinador Sobretaula', 'Dell E400', 'DEP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ubicacions`
--

CREATE TABLE `Ubicacions` (
  `id` int(11) NOT NULL,
  `nom` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Ubicacions`
--

INSERT INTO `Ubicacions` (`id`, `nom`) VALUES
(1, 'aula1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Alumnes`
--
ALTER TABLE `Alumnes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correu` (`correu`);

--
-- Indices de la tabla `Assignacions`
--
ALTER TABLE `Assignacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMaterial` (`idMaterial`),
  ADD KEY `idAlumne` (`idAlumne`);

--
-- Indices de la tabla `Estats`
--
ALTER TABLE `Estats`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Incidencies`
--
ALTER TABLE `Incidencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAlumne` (`idAlumne`),
  ADD KEY `idDispositiu` (`idDispositiu`),
  ADD KEY `idEstat` (`idEstat`);

--
-- Indices de la tabla `Material`
--
ALTER TABLE `Material`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idInventari` (`idInventari`),
  ADD UNIQUE KEY `etiquetaDepInf` (`etiquetaDepInf`),
  ADD UNIQUE KEY `numSerie` (`numSerie`),
  ADD UNIQUE KEY `macEthernet` (`macEthernet`),
  ADD UNIQUE KEY `macWifi` (`macWifi`),
  ADD UNIQUE KEY `SACE` (`SACE`),
  ADD KEY `idTipus` (`idTipus`),
  ADD KEY `idUbicacio` (`idUbicacio`);

--
-- Indices de la tabla `TipusMaterial`
--
ALTER TABLE `TipusMaterial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Ubicacions`
--
ALTER TABLE `Ubicacions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Incidencies`
--
ALTER TABLE `Incidencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Assignacions`
--
ALTER TABLE `Assignacions`
  ADD CONSTRAINT `Assignacions_ibfk_1` FOREIGN KEY (`idMaterial`) REFERENCES `Material` (`id`),
  ADD CONSTRAINT `Assignacions_ibfk_2` FOREIGN KEY (`idAlumne`) REFERENCES `Alumnes` (`id`);

--
-- Filtros para la tabla `Incidencies`
--
ALTER TABLE `Incidencies`
  ADD CONSTRAINT `Incidencies_ibfk_1` FOREIGN KEY (`idAlumne`) REFERENCES `Alumnes` (`id`),
  ADD CONSTRAINT `Incidencies_ibfk_2` FOREIGN KEY (`idDispositiu`) REFERENCES `Material` (`id`),
  ADD CONSTRAINT `Incidencies_ibfk_3` FOREIGN KEY (`idEstat`) REFERENCES `Estats` (`id`);

--
-- Filtros para la tabla `Material`
--
ALTER TABLE `Material`
  ADD CONSTRAINT `Material_ibfk_1` FOREIGN KEY (`idTipus`) REFERENCES `TipusMaterial` (`id`),
  ADD CONSTRAINT `Material_ibfk_2` FOREIGN KEY (`idUbicacio`) REFERENCES `Ubicacions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
