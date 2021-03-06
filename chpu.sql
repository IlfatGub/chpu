-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.53 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп данных таблицы chpu.chpu_for: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `chpu_for` DISABLE KEYS */;
INSERT INTO `chpu_for` (`id`, `code`, `name`, `type`) VALUES
	(7, 'CYCLE92\r\n', 'Отрез\r\n', NULL),
	(8, 'CYCLE951\r\n', 'Обработка резаньем\r\n', NULL),
	(9, 'CYCLE99\r\n', 'Нарезание резьбы резцом\r\n', NULL),
	(10, 'CYCLE930', 'Выточка', NULL),
	(11, 'CYCLE98\r\n', 'Цепочка резьб', NULL),
	(12, 'CYCLE76', 'Обработка по контуру', 1);
/*!40000 ALTER TABLE `chpu_for` ENABLE KEYS */;

-- Дамп данных таблицы chpu.Details: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `Details` DISABLE KEYS */;
INSERT INTO `Details` (`id`, `name`) VALUES
	(1, 'Втулка прижимная'),
	(2, 'Игла запорного клапана'),
	(3, 'Паршют'),
	(4, 'Полумуфта насоса'),
	(5, 'Ролик поддерживающий'),
	(6, 'Муфта специальная(стопмуфта)'),
	(7, 'Упор кабельного ввода'),
	(8, 'Фланец 50х21 с БРС'),
	(9, 'Штуцер БРС приварной'),
	(10, 'Корпус');
/*!40000 ALTER TABLE `Details` ENABLE KEYS */;

-- Дамп данных таблицы chpu.parameter: ~57 rows (приблизительно)
/*!40000 ALTER TABLE `parameter` DISABLE KEYS */;
INSERT INTO `parameter` (`id`, `code`, `name`, `id_for`, `ext`) VALUES
	(1, 'S\r\n', 'Скорость шпинделя\r\n', 7, 'об/мин\r\n'),
	(2, 'V\r\n', 'Постоянная скорость резания\r\n', 7, 'м/мин\r\n'),
	(3, 'SV\r\n', 'Граница макс. Скорости\r\n', 7, 'об/мин\r\n'),
	(4, 'X0\r\n', 'Исходная точка в X\r\n', 7, 'мм'),
	(5, 'Z0\r\n', 'Исходная точка в Z\r\n', 7, 'мм'),
	(6, 'FS\r\n', 'Ширина фаски или радиус закругления\r\n', 7, 'мм'),
	(7, 'X1\r\n', 'Глубина для уменьшения скорости Х1', 7, 'мм'),
	(8, 'FR\r\n', 'скорости относительно X0 \r\n', 7, 'мм/об'),
	(10, 'X2\r\n', 'Конечная точка Х2', 7, 'мм'),
	(12, 'X0\r\n', 'Исходная точка в X\r\n', 8, 'мм'),
	(13, 'Z0\r\n', 'Исходная точка в Z\r\n', 8, 'мм'),
	(14, 'X1', 'Конечная точка по Х', 8, 'мм'),
	(15, 'Z1\r\n', 'Конечная точка по Y', 8, 'мм'),
	(19, 'UX', 'Чистовой припуск по X', 8, 'мм'),
	(20, 'UZ', 'Чистовой припуск по Y', 8, 'мм'),
	(24, 'P\r\n', 'Выбор шага/витков резьбы при таблице', 9, 'мм/об\r\n'),
	(25, 'G\r\n', 'Изменение шага резьбы на оборот\r\n', 9, 'мм/об\r\n'),
	(26, 'X0\r\n', 'Исходная точка X из\r\n', 9, 'мм'),
	(27, 'Z0\r\n', 'Исходная точка Z\r\n', 9, 'мм'),
	(28, 'Z1\r\n', 'Конечная точка резьбы\r\n', 9, 'мм'),
	(29, 'LW\r\n', 'Заход резьбы\r\n', 9, 'мм'),
	(30, 'LR\r\n', 'Выход резьбы\r\n', 9, 'мм'),
	(31, 'H1\r\n', 'Глубина резьбы из таблицы резьб\r\n', 9, 'мм'),
	(32, 'DP\r\n', 'Наклон подачи как боковая сторона\r\n', 9, 'градусы\r\n'),
	(34, 'D1\r\n', 'Первая глубина подачи или число черновых проходов\r\n', 9, 'мм'),
	(35, 'U\r\n', 'Чистовой припуск в X и Z\r\n', 9, 'мм'),
	(36, 'NN\r\n', 'Число холостых проходов\r\n', 9, 'мм'),
	(37, 'VR\r\n', 'Интервал обратного хода\r\n', 9, 'мм'),
	(50, 'X0\r\n', 'Исходная точка в X\r\n', 10, 'мм'),
	(51, 'Z0\r\n', 'Исходная точка в Z\r\n', 10, 'мм'),
	(52, 'B1\r\n', 'Ширина выточки\r\n', 10, 'мм'),
	(53, 'T1\r\n', 'Глубина выточки\r\n', 10, 'мм'),
	(54, 'D\r\n', 'Максимальная подача на глубину при врезании\r\n', 10, 'мм'),
	(58, 'X1', 'Исходная точка в X\r\n', 12, 'мм'),
	(59, 'Z1', 'Исходная точка в Y\r\n', 12, 'мм'),
	(60, 'R1', 'Радиус R', 12, 'мм'),
	(61, 'F1', 'Фаска F', 12, 'мм'),
	(62, 'F', 'Подача', 8, 'мм'),
	(63, 'D', 'Максимальная подча на глубину', 8, 'градусы'),
	(64, 'UX', 'Чистовой припуск в X', 10, 'мм'),
	(65, 'UZ', 'Чистовой припуск в Y', 10, 'мм'),
	(66, 'P', 'Шаг резьбы', 11, 'мм/об'),
	(67, 'G', 'Изменение шага резьбы на оборот', 11, 'мм'),
	(68, 'X0', 'Исходная точка Х', 11, 'мм'),
	(69, 'Z0', 'Исходная точка Y', 11, 'мм'),
	(70, 'X1', 'Конечная точка X', 11, 'мм'),
	(71, 'Y1', 'Конечная точка Y', 11, 'мм'),
	(72, 'LW', 'Заход резьбы', 11, 'мм'),
	(73, 'LR', 'Выход резьбы', 11, 'мм'),
	(74, 'H1', 'Глубина резьбы', 11, 'мм'),
	(75, 'AP', 'Наклон подачи', 11, 'градусы'),
	(76, 'ND', 'Число черновых проходов', 11, 'мм'),
	(77, 'U', 'чистовой припуск', 11, 'мм'),
	(78, 'NN', 'Число холостых проходов', 11, 'мм'),
	(79, 'VR', 'Интервал обратного хода', 11, 'мм'),
	(80, 'F', 'Подача', 7, 'мм'),
	(81, 'SR', 'Уменьшение число оборотов', 7, 'мм/об');
/*!40000 ALTER TABLE `parameter` ENABLE KEYS */;

-- Дамп данных таблицы chpu.save: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `save` DISABLE KEYS */;
/*!40000 ALTER TABLE `save` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
