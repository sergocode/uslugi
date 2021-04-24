-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 24 2021 г., 21:52
-- Версия сервера: 5.7.24
-- Версия PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gosuslugi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `citizens`
--

CREATE TABLE `citizens` (
  `ID` int(50) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `SURNAME` varchar(100) NOT NULL,
  `PATRONYMIC` varchar(100) NOT NULL,
  `CHILDREN` varchar(100) NOT NULL,
  `COUNT_CHILDS` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `citizens`
--

INSERT INTO `citizens` (`ID`, `NAME`, `SURNAME`, `PATRONYMIC`, `CHILDREN`, `COUNT_CHILDS`) VALUES
(1, 'Иван', 'Иванов', 'Иванович', '', 0),
(2, 'Антон', 'Иванов', 'Иванович', '1', 0),
(3, 'Сергей', 'Горюнов', 'Николаевич', '', 0),
(4, 'Николай', 'Горюнов', 'Михайлович', '3', 0),
(5, 'Антон', 'Многодетов', 'Иванович', '', 0),
(6, 'Николай', 'Многодетов', 'Иванович', '', 0),
(7, 'Пётр', 'Многодетов', 'Иванович', '', 0),
(8, 'Иван', 'Многодетов', 'Иванович', '', 0),
(9, 'Дмитрий', 'Многодетов', 'Иванович', '', 0),
(10, 'Иоан', 'Многодетов', 'Иванович', '', 0),
(11, 'Иван', 'Многодетов', 'Петрович', '5,6,7,8,9,10', 6),
(12, 'Виктория', 'Многодетова', 'Николаевна', '5,6,7,8,9,10', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `PASSWORD` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`) VALUES
(1, 'admin@gosuslugi.ru', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `zayavki`
--

CREATE TABLE `zayavki` (
  `ID` int(50) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `LAST_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zayavki`
--

INSERT INTO `zayavki` (`ID`, `NAME`, `LAST_DATE`) VALUES
(2, 'Заявка на материнский капитал', '2021-04-28'),
(41, 'Новая заявка', '2021-04-25'),
(51, 'Новая заявка №1', '2021-04-25'),
(52, 'Новая заявка №2', '2021-04-25'),
(53, 'Новая заявка №3', '2021-04-25'),
(62, 'Старая заявка №1', '2021-04-23');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `citizens`
--
ALTER TABLE `citizens`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Индексы таблицы `zayavki`
--
ALTER TABLE `zayavki`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `citizens`
--
ALTER TABLE `citizens`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `zayavki`
--
ALTER TABLE `zayavki`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
