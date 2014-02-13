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

INSERT INTO `note` (`id`, `author`, `text`, `time`, `thread`) VALUES
(1,	'Spammer',	'První! :D',	'2013-11-18 16:01:13',	'guestbook'),
(2,	'Jarda',	'Tak aspoň druhý :-)',	'2013-11-18 16:01:39',	'guestbook'),
(10,	'Jarda',	'Mě se to líbí, je to úplně super.',	'2013-11-18 18:09:11',	'about'),
(12,	'Administrátor',	'a teď jsem třetí já :)',	'2013-11-18 18:22:37',	'guestbook'),
(14,	'Administrátor',	'Haha, už mohu mazat jen já.',	'2013-11-18 18:35:42',	'about'),
(57,	'Dark Vader',	'Všechny vás sesvačím ve jménu Impéria!',	'2013-11-19 03:30:40',	'guestbook'),
(111,	'Jan Novák',	'Jsem tu nový, co se tu rozdává?',	'2013-11-19 07:06:07',	'guestbook'),
(112,	'Administrátor',	'@Jan Novák: Banány za hloupé otázky.',	'2013-11-19 07:14:16',	'guestbook');

INSERT INTO `user` (`id`, `username`, `password`, `role`, `nick`) VALUES
(2,	'user',	'$2a$07$7v25orst2sbotl6xr5neueBfN1OmA9WGEwFFYSINFCEPNs2ueG54i',	'user',	'Jan Novák');