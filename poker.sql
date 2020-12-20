-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 18 2020 г., 01:50
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `poker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `all_rates` int(11) NOT NULL,
  `board_cards` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `close_cards` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `circle` int(11) NOT NULL,
  `start_circle` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `player1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player5` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player6` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player7` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `table_id`, `all_rates`, `board_cards`, `close_cards`, `circle`, `start_circle`, `active`, `player1`, `player2`, `player3`, `player4`, `player5`, `player6`, `player7`) VALUES
(1, 10, 0, NULL, '6:S 10:C 12:C 4:H 3:S ', 0, 0, 67, '67', '68', '69', '70', '71', '', ''),
(2, 10, 0, NULL, '13:S 8:H 4:S 14:S 3:C ', 0, 0, 72, '72', '73', '74', '75', '76', '', ''),
(3, 10, 0, NULL, '2:H 12:H 8:S 12:C 9:C ', 0, 0, 77, '77', '78', '79', '80', '81', '', ''),
(4, 10, 0, NULL, '12:D 12:H 5:D 9:D 11:S ', 0, 0, 82, '82', '83', '84', '85', '86', '', ''),
(5, 10, 0, NULL, '6:D 9:D 2:D 13:C 7:S ', 0, 0, 87, '87', '88', '89', '90', '91', '', ''),
(6, 10, 0, NULL, '13:S 3:S 2:C 13:H 8:C ', 0, 0, 92, '92', '93', '94', '95', '96', '', ''),
(7, 10, 0, NULL, '10:D 8:S 4:C 8:D 11:C ', 0, 0, 97, '97', '98', '99', '100', '101', '', ''),
(8, 11, 0, NULL, '13:D 6:H 10:S ', 0, 0, 102, '102', '103', '', '', '', '', ''),
(9, 10, 0, '11:H 12:H', '10:S 2:H 7:S', 0, 0, 104, '104', '105', '106', '107', '108', '', ''),
(10, 10, 0, NULL, '11:H 6:S 12:C 3:H 12:H ', 0, 109, 109, '109', '110', '111', '112', '113', '', ''),
(11, 10, 0, NULL, '11:D 8:S 11:C 5:C 14:D ', 0, 114, 114, '114', '115', '116', '117', '118', '', ''),
(12, 10, 0, NULL, '14:D 5:H 5:D 9:S 7:D ', 0, 119, 119, '119', '120', '121', '122', '123', '', ''),
(13, 10, 0, NULL, '12:S 7:H 6:D 11:H 3:H ', 0, 124, 124, '124', '125', '126', '127', '128', '', ''),
(14, 10, 0, NULL, '14:C 2:S 4:H 2:D 10:H ', 0, 129, 129, '129', '130', '131', '132', '133', '', ''),
(15, 10, 0, NULL, '5:C 9:H 14:S 2:H 2:C ', 0, 134, 134, '134', '135', '136', '137', '138', '', ''),
(16, 10, 0, NULL, '10:C 9:H 11:S 5:C 6:S ', 0, 139, 139, '139', '140', '141', '142', '143', '', ''),
(17, 10, 0, NULL, '14:H 8:C 7:S 11:S 6:D ', 0, 144, 144, '144', '145', '146', '147', '148', '', ''),
(18, 10, 0, NULL, '6:C 3:H 5:H 2:S 8:S ', 0, 149, 149, '149', '150', '151', '152', '153', '', ''),
(19, 10, 0, NULL, '10:C 8:C 13:D 14:H 3:C ', 0, 154, 154, '154', '155', '156', '157', '158', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `card1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `card2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comb` int(11) NOT NULL,
  `rates` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `players`
--

