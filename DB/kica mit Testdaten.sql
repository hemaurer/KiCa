-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               5.5.28 - MySQL Community Server (GPL)
-- Server Betriebssystem:        Win64
-- HeidiSQL Version:             7.0.0.4372
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Exportiere Datenbank Struktur für kica_test
DROP DATABASE IF EXISTS `kica_test`;
CREATE DATABASE IF NOT EXISTS `kica_test` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kica_test`;


-- Exportiere Struktur von Tabelle kica_test.abwesenheit
DROP TABLE IF EXISTS `abwesenheit`;
CREATE TABLE IF NOT EXISTS `abwesenheit` (
  `tr_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  PRIMARY KEY (`tr_id`,`p_id`),
  KEY `Abwesende` (`p_id`),
  CONSTRAINT `Abwesende` FOREIGN KEY (`p_id`) REFERENCES `person` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Trainingseinheit` FOREIGN KEY (`tr_id`) REFERENCES `trainingseinheit` (`tr_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.abwesenheit: ~68 rows (ungefähr)
DELETE FROM `abwesenheit`;
/*!40000 ALTER TABLE `abwesenheit` DISABLE KEYS */;
INSERT INTO `abwesenheit` (`tr_id`, `p_id`) VALUES
	(1, 1),
	(6, 1),
	(7, 1),
	(9, 1),
	(1, 2),
	(6, 2),
	(7, 2),
	(9, 2),
	(5, 3),
	(8, 3),
	(12, 3),
	(1, 4),
	(6, 4),
	(7, 4),
	(9, 4),
	(1, 5),
	(6, 5),
	(7, 5),
	(9, 5),
	(1, 6),
	(6, 6),
	(7, 6),
	(9, 6),
	(1, 7),
	(6, 7),
	(7, 7),
	(9, 7),
	(5, 10),
	(8, 10),
	(12, 10),
	(5, 11),
	(8, 11),
	(12, 11),
	(1, 12),
	(6, 12),
	(7, 12),
	(9, 12),
	(1, 13),
	(6, 13),
	(7, 13),
	(9, 13),
	(5, 14),
	(8, 14),
	(12, 14),
	(1, 15),
	(6, 15),
	(7, 15),
	(9, 15),
	(5, 19),
	(8, 19),
	(12, 19),
	(5, 24),
	(8, 24),
	(12, 24),
	(5, 25),
	(8, 25),
	(12, 25),
	(1, 27),
	(6, 27),
	(7, 27),
	(9, 27),
	(5, 28),
	(8, 28),
	(12, 28),
	(1, 31),
	(6, 31),
	(7, 31),
	(9, 31);
/*!40000 ALTER TABLE `abwesenheit` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.aufstellung
DROP TABLE IF EXISTS `aufstellung`;
CREATE TABLE IF NOT EXISTS `aufstellung` (
  `s_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  PRIMARY KEY (`s_id`,`p_id`),
  KEY `Spieler` (`p_id`),
  CONSTRAINT `Spiel` FOREIGN KEY (`s_id`) REFERENCES `spiel` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Spieler` FOREIGN KEY (`p_id`) REFERENCES `person` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.aufstellung: ~1 rows (ungefähr)
DELETE FROM `aufstellung`;
/*!40000 ALTER TABLE `aufstellung` DISABLE KEYS */;
INSERT INTO `aufstellung` (`s_id`, `p_id`) VALUES
	(1, 20);
/*!40000 ALTER TABLE `aufstellung` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.mannschaft
DROP TABLE IF EXISTS `mannschaft`;
CREATE TABLE IF NOT EXISTS `mannschaft` (
  `m_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`m_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.mannschaft: ~55 rows (ungefähr)
DELETE FROM `mannschaft`;
/*!40000 ALTER TABLE `mannschaft` DISABLE KEYS */;
INSERT INTO `mannschaft` (`m_id`, `name`) VALUES
	(38, '1. FC Heidenheim'),
	(22, '1. FC Kaiserslautern'),
	(19, '1. FC Köln'),
	(17, '1. FC Nürnberg'),
	(55, '1. FC Saarbrücken'),
	(27, '1. FC Union Berlin'),
	(7, '1. FSV Mainz 05'),
	(25, '1860 München'),
	(9, '1899 Hoffenheim'),
	(34, 'Arminia Bielefeld'),
	(4, 'Bayer 04 Leverkusen'),
	(2, 'Bayern München'),
	(6, 'Bor. Mönchengladbach'),
	(1, 'Borussia Dortmund'),
	(49, 'Chemnitzer FC'),
	(35, 'Dynamo Dresden'),
	(18, 'Eintracht Braunschweig'),
	(13, 'Eintracht Frankfurt'),
	(36, 'Energie Cottbus'),
	(32, 'Erzgebirge Aue'),
	(8, 'FC Augsburg'),
	(28, 'FC Ingolstadt 04'),
	(3, 'FC Schalke 04'),
	(26, 'FC St. Pauli'),
	(24, 'Fortuna Düsseldorf'),
	(31, 'FSV Frankfurt'),
	(46, 'Hallescher FC'),
	(16, 'Hamburger SV'),
	(10, 'Hannover 96'),
	(50, 'Hansa Rostock'),
	(11, 'Hertha BSC'),
	(51, 'Holstein Kiel'),
	(48, 'Jahn Regensburg'),
	(23, 'Karlsruher SC'),
	(44, 'MSV Duisburg'),
	(37, 'Optik Rathenow'),
	(43, 'Preußen Münster'),
	(39, 'RasenBallsport Leipzig'),
	(47, 'Rot Weiß Erfurt'),
	(14, 'SC Freiburg'),
	(20, 'SC Paderborn 07'),
	(21, 'SpVgg Greuther Fürth'),
	(52, 'SpVgg Unterhaching'),
	(45, 'Stuttgarter Kickers'),
	(40, 'SV Darmstadt 98'),
	(53, 'SV Elversberg'),
	(30, 'SV Sandhausen'),
	(41, 'SV Wehen Wiesbaden'),
	(15, 'VfB Stuttgart'),
	(33, 'VfL Bochum'),
	(42, 'VfL Osnabrück'),
	(5, 'VfL Wolfsburg'),
	(29, 'VfR Aalen'),
	(54, 'Wacker Burghausen'),
	(12, 'Werder Bremen');
