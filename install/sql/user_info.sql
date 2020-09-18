-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 18 Wrz 2020, 14:20
-- Wersja serwera: 10.3.23-MariaDB-0+deb10u1
-- Wersja PHP: 7.4.9

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
