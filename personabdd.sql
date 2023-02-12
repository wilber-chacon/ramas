-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-01-2023 a las 02:44:42
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `personabdd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupaciones`
--

DROP TABLE IF EXISTS `ocupaciones`;
CREATE TABLE IF NOT EXISTS `ocupaciones` (
  `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT,
  `ocupacion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ocupacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ocupaciones`
--

INSERT INTO `ocupaciones` (`id_ocupacion`, `ocupacion`) VALUES
(1, 'Doctor'),
(2, 'Emprendedor'),
(3, 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_persona` varchar(100) NOT NULL,
  `edad_persona` int(11) NOT NULL,
  `telefono_persona` varchar(15) NOT NULL,
  `sexo_persona` varchar(50) NOT NULL,
  `id_ocupacion` int(11) NOT NULL,
  `fecha_nac` date NOT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `id_ocupacion` (`id_ocupacion`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre_persona`, `edad_persona`, `telefono_persona`, `sexo_persona`, `id_ocupacion`, `fecha_nac`) VALUES
(2, 'Alejandro Pineda', 45, '7722-4455', 'Masculino', 1, '1999-01-05'),
(12, 'Fernando Calderón', 21, '7667-7890', 'Masculino', 2, '2001-05-07'),
(15, 'Emerson Torres', 23, '7123-9800', 'Masculino', 3, '1999-08-03'),
(16, 'Wilber', 20, '7722-4455', 'masculino', 2, '2012-05-10');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupaciones` (`id_ocupacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
