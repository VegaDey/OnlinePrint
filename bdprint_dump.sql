
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 24 2016 г., 18:42
-- Версия сервера: 10.0.20-MariaDB
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u200709211_bdpri`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `namecat` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`Id`, `namecat`) VALUES
(1, 'Широкоформатная печать'),
(2, 'Визитки'),
(3, 'Листовки'),
(4, 'Цифровая печать'),
(5, 'Сувениры'),
(6, 'Календари'),
(7, 'Кружки'),
(20, 'Ручная бота'),
(19, 'Текстиль');

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `description` text NOT NULL,
  `shipper` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`id`, `name`, `category`, `price`, `count`, `description`, `shipper`, `date`) VALUES
(1, 'Баннер 220', 'Широкоформатная печать', 150, 1, 'Баннер плотностью 220 гр', 'Мастер Медиа', '2016-12-04'),
(2, 'Самоклейка глянец', 'Широкоформатная печать', 600, 1, 'Самоклейка глннцева сольвентная печать', 'Спектрум', '2016-12-05'),
(3, 'Самоклейка глянец', 'Широкоформатная печать', 600, 1, 'Самоклейка глннцева сольвентная печать', 'Спектрум', '2016-12-05'),
(4, 'Самоклейка матовая', 'Широкоформатная печать', 700, 1, 'Самоклейка матовая сольвентная печать', 'Спектрум', '2016-12-05'),
(5, 'Самоклейка матовая', 'Широкоформатная печать', 700, 1, 'Самоклейка матовая сольвентная печать', 'Спектрум', '2016-12-05'),
(7, 'Визитки 4+4', 'Визитки', 5, 1, 'Описание', 'Orange', '2016-12-05'),
(8, 'Визитки 4+0', 'Визитки', 4, 1, 'Описание 2', 'Orange', '2016-12-05'),
(15, 'Фотоальбом', 'Ручная бота', 1000, 1, 'Альбом ручной работы', 'Рыжкова', '2016-12-14'),
(14, 'Самоклейка перф', 'Широкоформатная печать', 1000, 1, 'Белая перфорированная самоклейка для печати сольвентом', 'Спектрум', '2016-12-13');

-- --------------------------------------------------------

--
-- Структура таблицы `shipper`
--

CREATE TABLE IF NOT EXISTS `shipper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `shipper`
--

INSERT INTO `shipper` (`id`, `name`) VALUES
(1, 'Спектрум'),
(2, 'Мастер Медиа'),
(3, 'Orange'),
(4, 'Триада'),
(26, 'Догадин'),
(25, 'Рыжкова'),
(24, 'Колорит');

-- --------------------------------------------------------

--
-- Структура таблицы `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `count` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `shop`
--

INSERT INTO `shop` (`id`, `product`, `price`, `count`, `user`, `mobile`, `email`, `note`, `date`) VALUES
(49, '150 ', '1800', '12', 'admin', '89209339331', 'fidgeter@mail.ru', 'Описания нету и не будет', '2016-12-21'),
(27, '700 ', '2100', '3', 'Денис', '89209339331', 'fidgeter4@gmail.com', '222222222', '2016-12-21'),
(28, '700 ', '2100', '3', 'Денис', '89209339331', 'fidgeter4@gmail.com', '222222222', '2016-12-21');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `company`, `phone`, `email`, `pass`, `date`) VALUES
(103, 'Денис 22', 'Муром Принт', '9209339331', 'fidgeter@mail.ru', 'acf7ef943fdeb3cbfed8dd0d8f584731', '2016-12-05'),
(104, 'Денис', 'Муром Принт', '9209339331', 'fidgeter@mail.ru', 'd41d8cd98f00b204e9800998ecf8427e', '2016-12-05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
