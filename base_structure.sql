-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.37 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных marketbase
DROP DATABASE IF EXISTS `marketbase`;
CREATE DATABASE IF NOT EXISTS `marketbase` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `marketbase`;

-- Дамп структуры для таблица marketbase.ask
DROP TABLE IF EXISTS `ask`;
CREATE TABLE IF NOT EXISTS `ask` (
  `id_ask` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `summa` varchar(20) NOT NULL,
  `id_type` int(10) NOT NULL,
  `id_human` int(10) NOT NULL,
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ask`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица marketbase.asktype
DROP TABLE IF EXISTS `asktype`;
CREATE TABLE IF NOT EXISTS `asktype` (
  `id_type` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_type` varchar(30) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица marketbase.bank
DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `id_bank` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shortname` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `inn` varchar(20) NOT NULL,
  `kpp` varchar(20) NOT NULL,
  `ogrn` varchar(20) NOT NULL,
  `adres` varchar(20) NOT NULL,
  `tel` varchar(20) NOT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица marketbase.human
DROP TABLE IF EXISTS `human`;
CREATE TABLE IF NOT EXISTS `human` (
  `id_human` int(10) unsigned NOT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `fathername` varchar(30) NOT NULL,
  `datebirth` varchar(10) NOT NULL,
  PRIMARY KEY (`id_human`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица marketbase.messages
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_msg` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datatime` datetime NOT NULL,
  `id_from` int(10) NOT NULL,
  `id_to` int(10) NOT NULL,
  `text` varchar(300) NOT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица marketbase.suggest
DROP TABLE IF EXISTS `suggest`;
CREATE TABLE IF NOT EXISTS `suggest` (
  `id_sug` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text_sug` varchar(300) NOT NULL,
  `id_ask` int(10) NOT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица marketbase.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `confirmed` tinyint(1) DEFAULT '0',
  `activation_key` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- Экспортируемые данные не выделены.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