INSERT INTO `players` (`id`, `card1`, `card2`, `comb`, `rates`) VALUES
(52, '3:H', '7:D', 2, 0),
(53, '5:S', '8:S', 1, 0),
(54, '10:D', '6:S', 3, 0),
(55, '9:S', '14:C', 3, 0),
(56, '12:D', '9:D', 2, 0),
(57, '11:H', '3:S', 3, 0),
(58, '4:S', '12:H', 2, 0),
(59, '2:S', '14:D', 2, 0),
(60, '13:C', '10:H', 2, 0),
(61, '4:H', '13:S', 1, 0),
(62, '14:D', '14:S', 2, 0),
(63, '3:H', '4:S', 2, 0),
(64, '7:S', '3:S', 2, 0),
(65, '8:D', '6:C', 2, 0),
(66, '14:C', '6:S', 7, 0),
(67, '4:S', '14:S', 1, 0),
(68, '8:S', '10:D', 6, 0),
(69, '13:C', '10:S', 2, 0),
(70, '13:D', '8:D', 3, 0),
(71, '2:D', '6:C', 2, 0),
(72, '7:C', '11:D', 2, 0),
(73, '3:H', '7:S', 2, 0),
(74, '4:D', '10:C', 3, 0),
(75, '4:C', '14:H', 2, 0),
(76, '10:D', '6:S', 4, 0),
(77, '5:H', '7:D', 2, 0),
(78, '2:D', '10:H', 2, 0),
(79, '14:D', '10:S', 2, 0),
(80, '2:C', '14:S', 2, 0),
(81, '11:C', '6:H', 5, 0),
(82, '5:C', '13:H', 1, 0),
(83, '13:C', '14:H', 3, 0),
(84, '4:H', '14:C', 1, 0),
(85, '11:C', '14:D', 3, 0),
(86, '10:H', '6:H', 1, 0),
(87, '12:S', '10:H', 1, 0),
(88, '10:S', '4:C', 2, 0),
(89, '8:S', '3:S', 2, 0),
(90, '12:C', '10:C', 6, 0),
(91, '9:H', '6:S', 2, 0),
(92, '13:C', '2:S', 7, 0),
(93, '12:C', '10:S', 2, 0),
(94, '4:D', '11:S', 2, 0),
(95, '14:S', '6:D', 2, 0),
(96, '11:D', '3:C', 3, 0),
(97, '3:H', '3:S', 3, 0),
(98, '12:H', '9:H', 2, 0),
(99, '3:C', '2:C', 2, 0),
(100, '7:S', '12:S', 2, 0),
(101, '2:D', '7:C', 2, 0),
(102, '11:S', '9:H', 1, 0),
(103, '3:H', '12:C', 1, 0),
(104, '4:C', '12:C', 2, 0),
(105, '3:H', '13:D', 1, 0),
(106, '10:H', '7:C', 3, 0),
(107, '5:D', '9:C', 1, 0),
(108, '7:H', '11:D', 3, 0),
(109, '4:S', '13:S', 2, 0),
(110, '13:C', '2:D', 2, 0),
(111, '14:C', '12:D', 4, 0),
(112, '7:C', '8:S', 2, 0),
(113, '10:S', '10:C', 3, 0),
(114, '9:C', '8:D', 3, 0),
(115, '10:S', '7:C', 2, 0),
(116, '6:C', '2:H', 2, 0),
(117, '13:D', '9:S', 2, 0),
(118, '10:C', '5:H', 3, 0),
(119, '14:H', '9:D', 3, 0),
(120, '12:H', '13:D', 2, 0),
(121, '12:D', '3:S', 2, 0),
(122, '11:D', '2:D', 6, 0),
(123, '4:D', '2:H', 2, 0),
(124, '5:C', '8:C', 1, 0),
(125, '3:S', '8:H', 2, 0),
(126, '3:C', '11:C', 3, 0),
(127, '14:H', '4:D', 1, 0),
(128, '13:C', '8:S', 1, 0),
(129, '3:D', '5:S', 2, 0),
(130, '12:C', '5:H', 2, 0),
(131, '13:S', '10:S', 3, 0),
(132, '5:D', '11:D', 2, 0),
(133, '12:H', '8:D', 2, 0),
(134, '8:S', '4:D', 2, 0),
(135, '10:H', '11:C', 2, 0),
(136, '5:D', '10:C', 3, 0),
(137, '10:S', '7:C', 2, 0),
(138, '13:C', '13:D', 3, 0),
(139, '5:D', '3:D', 2, 0),
(140, '13:D', '14:D', 1, 0),
(141, '14:C', '8:C', 1, 0),
(142, '5:S', '8:H', 2, 0),
(143, '9:D', '7:D', 2, 0),
(144, '2:D', '9:H', 1, 0),
(145, '3:S', '5:S', 1, 0),
(146, '2:C', '13:D', 1, 0),
(147, '2:S', '14:S', 2, 0),
(148, '5:H', '4:S', 5, 0),
(149, '10:S', '4:S', 1, 0),
(150, '14:S', '5:C', 2, 0),
(151, '12:H', '12:C', 2, 0),
(152, '10:H', '4:C', 1, 0),
(153, '10:C', '14:H', 1, 0),
(154, '12:D', '11:H', 5, 0),
(155, '3:S', '7:H', 2, 0),
(156, '12:S', '3:H', 2, 0),
(157, '2:S', '6:D', 1, 0),
(158, '9:D', '10:S', 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `stats`
--

CREATE TABLE `stats` (
  `user_id` int(11) NOT NULL,
  `win` int(11) NOT NULL,
  `loss` int(11) NOT NULL,
  `biggest_win` int(11) NOT NULL,
  `biggest_loss` int(11) NOT NULL,
  `date_registration` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stats`
--

INSERT INTO `stats` (`user_id`, `win`, `loss`, `biggest_win`, `biggest_loss`, `date_registration`) VALUES
(1, 0, 0, 0, 0, '0000-00-00'),
(2, 0, 0, 0, 0, '2020-11-22'),
(3, 0, 0, 0, 0, '2020-11-23'),
(4, 0, 0, 0, 0, '2020-11-23'),
(5, 0, 0, 0, 0, '2020-11-23'),
(6, 0, 0, 0, 0, '2020-11-23'),
(7, 0, 0, 0, 0, '2020-11-23'),
(8, 0, 0, 0, 0, '2020-11-23'),
(9, 0, 0, 0, 0, '2020-11-23'),
(10, 100, 320, 100, 110, '2020-11-23'),
(11, 0, 0, 0, 0, '2020-11-23'),
(12, 0, 0, 0, 0, '2020-11-23'),
(13, 0, 0, 0, 0, '2020-11-23'),
(14, 0, 0, 0, 0, '2020-11-23'),
(15, 0, 0, 0, 0, '2020-11-23'),
(16, 0, 0, 0, 0, '2020-11-23'),
(17, 0, 0, 0, 0, '2020-11-23'),
(18, 0, 0, 0, 0, '2020-11-23'),
(19, 0, 0, 0, 0, '2020-11-23'),
(20, 0, 0, 0, 0, '2020-11-23'),
(21, 0, 0, 0, 0, '2020-11-23'),
(22, 0, 0, 0, 0, '2020-11-23'),
(23, 0, 0, 0, 0, '2020-11-23'),
(24, 0, 0, 0, 0, '2020-11-23'),
(25, 0, 0, 0, 0, '2020-11-23'),
(26, 0, 0, 0, 0, '2020-11-23'),
(27, 0, 0, 0, 0, '2020-11-23'),
(28, 0, 0, 0, 0, '2020-11-23'),
(29, 0, 0, 0, 0, '2020-11-23'),
(30, 0, 0, 0, 0, '2020-11-23'),
(31, 0, 0, 0, 0, '2020-11-23'),
(32, 0, 0, 0, 0, '2020-11-23'),
(33, 0, 0, 0, 0, '2020-11-23'),
(34, 0, 0, 0, 0, '2020-11-23'),
(35, 0, 0, 0, 0, '2020-11-23'),
(36, 0, 0, 0, 0, '2020-11-23'),
(37, 0, 0, 0, 0, '2020-11-23'),
(38, 0, 0, 0, 0, '2020-11-23'),
(39, 0, 0, 0, 0, '2020-11-23'),
(40, 0, 0, 0, 0, '2020-11-23'),
(41, 0, 0, 0, 0, '2020-11-23'),
(42, 0, 0, 0, 0, '2020-11-23'),
(43, 0, 0, 0, 0, '2020-11-23'),
(44, 0, 0, 0, 0, '2020-11-26'),
(45, 0, 0, 0, 0, '2020-11-26'),
(46, 0, 0, 0, 0, '2020-11-26'),
(47, 0, 0, 0, 0, '2020-11-26'),
(48, 0, 0, 0, 0, '2020-11-27'),
(49, 0, 0, 0, 0, '2020-11-27'),
(50, 0, 0, 0, 0, '2020-11-27'),
(51, 0, 0, 0, 0, '2020-11-27'),
(52, 0, 0, 0, 0, '2020-11-27'),
(53, 0, 0, 0, 0, '2020-11-27'),
(54, 0, 0, 0, 0, '2020-11-28'),
(55, 0, 0, 0, 0, '2020-11-28'),
(56, 0, 0, 0, 0, '2020-11-29'),
(57, 0, 0, 0, 0, '2020-11-29'),
(58, 0, 0, 0, 0, '2020-11-29'),
(59, 0, 0, 0, 0, '2020-11-29'),
(60, 0, 0, 0, 0, '2020-11-29'),
(61, 0, 0, 0, 0, '2020-11-29'),
(62, 0, 0, 0, 0, '2020-11-30'),
(63, 0, 0, 0, 0, '2020-11-30'),
(64, 0, 0, 0, 0, '2020-12-01'),
(65, 0, 0, 0, 0, '2020-12-01'),
(66, 0, 0, 0, 0, '2020-12-01'),
(67, 0, 0, 0, 0, '2020-12-01'),
(68, 0, 0, 0, 0, '2020-12-01'),
(69, 0, 0, 0, 0, '2020-12-01'),
(70, 0, 0, 0, 0, '2020-12-03'),
(71, 0, 0, 0, 0, '2020-12-04'),
(72, 0, 0, 0, 0, '2020-12-04'),
(73, 0, 0, 0, 0, '2020-12-04'),
(74, 0, 0, 0, 0, '2020-12-04'),
(75, 0, 0, 0, 0, '2020-12-09'),
(76, 0, 0, 0, 0, '2020-12-09'),
(77, 0, 0, 0, 0, '2020-12-09'),
(78, 0, 0, 0, 0, '2020-12-11'),
(79, 0, 0, 0, 0, '2020-12-11'),
(80, 0, 0, 0, 0, '2020-12-11');

-- --------------------------------------------------------

--
-- Структура таблицы `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_players` int(11) NOT NULL,
  `active_players_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rates` int(11) NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tables`
--

INSERT INTO `tables` (`id`, `name`, `quantity_players`, `active_players_id`, `rates`, `password`) VALUES
(1, 'table1', 5, ' 43 43', 100, NULL),
(2, 'table1', 5, '', 100, NULL),
(4, '1234', 1, '44', 1, '1'),
(5, '3432', 1, '44', 1, '1'),
(6, '54354', 1, '44', 1, '1'),
(7, '43534', 7, '44', 43543, '5465'),
(8, '435345', 4, '44', 20, '5465'),
(9, '435345', 4, '44', 20, ''),
(10, '34243', 4, '44 45 65 344 434', 324, ''),
(11, '232342', 20, '44 44', 0, ''),
(15, '32132', 7, '44', 543, '432'),
(16, '3456', 4, '44', 654, '65'),
(17, 'fgfgfg', 7, '', 543, NULL),
(18, 'fgfgfg', 4, '', 543, NULL),
(19, 'fgfgfg', 4, '', 20, NULL),
(20, 'fgfgfg', 4, '', 20, '65'),
(21, 'fdsfsd', 7, '', 20, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `token`, `nickname`, `avatar`, `money`, `bank`) VALUES
(1, 'sabr', 'f4a83a74eaba00a84657bcaa38e845c7', '', '432432', '', 1000, 0),
(2, '43243', '5fc0605e8bbe46582705224bff1ef4cd', '', '43243', '', 1000, 0),
(3, '432342', '68c4852c4068d470f26d714bedd3ecfd', '', '654654', '', 1000, 0),
(4, '4324', '91a1fe14a6425c7eb6392950edbd29a1', '', '43243', '', 1000, 0),
(5, '54354', '9c473d4b62bfd9ac111b8ce43353e4f2', '', '654654', '', 1000, 0),
(6, '43233243', '4176e66c6b297e0cfd02348ebe42fb5d', '', '5435345', '', 1000, 0),
(7, '543543', '4ee540092e52f89afa40e2684cc3925f', '', '543543', '', 1000, 0),
(8, '5435437', '2e64c70b804b427c7af7f2c51da6905f', '', '543543', '', 1000, 0),
(9, '56465', '1faf023fc4778fa55e018e957b3739df', '', '76576', '', 1000, 0),
(10, '564650', '1d3d0f285c477abdd43dd6c44c1929b2', '', '76576', '', 980, 0),
(11, 'tret', 'd372be6504b2b0bb98731e25fdc069d7', '', '6546545', '', 1000, 0),
(12, '5435435', '4db1feff030dca17313515fbf970899c', '', '534543', '', 1000, 0),
(14, '54534', '5555703f48cb0c0a0219bfd63639f32e', '', '43354353', '', 1000, 0),
(15, 'tr45tre', 'f422641ed7632667cd719cb6aa80c4f8', '', 'ereter', '', 1000, 0),
(16, 'kjhbvh', 'eabc237bb06e797bea9b83dbe5867189', '', 'gdfgvc', '', 1000, 0),
(17, 'kjhbvh6y57', '9b0e77d58e0646178f80bec200b86a62', '', 'gdfgvc', '', 1000, 0),
(18, 'kjhbvh6y57786', '4e4cb590b9889069f8cbab978c46c95e', '', 'gdfgvc', '', 1000, 0),
(19, 'kjhbvh6y57786543', '4dc3df6d24574622f0caaa61395958ad', '', 'gdfgvc', '', 1000, 0),
(21, '4324tre', 'b7c7b5ea62b655c0ba0e1eb65e57db67', '', '5435red', '', 1000, 0),
(22, '4324tref', 'f2025e4738ef738ae82ffb76593fe740', '', '5435red', '', 1000, 0),
(23, 'hgfgu7', '7bd113817bd2c06e02dbbc23cfc95a5d', '', '543dfg', '', 1000, 0),
(24, 'sabr4', '75bdc05aed1ca396d434c489b8ab5632', '', '543543', '', 1000, 0),
(25, '65476', '9d34f5042ec3537ca53e4611d23dd6df', '', '5435465', '', 1000, 0),
(26, '65476hg', '47802c1cf1ee07ff5a1fa3aae7ecc0df', '', '5435465', '', 1000, 0),
(27, 'ghfythgf', '816b61527ff190572979b32a932b33bc', '', '5435465', '', 1000, 0),
(28, 'ghfythgf65', '7c89de1cf50765f76766706eec719754', '', '5435465', '', 1000, 0),
(29, 'ghfythgf65h', 'b812a6c123ac1a459ce2192707c452f2', '', 'gdgf', '', 1000, 0),
(30, 'ghfythgf65hte', '63eea29eeff5649d08372f988f3a8878', '', 'gdgftre', '', 1000, 0),
(31, 'sabr44', 'c91dc62ebbc76328815ae8f57544a7ed', '', '5434', '', 1000, 0),
(32, 'hdgdfgdf', 'd119806038534fdffbc45d2d81a2c138', '', 'sabr4', '', 1000, 0),
(33, 'gdvfd', '6971461adf5b4bb2a5bcff308685fc1a', '', 'dretdt', '', 1000, 0),
(34, 'gdvfdf', '215fe20a69a28f7d45f7356fdfec35b4', '', 'dretdt', '', 1000, 0),
(35, '3432fdsfd', '2aeef3166a52a78ab1a47498d35137d4', '', 'gdf54', '', 1000, 0),
(36, 'hbvcyhgf', '21ac3817cc28482bfe66d187fc60fd13', '', '42342353', '', 1000, 0),
(37, 'nbchvc', 'cf0a54b700a2a22cea905c4ca4cd4984', '', 'bfhdfhg', '', 1000, 0),
(38, 'mjgkjghj', 'a1c5b523107eca753d72e41437089a9c', '', 'hfgyut', '', 1000, 0),
(39, 'gdfhnbbv', 'd207b7480b59bfb5af44488e136f5c5b', '', 'tregbrty', '', 1000, 0),
(40, 'gfdbvfdgcgt', '7f22b858d9f728e72bd8fa9fa8bf2bb3', '', 'tgrbvtr', '', 1000, 0),
(41, 'cvhgfh', '677ee9c1129c44976fa4f3bca8a86b7a', '', 'ghfyhdy', '', 1000, 0),
(42, 'апвпавпи', '80e43eb2514883dc639078df28fadc77', '', 'екуеук', '', 1000, 0),
(43, 'sabr1', '1ba479a58720c3ab34e8dc98830a3dab', 'b9db353d38a7e830d07e9a481dbf32d4', 'Sabr', '', 950, 50),
(44, 'okokeo', '223a74d4c60fde26adfe387521502b39', '5f4dcc3b5aa765d61d8327deb882cf99', 'Sabrina', '', 1000, 0),
(45, 'okokeoefds', 'e0128d95ba438f9e221b7204ea858679', 'cb81b5a0759a829b5e05130330305a00', 'Sabrina', '', 1000, 0),
(46, 'hgfhgfygh', '16cb6dc86ac5dfa06c342ccf6ff399cc', 'e2abfa15aa2ec2a75e71314f23755751', '5435', '', 1000, 0),
(47, 'hgjfgujgh', '4659b2b6426e6cabd262c29bca9b90b9', '3f3ca68912736358c9f23e068080123c', 'y5456', '', 1000, 0),
(48, 'gfhfdhg', '89d9b4ec49bf9c96a3abb15dd29b5552', '54c158a859c72d50779469b356680939', 'tyrgt', '', 1000, 0),
(49, 'fdsfdf', 'fa26d7c0efd0cdc7a1e53a39309b89e5', '', 'rewfew', '', 1100, 9900),
(50, 'sabr12', 'a97f25794060dd5a2390122be3ec1eb8', 'f499d98f73ac57128ea045e443df28fe', 'sabr', '', 1000, 0),
(52, 's-a-b-r', 'c9b35bad09a834ccff07a951d1e56bb3', 'aa19504346a17cd6064ae2b6a3952fe6', '12345', '', 1000, 0),
(53, 's-a-b-r-12', 'bc6de771e6d415cc0d8036eb877f1d73', '513d0a62b50b5e293c5bb40f4e008aca', '12345', '', 1200, 99800),
(54, 'Sabr23', '328102df34731ae45879d0b11e1917e8', '0', 'sabr', '', 1000, 100000),
(55, 'Sabr2020', '90a68196450eba2f60b349e1a7fd0b11', '', 'sabr', '', 1000, 0),
(56, 'vbdfgfd', '17f73226a2d77615f4b70dcbee3787b6', '', 'gfdvfd', '', 1000, 0),
(57, 'vfdgfgfd', '2b6bce76bd90a9dea07b0c932204e6df', '', 'gdf', '', 1000, 0),
(58, 'vfdgvfdvfd', '6ba3595563dfa09e327399333c5816c2', '', 'frvreg', '', 1000, 0),
(59, 'nflgflghjf', 'ee28f5603b287b695f7985d306f3a2c9', 'ee28f5603b287b695f7985d306f3a2c9949', 'gfdgfd', '', 1000, 0),
(60, 'fsdfswdf', '1bd86ff350fdd849da5b18372f16fff5', '', 'rewrew', '', 1000, 0),
(61, 'ilya', 'f63ff496503c5252d4da432fc624ff94', 'f63ff496503c5252d4da432fc624ff9439', 'H2O', '', 1000, 0),
(62, 'fdsfdsc', 'b3724aa35d7e9f8bd8bba80d8383c931', 'b3724aa35d7e9f8bd8bba80d8383c931550', 'dsfsd', '', 1000, 0),
(63, 'gfggfffg', 'f9cefe40441579f4a7831489d1920579', '', 'rrtrtgfg', '', 1000, 0),
(64, 'bgfbgvb', '021e0baef1005581b849d863811cf0ff', '', 'hfghf', '', 1000, 0),
(65, 'sjkfdsjl', 'ea96798cb7ddc47846702e4ba056b570', '', 'fsdfds', '', 1000, 0),
(66, 'vfdvdfgdc', 'b681d01e5c31dd4a662757929dfc63cf', '', 'gfdgdfg', '', 1000, 0),
(67, 'ghfghgf', 'b8346a74010d491ae21fb3a51e5ebd87', '', 'gdfgdfg', '', 1000, 0),
(68, 'gfdgfd', 'bf41d8c829650caf90d6315308ee2130', '', 'gffdg', '', 1000, 0),
(69, 'ghfgfh', '67495c1b120ea0807bcd33e40dfbe4ce', '', 'hgfhg', '', 1000, 0),
(70, 'l;kfjdslkfjkod', '4431da7efaacb7a61070c117dda8aa7e', '', 'hgfhfg', '', 1000, 0),
(71, 'ghfgfhxs', 'cb8462aeb4319f2aefed4d543e14109f', '', 'gfdgfd', '', 1000, 0),
(72, 'vfcvgbgf', '5a618d16f39d763effba5532b00c7239', '', 'dfdgfdgf', '', 1000, 0),
(73, 'mn,dkhdkfh', '0ae4de7fa2bfac9e8b876f2050d221e2', '', 'gfdgfd', '', 1000, 0),
(74, 'fdfd', '96e99eddad533d1c1a653f753235a976', '', 'dfsdsf', '', 1000, 0),
(75, 'hgfhghf', 'f946bd22aa81bf50257e24204e7e0fca', '', 'hgfggfh', '', 1000, 0),
(76, 'lmkbmgklmlkg', 'e50015f9db34a105bbd5238ffc5f5b70', '', 'fdgfdg', '', 1000, 0),
(77, 'fgdfg', 'ea95a18038178db035ba576c95d21a9e', '', 'gfdgdf', '', 953, 47),
(78, 'sabr1f4', '5a0b6a4d0cd65f3282cdca12c57ab6e7', '', 'gfhgf', '', 1000, 0),
(79, 'firstAva', 'fe2cc278ccba1cb3f6435d65dcd578d3', '', 'test1', '', 1000, 0),
(80, 'firstAvaf', '4568c1256c7622567abe8ed1885512e2', '', 'test1', '3.jpg', 1000, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT для таблицы `stats`
--
ALTER TABLE `stats`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;