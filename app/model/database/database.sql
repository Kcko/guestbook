/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '+01:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `note`;
CREATE TABLE `note` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identifikátor.',
  `author` varchar(100) COLLATE utf8_czech_ci NOT NULL COMMENT 'Jméno autora příspěvku.',
  `text` text COLLATE utf8_czech_ci NOT NULL COMMENT 'Text příspěvku.',
  `time` datetime NOT NULL COMMENT 'Datum a čas vložení příspěvku.',
  `thread` varchar(50) COLLATE utf8_czech_ci NOT NULL COMMENT 'Vlákno, kam příspěvek patří.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Tabulka diskuzních příspěvků.';


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identifikátor.',
  `username` varchar(50) COLLATE utf8_czech_ci NOT NULL COMMENT 'Přihlašovací jméno.',
  `password` char(60) COLLATE utf8_czech_ci NOT NULL COMMENT 'Otisk hesla.',
  `role` varchar(50) COLLATE utf8_czech_ci NOT NULL COMMENT 'Role.',
  `nick` varchar(100) COLLATE utf8_czech_ci NOT NULL COMMENT 'Jméno pro vypsání.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Tabulka uživatelů.';

INSERT INTO `user` (`id`, `username`, `password`, `role`, `nick`) VALUES
(1,	'admin',	'$2a$07$rz69lm6a35qu1m87pmhw1u/KAF.qkyjbpRArpnJsezfyGPHx0Gz0u',	'admin',	'Administrátor');