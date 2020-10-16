-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 16 Paź 2020, 16:38
-- Wersja serwera: 10.3.23-MariaDB-0+deb10u1
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `homestead`
--
CREATE DATABASE IF NOT EXISTS `homestead` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `homestead`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(22) NOT NULL AUTO_INCREMENT,
  `rf_user_id` bigint(22) NOT NULL,
  `path` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tabela Truncate przed wstawieniem `images`
--

TRUNCATE TABLE `images`;
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tabela Truncate przed wstawieniem `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2020_09_02_193926_users', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NULL DEFAULT current_timestamp(),
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `baned` tinyint(1) NOT NULL DEFAULT 0,
  `closed` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tabela Truncate przed wstawieniem `user`
--

TRUNCATE TABLE `user`;
--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `time`, `role`, `ip`, `active`, `baned`, `closed`) VALUES
(1, 'ddd@woo.xx', 'boo', '2020-09-02 20:03:39', 'user', '123', 0, 0, 0),
(2, 'aaa@woo.xx', 'ec82317a18cb032d169f06224934c625', '2020-09-02 20:03:39', 'user', '1.2.3.3', 0, 0, 0),
(88, 'boo@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 18:22:49', 'user', '127.0.0.1', 1, 0, 0),
(89, '5f567c61ab5b9@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 18:30:57', 'user', '127.0.0.1', 1, 0, 0),
(90, '5f567cb031323@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 18:32:16', 'user', '127.0.0.1', 0, 0, 0),
(91, '5f567d406030a@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 18:34:40', 'user', '127.0.0.1', 0, 0, 0),
(92, '5f567d55b321a@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 18:35:01', 'user', '127.0.0.1', 0, 0, 0),
(93, '5f567ee416dcb@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 18:41:40', 'user', '127.0.0.1', 0, 0, 0),
(94, '5f567ee56eadb@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 18:41:41', 'user', '127.0.0.1', 0, 0, 0),
(95, '5f567eef4aa80@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 18:41:51', 'user', '127.0.0.1', 0, 0, 0),
(101, '5f568100e0ff1@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 18:50:40', 'user', '127.0.0.1', 0, 0, 0),
(102, '5f5681105835f@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 18:50:56', 'user', '127.0.0.1', 0, 0, 0),
(103, '5f56815131499@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 18:52:01', 'user', '127.0.0.1', 0, 0, 0),
(104, '5f5681581ff26@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 18:52:08', 'user', '127.0.0.1', 0, 0, 0),
(105, '5f5681a0d1a63@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 18:53:20', 'user', '127.0.0.1', 0, 0, 0),
(106, '5f5687645cc4b@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-09-07 19:17:56', 'user', '127.0.0.1', 0, 0, 0),
(122, 'boo1@woo.xx', 'dce185d833959b603c2546fe12931eec', '2020-10-13 14:30:38', 'user', '127.0.0.1', 0, 0, 0),
(126, 'boo2@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-10-13 14:33:55', 'user', '127.0.0.1', 0, 0, 0),
(128, 'boo3@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-10-13 14:39:00', 'user', '127.0.0.1', 0, 0, 0),
(130, 'boo4@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-10-13 14:40:27', 'user', '127.0.0.1', 0, 0, 0),
(132, 'boo5@woo.xx', '5d7cfebefd70235b2d51b886f768e311', '2020-10-13 14:40:38', 'user', '127.0.0.1', 0, 0, 0),
(133, 'boo7@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-10-13 15:27:02', 'user', '127.0.0.1', 0, 0, 0),
(135, 'boo8@woo.xx', '8f15f3500e00f9e8fd50a4c2d9b12589', '2020-10-13 15:27:54', 'user', '127.0.0.1', 0, 0, 0),
(137, 'boo9@woo.xx', '65704afe8cba4f4f58ab1887c04d9284', '2020-10-13 15:28:59', 'user', '127.0.0.1', 1, 0, 0),
(139, 'moo@woo.xx', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-10-14 13:07:12', 'user', '127.0.0.1', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movies` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tabela Truncate przed wstawieniem `users`
--