/*!40000 ALTER TABLE `mannschaft` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.mannschaft_turnier_sparte
DROP TABLE IF EXISTS `mannschaft_turnier_sparte`;
CREATE TABLE IF NOT EXISTS `mannschaft_turnier_sparte` (
  `m_id` int(10) NOT NULL,
  `tu_id` int(10) NOT NULL,
  `sparte_id` int(10) NOT NULL,
  PRIMARY KEY (`m_id`,`tu_id`,`sparte_id`),
  KEY `Turnier1` (`tu_id`),
  KEY `Sparte` (`sparte_id`),
  CONSTRAINT `Mannschaft` FOREIGN KEY (`m_id`) REFERENCES `mannschaft` (`m_id`),
  CONSTRAINT `Sparte` FOREIGN KEY (`sparte_id`) REFERENCES `sparte` (`sparte_id`),
  CONSTRAINT `Turnier1` FOREIGN KEY (`tu_id`) REFERENCES `turnier` (`tu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.mannschaft_turnier_sparte: ~519 rows (ungefähr)
DELETE FROM `mannschaft_turnier_sparte`;
/*!40000 ALTER TABLE `mannschaft_turnier_sparte` DISABLE KEYS */;
INSERT INTO `mannschaft_turnier_sparte` (`m_id`, `tu_id`, `sparte_id`) VALUES
	(1, 1, 1),
	(1, 1, 2),
	(2, 1, 1),
	(2, 1, 2),
	(3, 1, 1),
	(4, 1, 1),
	(4, 1, 2),
	(5, 1, 1),
	(5, 1, 2),
	(6, 1, 1),
	(7, 1, 1),
	(7, 1, 2),
	(8, 1, 1),
	(8, 1, 2),
	(9, 1, 1),
	(9, 1, 2),
	(10, 1, 1),
	(11, 1, 1),
	(11, 1, 2),
	(12, 1, 1),
	(13, 1, 1),
	(14, 1, 1),
	(15, 1, 1),
	(16, 1, 1),
	(16, 1, 2),
	(17, 1, 1),
	(17, 1, 2),
	(18, 1, 1),
	(21, 1, 2),
	(22, 1, 2),
	(24, 1, 2),
	(29, 1, 2),
	(33, 1, 2),
	(34, 1, 2),
	(35, 1, 2),
	(50, 1, 2),
	(1, 2, 1),
	(1, 3, 3),
	(1, 3, 7),
	(4, 3, 7),
	(5, 3, 3),
	(5, 3, 7),
	(6, 3, 7),
	(7, 3, 7),
	(10, 3, 3),
	(11, 3, 3),
	(11, 3, 7),
	(12, 3, 7),
	(14, 3, 7),
	(15, 3, 3),
	(18, 3, 3),
	(18, 3, 7),
	(19, 3, 3),
	(20, 3, 3),
	(24, 3, 3),
	(24, 3, 7),
	(26, 3, 3),
	(28, 3, 7),
	(33, 3, 3),
	(33, 3, 7),
	(34, 3, 7),
	(36, 3, 3),
	(36, 3, 7),
	(37, 3, 7),
	(38, 3, 3),
	(39, 3, 3),
	(40, 3, 3),
	(46, 3, 7),
	(47, 3, 3),
	(48, 3, 7),
	(49, 3, 3),
	(49, 3, 7),
	(52, 3, 3),
	(1, 4, 4),
	(5, 4, 4),
	(6, 4, 4),
	(10, 4, 4),
	(11, 4, 4),
	(18, 4, 4),
	(20, 4, 4),
	(26, 4, 4),
	(27, 4, 4),
	(28, 4, 4),
	(29, 4, 4),
	(33, 4, 4),
	(37, 4, 4),
	(39, 4, 4),
	(40, 4, 4),
	(42, 4, 4),
	(54, 4, 4),
	(55, 4, 4),
	(1, 5, 1),
	(1, 5, 2),
	(1, 5, 3),
	(1, 5, 4),
	(1, 5, 5),
	(1, 5, 6),
	(1, 5, 7),
	(2, 5, 1),
	(2, 5, 2),
	(2, 5, 3),
	(2, 5, 4),
	(2, 5, 5),
	(2, 5, 6),
	(2, 5, 7),
	(3, 5, 1),
	(3, 5, 2),
	(3, 5, 3),
	(3, 5, 4),
	(3, 5, 5),
	(3, 5, 6),
	(3, 5, 7),
	(4, 5, 1),
	(4, 5, 2),
	(4, 5, 3),
	(4, 5, 4),
	(4, 5, 5),
	(4, 5, 6),
	(4, 5, 7),
	(5, 5, 1),
	(5, 5, 2),
	(5, 5, 3),
	(5, 5, 4),
	(5, 5, 5),
	(5, 5, 6),
	(5, 5, 7),
	(6, 5, 1),
	(6, 5, 2),
	(6, 5, 3),
	(6, 5, 4),
	(6, 5, 5),
	(6, 5, 6),
	(6, 5, 7),
	(7, 5, 1),
	(7, 5, 2),
	(7, 5, 3),
	(7, 5, 4),
	(7, 5, 5),
	(7, 5, 6),
	(7, 5, 7),
	(8, 5, 1),
	(8, 5, 2),
	(8, 5, 3),
	(8, 5, 4),
	(8, 5, 5),
	(8, 5, 6),
	(8, 5, 7),
	(9, 5, 1),
	(9, 5, 2),
	(9, 5, 3),
	(9, 5, 4),
	(9, 5, 5),
	(9, 5, 6),
	(9, 5, 7),
	(10, 5, 1),
	(10, 5, 2),
	(10, 5, 3),
	(10, 5, 4),
	(10, 5, 5),
	(10, 5, 6),
	(10, 5, 7),
	(11, 5, 1),
	(11, 5, 2),
	(11, 5, 3),
	(11, 5, 4),
	(11, 5, 5),
	(11, 5, 6),
	(11, 5, 7),
	(12, 5, 1),
	(12, 5, 2),
	(12, 5, 3),
	(12, 5, 4),
	(12, 5, 5),
	(12, 5, 6),
	(12, 5, 7),
	(13, 5, 1),
	(13, 5, 2),
	(13, 5, 3),
	(13, 5, 4),
	(13, 5, 5),
	(13, 5, 6),
	(13, 5, 7),
	(14, 5, 1),
	(14, 5, 2),
	(14, 5, 3),
	(14, 5, 4),
	(14, 5, 5),
	(14, 5, 6),
	(14, 5, 7),
	(15, 5, 1),
	(15, 5, 2),
	(15, 5, 3),
	(15, 5, 4),
	(15, 5, 5),
	(15, 5, 6),
	(15, 5, 7),
	(16, 5, 1),
	(16, 5, 2),
	(16, 5, 3),
	(16, 5, 4),
	(16, 5, 5),
	(16, 5, 6),
	(16, 5, 7),
	(17, 5, 1),
	(17, 5, 2),
	(17, 5, 3),
	(17, 5, 4),
	(17, 5, 5),
	(17, 5, 6),
	(17, 5, 7),
	(18, 5, 1),
	(18, 5, 2),
	(18, 5, 3),
	(18, 5, 4),
	(18, 5, 5),
	(18, 5, 6),
	(18, 5, 7),
	(19, 5, 1),
	(19, 5, 2),
	(19, 5, 3),
	(19, 5, 4),
	(19, 5, 5),
	(19, 5, 6),
	(19, 5, 7),
	(20, 5, 1),
	(20, 5, 2),
	(20, 5, 3),
	(20, 5, 4),
	(20, 5, 5),
	(20, 5, 6),
	(20, 5, 7),
	(21, 5, 1),
	(21, 5, 2),
	(21, 5, 3),
	(21, 5, 4),
	(21, 5, 5),
	(21, 5, 6),
	(21, 5, 7),
	(22, 5, 1),
	(22, 5, 2),
	(22, 5, 3),
	(22, 5, 4),
	(22, 5, 5),
	(22, 5, 6),
	(22, 5, 7),
	(23, 5, 1),
	(23, 5, 2),
	(23, 5, 3),
	(23, 5, 4),
	(23, 5, 5),
	(23, 5, 6),
	(23, 5, 7),
	(24, 5, 1),
	(24, 5, 2),
	(24, 5, 3),
	(24, 5, 4),
	(24, 5, 5),
	(24, 5, 6),
	(24, 5, 7),
	(25, 5, 1),
	(25, 5, 2),
	(25, 5, 3),
	(25, 5, 4),
	(25, 5, 5),
	(25, 5, 6),
	(25, 5, 7),
	(26, 5, 1),
	(26, 5, 2),
	(26, 5, 3),
	(26, 5, 4),
	(26, 5, 5),
	(26, 5, 6),
	(26, 5, 7),
	(27, 5, 1),
	(27, 5, 2),
	(27, 5, 3),
	(27, 5, 4),
	(27, 5, 5),
	(27, 5, 6),
	(27, 5, 7),
	(28, 5, 1),
	(28, 5, 2),
	(28, 5, 3),
	(28, 5, 4),
	(28, 5, 5),
	(28, 5, 6),
	(28, 5, 7),
	(29, 5, 1),
	(29, 5, 2),
	(29, 5, 3),
	(29, 5, 4),
	(29, 5, 5),
	(29, 5, 6),
	(29, 5, 7),
	(30, 5, 1),
	(30, 5, 2),
	(30, 5, 3),
	(30, 5, 4),
	(30, 5, 5),
	(30, 5, 6),
	(30, 5, 7),
	(31, 5, 1),
	(31, 5, 2),
	(31, 5, 3),
	(31, 5, 4),
	(31, 5, 5),
	(31, 5, 6),
	(31, 5, 7),
	(32, 5, 1),
	(32, 5, 2),
	(32, 5, 3),
	(32, 5, 4),
	(32, 5, 5),
	(32, 5, 6),
	(32, 5, 7),
	(33, 5, 1),
	(33, 5, 2),
	(33, 5, 3),
	(33, 5, 4),
	(33, 5, 5),
	(33, 5, 6),
	(33, 5, 7),
	(34, 5, 1),
	(34, 5, 2),
	(34, 5, 3),
	(34, 5, 4),
	(34, 5, 5),
	(34, 5, 6),
	(34, 5, 7),
	(35, 5, 1),
	(35, 5, 2),
	(35, 5, 3),
	(35, 5, 4),
	(35, 5, 5),
	(35, 5, 6),
	(35, 5, 7),
	(36, 5, 1),
	(36, 5, 2),
	(36, 5, 3),
	(36, 5, 4),
	(36, 5, 5),
	(36, 5, 6),
	(36, 5, 7),
	(37, 5, 1),
	(37, 5, 2),
	(37, 5, 3),
	(37, 5, 4),
	(37, 5, 5),
	(37, 5, 6),
	(37, 5, 7),
	(38, 5, 1),
	(38, 5, 2),
	(38, 5, 3),
	(38, 5, 4),
	(38, 5, 5),
	(38, 5, 6),
	(38, 5, 7),
	(39, 5, 1),
	(39, 5, 2),
	(39, 5, 3),
	(39, 5, 4),
	(39, 5, 5),
	(39, 5, 6),
	(39, 5, 7),
	(40, 5, 1),
	(40, 5, 2),
	(40, 5, 3),
	(40, 5, 4),
	(40, 5, 5),
	(40, 5, 6),
	(40, 5, 7),
	(41, 5, 1),
	(41, 5, 2),
	(41, 5, 3),
	(41, 5, 4),
	(41, 5, 5),
	(41, 5, 6),
	(41, 5, 7),
	(42, 5, 1),
	(42, 5, 2),
	(42, 5, 3),
	(42, 5, 4),
	(42, 5, 5),
	(42, 5, 6),
	(42, 5, 7),
	(43, 5, 1),
	(43, 5, 2),
	(43, 5, 3),
	(43, 5, 4),
	(43, 5, 5),
	(43, 5, 6),
	(43, 5, 7),
	(44, 5, 1),
	(44, 5, 2),
	(44, 5, 3),
	(44, 5, 4),
	(44, 5, 5),
	(44, 5, 6),
	(44, 5, 7),
	(45, 5, 1),
	(45, 5, 2),
	(45, 5, 3),
	(45, 5, 4),
	(45, 5, 5),
	(45, 5, 6),
	(45, 5, 7),
	(46, 5, 1),
	(46, 5, 2),
	(46, 5, 3),
	(46, 5, 4),
	(46, 5, 5),
	(46, 5, 6),
	(46, 5, 7),
	(47, 5, 1),
	(47, 5, 2),
	(47, 5, 3),
	(47, 5, 4),
	(47, 5, 5),
	(47, 5, 6),
	(47, 5, 7),
	(48, 5, 1),
	(48, 5, 2),
	(48, 5, 3),
	(48, 5, 4),
	(48, 5, 5),
	(48, 5, 6),
	(48, 5, 7),
	(49, 5, 1),
	(49, 5, 2),
	(49, 5, 3),
	(49, 5, 4),
	(49, 5, 5),
	(49, 5, 6),
	(49, 5, 7),
	(50, 5, 1),
	(50, 5, 2),
	(50, 5, 3),
	(50, 5, 4),
	(50, 5, 5),
	(50, 5, 6),
	(50, 5, 7),
	(51, 5, 1),
	(51, 5, 2),
	(51, 5, 3),
	(51, 5, 4),
	(51, 5, 5),
	(51, 5, 6),
	(51, 5, 7),
	(52, 5, 1),
	(52, 5, 2),
	(52, 5, 3),
	(52, 5, 4),
	(52, 5, 5),
	(52, 5, 6),
	(52, 5, 7),
	(53, 5, 1),
	(53, 5, 2),
	(53, 5, 3),
	(53, 5, 4),
	(53, 5, 5),
	(53, 5, 6),
	(53, 5, 7),
	(54, 5, 1),
	(54, 5, 2),
	(54, 5, 3),
	(54, 5, 4),
	(54, 5, 5),
	(54, 5, 6),
	(54, 5, 7),
	(55, 5, 1),
	(55, 5, 2),
	(55, 5, 3),
	(55, 5, 4),
	(55, 5, 5),
	(55, 5, 6),
	(55, 5, 7),
	(1, 6, 6),
	(2, 6, 6),
	(9, 6, 6),
	(12, 6, 6),
	(13, 6, 6),
	(15, 6, 6),
	(20, 6, 6),
	(21, 6, 6),
	(22, 6, 6),
	(32, 6, 6),
	(33, 6, 6),
	(37, 6, 6),
	(39, 6, 6),
	(44, 6, 6),
	(47, 6, 6),
	(49, 6, 6),
	(53, 6, 6),
	(54, 6, 6),
	(1, 7, 5),
	(2, 7, 5),
	(10, 7, 5),
	(13, 7, 5),
	(15, 7, 5),
	(20, 7, 5),
	(21, 7, 5),
	(24, 7, 5),
	(25, 7, 5),
	(30, 7, 5),
	(34, 7, 5),
	(37, 7, 5),
	(39, 7, 5),
	(40, 7, 5),
	(42, 7, 5),
	(44, 7, 5),
	(45, 7, 5),
	(48, 7, 5),
	(1, 15, 1),
	(1, 15, 2),
	(1, 15, 3),
	(1, 15, 4);
