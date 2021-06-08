-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Cze 2021, 08:25
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sport`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dyscypliny`
--

CREATE TABLE `dyscypliny` (
  `id` int(11) NOT NULL,
  `nazwa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `dyscypliny`
--

INSERT INTO `dyscypliny` (`id`, `nazwa`) VALUES
(1, '100m'),
(2, '200m'),
(3, '400m'),
(4, '110m pł'),
(5, '400m pł'),
(6, 'Wzwyż'),
(7, 'Tyczka'),
(8, 'W dal'),
(9, 'Trójskok'),
(10, 'Kula'),
(11, 'Dysk'),
(12, 'Młot'),
(13, 'Oszczep');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `normy`
--

CREATE TABLE `normy` (
  `id` int(11) NOT NULL,
  `id_dyscypliny` int(11) NOT NULL,
  `mm` float NOT NULL,
  `m` float NOT NULL,
  `i` float NOT NULL,
  `ii` float NOT NULL,
  `iii` float NOT NULL,
  `iv` float NOT NULL,
  `v` float NOT NULL,
  `plec` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'm/k'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `normy`
--

INSERT INTO `normy` (`id`, `id_dyscypliny`, `mm`, `m`, `i`, `ii`, `iii`, `iv`, `v`, `plec`) VALUES
(1, 1, 10.25, 10.65, 10.9, 11.3, 11.75, 12.2, 12.75, 'm'),
(2, 2, 20.75, 21.45, 21.9, 22.8, 23.6, 24.4, 25.6, 'm'),
(3, 1, 11.4, 11.85, 12.15, 12.75, 13.2, 13.8, 14.5, 'f'),
(4, 2, 23.2, 24, 24.9, 26.25, 27.3, 28.5, 30.25, 'f'),
(5, 3, 45.95, 47.2, 48.5, 50.5, 52.75, 54.75, 57, 'm'),
(6, 4, 13.7, 14.1, 15, 15.75, 16.7, 17.5, 0, 'm'),
(7, 5, 49.5, 51.5, 54.5, 56.6, 59, 62, 0, 'm'),
(8, 6, 2.27, 2.22, 2.08, 1.95, 1.82, 1.75, 1.65, 'm'),
(9, 7, 5.55, 5.2, 4.5, 4, 3.6, 3.2, 2.8, 'm'),
(10, 8, 8, 7.8, 7.25, 6.8, 6.3, 5.9, 5.6, 'm'),
(11, 9, 16.8, 16.2, 14.8, 14.4, 13.2, 12.6, 12, 'm'),
(12, 10, 19.5, 17.7, 14.5, 13.25, 12, 10, 0, 'm'),
(13, 10, 19.5, 17.7, 14.5, 13.25, 12, 10, 0, 'm'),
(14, 11, 62, 57, 46, 40, 35, 30, 0, 'm'),
(15, 12, 74, 69, 54, 45, 38, 30, 0, 'm'),
(16, 13, 77.8, 74, 62, 55, 47, 39, 0, 'm'),
(17, 3, 52.35, 54.5, 56.5, 59, 62, 64.5, 67, 'f'),
(18, 4, 13.2, 13.6, 14.5, 15.75, 16.9, 17.75, 0, 'f'),
(19, 5, 56.5, 59.5, 62.5, 66, 69, 73.5, 0, 'f'),
(20, 6, 1.91, 1.82, 1.7, 1.62, 1.55, 1.45, 1.4, 'f'),
(21, 7, 4.4, 4.1, 3.3, 3, 2.7, 2.4, 2, 'f'),
(22, 8, 6.6, 6.2, 5.8, 5.4, 5.1, 4.8, 4.5, 'f'),
(23, 9, 13.9, 13.3, 12, 11.5, 10.75, 10.2, 9.7, 'f'),
(24, 10, 17.2, 16, 12.5, 11.7, 10, 9, 8, 'f'),
(25, 11, 59, 55, 43, 37, 32, 27, 23, 'f'),
(26, 12, 69, 64, 48, 43, 37, 32, 25, 'f'),
(27, 13, 58, 53, 44, 39.5, 34.5, 30, 26.5, 'f');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyniki`
--

CREATE TABLE `wyniki` (
  `id` int(11) NOT NULL,
  `dyscyplina_id` int(11) NOT NULL,
  `wynik` float NOT NULL,
  `punkty` int(11) NOT NULL,
  `plec` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `wyniki`
--

INSERT INTO `wyniki` (`id`, `dyscyplina_id`, `wynik`, `punkty`, `plec`) VALUES
(1, 1, 12.04, 100, 'm'),
(2, 3, 42.8, 100, 'm'),
(3, 8, 5, 30, 'm'),
(4, 7, 5.92, 30, 'm'),
(5, 10, 34, 30, 'm');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `dyscypliny`
--
ALTER TABLE `dyscypliny`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `normy`
--
ALTER TABLE `normy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wyniki`
--
ALTER TABLE `wyniki`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `dyscypliny`
--
ALTER TABLE `dyscypliny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `normy`
--
ALTER TABLE `normy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT dla tabeli `wyniki`
--
ALTER TABLE `wyniki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
