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
/*!40000 ALTER TABLE `abwesenheit` DISABLE KEYS */;
/*!40000 ALTER TABLE `abwesenheit` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.aufstellung
DROP TABLE IF EXISTS `aufstellung`;
CREATE TABLE IF NOT EXISTS `aufstellung` (
  `s_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  PRIMARY KEY (`s_id`,`p_id`),
  KEY `Spieler` (`p_id`),
  CONSTRAINT `Spiel` FOREIGN KEY (`s_id`) REFERENCES `spiel` (`s_id`),
  CONSTRAINT `Spieler` FOREIGN KEY (`p_id`) REFERENCES `person` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.aufstellung: ~0 rows (ungefähr)
/*!40000 ALTER TABLE `aufstellung` DISABLE KEYS */;
/*!40000 ALTER TABLE `aufstellung` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.mannschaft
DROP TABLE IF EXISTS `mannschaft`;
CREATE TABLE IF NOT EXISTS `mannschaft` (
  `m_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.mannschaft: ~55 rows (ungefähr)
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
	(18, 'Eintracht Braunschweig'),
	(19, '1. FC Köln'),
	(20, 'SC Paderborn 07 '),
	(21, 'SpVgg Greuther Fürth '),
	(22, '1. FC Kaiserslautern '),
	(23, 'Karlsruher SC'),
	(24, 'Fortuna Düsseldorf'),
	(25, '1860 München'),
	(26, 'FC St. Pauli'),
	(27, '1. FC Union Berlin'),
	(28, 'FC Ingolstadt 04'),
	(29, 'VfR Aalen'),
	(30, 'SV Sandhausen'),
	(31, 'FSV Frankfurt'),
	(32, 'Erzgebirge Aue'),
	(33, 'VfL Bochum'),
	(34, 'Arminia Bielefeld'),
	(35, 'Dynamo Dresden'),
	(36, 'Energie Cottbus'),
	(37, 'Optik Rathenow'),
	(38, '1. FC Heidenheim'),
	(39, 'RasenBallsport Leipzig'),
	(40, 'SV Darmstadt 98'),
	(41, 'SV Wehen Wiesbaden'),
	(42, 'VfL Osnabrück'),
	(43, 'Preußen Münster'),
	(44, 'MSV Duisburg'),
	(45, 'Stuttgarter Kickers'),
	(46, 'Hallescher FC'),
	(47, 'Rot Weiß Erfurt'),
	(48, 'Jahn Regensburg'),
	(49, 'Chemnitzer FC'),
	(50, 'Hansa Rostock'),
	(51, 'Holstein Kiel'),
	(52, 'SpVgg Unterhaching'),
	(53, 'SV Elversberg'),
	(54, 'Wacker Burghausen'),
	(55, '1. FC Saarbrücken');
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

-- Exportiere Daten aus Tabelle kica_test.mannschaft_turnier_sparte: ~56 rows (ungefähr)
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
	(5, 3, 3),
	(10, 3, 3),
	(11, 3, 3),
	(15, 3, 3),
	(18, 3, 3),
	(19, 3, 3),
	(20, 3, 3),
	(24, 3, 3),
	(26, 3, 3),
	(33, 3, 3),
	(36, 3, 3),
	(38, 3, 3),
	(39, 3, 3),
	(40, 3, 3),
	(47, 3, 3),
	(49, 3, 3),
	(52, 3, 3);
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
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`p_id`, `name`, `v_name`, `geb_datum`, `groesse`, `bild`, `betreuer`, `tel`, `username`, `password`) VALUES
	(1, 'Weidenfeller', 'Roman', '1999-05-11', 188, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Roman.Weidenfeller', '098f6bcd4621d373cade4e832627b4f6'),
	(2, 'Langerak', 'Mitchell', '1999-05-11', 193, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Mitchell.Langerak', '098f6bcd4621d373cade4e832627b4f6'),
	(3, 'Alomerovic', 'Zlatan', '1999-05-11', 187, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Zlatan.Alomerovic', '098f6bcd4621d373cade4e832627b4f6'),
	(4, 'Friedrich', 'Manuel', '1999-05-11', 189, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Manuel.Friedrich', '098f6bcd4621d373cade4e832627b4f6'),
	(5, 'Subotic', 'Neven', '1999-05-11', 192, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Neven.Subotic', '098f6bcd4621d373cade4e832627b4f6'),
	(6, 'Hummels', 'Mats', '1999-05-11', 192, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Mats.Hummels', '098f6bcd4621d373cade4e832627b4f6'),
	(7, 'Sarr', 'Marian', '1999-05-11', 187, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Marian.Sarr', '098f6bcd4621d373cade4e832627b4f6'),
	(8, 'Papastathopoulos', 'Sokratis', '1999-05-11', 185, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Sokratis', '098f6bcd4621d373cade4e832627b4f6'),
	(9, 'Schmelzer', 'Marcel', '1999-05-11', 181, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Marcel.Schmelzer', '098f6bcd4621d373cade4e832627b4f6'),
	(10, 'Bandowski', 'Jannik', '1999-05-11', 190, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Jannik.Bandowski', '098f6bcd4621d373cade4e832627b4f6'),
	(11, 'Durm', 'Erik', '1999-05-11', 183, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Erik.Durm', '098f6bcd4621d373cade4e832627b4f6'),
	(12, 'Piszczek', 'Lukasz', '1999-05-11', 184, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Lukasz.Piszczek', '098f6bcd4621d373cade4e832627b4f6'),
	(13, 'Kehl', 'Sebastian', '1999-05-11', 188, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Sebastian.Kehl', '098f6bcd4621d373cade4e832627b4f6'),
	(14, 'Bender', 'Sven', '1999-05-11', 186, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Sven.Bender', '098f6bcd4621d373cade4e832627b4f6'),
	(15, 'Kirch', 'Oliver', '1999-05-11', 182, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Oliver.Kirch', '098f6bcd4621d373cade4e832627b4f6'),
	(16, 'Gündogan', 'Ilkay', '1999-05-11', 179, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Ilkay.Gündogan', '098f6bcd4621d373cade4e832627b4f6'),
	(17, 'Jojic', 'Milos', '1999-05-11', 177, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Milos.Jojic', '098f6bcd4621d373cade4e832627b4f6'),
	(18, 'Sahin', 'Nuri', '1999-05-11', 180, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Nuri.Sahin', '098f6bcd4621d373cade4e832627b4f6'),
	(19, 'Amini', 'Mustafa', '1999-05-11', 175, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Mustafa.Amini', '098f6bcd4621d373cade4e832627b4f6'),
	(20, 'Mkhitaryan', 'Henrikh', '1999-05-11', 178, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Henrikh.Mkhitaryan', '098f6bcd4621d373cade4e832627b4f6'),
	(21, 'Reus', 'Marco', '1999-05-11', 182, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Marco.Reus', '098f6bcd4621d373cade4e832627b4f6'),
	(22, 'Großkreutz', 'Kevin', '1999-05-11', 186, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Kevin.Großkreutz', '098f6bcd4621d373cade4e832627b4f6'),
	(23, 'Hofmann', 'Jonas', '1999-05-11', 176, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Jonas.Hofmann', '098f6bcd4621d373cade4e832627b4f6'),
	(24, 'Blaszczykowski', 'Jakub', '1999-05-11', 176, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Jakub.Blaszczykowski', '098f6bcd4621d373cade4e832627b4f6'),
	(25, 'Aubameyang', 'Pierre-Emerick', '1999-05-11', 185, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Pierre-Emerick.Aubameyang', '098f6bcd4621d373cade4e832627b4f6'),
	(26, 'Lewandowski', 'Robert', '1999-05-11', 185, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Robert.Lewandowski', '098f6bcd4621d373cade4e832627b4f6'),
	(27, 'Schieber', 'Julian', '1999-05-11', 186, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Julian.Schieber', '098f6bcd4621d373cade4e832627b4f6'),
	(28, 'Ducksch', 'Marvin', '1999-05-11', 188, '../public/img/profilbilder/_noimage.jpg', 0, NULL, 'Marvin.Ducksch', '098f6bcd4621d373cade4e832627b4f6'),
	(29, 'Klopp', 'Jürgen', '1967-06-16', 193, '../public/img/profilbilder/_noimage.jpg', 1, NULL, 'Jürgen.Klopp', '098f6bcd4621d373cade4e832627b4f6'),
	(30, 'admin', 'admin', '1967-06-16', 193, '../public/img/profilbilder/_noimage.jpg', 1, '', 'admin', '$2y$10$3cgV5/WquGld6m7xMjIQ6.aMUmUJhUpODTK0dy4qcOS03yQkNUujC');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.sparte
DROP TABLE IF EXISTS `sparte`;
CREATE TABLE IF NOT EXISTS `sparte` (
  `sparte_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`sparte_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.sparte: ~4 rows (ungefähr)
/*!40000 ALTER TABLE `sparte` DISABLE KEYS */;
INSERT INTO `sparte` (`sparte_id`, `name`) VALUES
	(1, 'A-Jugend'),
	(2, 'B-Jugend'),
	(3, 'C-Jugend'),
	(4, 'D-Jugend');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.spiel: ~5 rows (ungefähr)