/*!40000 ALTER TABLE `mannschaft_turnier_sparte` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.person
DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `v_name` varchar(30) NOT NULL,
  `geb_datum` date NOT NULL,
  `groesse` tinyint(4) unsigned DEFAULT NULL,
  `bild` varchar(100) DEFAULT NULL,
  `betreuer` tinyint(1) unsigned zerofill NOT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.person: ~32 rows (ungefähr)
DELETE FROM `person`;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`p_id`, `name`, `v_name`, `geb_datum`, `groesse`, `bild`, `betreuer`, `tel`, `username`, `password`) VALUES
	(1, 'Weidenfeller', 'Roman', '1999-05-11', 188, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Roman.Weidenfeller', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(2, 'Langerak', 'Mitchell', '1999-05-11', 193, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Mitchell.Langerak', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(3, 'Alomerovic', 'Zlatan', '1999-05-11', 187, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Zlatan.Alomerovic', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(4, 'Friedrich', 'Manuel', '1999-05-11', 189, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Manuel.Friedrich', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(5, 'Subotic', 'Neven', '1999-05-11', 192, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Neven.Subotic', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(6, 'Hummels', 'Mats', '1999-05-11', 192, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Mats.Hummels', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(7, 'Sarr', 'Marian', '1999-05-11', 187, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Marian.Sarr', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(8, 'Papastathopoulos', 'Sokratis', '1999-05-11', 185, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Sokratis', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(9, 'Schmelzer', 'Marcel', '1999-05-11', 181, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Marcel.Schmelzer', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(10, 'Bandowski', 'Jannik', '1999-05-11', 190, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Jannik.Bandowski', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(11, 'Durm', 'Erik', '1999-05-11', 183, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Erik.Durm', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(12, 'Piszczek', 'Lukasz', '1999-05-11', 184, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Lukasz.Piszczek', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(13, 'Kehl', 'Sebastian', '1999-05-11', 188, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Sebastian.Kehl', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(14, 'Bender', 'Sven', '1999-05-11', 186, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Sven.Bender', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(15, 'Kirch', 'Oliver', '1999-05-11', 182, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Oliver.Kirch', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(16, 'Gündogan', 'Ilkay', '1999-05-11', 179, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Ilkay.Gündogan', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(17, 'Jojic', 'Milos', '1999-05-11', 177, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Milos.Jojic', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(18, 'Sahin', 'Nuri', '1999-05-11', 180, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Nuri.Sahin', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(19, 'Amini', 'Mustafa', '1999-05-11', 175, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Mustafa.Amini', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(20, 'Mkhitaryan', 'Henrikh', '1999-05-11', 178, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Henrikh.Mkhitaryan', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(21, 'Reus', 'Marco', '1999-05-11', 182, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Marco.Reus', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(22, 'Großkreutz', 'Kevin', '1999-05-11', 186, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Kevin.Großkreutz', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(23, 'Hofmann', 'Jonas', '1999-05-11', 176, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Jonas.Hofmann', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(24, 'Blaszczykowski', 'Jakub', '1999-05-11', 176, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Jakub.Blaszczykowski', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(25, 'Aubameyang', 'Pierre-Emerick', '1999-05-11', 185, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Pierre-Emerick.Aubameyang', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(26, 'Lewandowski', 'Robert', '1999-05-11', 185, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Robert.Lewandowski', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(27, 'Schieber', 'Julian', '1999-05-11', 186, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Julian.Schieber', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(28, 'Ducksch', 'Marvin', '1999-05-11', 188, 'public/img/profilbilder/_noimage.jpg', 0, NULL, 'Marvin.Ducksch', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(29, 'Klopp', 'Jürgen', '1967-06-16', 193, 'public/img/profilbilder/_noimage.jpg', 1, NULL, 'Jürgen.Klopp', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(30, 'admin', 'admin', '1967-06-16', 193, 'public/img/profilbilder/_noimage.jpg', 1, '', 'admin', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(31, 'Klopp', 'Lars', '2014-06-27', NULL, 'public/img/profilbilder/_noimage.jpg', 0, NULL, '123', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC'),
	(34, 'Klopp', 'Lars', '2014-06-27', NULL, NULL, 1, NULL, '12346', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.sparte
DROP TABLE IF EXISTS `sparte`;
CREATE TABLE IF NOT EXISTS `sparte` (
  `sparte_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`sparte_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.sparte: ~7 rows (ungefähr)
DELETE FROM `sparte`;
/*!40000 ALTER TABLE `sparte` DISABLE KEYS */;
INSERT INTO `sparte` (`sparte_id`, `name`) VALUES
	(1, 'A-Jugend'),
	(2, 'B-Jugend'),
	(3, 'C-Jugend'),
	(4, 'D-Jugend'),
	(5, 'E-Jugend'),
	(6, 'F-Jugend'),
	(7, 'G-Jugend');
