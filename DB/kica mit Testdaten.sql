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

-- Exportiere Daten aus Tabelle kica_test.abwesenheit: ~0 rows (ungefähr)
DELETE FROM `abwesenheit`;
/*!40000 ALTER TABLE `abwesenheit` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.mannschaft: ~55 rows (ungefähr)
DELETE FROM `mannschaft`;
/*!40000 ALTER TABLE `mannschaft` DISABLE KEYS */;
INSERT INTO `mannschaft` (`m_id`, `name`) VALUES
	(38, '1. FC Heidenheim'),
	(22, '1. FC Kaiserslautern '),
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
	(20, 'SC Paderborn 07 '),
	(21, 'SpVgg Greuther Fürth '),
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

-- Exportiere Daten aus Tabelle kica_test.mannschaft_turnier_sparte: ~513 rows (ungefähr)
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
	(2, 2, 1),
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
	(48, 7, 5);
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.person: ~30 rows (ungefähr)
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
	(30, 'admin', 'admin', '1967-06-16', 193, 'public/img/profilbilder/_noimage.jpg', 1, '', 'admin', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.spiel: ~10 rows (ungefähr)
DELETE FROM `spiel`;
/*!40000 ALTER TABLE `spiel` DISABLE KEYS */;
INSERT INTO `spiel` (`s_id`, `ort`, `heim`, `auswaerts`, `h_tore`, `a_tore`, `stat_id`, `zeit`, `tu_id`, `sparte_id`) VALUES
	(1, 'Berliner Olympiastadion', 1, 2, NULL, NULL, 6, '2014-05-17 20:00:00', 2, 1),
	(2, 'Heimstadion', 17, 9, NULL, NULL, 1, '2014-06-25 20:00:00', 1, 1),
	(3, 'Allianzarena', 1, 2, 1, 0, 1, '2014-05-28 15:30:00', 1, 1),
	(4, 'Allianzarena', 1, 2, 1, 1, 1, '2014-06-25 15:30:00', 1, 2),
	(5, 'Signal-Iduna-Park', 2, 1, 0, 1, 1, '2014-05-26 18:30:00', 1, 1),
	(6, 'Stadion der Freundschaft', 22, 55, NULL, NULL, 1, '2014-06-12 20:00:00', 3, 2),
	(7, 'Heimstadion', 1, 35, NULL, NULL, 3, '2014-06-14 21:00:00', 2, 1),
	(8, 'Platz der Jugend', 10, 1, NULL, NULL, 1, '2014-06-17 17:00:00', 1, 3),
	(9, 'Signal Iduna Park', 2, 1, NULL, NULL, 5, '2014-06-19 18:15:00', 2, 2),
	(10, 'Signal Iduna Park', 2, 1, NULL, NULL, 7, '2014-07-03 19:45:00', 1, 1);
/*!40000 ALTER TABLE `spiel` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `stat_id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`stat_id`),
  UNIQUE KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.status: ~11 rows (ungefähr)
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

-- Exportiere Daten aus Tabelle kica_test.teilnehmer_tg: ~2 rows (ungefähr)
DELETE FROM `teilnehmer_tg`;
/*!40000 ALTER TABLE `teilnehmer_tg` DISABLE KEYS */;
INSERT INTO `teilnehmer_tg` (`tg_id`, `p_id`) VALUES
	(1, 19),
	(2, 19);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.trainingseinheit: ~8 rows (ungefähr)
DELETE FROM `trainingseinheit`;
/*!40000 ALTER TABLE `trainingseinheit` DISABLE KEYS */;
INSERT INTO `trainingseinheit` (`tr_id`, `name`, `ort`, `zeit`, `trainer`, `tg_id`) VALUES
	(1, 'Trainingsspiel', 'Heimstadion', '2014-05-25 18:49:50', 29, 1),
	(2, 'Ausdauer', 'Wald', '2014-05-26 18:50:05', 29, 2),
	(3, 'Ausdauer G2', 'Heimstadion', '2014-06-14 18:00:00', 29, 1),
	(4, 'Kraft', 'Heimstadion', '2014-06-19 15:45:00', 29, 3),
	(5, 'Ausdauer ', 'Heimstadion', '2014-06-26 12:45:00', 29, 1),
	(6, 'Torwarttraining', 'Stadtwald', '2014-06-29 12:45:00', 29, 2),
	(7, 'Spielzüge', 'Heimstadion', '2014-06-30 18:45:00', 29, 1),
	(8, 'Vorbereitungstraining', 'Signal Iduna Park', '2014-07-03 17:45:00', 29, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.turnier: ~13 rows (ungefähr)
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
	(13, 'Wasenturnier', 0);
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

-- Exportiere Daten aus Tabelle kica_test.turnier_sparte: ~15 rows (ungefähr)
DELETE FROM `turnier_sparte`;
/*!40000 ALTER TABLE `turnier_sparte` DISABLE KEYS */;
INSERT INTO `turnier_sparte` (`tu_id`, `sparte_id`, `gewinner`) VALUES
	(1, 2, NULL),
	(2, 1, NULL),
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
	(1, 1, 1);
/*!40000 ALTER TABLE `turnier_sparte` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