/*!40000 ALTER TABLE `spiel` DISABLE KEYS */;
INSERT INTO `spiel` (`s_id`, `ort`, `heim`, `auswaerts`, `h_tore`, `a_tore`, `stat_id`, `zeit`, `tu_id`, `sparte_id`) VALUES
	(1, 'Berliner Olympiastadion', 1, 2, NULL, NULL, 6, '2014-05-17 20:00:00', 2, 1),
	(2, 'Heimstadion', 17, 9, NULL, NULL, 1, '2014-06-25 20:00:00', 1, 1),
	(3, 'Allianzarena', 1, 2, 1, 0, 1, '2014-05-25 15:30:00', 1, 1),
	(4, 'Allianzarena', 1, 2, 1, 1, 1, '2014-06-25 15:30:00', 1, 2),
	(5, 'Signal-Iduna-Park', 2, 1, 0, 1, 1, '2014-05-26 18:30:00', 1, 1);
/*!40000 ALTER TABLE `spiel` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `stat_id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`stat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.status: ~7 rows (ungefähr)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`stat_id`, `status`) VALUES
	(1, 'Liga'),
	(2, 'Gruppenphase'),
	(3, 'Achtelfinale'),
	(4, 'Viertelfinale'),
	(5, 'Halbfinale'),
	(6, 'Finale'),
	(7, 'Testspiel');
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

-- Exportiere Daten aus Tabelle kica_test.teilnehmer_tg: ~2 rows (ungefähr)
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
  CONSTRAINT `Trainingsgruppe` FOREIGN KEY (`tg_id`) REFERENCES `trainingsgruppe` (`tg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.trainingseinheit: ~2 rows (ungefähr)
/*!40000 ALTER TABLE `trainingseinheit` DISABLE KEYS */;
INSERT INTO `trainingseinheit` (`tr_id`, `name`, `ort`, `zeit`, `trainer`, `tg_id`) VALUES
	(1, 'Testspiel', 'Platz 1', '2014-05-25 18:49:49', 29, 1),
	(2, 'Ausdauer', 'Wald', '2014-05-26 18:50:05', 29, 2);