/*!40000 ALTER TABLE `sparte` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.spiel
DROP TABLE IF EXISTS `spiel`;
CREATE TABLE IF NOT EXISTS `spiel` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `ort` varchar(255) NOT NULL,
  `heim` int(10) NOT NULL,
  `auswaerts` int(10) NOT NULL,
  `h_tore` tinyint(4) DEFAULT NULL,
  `a_tore` tinyint(4) DEFAULT NULL,
  `stat_id` int(10) NOT NULL,
  `zeit` datetime NOT NULL,
  `tu_id` int(10) NOT NULL,
  `sparte_id` int(10) NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `Heimmannschaft` (`heim`),
  KEY `Auswaertsmannschaft` (`auswaerts`),
  KEY `Status` (`stat_id`),
  KEY `Turnier` (`tu_id`),
  KEY `Sparte1` (`sparte_id`),
  CONSTRAINT `Auswaertsmannschaft` FOREIGN KEY (`auswaerts`) REFERENCES `mannschaft` (`m_id`),
  CONSTRAINT `Heimmannschaft` FOREIGN KEY (`heim`) REFERENCES `mannschaft` (`m_id`),
  CONSTRAINT `Sparte1` FOREIGN KEY (`sparte_id`) REFERENCES `sparte` (`sparte_id`),
  CONSTRAINT `Status` FOREIGN KEY (`stat_id`) REFERENCES `status` (`stat_id`),
  CONSTRAINT `Turnier` FOREIGN KEY (`tu_id`) REFERENCES `turnier` (`tu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=322 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.spiel: ~253 rows (ungefähr)
DELETE FROM `spiel`;
/*!40000 ALTER TABLE `spiel` DISABLE KEYS */;
INSERT INTO `spiel` (`s_id`, `ort`, `heim`, `auswaerts`, `h_tore`, `a_tore`, `stat_id`, `zeit`, `tu_id`, `sparte_id`) VALUES
	(1, 'Berliner Olympiastadion', 1, 2, NULL, NULL, 6, '2014-07-17 20:00:00', 2, 1),
	(4, 'Signal Iduna Park', 1, 2, 1, 1, 1, '2014-06-25 15:30:00', 1, 2),
	(6, 'Stadion der Freundschaft', 22, 55, 1, 1, 1, '2014-06-12 20:00:00', 3, 2),
	(7, 'Signal Iduna Park', 1, 35, 3, 0, 5, '2014-06-07 18:00:00', 2, 1),
	(8, 'Platz der Jugend', 10, 1, NULL, NULL, 1, '2014-06-17 17:00:00', 1, 3),
	(9, 'Allianz Arena', 2, 1, NULL, NULL, 5, '2014-06-19 18:15:00', 2, 2),
	(10, 'Testort', 2, 6, 3, 1, 1, '2014-05-08 15:30:00', 1, 1),
	(11, 'Testort', 3, 16, 3, 1, 1, '2014-05-10 15:30:00', 1, 1),
	(12, 'Testort', 4, 14, 2, 0, 1, '2014-05-10 15:30:00', 1, 1),
	(13, 'Testort', 10, 5, 2, 2, 1, '2014-05-10 15:30:00', 1, 1),
	(14, 'Testort', 9, 17, 0, 4, 1, '2014-05-10 15:30:00', 1, 1),
	(15, 'Testort', 7, 15, 6, 1, 1, '2014-05-10 15:30:00', 1, 1),
	(16, 'Testort', 8, 1, 0, 1, 1, '2014-05-10 15:30:00', 1, 1),
	(17, 'Testort', 18, 12, 3, 2, 1, '2014-05-10 15:30:00', 1, 1),
	(18, 'Testort', 11, 13, 3, 3, 1, '2014-05-10 15:30:00', 1, 1),
	(19, 'Testort', 1, 18, 0, 1, 1, '2014-05-17 15:30:00', 1, 1),
	(20, 'Testort', 6, 10, 4, 0, 1, '2014-05-17 15:30:00', 1, 1),
	(21, 'Testort', 15, 4, 1, 0, 1, '2014-05-17 15:30:00', 1, 1),
	(22, 'Testort', 5, 3, 1, 2, 1, '2014-05-17 15:30:00', 1, 1),
	(23, 'Testort', 12, 8, 1, 5, 1, '2014-05-17 15:30:00', 1, 1),
	(24, 'Testort', 17, 11, 0, 1, 1, '2014-05-17 15:30:00', 1, 1),
	(25, 'Testort', 14, 7, 3, 0, 1, '2014-05-17 15:30:00', 1, 1),
	(26, 'Testort', 16, 9, 2, 2, 1, '2014-05-17 15:30:00', 1, 1),
	(27, 'Testort', 13, 2, 2, 1, 1, '2014-05-17 15:30:00', 1, 1),
	(28, 'Testort', 1, 12, 1, 0, 1, '2014-05-24 15:30:00', 1, 1),
	(29, 'Testort', 2, 17, 2, 0, 1, '2014-05-24 15:30:00', 1, 1),
	(30, 'Testort', 4, 6, 4, 2, 1, '2014-05-24 15:30:00', 1, 1),
	(31, 'Testort', 10, 3, 2, 1, 1, '2014-05-24 15:30:00', 1, 1),
	(32, 'Testort', 9, 14, 3, 3, 1, '2014-05-24 15:30:00', 1, 1),
	(33, 'Testort', 7, 5, 2, 0, 1, '2014-05-24 15:30:00', 1, 1),
	(34, 'Testort', 8, 15, 1, 0, 1, '2014-05-24 15:30:00', 1, 1),
	(35, 'Testort', 18, 13, 0, 2, 1, '2014-05-24 15:30:00', 1, 1),
	(36, 'Testort', 11, 16, 2, 1, 1, '2014-05-24 15:30:00', 1, 1),
	(37, 'Testort', 3, 4, 1, 1, 1, '2014-05-31 15:30:00', 1, 1),
	(38, 'Testort', 6, 12, 4, 1, 1, '2014-05-31 15:30:00', 1, 1),
	(39, 'Testort', 15, 9, 4, 1, 1, '2014-05-31 15:30:00', 1, 1),
	(40, 'Testort', 10, 7, 2, 0, 1, '2014-05-31 15:30:00', 1, 1),
	(41, 'Testort', 5, 11, 0, 1, 1, '2014-05-31 15:30:00', 1, 1),
	(42, 'Testort', 17, 8, 4, 0, 1, '2014-05-31 15:30:00', 1, 1),
	(43, 'Testort', 14, 2, 2, 0, 1, '2014-05-31 15:30:00', 1, 1),
	(44, 'Testort', 16, 18, 6, 2, 1, '2014-05-31 15:30:00', 1, 1),
	(45, 'Testort', 13, 1, 1, 2, 1, '2014-05-31 15:30:00', 1, 1),
	(46, 'Testort', 1, 16, 0, 1, 1, '2014-06-14 15:30:00', 1, 1),
	(47, 'Testort', 2, 10, 2, 0, 1, '2014-06-14 15:30:00', 1, 1),
	(48, 'Testort', 4, 5, 3, 1, 1, '2014-06-14 15:30:00', 1, 1),
	(49, 'Testort', 12, 13, 0, 3, 1, '2014-06-14 15:30:00', 1, 1),
	(50, 'Testort', 9, 6, 0, 1, 1, '2014-06-14 15:30:00', 1, 1),
	(51, 'Testort', 7, 3, 2, 1, 1, '2014-06-14 15:30:00', 1, 1),
	(52, 'Testort', 8, 14, 6, 2, 1, '2014-06-14 15:30:00', 1, 1),
	(53, 'Testort', 18, 17, 2, 1, 1, '2014-06-14 15:30:00', 1, 1),
	(54, 'Testort', 11, 15, 1, 1, 1, '2014-06-14 15:30:00', 1, 1),
	(55, 'Testort', 3, 2, 4, 1, 1, '2014-06-21 15:30:00', 1, 1),
	(56, 'Testort', 6, 18, 2, 1, 1, '2014-06-21 15:30:00', 1, 1),
	(57, 'Testort', 15, 13, 2, 1, 1, '2014-06-21 15:30:00', 1, 1),
	(58, 'Testort', 10, 8, 1, 1, 1, '2014-06-21 15:30:00', 1, 1),
	(59, 'Testort', 5, 9, 1, 4, 1, '2014-06-21 15:30:00', 1, 1),
	(60, 'Testort', 17, 1, 0, 2, 1, '2014-06-21 15:30:00', 1, 1),
	(61, 'Testort', 14, 11, 0, 4, 1, '2014-06-21 15:30:00', 1, 1),
	(62, 'Testort', 7, 4, 1, 1, 1, '2014-06-21 15:30:00', 1, 1),
	(63, 'Testort', 16, 12, 1, 1, 1, '2014-06-21 15:30:00', 1, 1),
	(64, 'Testort', 1, 14, 5, 0, 1, '2014-06-28 15:30:00', 1, 1),
	(65, 'Testort', 2, 5, 2, 2, 1, '2014-06-28 15:30:00', 1, 1),
	(66, 'Testort', 4, 10, 1, 0, 1, '2014-06-28 15:30:00', 1, 1),
	(67, 'Testort', 12, 17, 2, 0, 1, '2014-06-28 15:30:00', 1, 1),
	(68, 'Testort', 9, 3, 3, 3, 1, '2014-06-28 15:30:00', 1, 1),
	(69, 'Testort', 8, 6, 3, 1, 1, '2014-06-28 15:30:00', 1, 1),
	(70, 'Testort', 18, 15, 2, 2, 1, '2014-06-28 15:30:00', 1, 1),
	(71, 'Testort', 13, 16, 3, 3, 1, '2014-06-28 15:30:00', 1, 1),
	(72, 'Testort', 11, 7, 0, 4, 1, '2014-06-28 15:30:00', 1, 1),
	(73, 'Testort', 3, 8, NULL, NULL, 1, '2014-07-05 15:30:00', 1, 1),
	(74, 'Testort', 6, 1, NULL, NULL, 1, '2014-07-05 15:30:00', 1, 1),
	(75, 'Testort', 4, 2, NULL, NULL, 1, '2014-07-05 15:30:00', 1, 1),
	(76, 'Testort', 15, 12, NULL, NULL, 1, '2014-07-05 15:30:00', 1, 1),
	(77, 'Testort', 10, 11, NULL, NULL, 1, '2014-07-05 15:30:00', 1, 1),
	(78, 'Testort', 5, 18, NULL, NULL, 1, '2014-07-05 15:30:00', 1, 1),
	(79, 'Testort', 17, 16, NULL, NULL, 1, '2014-07-05 15:30:00', 1, 1),
	(80, 'Testort', 14, 13, NULL, NULL, 1, '2014-07-05 15:30:00', 1, 1),
	(81, 'Testort', 7, 9, NULL, NULL, 1, '2014-07-05 15:30:00', 1, 1),
	(82, 'Testort', 1, 10, NULL, NULL, 1, '2014-07-19 15:30:00', 1, 1),
	(83, 'Testort', 2, 7, NULL, NULL, 1, '2014-07-19 15:30:00', 1, 1),
	(84, 'Testort', 12, 14, NULL, NULL, 1, '2014-07-19 15:30:00', 1, 1),
	(85, 'Testort', 9, 4, NULL, NULL, 1, '2014-07-19 15:30:00', 1, 1),
	(86, 'Testort', 8, 5, NULL, NULL, 1, '2014-07-19 15:30:00', 1, 1),
	(87, 'Testort', 16, 15, NULL, NULL, 1, '2014-07-19 15:30:00', 1, 1),
	(88, 'Testort', 18, 3, NULL, NULL, 1, '2014-07-19 15:30:00', 1, 1),
	(89, 'Testort', 13, 17, NULL, NULL, 1, '2014-07-19 15:30:00', 1, 1),
	(90, 'Testort', 11, 6, NULL, NULL, 1, '2014-07-19 15:30:00', 1, 1),
	(91, 'Testort', 2, 11, NULL, NULL, 1, '2014-07-26 15:30:00', 1, 1),
	(92, 'Testort', 3, 1, NULL, NULL, 1, '2014-07-26 15:30:00', 1, 1),
	(93, 'Testort', 6, 13, NULL, NULL, 1, '2014-07-26 15:30:00', 1, 1),
	(94, 'Testort', 4, 8, NULL, NULL, 1, '2014-07-26 15:30:00', 1, 1),
	(95, 'Testort', 15, 17, NULL, NULL, 1, '2014-07-26 15:30:00', 1, 1),
	(96, 'Testort', 10, 9, NULL, NULL, 1, '2014-07-26 15:30:00', 1, 1),
	(97, 'Testort', 5, 12, NULL, NULL, 1, '2014-07-26 15:30:00', 1, 1),
	(98, 'Testort', 14, 16, NULL, NULL, 1, '2014-07-26 15:30:00', 1, 1),
	(99, 'Testort', 7, 18, NULL, NULL, 1, '2014-07-26 15:30:00', 1, 1),
	(100, 'Testort', 1, 15, NULL, NULL, 1, '2014-08-02 15:30:00', 1, 1),
	(101, 'Testort', 12, 10, NULL, NULL, 1, '2014-08-02 15:30:00', 1, 1),
	(102, 'Testort', 17, 14, NULL, NULL, 1, '2014-08-02 15:30:00', 1, 1),
	(103, 'Testort', 9, 2, NULL, NULL, 1, '2014-08-02 15:30:00', 1, 1),
	(104, 'Testort', 8, 7, NULL, NULL, 1, '2014-08-02 15:30:00', 1, 1),
	(105, 'Testort', 16, 6, NULL, NULL, 1, '2014-08-02 15:30:00', 1, 1),
	(106, 'Testort', 18, 4, NULL, NULL, 1, '2014-08-02 15:30:00', 1, 1),
	(107, 'Testort', 13, 5, NULL, NULL, 1, '2014-08-02 15:30:00', 1, 1),
	(108, 'Testort', 11, 3, NULL, NULL, 1, '2014-08-02 15:30:00', 1, 1),
	(109, 'Testort', 2, 8, NULL, NULL, 1, '2014-08-09 15:30:00', 1, 1),
	(110, 'Testort', 3, 12, NULL, NULL, 1, '2014-08-09 15:30:00', 1, 1),
	(111, 'Testort', 6, 17, NULL, NULL, 1, '2014-08-09 15:30:00', 1, 1),
	(112, 'Testort', 4, 16, NULL, NULL, 1, '2014-08-09 15:30:00', 1, 1),
	(113, 'Testort', 10, 18, NULL, NULL, 1, '2014-08-09 15:30:00', 1, 1),
	(114, 'Testort', 5, 1, NULL, NULL, 1, '2014-08-09 15:30:00', 1, 1),
	(115, 'Testort', 9, 11, NULL, NULL, 1, '2014-08-09 15:30:00', 1, 1),
	(116, 'Testort', 14, 15, NULL, NULL, 1, '2014-08-09 15:30:00', 1, 1),
	(117, 'Testort', 7, 13, NULL, NULL, 1, '2014-08-09 15:30:00', 1, 1),
	(118, 'Testort', 1, 2, NULL, NULL, 1, '2014-08-23 15:30:00', 1, 1),
	(119, 'Testort', 15, 6, NULL, NULL, 1, '2014-08-23 15:30:00', 1, 1),
	(120, 'Testort', 12, 7, NULL, NULL, 1, '2014-08-23 15:30:00', 1, 1),
	(121, 'Testort', 17, 5, NULL, NULL, 1, '2014-08-23 15:30:00', 1, 1),
	(122, 'Testort', 8, 9, NULL, NULL, 1, '2014-08-23 15:30:00', 1, 1),
	(123, 'Testort', 16, 10, NULL, NULL, 1, '2014-08-23 15:30:00', 1, 1),
	(124, 'Testort', 18, 14, NULL, NULL, 1, '2014-08-23 15:30:00', 1, 1),
	(125, 'Testort', 13, 3, NULL, NULL, 1, '2014-08-23 15:30:00', 1, 1),
	(126, 'Testort', 11, 4, NULL, NULL, 1, '2014-08-23 15:30:00', 1, 1),
	(127, 'Testort', 2, 18, NULL, NULL, 1, '2014-08-30 15:30:00', 1, 1),
	(128, 'Testort', 3, 15, NULL, NULL, 1, '2014-08-30 15:30:00', 1, 1),
	(129, 'Testort', 6, 14, NULL, NULL, 1, '2014-08-30 15:30:00', 1, 1),
	(130, 'Testort', 4, 17, NULL, NULL, 1, '2014-08-30 15:30:00', 1, 1),
	(131, 'Testort', 10, 13, NULL, NULL, 1, '2014-08-30 15:30:00', 1, 1),
	(132, 'Testort', 5, 16, NULL, NULL, 1, '2014-08-30 15:30:00', 1, 1),
	(133, 'Testort', 9, 12, NULL, NULL, 1, '2014-08-30 15:30:00', 1, 1),
	(134, 'Testort', 7, 1, NULL, NULL, 1, '2014-08-30 15:30:00', 1, 1),
	(135, 'Testort', 11, 8, NULL, NULL, 1, '2014-08-30 15:30:00', 1, 1),
	(136, 'Testort', 1, 4, NULL, NULL, 1, '2014-09-06 15:30:00', 1, 1),
	(137, 'Testort', 6, 3, NULL, NULL, 1, '2014-09-06 15:30:00', 1, 1),
	(138, 'Testort', 15, 10, NULL, NULL, 1, '2014-09-06 15:30:00', 1, 1),
	(139, 'Testort', 12, 2, NULL, NULL, 1, '2014-09-06 15:30:00', 1, 1),
	(140, 'Testort', 17, 7, NULL, NULL, 1, '2014-09-06 15:30:00', 1, 1),
	(141, 'Testort', 14, 5, NULL, NULL, 1, '2014-09-06 15:30:00', 1, 1),
	(142, 'Testort', 16, 8, NULL, NULL, 1, '2014-09-06 15:30:00', 1, 1),
	(143, 'Testort', 18, 11, NULL, NULL, 1, '2014-09-06 15:30:00', 1, 1),
	(144, 'Testort', 13, 9, NULL, NULL, 1, '2014-09-06 15:30:00', 1, 1),
	(145, 'Testort', 2, 16, NULL, NULL, 1, '2014-09-13 15:30:00', 1, 1),
	(146, 'Testort', 3, 14, NULL, NULL, 1, '2014-09-13 15:30:00', 1, 1),
	(147, 'Testort', 4, 13, NULL, NULL, 1, '2014-09-13 15:30:00', 1, 1),
	(148, 'Testort', 10, 17, NULL, NULL, 1, '2014-09-13 15:30:00', 1, 1),
	(149, 'Testort', 5, 15, NULL, NULL, 1, '2014-09-13 15:30:00', 1, 1),
	(150, 'Testort', 9, 1, NULL, NULL, 1, '2014-09-13 15:30:00', 1, 1),
	(151, 'Testort', 7, 6, NULL, NULL, 1, '2014-09-13 15:30:00', 1, 1),
	(152, 'Testort', 8, 18, NULL, NULL, 1, '2014-09-13 15:30:00', 1, 1),
	(153, 'Testort', 11, 12, NULL, NULL, 1, '2014-09-13 15:30:00', 1, 1),
	(154, 'Testort', 1, 11, NULL, NULL, 1, '2014-09-20 15:30:00', 1, 1),
	(155, 'Testort', 6, 5, NULL, NULL, 1, '2014-09-20 15:30:00', 1, 1),
	(156, 'Testort', 15, 2, NULL, NULL, 1, '2014-09-20 15:30:00', 1, 1),
	(157, 'Testort', 12, 4, NULL, NULL, 1, '2014-09-20 15:30:00', 1, 1),
	(158, 'Testort', 17, 3, NULL, NULL, 1, '2014-09-20 15:30:00', 1, 1),
	(159, 'Testort', 14, 10, NULL, NULL, 1, '2014-09-20 15:30:00', 1, 1),
	(160, 'Testort', 16, 7, NULL, NULL, 1, '2014-09-20 15:30:00', 1, 1),
	(161, 'Testort', 18, 9, NULL, NULL, 1, '2014-09-20 15:30:00', 1, 1),
	(162, 'Testort', 13, 8, NULL, NULL, 1, '2014-09-20 15:30:00', 1, 1),
	(163, 'Testort', 1, 8, NULL, NULL, 1, '2014-10-25 15:30:00', 1, 1),
	(164, 'Testort', 6, 2, NULL, NULL, 1, '2014-10-25 15:30:00', 1, 1),
	(165, 'Testort', 15, 7, NULL, NULL, 1, '2014-10-25 15:30:00', 1, 1),
	(166, 'Testort', 5, 10, NULL, NULL, 1, '2014-10-25 15:30:00', 1, 1),
	(167, 'Testort', 12, 18, NULL, NULL, 1, '2014-10-25 15:30:00', 1, 1),
	(168, 'Testort', 17, 9, NULL, NULL, 1, '2014-10-25 15:30:00', 1, 1),
	(169, 'Testort', 14, 4, NULL, NULL, 1, '2014-10-25 15:30:00', 1, 1),
	(170, 'Testort', 16, 3, NULL, NULL, 1, '2014-10-25 15:30:00', 1, 1),
	(171, 'Testort', 13, 11, NULL, NULL, 1, '2014-10-25 15:30:00', 1, 1),
	(172, 'Testort', 2, 13, NULL, NULL, 1, '2014-11-01 15:30:00', 1, 1),
	(173, 'Testort', 3, 5, NULL, NULL, 1, '2014-11-01 15:30:00', 1, 1),
	(174, 'Testort', 4, 15, NULL, NULL, 1, '2014-11-01 15:30:00', 1, 1),
	(175, 'Testort', 10, 6, NULL, NULL, 1, '2014-11-01 15:30:00', 1, 1),
	(176, 'Testort', 9, 16, NULL, NULL, 1, '2014-11-01 15:30:00', 1, 1),
	(177, 'Testort', 7, 14, NULL, NULL, 1, '2014-11-01 15:30:00', 1, 1),
	(178, 'Testort', 8, 12, NULL, NULL, 1, '2014-11-01 15:30:00', 1, 1),
	(179, 'Testort', 18, 1, NULL, NULL, 1, '2014-11-01 15:30:00', 1, 1),
	(180, 'Testort', 11, 17, NULL, NULL, 1, '2014-11-01 15:30:00', 1, 1),
	(181, 'Testort', 3, 10, NULL, NULL, 1, '2014-11-08 15:30:00', 1, 1),
	(182, 'Testort', 6, 4, NULL, NULL, 1, '2014-11-08 15:30:00', 1, 1),
	(183, 'Testort', 15, 8, NULL, NULL, 1, '2014-11-08 15:30:00', 1, 1),
	(184, 'Testort', 5, 7, NULL, NULL, 1, '2014-11-08 15:30:00', 1, 1),
	(185, 'Testort', 12, 1, NULL, NULL, 1, '2014-11-08 15:30:00', 1, 1),
	(186, 'Testort', 17, 2, NULL, NULL, 1, '2014-11-08 15:30:00', 1, 1),
	(187, 'Testort', 14, 9, NULL, NULL, 1, '2014-11-08 15:30:00', 1, 1),
	(188, 'Testort', 16, 11, NULL, NULL, 1, '2014-11-08 15:30:00', 1, 1),
	(189, 'Testort', 13, 18, NULL, NULL, 1, '2014-11-08 15:30:00', 1, 1),
	(190, 'Testort', 1, 13, NULL, NULL, 1, '2014-11-15 15:30:00', 1, 1),
	(191, 'Testort', 2, 14, NULL, NULL, 1, '2014-11-15 15:30:00', 1, 1),
	(192, 'Testort', 4, 3, NULL, NULL, 1, '2014-11-15 15:30:00', 1, 1),
	(193, 'Testort', 12, 6, NULL, NULL, 1, '2014-11-15 15:30:00', 1, 1),
	(194, 'Testort', 9, 15, NULL, NULL, 1, '2014-11-15 15:30:00', 1, 1),
	(195, 'Testort', 7, 10, NULL, NULL, 1, '2014-11-15 15:30:00', 1, 1),
	(196, 'Testort', 8, 17, NULL, NULL, 1, '2014-11-15 15:30:00', 1, 1),
	(197, 'Testort', 18, 16, NULL, NULL, 1, '2014-11-15 15:30:00', 1, 1),
	(198, 'Testort', 11, 5, NULL, NULL, 1, '2014-11-15 15:30:00', 1, 1),
	(199, 'Testort', 3, 7, NULL, NULL, 1, '2014-11-22 15:30:00', 1, 1),
	(200, 'Testort', 6, 9, NULL, NULL, 1, '2014-11-22 15:30:00', 1, 1),
	(201, 'Testort', 15, 11, NULL, NULL, 1, '2014-11-22 15:30:00', 1, 1),
	(202, 'Testort', 10, 2, NULL, NULL, 1, '2014-11-22 15:30:00', 1, 1),
	(203, 'Testort', 5, 4, NULL, NULL, 1, '2014-11-22 15:30:00', 1, 1),
	(204, 'Testort', 17, 18, NULL, NULL, 1, '2014-11-22 15:30:00', 1, 1),
	(205, 'Testort', 14, 8, NULL, NULL, 1, '2014-11-22 15:30:00', 1, 1),
	(206, 'Testort', 16, 1, NULL, NULL, 1, '2014-11-22 15:30:00', 1, 1),
	(207, 'Testort', 13, 12, NULL, NULL, 1, '2014-11-22 15:30:00', 1, 1),
	(208, 'Testort', 1, 17, NULL, NULL, 1, '2014-11-29 15:30:00', 1, 1),
	(209, 'Testort', 2, 3, NULL, NULL, 1, '2014-11-29 15:30:00', 1, 1),
	(210, 'Testort', 4, 7, NULL, NULL, 1, '2014-11-29 15:30:00', 1, 1),
	(211, 'Testort', 12, 16, NULL, NULL, 1, '2014-11-29 15:30:00', 1, 1),
	(212, 'Testort', 9, 5, NULL, NULL, 1, '2014-11-29 15:30:00', 1, 1),
	(213, 'Testort', 8, 10, NULL, NULL, 1, '2014-11-29 15:30:00', 1, 1),
	(214, 'Testort', 18, 6, NULL, NULL, 1, '2014-11-29 15:30:00', 1, 1),
	(215, 'Testort', 13, 15, NULL, NULL, 1, '2014-11-29 15:30:00', 1, 1),
	(216, 'Testort', 11, 14, NULL, NULL, 1, '2014-11-29 15:30:00', 1, 1),
	(217, 'Testort', 3, 9, NULL, NULL, 1, '2014-12-06 15:30:00', 1, 1),
	(218, 'Testort', 6, 8, NULL, NULL, 1, '2014-12-06 15:30:00', 1, 1),
	(219, 'Testort', 15, 18, NULL, NULL, 1, '2014-12-06 15:30:00', 1, 1),
	(220, 'Testort', 10, 4, NULL, NULL, 1, '2014-12-06 15:30:00', 1, 1),
	(221, 'Testort', 5, 2, NULL, NULL, 1, '2014-12-06 15:30:00', 1, 1),
	(222, 'Testort', 17, 12, NULL, NULL, 1, '2014-12-06 15:30:00', 1, 1),
	(223, 'Testort', 14, 1, NULL, NULL, 1, '2014-12-06 15:30:00', 1, 1),
	(224, 'Testort', 7, 11, NULL, NULL, 1, '2014-12-06 15:30:00', 1, 1),
	(225, 'Testort', 16, 13, NULL, NULL, 1, '2014-12-06 15:30:00', 1, 1),
	(226, 'Testort', 1, 6, NULL, NULL, 1, '2014-12-13 15:30:00', 1, 1),
	(227, 'Testort', 2, 4, NULL, NULL, 1, '2014-12-13 15:30:00', 1, 1),
	(228, 'Testort', 12, 15, NULL, NULL, 1, '2014-12-13 15:30:00', 1, 1),
	(229, 'Testort', 9, 7, NULL, NULL, 1, '2014-12-13 15:30:00', 1, 1),
	(230, 'Testort', 8, 3, NULL, NULL, 1, '2014-12-13 15:30:00', 1, 1),
	(231, 'Testort', 16, 17, NULL, NULL, 1, '2014-12-13 15:30:00', 1, 1),
	(232, 'Testort', 18, 5, NULL, NULL, 1, '2014-12-13 15:30:00', 1, 1),
	(233, 'Testort', 13, 14, NULL, NULL, 1, '2014-12-13 15:30:00', 1, 1),
	(234, 'Testort', 11, 10, NULL, NULL, 1, '2014-12-13 15:30:00', 1, 1),
	(235, 'Testort', 3, 18, NULL, NULL, 1, '2014-12-20 15:30:00', 1, 1),
	(236, 'Testort', 6, 11, NULL, NULL, 1, '2014-12-20 15:30:00', 1, 1),
	(237, 'Testort', 4, 9, NULL, NULL, 1, '2014-12-20 15:30:00', 1, 1),
	(238, 'Testort', 15, 16, NULL, NULL, 1, '2014-12-20 15:30:00', 1, 1),
	(239, 'Testort', 10, 1, NULL, NULL, 1, '2014-12-20 15:30:00', 1, 1),
	(240, 'Testort', 5, 8, NULL, NULL, 1, '2014-12-20 15:30:00', 1, 1),
	(241, 'Testort', 17, 13, NULL, NULL, 1, '2014-12-20 15:30:00', 1, 1),
	(242, 'Testort', 14, 12, NULL, NULL, 1, '2014-12-20 15:30:00', 1, 1),
	(243, 'Testort', 7, 2, NULL, NULL, 1, '2014-12-20 15:30:00', 1, 1),
	(244, 'Testort', 1, 3, NULL, NULL, 1, '2014-12-23 15:30:00', 1, 1),
	(245, 'Testort', 12, 5, NULL, NULL, 1, '2014-12-24 15:30:00', 1, 1),
	(246, 'Testort', 17, 15, NULL, NULL, 1, '2014-12-25 15:30:00', 1, 1),
	(247, 'Testort', 9, 10, NULL, NULL, 1, '2014-12-26 15:30:00', 1, 1),
	(248, 'Testort', 8, 4, NULL, NULL, 1, '2014-12-27 15:30:00', 1, 1),
	(249, 'Testort', 16, 14, NULL, NULL, 1, '2014-12-28 15:30:00', 1, 1),
	(250, 'Testort', 18, 7, NULL, NULL, 1, '2014-12-29 15:30:00', 1, 1),
	(251, 'Testort', 13, 6, NULL, NULL, 1, '2014-12-30 15:30:00', 1, 1),
	(252, 'Testort', 11, 2, NULL, NULL, 1, '2014-12-31 15:30:00', 1, 1),
	(253, 'Testort', 2, 9, NULL, NULL, 1, '2014-12-27 15:30:00', 1, 1),
	(254, 'Testort', 3, 11, NULL, NULL, 1, '2014-12-27 15:30:00', 1, 1),
	(255, 'Testort', 6, 16, NULL, NULL, 1, '2014-12-27 15:30:00', 1, 1),
	(256, 'Testort', 4, 18, NULL, NULL, 1, '2014-12-27 15:30:00', 1, 1),
	(257, 'Testort', 15, 1, NULL, NULL, 1, '2014-12-27 15:30:00', 1, 1),
	(258, 'Testort', 10, 12, NULL, NULL, 1, '2014-12-27 15:30:00', 1, 1),
	(259, 'Testort', 5, 13, NULL, NULL, 1, '2014-12-27 15:30:00', 1, 1),
	(260, 'Testort', 14, 17, NULL, NULL, 1, '2014-12-27 15:30:00', 1, 1),
	(261, 'Testort', 7, 8, NULL, NULL, 1, '2014-12-27 15:30:00', 1, 1),
	(262, 'Testort', 1, 5, NULL, NULL, 1, '2015-01-03 15:30:00', 1, 1),
	(263, 'Testort', 15, 14, NULL, NULL, 1, '2015-01-03 15:30:00', 1, 1),
	(264, 'Testort', 12, 3, NULL, NULL, 1, '2015-01-03 15:30:00', 1, 1),
	(265, 'Testort', 17, 6, NULL, NULL, 1, '2015-01-03 15:30:00', 1, 1),
	(266, 'Testort', 8, 2, NULL, NULL, 1, '2015-01-03 15:30:00', 1, 1),
	(267, 'Testort', 16, 4, NULL, NULL, 1, '2015-01-03 15:30:00', 1, 1),
	(268, 'Testort', 18, 10, NULL, NULL, 1, '2015-01-03 15:30:00', 1, 1),
	(269, 'Testort', 13, 7, NULL, NULL, 1, '2015-01-03 15:30:00', 1, 1),
	(270, 'Testort', 11, 9, NULL, NULL, 1, '2015-01-03 15:30:00', 1, 1),
	(271, 'Testort', 2, 1, NULL, NULL, 1, '2015-01-10 15:30:00', 1, 1),
	(272, 'Testort', 3, 13, NULL, NULL, 1, '2015-01-10 15:30:00', 1, 1),
	(273, 'Testort', 6, 15, NULL, NULL, 1, '2015-01-10 15:30:00', 1, 1),
	(274, 'Testort', 4, 11, NULL, NULL, 1, '2015-01-10 15:30:00', 1, 1),
	(275, 'Testort', 10, 16, NULL, NULL, 1, '2015-01-10 15:30:00', 1, 1),
	(276, 'Testort', 5, 17, NULL, NULL, 1, '2015-01-10 15:30:00', 1, 1),
	(277, 'Testort', 9, 8, NULL, NULL, 1, '2015-01-10 15:30:00', 1, 1),
	(278, 'Testort', 14, 18, NULL, NULL, 1, '2015-01-10 15:30:00', 1, 1),
	(279, 'Testort', 7, 12, NULL, NULL, 1, '2015-01-10 15:30:00', 1, 1),
	(280, 'Testort', 1, 7, NULL, NULL, 1, '2015-01-17 15:30:00', 1, 1),
	(281, 'Testort', 15, 3, NULL, NULL, 1, '2015-01-17 15:30:00', 1, 1),
	(282, 'Testort', 12, 9, NULL, NULL, 1, '2015-01-17 15:30:00', 1, 1),
	(283, 'Testort', 17, 4, NULL, NULL, 1, '2015-01-17 15:30:00', 1, 1),
	(284, 'Testort', 14, 6, NULL, NULL, 1, '2015-01-17 15:30:00', 1, 1),
	(285, 'Testort', 8, 11, NULL, NULL, 1, '2015-01-17 15:30:00', 1, 1),
	(286, 'Testort', 16, 5, NULL, NULL, 1, '2015-01-17 15:30:00', 1, 1),
	(287, 'Testort', 18, 2, NULL, NULL, 1, '2015-01-17 15:30:00', 1, 1),
	(288, 'Testort', 13, 10, NULL, NULL, 1, '2015-01-17 15:30:00', 1, 1),
	(289, 'Testort', 2, 12, NULL, NULL, 1, '2015-01-24 15:30:00', 1, 1),
	(290, 'Testort', 3, 6, NULL, NULL, 1, '2015-01-24 15:30:00', 1, 1),
	(291, 'Testort', 4, 1, NULL, NULL, 1, '2015-01-24 15:30:00', 1, 1),
	(292, 'Testort', 10, 15, NULL, NULL, 1, '2015-01-24 15:30:00', 1, 1),
	(293, 'Testort', 5, 14, NULL, NULL, 1, '2015-01-24 15:30:00', 1, 1),
	(294, 'Testort', 9, 13, NULL, NULL, 1, '2015-01-24 15:30:00', 1, 1),
	(295, 'Testort', 7, 17, NULL, NULL, 1, '2015-01-24 15:30:00', 1, 1),
	(296, 'Testort', 8, 16, NULL, NULL, 1, '2015-01-24 15:30:00', 1, 1),
	(297, 'Testort', 11, 18, NULL, NULL, 1, '2015-01-24 15:30:00', 1, 1),
	(298, 'Testort', 1, 9, NULL, NULL, 1, '2015-01-30 15:30:00', 1, 1),
	(299, 'Testort', 6, 7, NULL, NULL, 1, '2015-01-30 15:30:00', 1, 1),
	(300, 'Testort', 15, 5, NULL, NULL, 1, '2015-01-30 15:30:00', 1, 1),
	(301, 'Testort', 12, 11, NULL, NULL, 1, '2015-01-30 15:30:00', 1, 1),
	(302, 'Testort', 17, 10, NULL, NULL, 1, '2015-01-30 15:30:00', 1, 1),
	(303, 'Testort', 14, 3, NULL, NULL, 1, '2015-01-30 15:30:00', 1, 1),
	(304, 'Testort', 16, 2, NULL, NULL, 1, '2015-01-30 15:30:00', 1, 1),
	(305, 'Testort', 18, 8, NULL, NULL, 1, '2015-01-30 15:30:00', 1, 1),
	(306, 'Testort', 13, 4, NULL, NULL, 1, '2015-01-30 15:30:00', 1, 1),
	(307, 'Testort', 2, 15, NULL, NULL, 1, '2015-02-06 15:30:00', 1, 1),
	(308, 'Testort', 3, 17, NULL, NULL, 1, '2015-02-06 15:30:00', 1, 1),
	(309, 'Testort', 4, 12, NULL, NULL, 1, '2015-02-06 15:30:00', 1, 1),
	(310, 'Testort', 10, 14, NULL, NULL, 1, '2015-02-06 15:30:00', 1, 1),
	(311, 'Testort', 5, 6, NULL, NULL, 1, '2015-02-06 15:30:00', 1, 1),
	(312, 'Testort', 9, 18, NULL, NULL, 1, '2015-02-06 15:30:00', 1, 1),
	(313, 'Testort', 7, 16, NULL, NULL, 1, '2015-02-06 15:30:00', 1, 1),
	(314, 'Testort', 8, 13, NULL, NULL, 1, '2015-02-06 15:30:00', 1, 1),
	(315, 'Testort', 11, 1, NULL, NULL, 1, '2015-02-06 15:30:00', 1, 1),
	(316, 'Berliner Olympiastadion', 1, 2, 4, 1, 6, '2014-06-17 19:30:00', 14, 1),
	(317, 'Veltins-Arena', 3, 1, 2, 5, 3, '2014-05-07 20:00:00', 2, 1),
	(318, 'Ostseestadion', 50, 1, 2, 3, 4, '2014-05-22 18:45:00', 2, 1),
	(319, 'Commerzbank-Arena	', 13, 1, 2, 2, 7, '2014-05-02 19:00:00', 5, 1),
	(320, 'Mercedes-Benz Arena', 15, 1, 0, 4, 7, '2014-04-25 17:30:00', 5, 1),
	(321, 'Signal Iduna Park', 1, 9, NULL, NULL, 7, '2025-04-30 00:00:00', 5, 1);
