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
