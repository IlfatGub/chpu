-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 23 2017 г., 10:11
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chpu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chpu_for`
--

CREATE TABLE IF NOT EXISTS `chpu_for` (
  `id` int(11) NOT NULL,
  `code` varchar(15) DEFAULT NULL COMMENT 'Код операции',
  `name` varchar(50) DEFAULT NULL COMMENT 'Наименование операции',
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Виды операций';

--
-- Дамп данных таблицы `chpu_for`
--

INSERT INTO `chpu_for` (`id`, `code`, `name`, `type`) VALUES
(7, 'CYCLE92\r\n', 'Отрез\r\n', NULL),
(8, 'CYCLE951\r\n', 'Обработка резаньем\r\n', NULL),
(9, 'CYCLE99\r\n', 'Нарезание резьбы резцом\r\n', NULL),
(10, 'CYCLE930', 'Выточка', NULL),
(11, 'CYCLE98\r\n', 'Цепочка резьб', NULL),
(12, 'CYCLE76', 'Обработка по контуру', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `Details`
--

CREATE TABLE IF NOT EXISTS `Details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Details`
--

INSERT INTO `Details` (`id`, `name`) VALUES
(1, 'Втулка прижимная'),
(2, 'Игла запорного клапана'),
(3, 'Паршют'),
(4, 'Полумуфта насоса'),
(5, 'Ролик поддерживающий'),
(6, 'Муфта специальная(стопмуфта)'),
(7, 'Упор кабельного ввода'),
(8, 'Фланец 50х21 с БРС'),
(9, 'Штуцер БРС приварной');

-- --------------------------------------------------------

--
-- Структура таблицы `parameter`
--

CREATE TABLE IF NOT EXISTS `parameter` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL COMMENT 'Код параметра',
  `name` varchar(255) DEFAULT NULL COMMENT 'Наименование параметра',
  `id_for` int(11) DEFAULT NULL,
  `ext` varchar(50) DEFAULT 'мм'
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COMMENT='Список параметров';

--
-- Дамп данных таблицы `parameter`
--

INSERT INTO `parameter` (`id`, `code`, `name`, `id_for`, `ext`) VALUES
(1, 'S\r\n', 'Скорость шпинделя\r\n', 7, 'об/мин\r\n'),
(2, 'V\r\n', 'Постоянная скорость резания\r\n', 7, 'м/мин\r\n'),
(3, 'SV\r\n', 'Граница макс. Скорости\r\n', 7, 'об/мин\r\n'),
(4, 'X0\r\n', 'Исходная точка в X\r\n', 7, 'мм'),
(5, 'Z0\r\n', 'Исходная точка в Z\r\n', 7, 'мм'),
(6, 'FS\r\n', 'Ширина фаски или радиус закругления\r\n', 7, 'мм'),
(7, 'X1\r\n', 'Глубина для уменьшения скорости или глубина для уменьшения\r\n', 7, 'мм'),
(8, 'FR\r\n', 'скорости относительно X0 \r\n', 7, 'мм/об'),
(9, 'SR\r\n', 'Уменьшенная подача\r\n', 7, 'об/мин'),
(10, 'X2\r\n', 'Уменьшенная скорость\r\n', 7, 'мм'),
(11, '_DT\r\n', 'Время ожидания ломки стружки\r\n', 7, 'мм'),
(12, 'X0\r\n', 'Исходная точка в X\r\n', 8, 'мм'),
(13, 'Z0\r\n', 'Исходная точка в Z\r\n', 8, 'мм'),
(14, 'B1\r\n', 'Ширина выточки\r\n', 8, 'мм'),
(15, 'T1\r\n', 'Глубина выточки\r\n', 8, 'мм'),
(16, 'D\r\n', 'Макс. подача на глубину при врезан\r\n', 8, 'мм'),
(17, 'UX\r\n', 'Чистовой припуск в X или чистовой припуск в X и Z\r\n', 8, 'мм'),
(18, 'UZ\r\n', 'Чистовой припуск в Z\r\n', 8, 'мм'),
(19, 'N\r\n', 'Число выточек\r\n', 8, 'мм'),
(20, 'DP\r\n', 'Интервал выточек\r\n', 8, 'мм'),
(21, 'A1\r\n', 'Угол профиля 1 или угол профиля 2\r\n', 8, 'градусы'),
(22, 'FS1\r\n', 'Ширина фаски\r\n', 8, 'мм'),
(23, 'A0\r\n', 'Угол диагонали\r\n', 8, 'градусы'),
(24, 'P\r\n', 'Выбор шага/витков резьбы при таблице', 9, 'мм/об\r\n'),
(25, 'G\r\n', 'Изменение шага резьбы на оборот\r\n', 9, 'мм/об\r\n'),
(26, 'X0\r\n', 'Исходная точка X из\r\n', 9, 'мм'),
(27, 'Z0\r\n', 'Исходная точка Z\r\n', 9, 'мм'),
(28, 'Z1\r\n', 'Конечная точка резьбы\r\n', 9, 'мм'),
(29, 'LW\r\n', 'Заход резьбы\r\n', 9, 'мм'),
(30, 'LR\r\n', 'Выход резьбы\r\n', 9, 'мм'),
(31, 'H1\r\n', 'Глубина резьбы из таблицы резьб\r\n', 9, 'мм'),
(32, 'DP\r\n', 'Наклон подачи как боковая сторона\r\n', 9, 'градусы\r\n'),
(33, 'DP\r\n', 'Наклон подачи как боковая сторона (инкр.)\r\n', 9, 'мм'),
(34, 'D1\r\n', 'Первая глубина подачи или число черновых проходов\r\n', 9, 'мм'),
(35, 'U\r\n', 'Чистовой припуск в X и Z\r\n', 9, 'мм'),
(36, 'NN\r\n', 'Число холостых проходов\r\n', 9, 'мм'),
(37, 'VR\r\n', 'Интервал обратного хода\r\n', 9, 'мм'),
(38, 'X0\r\n', 'Исходная точка в X\r\n', 11, 'мм'),
(39, 'Z0\r\n', 'Исходная точка в Z\r\n', 11, 'мм'),
(40, 'P0\r\n', 'Шаг резьбы 1\r\n', 11, 'мм/об\r\n'),
(41, 'X1\r\n', 'Промежуточная точка X\r\n', 11, 'мм'),
(42, 'Z1\r\n', 'Промежуточная точка Y\r\n', 11, 'мм'),
(43, 'P1\r\n', 'Шаг резьбы 2\r\n', 11, 'мм/об\r\n'),
(44, 'X2\r\n', 'Конечная точка X\r\n', 11, 'мм'),
(45, 'Z2\r\n', 'Конечная точка Y\r\n', 11, 'мм'),
(46, 'LW\r\n', 'Форма резьбы\r\n', 11, 'мм'),
(47, 'LR\r\n', 'Выход резьбы\r\n', 11, 'мм'),
(48, 'H1\r\n', 'Глубина резьбы\r\n', 11, 'мм'),
(49, 'VR\r\n', 'Интервал обратного хода', 11, 'мм'),
(50, 'X0\r\n', 'Исходная точка в X\r\n', 10, 'мм'),
(51, 'Z0\r\n', 'Исходная точка в Z\r\n', 10, 'мм'),
(52, 'B1\r\n', 'Ширина выточки\r\n', 10, 'мм'),
(53, 'T1\r\n', 'Глубина выточки\r\n', 10, 'мм'),
(54, 'D\r\n', 'Максимальная подача на глубину при врезании\r\n', 10, 'мм'),
(55, 'UZ\r\n', 'Чистовой припуск\r\n', 10, 'мм'),
(56, 'DP\r\n', 'Интервал Выточки\r\n', 10, 'мм'),
(57, 'A1\r\n', 'Угол профиля\r\n', 10, 'градусы\r\n'),
(58, 'X1', 'Исходная точка в X\r\n', 12, 'мм'),
(59, 'Z1', 'Исходная точка в Y\r\n', 12, 'мм'),
(60, 'R1', 'Радиус', 12, 'мм');

-- --------------------------------------------------------

--
-- Структура таблицы `save`
--

CREATE TABLE IF NOT EXISTS `save` (
  `id` int(11) NOT NULL,
  `id_for` int(11) DEFAULT NULL,
  `text` text,
  `id_details` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `save`
--

INSERT INTO `save` (`id`, `id_for`, `text`, `id_details`) VALUES
(1, 10, 'X001 Z001 B110 T11 A112 ', 1),
(2, 12, 'X12.3 Z12.3 R110 ', 1),
(4, 12, 'X00.2 Z02.56 R010 X10.3 Z15.68 R120 X25 Z2 R2 ', 8),
(6, 12, 'X00.2 Z02.56 R08 X10.3 Z15.68 R15 X25 Z27.8 R29 ', 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chpu_for`
--
ALTER TABLE `chpu_for`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Details`
--
ALTER TABLE `Details`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `save`
--
ALTER TABLE `save`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chpu_for`
--
ALTER TABLE `chpu_for`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `Details`
--
ALTER TABLE `Details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT для таблицы `save`
--
ALTER TABLE `save`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