/*!40000 ALTER TABLE `spiel` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `stat_id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`stat_id`),
  UNIQUE KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.status: ~12 rows (ungefähr)
DELETE FROM `status`;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`stat_id`, `status`) VALUES
	(9, '1. Runde'),
	(10, '2. Runde'),
	(11, '3. Runde'),
	(3, 'Achtelfinale'),
	(6, 'Finale'),
	(7, 'Freundschaftsspiel'),
	(2, 'Gruppenphase'),
	(5, 'Halbfinale'),
	(1, 'Liga'),
	(12, 'Qualifikation'),
	(8, 'Sechzehntelfinale'),
	(4, 'Viertelfinale');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.teilnehmer_tg
DROP TABLE IF EXISTS `teilnehmer_tg`;
CREATE TABLE IF NOT EXISTS `teilnehmer_tg` (
  `tg_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  PRIMARY KEY (`tg_id`,`p_id`),
  KEY `Teilnehmer` (`p_id`),
  CONSTRAINT `Teilnehmer` FOREIGN KEY (`p_id`) REFERENCES `person` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Trainigsgruppe` FOREIGN KEY (`tg_id`) REFERENCES `trainingsgruppe` (`tg_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.teilnehmer_tg: ~24 rows (ungefähr)
DELETE FROM `teilnehmer_tg`;
/*!40000 ALTER TABLE `teilnehmer_tg` DISABLE KEYS */;
INSERT INTO `teilnehmer_tg` (`tg_id`, `p_id`) VALUES
	(2, 1),
	(2, 2),
	(1, 3),
	(3, 3),
	(2, 4),
	(2, 5),
	(2, 6),
	(2, 7),
	(1, 10),
	(3, 10),
	(1, 11),
	(2, 12),
	(2, 13),
	(1, 14),
	(3, 14),
	(2, 15),
	(1, 19),
	(1, 24),
	(3, 24),
	(1, 25),
	(3, 25),
	(2, 27),
	(1, 28),
	(2, 31);