/*!40000 ALTER TABLE `trainingseinheit` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.trainingsgruppe
DROP TABLE IF EXISTS `trainingsgruppe`;
CREATE TABLE IF NOT EXISTS `trainingsgruppe` (
  `tg_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`tg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.trainingsgruppe: ~3 rows (ungefähr)
/*!40000 ALTER TABLE `trainingsgruppe` DISABLE KEYS */;
INSERT INTO `trainingsgruppe` (`tg_id`, `name`) VALUES
	(1, 'Gruppe A'),
	(2, 'Gruppe B'),
	(3, 'Gruppe C');
/*!40000 ALTER TABLE `trainingsgruppe` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle kica_test.turnier
DROP TABLE IF EXISTS `turnier`;
CREATE TABLE IF NOT EXISTS `turnier` (
  `tu_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `liga` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle kica_test.turnier: ~4 rows (ungefähr)
/*!40000 ALTER TABLE `turnier` DISABLE KEYS */;
INSERT INTO `turnier` (`tu_id`, `name`, `liga`) VALUES
	(1, 'Bundesliga 2013/14', 1),
	(2, 'DFB-Pokal 2013/14', 0),
	(3, '2. Liga 2013/14', 1),
	(4, '3. Liga 2013/14', 1);
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

-- Exportiere Daten aus Tabelle kica_test.turnier_sparte: ~2 rows (ungefähr)
/*!40000 ALTER TABLE `turnier_sparte` DISABLE KEYS */;
INSERT INTO `turnier_sparte` (`tu_id`, `sparte_id`, `gewinner`) VALUES
	(1, 1, 1),
	(2, 1, 1);
/*!40000 ALTER TABLE `turnier_sparte` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
