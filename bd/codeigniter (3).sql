-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-02-2020 a las 16:50:49
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `codeigniter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('44nlkbu690unpahmv1k45tcor1hd9a3h', '::1', 1582907124, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323930373132343b6974656d7c733a333a22505334223b),
('f0ar1q3hcn92q7frehq80m2r824dbgls', '::1', 1582907479, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323930373437393b6974656d7c733a333a22505334223b757365726e616d657c733a373a226a6f686e646f65223b656d61696c7c733a32313a226a6f686e646f6540736f6d652d736974652e636f6d223b6c6f676765645f696e7c623a313b),
('05gohqg55ubcp7cuhq3e2bcr21g7olkl', '::1', 1582907912, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323930373931323b6974656d7c733a333a22505334223b757365726e616d657c733a373a226a6f686e646f65223b656d61696c7c733a32313a226a6f686e646f6540736f6d652d736974652e636f6d223b6c6f676765645f696e7c623a313b),
('susc19htb6jqqmb1t6jlvkf7n1bds055', '::1', 1582908378, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323930383337383b757365726e616d657c733a373a226a6f686e646f65223b656d61696c7c733a32313a226a6f686e646f6540736f6d652d736974652e636f6d223b6c6f676765645f696e7c623a313b),
('9bi8qq4au46d46efjgtrq3a5dp8rap64', '::1', 1582908516, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323930383337383b757365726e616d657c733a373a226a6f686e646f65223b656d61696c7c733a32313a226a6f686e646f6540736f6d652d736974652e636f6d223b6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `persona_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`persona_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`persona_id`, `nombre`, `apellido`, `edad`, `image`) VALUES
(1, 'Marlon', 'Rodriguez', 26, ''),
(5, 'Brigite', 'Tarazona', 30, ''),
(6, 'Adrian', 'Rodriguez', 15, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