/*!40000 ALTER TABLE `teilnehmer_tg` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.trainingseinheit
DROP TABLE IF EXISTS `trainingseinheit`;
CREATE TABLE IF NOT EXISTS `trainingseinheit` (
  `tr_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `ort` varchar(200) NOT NULL,
  `zeit` datetime NOT NULL,
  `trainer` int(10) NOT NULL,
  `tg_id` int(10) NOT NULL,
  PRIMARY KEY (`tr_id`),
  KEY `Trainingsgruppe` (`tg_id`),
  KEY `Trainer` (`trainer`),
  CONSTRAINT `Trainer` FOREIGN KEY (`trainer`) REFERENCES `person` (`p_id`),
  CONSTRAINT `Trainingsgruppe` FOREIGN KEY (`tg_id`) REFERENCES `trainingsgruppe` (`tg_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.trainingseinheit: ~10 rows (ungefähr)
DELETE FROM `trainingseinheit`;
/*!40000 ALTER TABLE `trainingseinheit` DISABLE KEYS */;
INSERT INTO `trainingseinheit` (`tr_id`, `name`, `ort`, `zeit`, `trainer`, `tg_id`) VALUES
	(1, 'Trainingsspiel', 'Heimstadion', '2014-05-25 18:49:00', 34, 2),
	(2, 'Ausdauer', 'Wald', '2014-05-26 18:50:05', 29, 2),
	(3, 'Ausdauer G2', 'Heimstadion', '2014-06-14 18:00:00', 29, 1),
	(4, 'Kraft', 'Heimstadion', '2014-06-19 15:45:00', 29, 3),
	(5, 'Ausdauer ', 'Heimstadion', '2014-06-26 12:45:00', 34, 1),
	(6, 'Torwarttraining', 'Stadtwald', '2014-06-29 12:45:00', 29, 2),
	(7, 'Spielzüge', 'Heimstadion', '2014-06-30 18:45:00', 29, 2),
	(8, 'Vorbereitungstraining', 'Signal Iduna Park', '2014-07-03 17:45:00', 29, 1),
	(9, 'Ausdauer', 'Wald', '2014-07-04 18:00:00', 29, 2),
	(12, 'Ausdauer', 'Wald', '2014-06-29 02:47:07', 34, 1);
