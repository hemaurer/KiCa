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
  CONSTRAINT `Abwesende` FOREIGN KEY (`p_id`) REFERENCES `person` (`p_id`),
  CONSTRAINT `Trainingseinheit` FOREIGN KEY (`tr_id`) REFERENCES `trainingseinheit` (`tr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.abwesenheit: ~0 rows (ungefähr)
DELETE FROM `abwesenheit`;
/*!40000 ALTER TABLE `abwesenheit` DISABLE KEYS */;
/*!40000 ALTER TABLE `abwesenheit` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.mannschaft
DROP TABLE IF EXISTS `mannschaft`;
CREATE TABLE IF NOT EXISTS `mannschaft` (
  `m_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.mannschaft: ~18 rows (ungefähr)
DELETE FROM `mannschaft`;
/*!40000 ALTER TABLE `mannschaft` DISABLE KEYS */;
INSERT INTO `mannschaft` (`m_id`, `name`) VALUES
	(1, 'Bayern München'),
	(2, 'Borussia Dortmund'),
	(3, 'FC Schalke 04'),
	(4, 'Bayer 04 Leverkusen'),
	(5, 'VfL Wolfsburg'),
	(6, 'Bor. Mönchengladbach'),
	(7, '1. FSV Mainz 05'),
	(8, 'FC Augsburg'),
	(9, '1899 Hoffenheim'),
	(10, 'Hannover 96'),
	(11, 'Hertha BSC'),
	(12, 'Werder Bremen'),
	(13, 'Eintracht Frankfurt'),
	(14, 'SC Freiburg'),
	(15, 'VfB Stuttgart'),
	(16, 'Hamburger SV'),
	(17, '1. FC Nürnberg'),
	(18, 'Eintracht Braunschweig');
/*!40000 ALTER TABLE `mannschaft` ENABLE KEYS */;


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

-- Exportiere Daten aus Tabelle kica_test.person: ~29 rows (ungefähr)
DELETE FROM `person`;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`p_id`, `name`, `v_name`, `geb_datum`, `groesse`, `bild`, `betreuer`, `tel`, `username`, `password`) VALUES
	(1, 'Weidenfeller', 'Roman', '1999-05-11', 188, NULL, 0, NULL, 'Roman.Weidenfeller', '098f6bcd4621d373cade4e832627b4f6'),
	(2, 'Langerak', 'Mitchell', '1999-05-11', 193, NULL, 0, NULL, 'Mitchell.Langerak', '098f6bcd4621d373cade4e832627b4f6'),
	(3, 'Alomerovic', 'Zlatan', '1999-05-11', 187, NULL, 0, NULL, 'Zlatan.Alomerovic', '098f6bcd4621d373cade4e832627b4f6'),
	(4, 'Friedrich', 'Manuel', '1999-05-11', 189, NULL, 0, NULL, 'Manuel.Friedrich', '098f6bcd4621d373cade4e832627b4f6'),
	(5, 'Subotic', 'Neven', '1999-05-11', 192, NULL, 0, NULL, 'Neven.Subotic', '098f6bcd4621d373cade4e832627b4f6'),
	(6, 'Hummels', 'Mats', '1999-05-11', 192, NULL, 0, NULL, 'Mats.Hummels', '098f6bcd4621d373cade4e832627b4f6'),
	(7, 'Sarr', 'Marian', '1999-05-11', 187, NULL, 0, NULL, 'Marian.Sarr', '098f6bcd4621d373cade4e832627b4f6'),
	(8, 'Papastathopoulos', 'Sokratis', '1999-05-11', 185, NULL, 0, NULL, 'Sokratis', '098f6bcd4621d373cade4e832627b4f6'),
	(9, 'Schmelzer', 'Marcel', '1999-05-11', 181, NULL, 0, NULL, 'Marcel.Schmelzer', '098f6bcd4621d373cade4e832627b4f6'),
	(10, 'Bandowski', 'Jannik', '1999-05-11', 190, NULL, 0, NULL, 'Jannik.Bandowski', '098f6bcd4621d373cade4e832627b4f6'),
	(11, 'Durm', 'Erik', '1999-05-11', 183, NULL, 0, NULL, 'Erik.Durm', '098f6bcd4621d373cade4e832627b4f6'),
	(12, 'Piszczek', 'Lukasz', '1999-05-11', 184, NULL, 0, NULL, 'Lukasz.Piszczek', '098f6bcd4621d373cade4e832627b4f6'),
	(13, 'Kehl', 'Sebastian', '1999-05-11', 188, NULL, 0, NULL, 'Sebastian.Kehl', '098f6bcd4621d373cade4e832627b4f6'),
	(14, 'Bender', 'Sven', '1999-05-11', 186, NULL, 0, NULL, 'Sven.Bender', '098f6bcd4621d373cade4e832627b4f6'),
	(15, 'Kirch', 'Oliver', '1999-05-11', 182, NULL, 0, NULL, 'Oliver.Kirch', '098f6bcd4621d373cade4e832627b4f6'),
	(16, 'Gündogan', 'Ilkay', '1999-05-11', 179, NULL, 0, NULL, 'Ilkay.Gündogan', '098f6bcd4621d373cade4e832627b4f6'),
	(17, 'Jojic', 'Milos', '1999-05-11', 177, NULL, 0, NULL, 'Milos.Jojic', '098f6bcd4621d373cade4e832627b4f6'),
	(18, 'Sahin', 'Nuri', '1999-05-11', 180, NULL, 0, NULL, 'Nuri.Sahin', '098f6bcd4621d373cade4e832627b4f6'),
	(19, 'Amini', 'Mustafa', '1999-05-11', 175, NULL, 0, NULL, 'Mustafa.Amini', '098f6bcd4621d373cade4e832627b4f6'),
	(20, 'Mkhitaryan', 'Henrikh', '1999-05-11', 178, NULL, 0, NULL, 'Henrikh.Mkhitaryan', '098f6bcd4621d373cade4e832627b4f6'),
	(21, 'Reus', 'Marco', '1999-05-11', 182, NULL, 0, NULL, 'Marco.Reus', '098f6bcd4621d373cade4e832627b4f6'),
	(22, 'Großkreutz', 'Kevin', '1999-05-11', 186, NULL, 0, NULL, 'Kevin.Großkreutz', '098f6bcd4621d373cade4e832627b4f6'),
	(23, 'Hofmann', 'Jonas', '1999-05-11', 176, NULL, 0, NULL, 'Jonas.Hofmann', '098f6bcd4621d373cade4e832627b4f6'),
	(24, 'Blaszczykowski', 'Jakub', '1999-05-11', 176, NULL, 0, NULL, 'Jakub.Blaszczykowski', '098f6bcd4621d373cade4e832627b4f6'),
	(25, 'Aubameyang', 'Pierre-Emerick', '1999-05-11', 185, NULL, 0, NULL, 'Pierre-Emerick.Aubameyang', '098f6bcd4621d373cade4e832627b4f6'),
	(26, 'Lewandowski', 'Robert', '1999-05-11', 185, NULL, 0, NULL, 'Robert.Lewandowski', '098f6bcd4621d373cade4e832627b4f6'),
	(27, 'Schieber', 'Julian', '1999-05-11', 186, NULL, 0, NULL, 'Julian.Schieber', '098f6bcd4621d373cade4e832627b4f6'),
	(28, 'Ducksch', 'Marvin', '1999-05-11', 188, NULL, 0, NULL, 'Marvin.Ducksch', '098f6bcd4621d373cade4e832627b4f6'),
	(29, 'Klopp', 'Jürgen', '1967-06-16', 193, NULL, 1, NULL, 'Jürgen.Klopp', '098f6bcd4621d373cade4e832627b4f6'),
	(30, 'admin', 'admin', '1967-06-16', 193, NULL, 1, NULL, 'admin', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;


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
  PRIMARY KEY (`s_id`),
  KEY `Heimmannschaft` (`heim`),
  KEY `Auswaertsmannschaft` (`auswaerts`),
  KEY `Status` (`stat_id`),
  KEY `Turnier` (`tu_id`),
  CONSTRAINT `Auswaertsmannschaft` FOREIGN KEY (`auswaerts`) REFERENCES `mannschaft` (`m_id`),
  CONSTRAINT `Heimmannschaft` FOREIGN KEY (`heim`) REFERENCES `mannschaft` (`m_id`),
  CONSTRAINT `Status` FOREIGN KEY (`stat_id`) REFERENCES `status` (`stat_id`),
  CONSTRAINT `Turnier` FOREIGN KEY (`tu_id`) REFERENCES `turnier` (`tu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.spiel: ~0 rows (ungefähr)
DELETE FROM `spiel`;
/*!40000 ALTER TABLE `spiel` DISABLE KEYS */;
INSERT INTO `spiel` (`s_id`, `ort`, `heim`, `auswaerts`, `h_tore`, `a_tore`, `stat_id`, `zeit`, `tu_id`) VALUES
	(1, 'Berliner Olympiastadion', 1, 2, NULL, NULL, 6, '2014-05-17 20:00:00', 2);
/*!40000 ALTER TABLE `spiel` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `stat_id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`stat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.status: ~0 rows (ungefähr)
DELETE FROM `status`;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`stat_id`, `status`) VALUES
	(1, 'Liga'),
	(2, 'Gruppenphase'),
	(3, 'Achtelfinale'),
	(4, 'Viertelfinale'),
	(5, 'Halbfinale'),
	(6, 'Finale');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.teilnehmer_tg
DROP TABLE IF EXISTS `teilnehmer_tg`;
CREATE TABLE IF NOT EXISTS `teilnehmer_tg` (
  `tg_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  PRIMARY KEY (`tg_id`,`p_id`),
  KEY `Teilnehmer` (`p_id`),
  CONSTRAINT `Teilnehmer` FOREIGN KEY (`p_id`) REFERENCES `person` (`p_id`),
  CONSTRAINT `Trainigsgruppe` FOREIGN KEY (`tg_id`) REFERENCES `trainingsgruppe` (`tg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.teilnehmer_tg: ~0 rows (ungefähr)
DELETE FROM `teilnehmer_tg`;
/*!40000 ALTER TABLE `teilnehmer_tg` DISABLE KEYS */;
/*!40000 ALTER TABLE `teilnehmer_tg` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.trainingseinheit
DROP TABLE IF EXISTS `trainingseinheit`;
CREATE TABLE IF NOT EXISTS `trainingseinheit` (
  `tr_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `ort` varchar(200) NOT NULL,
  `zeit` datetime NOT NULL,
  `tg_id` int(10) NOT NULL,
  PRIMARY KEY (`tr_id`),
  KEY `Trainingsgruppe` (`tg_id`),
  CONSTRAINT `Trainingsgruppe` FOREIGN KEY (`tg_id`) REFERENCES `trainingsgruppe` (`tg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.trainingseinheit: ~0 rows (ungefähr)
DELETE FROM `trainingseinheit`;
/*!40000 ALTER TABLE `trainingseinheit` DISABLE KEYS */;
/*!40000 ALTER TABLE `trainingseinheit` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.trainingsgruppe
DROP TABLE IF EXISTS `trainingsgruppe`;
CREATE TABLE IF NOT EXISTS `trainingsgruppe` (
  `tg_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `trainer` int(10) NOT NULL,
  PRIMARY KEY (`tg_id`),
  KEY `Trainer` (`trainer`),
  CONSTRAINT `Trainer` FOREIGN KEY (`trainer`) REFERENCES `person` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.trainingsgruppe: ~0 rows (ungefähr)
DELETE FROM `trainingsgruppe`;
/*!40000 ALTER TABLE `trainingsgruppe` DISABLE KEYS */;
/*!40000 ALTER TABLE `trainingsgruppe` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.turnier
DROP TABLE IF EXISTS `turnier`;
CREATE TABLE IF NOT EXISTS `turnier` (
  `tu_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gewinner` int(10) DEFAULT NULL,
  PRIMARY KEY (`tu_id`),
  KEY `Gewinner` (`gewinner`),
  CONSTRAINT `Gewinner` FOREIGN KEY (`gewinner`) REFERENCES `mannschaft` (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.turnier: ~1 rows (ungefähr)
DELETE FROM `turnier`;
/*!40000 ALTER TABLE `turnier` DISABLE KEYS */;
INSERT INTO `turnier` (`tu_id`, `name`, `gewinner`) VALUES
	(1, 'Bundesliga 2013/14', 1),
	(2, 'DFB-Pokal 2013/14', NULL);
/*!40000 ALTER TABLE `turnier` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
