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

-- Exportiere Datenbank Struktur für kica
CREATE DATABASE IF NOT EXISTS `kica` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kica`;


-- Exportiere Struktur von Tabelle kica.abwesenheit
CREATE TABLE IF NOT EXISTS `abwesenheit` (
  `tr_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  PRIMARY KEY (`tr_id`,`p_id`),
  KEY `Abwesende` (`p_id`),
  CONSTRAINT `Abwesende` FOREIGN KEY (`p_id`) REFERENCES `person` (`p_id`),
  CONSTRAINT `Trainingseinheit` FOREIGN KEY (`tr_id`) REFERENCES `trainingseinheit` (`tr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Daten Export vom Benutzer nicht ausgewählt


-- Exportiere Struktur von Tabelle kica.mannschaft
CREATE TABLE IF NOT EXISTS `mannschaft` (
  `m_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Daten Export vom Benutzer nicht ausgewählt


-- Exportiere Struktur von Tabelle kica.person
CREATE TABLE IF NOT EXISTS `person` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `v_name` varchar(30) NOT NULL,
  `geb_datum` date NOT NULL,
  `groesse` tinyint(4) DEFAULT NULL,
  `bild` varchar(100) DEFAULT NULL,
  `betreuer` tinyint(1) unsigned zerofill NOT NULL,
  `tel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Daten Export vom Benutzer nicht ausgewählt


-- Exportiere Struktur von Tabelle kica.spiel
CREATE TABLE IF NOT EXISTS `spiel` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `ort` varchar(255) NOT NULL,
  `heim` int(10) NOT NULL,
  `auswaerts` int(10) NOT NULL,
  `h_tore` tinyint(4) NOT NULL,
  `a_tore` tinyint(4) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Daten Export vom Benutzer nicht ausgewählt


-- Exportiere Struktur von Tabelle kica.status
CREATE TABLE IF NOT EXISTS `status` (
  `stat_id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`stat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Daten Export vom Benutzer nicht ausgewählt


-- Exportiere Struktur von Tabelle kica.teilnehmer_tg
CREATE TABLE IF NOT EXISTS `teilnehmer_tg` (
  `tg_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  PRIMARY KEY (`tg_id`,`p_id`),
  KEY `Teilnehmer` (`p_id`),
  CONSTRAINT `Teilnehmer` FOREIGN KEY (`p_id`) REFERENCES `person` (`p_id`),
  CONSTRAINT `Trainigsgruppe` FOREIGN KEY (`tg_id`) REFERENCES `trainingsgruppe` (`tg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Daten Export vom Benutzer nicht ausgewählt


-- Exportiere Struktur von Tabelle kica.trainingseinheit
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

-- Daten Export vom Benutzer nicht ausgewählt


-- Exportiere Struktur von Tabelle kica.trainingsgruppe
CREATE TABLE IF NOT EXISTS `trainingsgruppe` (
  `tg_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `trainer` int(10) NOT NULL,
  PRIMARY KEY (`tg_id`),
  KEY `Trainer` (`trainer`),
  CONSTRAINT `Trainer` FOREIGN KEY (`trainer`) REFERENCES `person` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Daten Export vom Benutzer nicht ausgewählt


-- Exportiere Struktur von Tabelle kica.turnier
CREATE TABLE IF NOT EXISTS `turnier` (
  `tu_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gewinner` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Daten Export vom Benutzer nicht ausgewählt


-- Exportiere Struktur von Tabelle kica.user
CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Daten Export vom Benutzer nicht ausgewählt
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