/*!40000 ALTER TABLE `trainingseinheit` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.trainingsgruppe
DROP TABLE IF EXISTS `trainingsgruppe`;
CREATE TABLE IF NOT EXISTS `trainingsgruppe` (
  `tg_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`tg_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.trainingsgruppe: ~8 rows (ungefähr)
DELETE FROM `trainingsgruppe`;
/*!40000 ALTER TABLE `trainingsgruppe` DISABLE KEYS */;
INSERT INTO `trainingsgruppe` (`tg_id`, `name`) VALUES
	(1, 'Gruppe A'),
	(2, 'Gruppe B'),
	(3, 'Gruppe C'),
	(4, 'Gruppe D'),
	(5, 'Gruppe E'),
	(7, 'Gruppe F'),
	(8, 'Gruppe G'),
	(6, 'Torwart');
/*!40000 ALTER TABLE `trainingsgruppe` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.turnier
DROP TABLE IF EXISTS `turnier`;
CREATE TABLE IF NOT EXISTS `turnier` (
  `tu_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `liga` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tu_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.turnier: ~15 rows (ungefähr)
DELETE FROM `turnier`;
/*!40000 ALTER TABLE `turnier` DISABLE KEYS */;
INSERT INTO `turnier` (`tu_id`, `name`, `liga`) VALUES
	(1, 'Bundesliga 2014/15', 1),
	(2, 'DFB-Pokal 2013/14', 0),
	(3, '2. Liga 2013/14', 1),
	(4, '3. Liga 2013/14', 1),
	(5, 'Freundschaftsspiel', 0),
	(6, 'Oberliga', 1),
	(7, 'Regionalliga', 1),
	(8, 'Baden-Württemberg-Pokal', 0),
	(9, 'Mercedes-Cup', 0),
	(10, 'Allianzpokal', 0),
	(11, 'Europaleague', 0),
	(12, 'Championsleague', 0),
	(13, 'Wasenturnier', 0),
	(14, 'Supercup', 0);