TRUNCATE TABLE `users`;
--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `ip`, `movies`) VALUES
(1, 'Kazia', 'ddd@woo.cc', 'boo', 'sadasdasd', '2020-09-02 20:03:39', '2020-09-02 20:03:39', 'user', '123', 'asdasdsaasd'),
(2, 'Kazik', 'aaa@woo.cc', 'Been', 'token1241412414', '2020-09-02 20:03:39', '2020-09-02 20:03:39', 'user', '1.2.3.3', 'opis krótki'),
(3, 'Max', 'email@page.xx', '1a1dc91c907325c69271ddf0c944bc72', NULL, NULL, NULL, 'user', '127.0.0.1', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_activation`
--

DROP TABLE IF EXISTS `user_activation`;
CREATE TABLE IF NOT EXISTS `user_activation` (
  `id` bigint(22) NOT NULL AUTO_INCREMENT,
  `rf_user_id` bigint(22) NOT NULL,
  `code` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `rf_user_id` (`rf_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

--
-- Tabela Truncate przed wstawieniem `user_activation`
--

TRUNCATE TABLE `user_activation`;
--
-- Zrzut danych tabeli `user_activation`
--

INSERT INTO `user_activation` (`id`, `rf_user_id`, `code`, `time`, `ip`) VALUES
(23, 88, '5f567a7975abc', '2020-09-07 18:22:49', '127.0.0.1'),
(24, 89, '5f567c61bd41d', '2020-09-07 18:30:57', '127.0.0.1'),
(25, 90, '5f567cb03ba33', '2020-09-07 18:32:16', '127.0.0.1'),
(26, 91, '5f567d406be7c', '2020-09-07 18:34:40', '127.0.0.1'),
(27, 92, '5f567d55bdd26', '2020-09-07 18:35:01', '127.0.0.1'),
(28, 93, '5f567ee429d9f', '2020-09-07 18:41:40', '127.0.0.1'),
(29, 94, '5f567ee57a395', '2020-09-07 18:41:41', '127.0.0.1'),
(30, 95, '5f567eef55a26', '2020-09-07 18:41:51', '127.0.0.1'),
(31, 96, '5f567fa04adb2', '2020-09-07 18:44:48', '127.0.0.1'),
(32, 97, '5f5680184fdfa', '2020-09-07 18:46:48', '127.0.0.1'),
(33, 98, '5f568026887ea', '2020-09-07 18:47:02', '127.0.0.1'),
(34, 99, '5f56806d99604', '2020-09-07 18:48:13', '127.0.0.1'),
(35, 100, '5f5680be09265', '2020-09-07 18:49:34', '127.0.0.1'),
(36, 101, '5f568100e8f0c', '2020-09-07 18:50:40', '127.0.0.1'),
(37, 102, '5f56811060324', '2020-09-07 18:50:56', '127.0.0.1'),
(38, 103, '5f5681513c2ba', '2020-09-07 18:52:01', '127.0.0.1'),
(39, 104, '5f56815827e58', '2020-09-07 18:52:08', '127.0.0.1'),
(40, 105, '5f5681a0d9cf9', '2020-09-07 18:53:20', '127.0.0.1'),
(41, 106, '5f56876465ead', '2020-09-07 19:17:56', '127.0.0.1'),
(42, 137, '5f85c7bb8eff2', '2020-10-13 15:28:59', '127.0.0.1'),
(43, 139, '5f86f80062c02', '2020-10-14 13:07:12', '127.0.0.1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_auth`
--

DROP TABLE IF EXISTS `user_auth`;
CREATE TABLE IF NOT EXISTS `user_auth` (
  `id` bigint(22) NOT NULL AUTO_INCREMENT,
  `rf_user_id` bigint(22) NOT NULL,
  `token` varchar(250) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `rf_user_id` (`rf_user_id`),
  UNIQUE KEY `token` (`token`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- Tabela Truncate przed wstawieniem `user_auth`
--

TRUNCATE TABLE `user_auth`;
--
-- Zrzut danych tabeli `user_auth`
--

INSERT INTO `user_auth` (`id`, `rf_user_id`, `token`, `created`, `expires`) VALUES
(1, 1, '352a96ef-f05c-11ea-9c9a-d6f20c4dbea5', '2020-09-06 16:00:10', '2020-09-06 17:15:40'),
(20, 88, 'cd0c6b52-f9a1-11ea-a3e7-f2c7e188c9d9', '2020-09-07 18:49:10', '2020-09-18 12:26:31');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `id` bigint(22) NOT NULL AUTO_INCREMENT,
  `rf_user_id` bigint(22) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `country` varchar(100) NOT NULL DEFAULT '',
  `avatar` varchar(250) NOT NULL DEFAULT '',
  `mail` varchar(250) NOT NULL DEFAULT '',
  `mobile` varchar(10) NOT NULL DEFAULT '',
  `www` varchar(250) NOT NULL DEFAULT '',
  `gender` enum('NONE','MALE','FEMALE') NOT NULL DEFAULT 'NONE',
  `age` int(11) NOT NULL DEFAULT 0,
  `about` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `rf_user_id` (`rf_user_id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Tabela Truncate przed wstawieniem `user_info`
--

TRUNCATE TABLE `user_info`;
--
-- Zrzut danych tabeli `user_info`
--

INSERT INTO `user_info` (`id`, `rf_user_id`, `alias`, `name`, `country`, `avatar`, `mail`, `mobile`, `www`, `gender`, `age`, `about`) VALUES
(1, 88, 'username', 'User Name', 'Polska', '/media/test.xx/2020-08-26/hash.jpg', 'user@domain.xx', '', '', 'NONE', 0, 'Web Developer'),
(2, 122, 'user.1566099831', '', '', '', '', '', '', 'NONE', 0, ''),
(3, 126, 'user.1068660480', '', '', '', '', '', '', 'NONE', 0, ''),
(4, 128, 'user.1924825727', '', '', '', '', '', '', 'NONE', 0, ''),
(5, 130, 'user.1169231727', '', '', '', '', '', '', 'NONE', 0, ''),
(6, 132, 'user.632036656', '', '', '', '', '', '', 'NONE', 0, ''),
(7, 133, 'user.1407115194', '', '', '', '', '', '', 'NONE', 0, ''),
(8, 135, 'user.205973085', '', '', '', '', '', '', 'NONE', 0, ''),
(9, 137, 'user.910633704', '', '', '', '', '', '', 'NONE', 0, ''),
(10, 139, 'user.332933192', '', '', '', '', '', '', 'NONE', 0, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE IF NOT EXISTS `user_login` (
  `id` bigint(22) NOT NULL AUTO_INCREMENT,
  `rf_user_id` bigint(22) NOT NULL,
  `ip` varchar(50) NOT NULL DEFAULT '',
  `info` text NOT NULL DEFAULT '',
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tabela Truncate przed wstawieniem `user_login`
--

TRUNCATE TABLE `user_login`;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
