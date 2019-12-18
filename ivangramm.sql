-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Час створення: Гру 18 2019 р., 16:17
-- Версія сервера: 5.6.38
-- Версія PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `ivangramm`
--

-- --------------------------------------------------------

--
-- Структура таблиці `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `friend` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isfriend` tinyint(1) NOT NULL,
  `lastmsg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `friends`
--

INSERT INTO `friends` (`id`, `user`, `friend`, `isfriend`, `lastmsg`) VALUES
(1, 'vanya', 'gena', 1, '2019-12-12 14:13:20'),
(2, 'vadim', 'gena', 1, '2019-12-13 00:03:55'),
(3, 'vanya', 'vadim', 1, '2019-12-13 00:06:38');

-- --------------------------------------------------------

--
-- Структура таблиці `leader`
--

CREATE TABLE `leader` (
  `login` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `leader`
--

INSERT INTO `leader` (`login`, `score`) VALUES
('vanya', 26),
('vanya', 0),
('vanya', 9),
('vanya', 35),
('vanya', 2),
('vanya', 0),
('vanya', 9);

-- --------------------------------------------------------

--
-- Структура таблиці `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `fromm` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `too` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `checkmessage` tinyint(1) NOT NULL,
  `edited` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `mail`
--

INSERT INTO `mail` (`id`, `fromm`, `too`, `message`, `date`, `checkmessage`, `edited`) VALUES
(1, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(2, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(3, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(4, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(5, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(6, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(7, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(8, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(9, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(10, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(11, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(12, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(13, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(14, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(15, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(16, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(17, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(18, 'vanya', 'gena', 'yest', '2019-05-20 08:00:00', 1, 0),
(19, 'vanya', 'gena', 'yest', '2019-05-21 19:08:24', 1, 0),
(20, 'vanya', 'gena', 'yeses', '2019-05-21 19:08:27', 1, 0),
(21, 'vanya', 'gena', 'asd', '2019-05-21 19:08:28', 1, 0),
(22, 'vanya', 'gena', 'asdasdasd', '2019-05-21 19:08:29', 1, 0),
(23, 'vanya', 'gena', 'qweqweqw', '2019-05-21 19:08:30', 1, 0),
(24, 'vanya', 'gena', 'asdasdasd', '2019-05-21 19:08:32', 1, 0),
(25, 'vanya', 'gena', 'asdasdasdasd', '2019-05-21 19:08:33', 1, 0),
(26, 'vanya', 'gena', 'asdasdasd', '2019-05-21 19:08:34', 1, 0),
(27, 'vanya', 'gena', 'asd', '2019-05-21 19:08:35', 1, 0),
(28, 'vanya', 'gena', 'asd', '2019-05-21 19:08:35', 1, 0),
(29, 'vanya', 'gena', 'as', '2019-05-21 19:08:35', 1, 0),
(30, 'vanya', 'gena', 'd', '2019-05-21 19:08:35', 1, 0),
(31, 'vanya', 'gena', 'as', '2019-05-21 19:08:36', 1, 0),
(32, 'vanya', 'gena', 'd', '2019-05-21 19:08:36', 1, 0),
(33, 'vanya', 'gena', 'asd', '2019-05-21 19:08:36', 1, 0),
(34, 'vanya', 'gena', 'as', '2019-05-21 19:08:36', 1, 0),
(35, 'vanya', 'gena', 'd', '2019-05-21 19:08:36', 1, 0),
(36, 'vanya', 'gena', 'as', '2019-05-21 19:08:37', 1, 0),
(37, 'vanya', 'gena', 'dasdasdas', '2019-05-21 19:08:37', 1, 0),
(38, 'vanya', 'gena', 'da', '2019-05-21 19:08:38', 1, 0),
(39, 'vanya', 'gena', 'd', '2019-05-21 19:08:38', 1, 0),
(40, 'vanya', 'gena', 'as', '2019-05-21 19:08:38', 1, 0),
(41, 'vanya', 'gena', 'das', '2019-05-21 19:08:39', 1, 0),
(42, 'vanya', 'gena', 'd', '2019-05-21 19:08:39', 1, 0),
(43, 'vanya', 'gena', 'as', '2019-05-21 19:08:39', 1, 0),
(44, 'vanya', 'gena', 'd', '2019-05-21 19:08:39', 1, 0),
(45, 'vanya', 'gena', 'as', '2019-05-21 19:08:39', 1, 0),
(46, 'vanya', 'gena', 'da', '2019-05-21 19:08:40', 1, 0),
(47, 'vanya', 'gena', 's', '2019-05-21 19:08:40', 1, 0),
(48, 'vanya', 'gena', 'd', '2019-05-21 19:08:40', 1, 0),
(49, 'vanya', 'gena', 'as', '2019-05-21 19:08:40', 1, 0),
(50, 'vanya', 'gena', 'da', '2019-05-21 19:08:40', 1, 0),
(51, 'vanya', 'gena', 'q1', '2019-05-21 19:08:47', 1, 0),
(52, 'vanya', 'gena', 'w2', '2019-05-21 19:08:49', 1, 0),
(53, 'vanya', 'gena', 'e3', '2019-05-21 19:08:49', 1, 0),
(54, 'vanya', 'gena', 'r4', '2019-05-21 19:08:50', 1, 0),
(55, 'vanya', 'gena', 't5', '2019-05-21 19:08:50', 1, 0),
(56, 'vanya', 'gena', 'y6', '2019-05-21 19:08:51', 1, 0),
(59, 'vanya', 'gena', 'eqwe', '2019-05-21 20:41:36', 1, 0),
(62, 'vanya', 'gena', 'qweqwe', '2019-05-22 15:45:10', 1, 0),
(63, 'vanya', 'gena', 'qwe', '2019-05-22 15:55:15', 1, 0),
(64, 'vanya', 'gena', 'qweqwe', '2019-05-22 15:55:19', 1, 0),
(65, 'vanya', 'gena', 'asdasdasdasd', '2019-05-22 15:55:23', 1, 0),
(66, 'vanya', 'gena', 'sdgsdgsg', '2019-05-22 15:55:25', 1, 0),
(67, 'vanya', 'gena', 'q1', '2019-05-22 15:55:34', 1, 0),
(68, 'vanya', 'gena', '2w', '2019-05-22 15:58:58', 1, 0),
(69, 'vanya', 'gena', 'qweqwe', '2019-05-22 15:59:24', 1, 0),
(70, 'vanya', 'gena', 'qwe', '2019-05-22 16:05:01', 1, 0),
(71, 'vanya', 'gena', 'qwe', '2019-05-22 16:09:18', 1, 0),
(72, 'vanya', 'gena', 'asdasdasdasd', '2019-05-22 16:09:20', 1, 0),
(73, 'vanya', 'gena', '12', '2019-05-22 16:09:54', 1, 0),
(74, 'vanya', 'gena', '13', '2019-05-22 16:09:54', 1, 0),
(75, 'vanya', 'gena', '14', '2019-05-22 16:09:55', 1, 0),
(76, 'vanya', 'gena', '15', '2019-05-22 16:09:56', 1, 0),
(77, 'vanya', 'gena', '16', '2019-05-22 16:09:57', 1, 0),
(78, 'vanya', 'gena', '17', '2019-05-22 16:09:58', 1, 0),
(79, 'vanya', 'gena', '18', '2019-05-22 16:09:59', 1, 0),
(80, 'vanya', 'gena', '19', '2019-05-22 16:10:03', 1, 0),
(83, 'vanya', 'gena', '22', '2019-05-22 16:14:11', 1, 0),
(84, 'vanya', 'gena', 'qweqweqwe', '2019-05-22 16:16:03', 1, 0),
(85, 'vanya', 'gena', 'asdasdasdasdasd', '2019-05-22 16:16:06', 1, 0),
(86, 'vanya', 'gena', 'привет вадим как ты?', '2019-05-22 16:18:28', 1, 0),
(87, 'vanya', 'gena', 'Привет', '2019-05-22 16:30:05', 1, 0),
(90, 'gena', 'vanya', 'выаываыва', '2019-06-05 14:48:18', 1, 0),
(92, 'vanya', 'gena', 'привет', '2019-06-05 14:48:55', 1, 1),
(93, 'vanya', 'gena', 'фывфыв', '2019-09-06 22:10:21', 1, 0),
(94, 'vanya', 'gena', 'asdasdasdasd', '2019-10-28 17:51:03', 1, 1),
(95, 'vanya', 'gena', 'asdfjashfghasfahisf', '2019-11-02 13:41:53', 1, 0),
(96, 'gena', 'vanya', 'ПРивет', '2019-12-11 21:13:11', 1, 0),
(97, 'vanya', 'gena', 'ghbdtnb', '2019-12-12 14:13:20', 1, 0),
(99, 'vadim', 'gena', 'Hi', '2019-12-13 00:01:39', 1, 0),
(100, 'vadim', 'gena', 'Yeasdasdas', '2019-12-13 00:01:43', 1, 1),
(102, 'vadim', 'gena', 'aSDASDASDASDAS', '2019-12-13 00:02:07', 1, 1),
(104, 'vadim', 'vanya', 'GHBDTNZX', '2019-12-13 00:03:38', 1, 1),
(106, 'vadim', 'gena', 'Пересланное сообщение:</br>От кого: <strong>vadim</strong></br>Кому: <strong>vanya</strong></br>Время: 0:03</br><i>GHBDTNZX</i>', '2019-12-13 00:03:55', 1, 0),
(107, 'vanya', 'vadim', 'Пересланное сообщение:</br>От кого: <strong>vadim</strong></br>Кому: <strong>vanya</strong></br>Время: 0:03</br><i>GHBDTNZX</i>', '2019-12-13 00:06:38', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблиці `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `level` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `theme` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `points` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `tests`
--

INSERT INTO `tests` (`id`, `level`, `theme`, `author`, `points`, `mark`) VALUES
(1, 'easy', 'grammary', 'vanya', 10, 10);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastseen` datetime NOT NULL,
  `typing` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birdth` date NOT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `lastseen`, `typing`, `name`, `surname`, `birdth`, `city`) VALUES
(1, 'vanya', '12345678', '2019-12-15 22:49:53', '0', '', '', '0000-00-00', ''),
(2, 'gena', '123456789', '2019-12-13 01:04:06', '0', '', '', '0000-00-00', ''),
(3, 'vadim', '12345678', '2019-12-13 01:02:59', '0', '', '', '0000-00-00', '');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`,`friend`);

--
-- Індекси таблиці `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT для таблиці `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