/*!40000 ALTER TABLE `turnier` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.turnier_sparte
DROP TABLE IF EXISTS `turnier_sparte`;
CREATE TABLE IF NOT EXISTS `turnier_sparte` (
  `tu_id` int(10) NOT NULL,
  `sparte_id` int(10) NOT NULL,
  `gewinner` int(10) DEFAULT NULL,
  PRIMARY KEY (`tu_id`,`sparte_id`),
  KEY `Sparte2` (`sparte_id`),
  KEY `Gewinner` (`gewinner`),
  CONSTRAINT `Gewinner` FOREIGN KEY (`gewinner`) REFERENCES `mannschaft` (`m_id`),
  CONSTRAINT `Sparte2` FOREIGN KEY (`sparte_id`) REFERENCES `sparte` (`sparte_id`),
  CONSTRAINT `Turnier2` FOREIGN KEY (`tu_id`) REFERENCES `turnier` (`tu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.turnier_sparte: ~16 rows (ungefähr)
DELETE FROM `turnier_sparte`;
/*!40000 ALTER TABLE `turnier_sparte` DISABLE KEYS */;
INSERT INTO `turnier_sparte` (`tu_id`, `sparte_id`, `gewinner`) VALUES
	(1, 2, NULL),
	(3, 3, NULL),
	(3, 7, NULL),
	(4, 4, NULL),
	(5, 1, NULL),
	(5, 2, NULL),
	(5, 3, NULL),
	(5, 4, NULL),
	(5, 5, NULL),
	(5, 6, NULL),
	(5, 7, NULL),
	(6, 6, NULL),
	(7, 5, NULL),
	(1, 1, 1),
	(2, 1, 1),
	(14, 1, 1);
/*!40000 ALTER TABLE `turnier_sparte` ENABLE KEYS */;


-- Exportiere Struktur von Trigger kica_test.AutoDeleteAbwesenheit
DROP TRIGGER IF EXISTS `AutoDeleteAbwesenheit`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `AutoDeleteAbwesenheit` AFTER DELETE ON `teilnehmer_tg` FOR EACH ROW BEGIN
DELETE FROM abwesenheit
WHERE abwesenheit.p_id = OLD.p_id AND
		abwesenheit.tr_id IN (	SELECT trainingseinheit.tr_id
										FROM trainingseinheit
										WHERE trainingseinheit.tg_id = OLD.tg_id);						
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.AutoInsertAbwesenheit
DROP TRIGGER IF EXISTS `AutoInsertAbwesenheit`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `AutoInsertAbwesenheit` AFTER INSERT ON `teilnehmer_tg` FOR EACH ROW BEGIN
INSERT INTO abwesenheit
	SELECT trainingseinheit.tr_id, NEW.p_id
   FROM trainingseinheit
   WHERE trainingseinheit.tg_id = NEW.tg_id AND trainingseinheit.zeit > NOW();
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.BefuellenAbwesenheit
DROP TRIGGER IF EXISTS `BefuellenAbwesenheit`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `BefuellenAbwesenheit` AFTER INSERT ON `trainingseinheit` FOR EACH ROW BEGIN
INSERT INTO abwesenheit
	SELECT NEW.tr_id, teilnehmer_tg.p_id
	FROM teilnehmer_tg
	WHERE teilnehmer_tg.tg_id = NEW.tg_id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimMannschaftInsert
DROP TRIGGER IF EXISTS `TrimMannschaftInsert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimMannschaftInsert` BEFORE INSERT ON `mannschaft` FOR EACH ROW BEGIN
SET NEW.name = TRIM(NEW.name);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimMannschaftUpdate
DROP TRIGGER IF EXISTS `TrimMannschaftUpdate`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimMannschaftUpdate` BEFORE UPDATE ON `mannschaft` FOR EACH ROW BEGIN
SET NEW.name = TRIM(NEW.name);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimPersonInsert
DROP TRIGGER IF EXISTS `TrimPersonInsert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimPersonInsert` BEFORE INSERT ON `person` FOR EACH ROW BEGIN
SET NEW.name = TRIM(NEW.name);
SET NEW.v_name = TRIM(NEW.v_name);
SET NEW.tel = TRIM(NEW.tel);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimPersonUpdate
DROP TRIGGER IF EXISTS `TrimPersonUpdate`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimPersonUpdate` BEFORE UPDATE ON `person` FOR EACH ROW BEGIN
SET NEW.name = TRIM(NEW.name);
SET NEW.v_name = TRIM(NEW.v_name);
SET NEW.tel = TRIM(NEW.tel);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimSparteInsert
DROP TRIGGER IF EXISTS `TrimSparteInsert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimSparteInsert` BEFORE INSERT ON `sparte` FOR EACH ROW BEGIN
SET NEW.name = TRIM(NEW.name);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimSparteUpdate
DROP TRIGGER IF EXISTS `TrimSparteUpdate`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimSparteUpdate` BEFORE UPDATE ON `sparte` FOR EACH ROW BEGIN
SET NEW.name = TRIM(NEW.name);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimSpielInsert
DROP TRIGGER IF EXISTS `TrimSpielInsert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimSpielInsert` BEFORE INSERT ON `spiel` FOR EACH ROW BEGIN
SET NEW.ort = TRIM(NEW.ort);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimSpielUpdate
DROP TRIGGER IF EXISTS `TrimSpielUpdate`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimSpielUpdate` BEFORE UPDATE ON `spiel` FOR EACH ROW BEGIN
SET NEW.ort = TRIM(NEW.ort);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimTrainingseinheitInsert
DROP TRIGGER IF EXISTS `TrimTrainingseinheitInsert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimTrainingseinheitInsert` BEFORE INSERT ON `trainingseinheit` FOR EACH ROW BEGIN
SET NEW.name = TRIM(NEW.name);
SET NEW.ort = TRIM(NEW.ort);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimTrainingseinheitUpdate
DROP TRIGGER IF EXISTS `TrimTrainingseinheitUpdate`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimTrainingseinheitUpdate` BEFORE UPDATE ON `trainingseinheit` FOR EACH ROW BEGIN
SET NEW.name = TRIM(NEW.name);
SET NEW.ort = TRIM(NEW.ort);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimTrainingsgruppeInsert
DROP TRIGGER IF EXISTS `TrimTrainingsgruppeInsert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimTrainingsgruppeInsert` BEFORE INSERT ON `trainingsgruppe` FOR EACH ROW BEGIN
SET NEW.name = TRIM(NEW.name);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimTrainingsgruppeUpdate
DROP TRIGGER IF EXISTS `TrimTrainingsgruppeUpdate`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimTrainingsgruppeUpdate` BEFORE UPDATE ON `trainingsgruppe` FOR EACH ROW BEGIN
SET NEW.name = TRIM(NEW.name);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimTurnierInsert
DROP TRIGGER IF EXISTS `TrimTurnierInsert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimTurnierInsert` BEFORE INSERT ON `turnier` FOR EACH ROW BEGIN
SET NEW.name = TRIM(NEW.name);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.TrimTurnierUpdate
DROP TRIGGER IF EXISTS `TrimTurnierUpdate`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TrimTurnierUpdate` BEFORE UPDATE ON `turnier` FOR EACH ROW BEGIN
SET NEW.name = TRIM(NEW.name);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Exportiere Struktur von Trigger kica_test.UpdateTraining
DROP TRIGGER IF EXISTS `UpdateTraining`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `UpdateTraining` AFTER UPDATE ON `trainingseinheit` FOR EACH ROW BEGIN
DELETE FROM abwesenheit WHERE abwesenheit.tr_id = NEW.tr_id;
INSERT INTO abwesenheit
	SELECT NEW.tr_id, teilnehmer_tg.p_id
	FROM teilnehmer_tg
	WHERE teilnehmer_tg.tg_id = NEW.tg_id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
