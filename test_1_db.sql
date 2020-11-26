-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 26 2020 г., 23:37
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
-- База данных: `test_1_db`
--

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
(10, 0, 0, 0, 0, '2020-11-23'),
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
(47, 0, 0, 0, 0, '2020-11-26');

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
(1, 'table1', 5, '', 100, NULL),
(2, 'table1', 5, '', 100, NULL),
(4, '1234', 1, '44', 1, '1'),
(5, '3432', 1, '44', 1, '1'),
(6, '54354', 1, '44', 1, '1'),
(7, '43534', 7, '44', 43543, '5465'),
(8, '435345', 4, '44', 20, '5465'),
(9, '435345', 4, '44', 20, ''),
(10, '34243', 4, '44', 324, ''),
(11, '232342', 20, '44', 0, ''),
(12, '432432', 4, '44', 20, ''),
(13, '432432', 4, '44', 20, '32'),
(14, '32132', 7, '44', 543, NULL),
(15, '32132', 7, '44', 543, '432'),
(16, '3456', 4, '44', 654, '65');

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
  `money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `token`, `nickname`, `money`) VALUES
(1, 'sabr', 'f4a83a74eaba00a84657bcaa38e845c7', '', '432432', 1000),
(2, '43243', '5fc0605e8bbe46582705224bff1ef4cd', '', '43243', 1000),
(3, '432342', '68c4852c4068d470f26d714bedd3ecfd', '', '654654', 1000),
(4, '4324', '91a1fe14a6425c7eb6392950edbd29a1', '', '43243', 1000),
(5, '54354', '9c473d4b62bfd9ac111b8ce43353e4f2', '', '654654', 1000),
(6, '43233243', '4176e66c6b297e0cfd02348ebe42fb5d', '', '5435345', 1000),
(7, '543543', '4ee540092e52f89afa40e2684cc3925f', '', '543543', 1000),
(8, '5435437', '2e64c70b804b427c7af7f2c51da6905f', '', '543543', 1000),
(9, '56465', '1faf023fc4778fa55e018e957b3739df', '', '76576', 1000),
(10, '564650', '1d3d0f285c477abdd43dd6c44c1929b2', '', '76576', 1000),
(11, 'tret', 'd372be6504b2b0bb98731e25fdc069d7', '', '6546545', 1000),
(12, '5435435', '4db1feff030dca17313515fbf970899c', '', '534543', 1000),
(14, '54534', '5555703f48cb0c0a0219bfd63639f32e', '', '43354353', 1000),
(15, 'tr45tre', 'f422641ed7632667cd719cb6aa80c4f8', '', 'ereter', 1000),
(16, 'kjhbvh', 'eabc237bb06e797bea9b83dbe5867189', '', 'gdfgvc', 1000),
(17, 'kjhbvh6y57', '9b0e77d58e0646178f80bec200b86a62', '', 'gdfgvc', 1000),
(18, 'kjhbvh6y57786', '4e4cb590b9889069f8cbab978c46c95e', '', 'gdfgvc', 1000),
(19, 'kjhbvh6y57786543', '4dc3df6d24574622f0caaa61395958ad', '', 'gdfgvc', 1000),
(21, '4324tre', 'b7c7b5ea62b655c0ba0e1eb65e57db67', '', '5435red', 1000),
(22, '4324tref', 'f2025e4738ef738ae82ffb76593fe740', '', '5435red', 1000),
(23, 'hgfgu7', '7bd113817bd2c06e02dbbc23cfc95a5d', '', '543dfg', 1000),
(24, 'sabr4', '75bdc05aed1ca396d434c489b8ab5632', '', '543543', 1000),
(25, '65476', '9d34f5042ec3537ca53e4611d23dd6df', '', '5435465', 1000),
(26, '65476hg', '47802c1cf1ee07ff5a1fa3aae7ecc0df', '', '5435465', 1000),
(27, 'ghfythgf', '816b61527ff190572979b32a932b33bc', '', '5435465', 1000),
(28, 'ghfythgf65', '7c89de1cf50765f76766706eec719754', '', '5435465', 1000),
(29, 'ghfythgf65h', 'b812a6c123ac1a459ce2192707c452f2', '', 'gdgf', 1000),
(30, 'ghfythgf65hte', '63eea29eeff5649d08372f988f3a8878', '', 'gdgftre', 1000),
(31, 'sabr44', 'c91dc62ebbc76328815ae8f57544a7ed', '', '5434', 1000),
(32, 'hdgdfgdf', 'd119806038534fdffbc45d2d81a2c138', '', 'sabr4', 1000),
(33, 'gdvfd', '6971461adf5b4bb2a5bcff308685fc1a', '', 'dretdt', 1000),
(34, 'gdvfdf', '215fe20a69a28f7d45f7356fdfec35b4', '', 'dretdt', 1000),
(35, '3432fdsfd', '2aeef3166a52a78ab1a47498d35137d4', '', 'gdf54', 1000),
(36, 'hbvcyhgf', '21ac3817cc28482bfe66d187fc60fd13', '', '42342353', 1000),
(37, 'nbchvc', 'cf0a54b700a2a22cea905c4ca4cd4984', '', 'bfhdfhg', 1000),
(38, 'mjgkjghj', 'a1c5b523107eca753d72e41437089a9c', '', 'hfgyut', 1000),
(39, 'gdfhnbbv', 'd207b7480b59bfb5af44488e136f5c5b', '', 'tregbrty', 1000),
(40, 'gfdbvfdgcgt', '7f22b858d9f728e72bd8fa9fa8bf2bb3', '', 'tgrbvtr', 1000),
(41, 'cvhgfh', '677ee9c1129c44976fa4f3bca8a86b7a', '', 'ghfyhdy', 1000),
(42, 'апвпавпи', '80e43eb2514883dc639078df28fadc77', '', 'екуеук', 1000),
(43, 'sabr1', '1ba479a58720c3ab34e8dc98830a3dab', '', 'Sabr', 1000),
(44, 'okokeo', '223a74d4c60fde26adfe387521502b39', '5f4dcc3b5aa765d61d8327deb882cf99', 'Sabrina', 1000),
(45, 'okokeoefds', 'e0128d95ba438f9e221b7204ea858679', 'cb81b5a0759a829b5e05130330305a00', 'Sabrina', 1000),
(46, 'hgfhgfygh', '16cb6dc86ac5dfa06c342ccf6ff399cc', 'e2abfa15aa2ec2a75e71314f23755751', '5435', 1000),
(47, 'hgjfgujgh', '4659b2b6426e6cabd262c29bca9b90b9', '3f3ca68912736358c9f23e068080123c', 'y5456', 1000);

--
-- Индексы сохранённых таблиц
--

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
-- AUTO_INCREMENT для таблицы `stats`
--
ALTER TABLE `stats`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
