
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 27 2014 г., 23:34
-- Версия сервера: 10.0.12-MariaDB
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u420618167_book`
--

-- --------------------------------------------------------

--
-- Структура таблицы `b_author`
--

CREATE TABLE IF NOT EXISTS `b_author` (
  `aut_id` int(11) NOT NULL AUTO_INCREMENT,
  `aut_fname` varchar(40) NOT NULL,
  `aut_lname` varchar(50) NOT NULL,
  PRIMARY KEY (`aut_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `b_author`
--

INSERT INTO `b_author` (`aut_id`, `aut_fname`, `aut_lname`) VALUES
(1, 'имя', 'фамилия'),
(3, 'второй', 'автор');

-- --------------------------------------------------------

--
-- Структура таблицы `b_book`
--

CREATE TABLE IF NOT EXISTS `b_book` (
  `boo_id` int(11) NOT NULL AUTO_INCREMENT,
  `boo_name` varchar(150) NOT NULL,
  `boo_image` varchar(255) NOT NULL,
  PRIMARY KEY (`boo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `b_book`
--

INSERT INTO `b_book` (`boo_id`, `boo_name`, `boo_image`) VALUES
(1, 'новая', '1-1409171800.jpg'),
(3, 'Настольная книга', '3-1409172445.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `b_book_author`
--

CREATE TABLE IF NOT EXISTS `b_book_author` (
  `bau_id` int(11) NOT NULL AUTO_INCREMENT,
  `bau_book_id` int(11) NOT NULL,
  `bau_author_id` int(11) NOT NULL,
  PRIMARY KEY (`bau_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `b_book_author`
--

INSERT INTO `b_book_author` (`bau_id`, `bau_book_id`, `bau_author_id`) VALUES
(15, 3, 1),
(14, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `b_book_rubric`
--

CREATE TABLE IF NOT EXISTS `b_book_rubric` (
  `bru_id` int(11) NOT NULL AUTO_INCREMENT,
  `bru_book_id` int(11) NOT NULL,
  `bru_rubric_id` int(11) NOT NULL,
  PRIMARY KEY (`bru_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Дамп данных таблицы `b_book_rubric`
--

INSERT INTO `b_book_rubric` (`bru_id`, `bru_book_id`, `bru_rubric_id`) VALUES
(29, 1, 2),
(28, 1, 1),
(32, 3, 3),
(31, 3, 2),
(30, 3, 1),
(33, 3, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `b_groups`
--

CREATE TABLE IF NOT EXISTS `b_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `b_groups`
--

INSERT INTO `b_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Структура таблицы `b_login_attempts`
--

CREATE TABLE IF NOT EXISTS `b_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `b_rubric`
--

CREATE TABLE IF NOT EXISTS `b_rubric` (
  `rub_id` int(11) NOT NULL AUTO_INCREMENT,
  `rub_name` varchar(100) NOT NULL,
  PRIMARY KEY (`rub_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `b_rubric`
--

INSERT INTO `b_rubric` (`rub_id`, `rub_name`) VALUES
(1, 'рубрика 1'),
(2, 'рубрика 2'),
(3, 'рубрика 3'),
(4, 'рубрика 4');

-- --------------------------------------------------------

--
-- Структура таблицы `b_users`
--

CREATE TABLE IF NOT EXISTS `b_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `b_users`
--

INSERT INTO `b_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@book.com', '', NULL, NULL, NULL, 1268889823, 1409176499, 1, 'Admin', 'Booker', 'BOOK', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `b_users_groups`
--

CREATE TABLE IF NOT EXISTS `b_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `b_users_groups`
--

INSERT INTO `b_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
