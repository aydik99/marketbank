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
  `id_type` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `status` int(10) unsigned,
  `date_start` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ask`),
  KEY `FK_ask_status` (`status`),
  KEY `FK_ask_asktype` (`id_type`),
  KEY `FK_ask_user` (`id_user`),
  CONSTRAINT `FK_ask_asktype` FOREIGN KEY (`id_type`) REFERENCES `asktype` (`id_type`),
  CONSTRAINT `FK_ask_status` FOREIGN KEY (`status`) REFERENCES `askstatus` (`id_status`),
  CONSTRAINT `FK_ask_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы marketbase.ask: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `ask` DISABLE KEYS */;
INSERT IGNORE INTO `ask` (`id_ask`, `summa`, `id_type`, `id_user`, `comment`, `filename`, `status`, `date_start`) VALUES
	(3, '1000', 1, 38, NULL, NULL, 1, '19.03.2018'),
	(4, '5000', 2, 38, NULL, NULL, 1, '19.03.2018'),
	(7, '7000', 2, 38, 'На телефон жене.', NULL, 1, '19.03.2018');
/*!40000 ALTER TABLE `ask` ENABLE KEYS */;

-- Дамп структуры для таблица marketbase.askstatus
DROP TABLE IF EXISTS `askstatus`;
CREATE TABLE IF NOT EXISTS `askstatus` (
  `id_status` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы marketbase.askstatus: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `askstatus` DISABLE KEYS */;
INSERT IGNORE INTO `askstatus` (`id_status`, `name_status`) VALUES
	(1, 'В аукционе'),
	(2, 'Активная'),
	(3, 'Завершена');
/*!40000 ALTER TABLE `askstatus` ENABLE KEYS */;

-- Дамп структуры для таблица marketbase.asktype
DROP TABLE IF EXISTS `asktype`;
CREATE TABLE IF NOT EXISTS `asktype` (
  `id_type` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_type` varchar(30) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы marketbase.asktype: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `asktype` DISABLE KEYS */;
INSERT IGNORE INTO `asktype` (`id_type`, `name_type`) VALUES
	(1, 'Ипотека'),
	(2, 'Кредит');
/*!40000 ALTER TABLE `asktype` ENABLE KEYS */;

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
  `tel` varchar(12) NOT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы marketbase.bank: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;

-- Дамп структуры для таблица marketbase.docs
DROP TABLE IF EXISTS `docs`;
CREATE TABLE IF NOT EXISTS `docs` (
  `id_doc` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_doc` varchar(20) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_doc`),
  KEY `FK_doc_user` (`id_user`),
  CONSTRAINT `FK_doc_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы marketbase.docs: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `docs` DISABLE KEYS */;
/*!40000 ALTER TABLE `docs` ENABLE KEYS */;

-- Дамп структуры для таблица marketbase.human
DROP TABLE IF EXISTS `human`;
CREATE TABLE IF NOT EXISTS `human` (
  `id_human` int(10) unsigned NOT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `fathername` varchar(30) NOT NULL,
  `datebirth` varchar(10) NOT NULL,
  `tel` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_human`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы marketbase.human: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `human` DISABLE KEYS */;
INSERT IGNORE INTO `human` (`id_human`, `avatar`, `lastname`, `firstname`, `fathername`, `datebirth`, `tel`) VALUES
	(38, '../web/images/1520537063.png', 'Иванов', 'Иван', 'Петрович', '12.02.2015', '892253201111'),
	(39, '../web/images/1520185430.jpg', 'Петров', 'Фридрих', 'Петрович', '25.09.1987', '89192554877');
/*!40000 ALTER TABLE `human` ENABLE KEYS */;

-- Дамп структуры для таблица marketbase.messages
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_msg` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datatime` datetime NOT NULL,
  `id_from` int(10) unsigned NOT NULL,
  `id_to` int(10) unsigned NOT NULL,
  `text` varchar(300) NOT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_msg`),
  KEY `FK_msgfrom_user` (`id_from`),
  KEY `FK_msgto_user` (`id_to`),
  CONSTRAINT `FK_msgfrom_user` FOREIGN KEY (`id_from`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_msgto_user` FOREIGN KEY (`id_to`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы marketbase.messages: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Дамп структуры для таблица marketbase.suggest
DROP TABLE IF EXISTS `suggest`;
CREATE TABLE IF NOT EXISTS `suggest` (
  `id_sug` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text_sug` varchar(300) NOT NULL,
  `id_ask` int(10) unsigned NOT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `date_suggest` varchar(10) NOT NULL,
  `id_user` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_sug`),
  KEY `FK_suggest_ask` (`id_ask`),
  KEY `fk_sug_user` (`id_user`),
  CONSTRAINT `FK_suggest_ask` FOREIGN KEY (`id_ask`) REFERENCES `ask` (`id_ask`),
  CONSTRAINT `fk_sug_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы marketbase.suggest: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `suggest` DISABLE KEYS */;
/*!40000 ALTER TABLE `suggest` ENABLE KEYS */;

-- Дамп структуры для таблица marketbase.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `activation_key` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы marketbase.user: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT IGNORE INTO `user` (`id`, `username`, `password`, `email`, `confirmed`, `activation_key`, `role`) VALUES
	(38, 'ivanov', '$2y$13$qLOtgcxBxcgNeWxvkD.KRORH1HQdeVQ2FhbNY.4rbgB3vF7gDl1Dq', 'pogorelov_vt@mail.ru', 1, '1519417254', 'user'),
	(39, 'petrov', '$2y$13$EdNtNh2QxoX58fBnJ/GKPudKcGB5A88M0wMr6A1XrsvKKjE5yc0.K', 'magvaj4ik@mail.ru', 1, '1519421964', 'user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
