-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 21 nov 2023 kl 14:38
-- Serverversion: 10.4.28-MariaDB
-- PHP-version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `webschool`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `name`
--

CREATE TABLE `name` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `name`
--

INSERT INTO `name` (`ID`, `name`) VALUES
(1, 'Student'),
(2, 'Teacher'),
(3, 'Erwin'),
(4, 'Hörnell'),
(5, 'Margo'),
(6, 'Smargi'),
(7, 'Linus'),
(8, 'beg'),
(9, 'po'),
(10, 'abdi');

-- --------------------------------------------------------

--
-- Tabellstruktur `role`
--

CREATE TABLE `role` (
  `ID` int(11) NOT NULL,
  `name_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `role`
--

INSERT INTO `role` (`ID`, `name_ID`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name_ID` int(11) NOT NULL,
  `lastname_ID` int(11) NOT NULL,
  `email` text NOT NULL,
  `ssn` text NOT NULL,
  `role_ID` int(11) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`ID`, `name_ID`, `lastname_ID`, `email`, `ssn`, `role_ID`, `password`) VALUES
(1, 3, 4, 'Big@Big.Big', '000000-9999', 3, '5c322d4b606d774bdfbd7f31fdec6015634410c6'),
(2, 5, 6, 'smargi@gmail.com', '999999-0000', 3, '5c322d4b606d774bdfbd7f31fdec6015634410c6'),
(17, 7, 9, 'linus@pob.com', '123456-1234', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(21, 10, 10, 'abdi@abdi', '010101-0101', 3, 'ac5da1eca9af0de80a7f135970e6357b75d940bd');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `name`
--
ALTER TABLE `name`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `name`
--
ALTER TABLE `name`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT för tabell `role`
--
ALTER TABLE `role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
