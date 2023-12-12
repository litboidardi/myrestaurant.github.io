-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Út 12.Dec 2023, 12:16
-- Verzia serveru: 10.4.24-MariaDB
-- Verzia PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `restaurant`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$T2WAJ1Kyg8gIA8mOj3q6GOff.DYCNSsk/5VW.RzpdlUBvN9gTPvt6'),
(6, 'admin2', '$2y$10$U2g4kvOb2OmSEZ8Bs.IA7.rnXZvKL664EWSKmSIMLXMci6p6EPrsa'),
(7, 'admin3', '$2y$10$NaSbcRNi7oUXKsnEx6aebumnk1uP7uzIzgiWiw8J93PonnQ0CseI6'),
(8, 'admin4', '$2y$10$zZPZDBnDEWWF.iWInLre/uQbm9xIe9T1/5FR6kejuq38NjiMpLTh6');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `message`, `time`) VALUES
(1, 'John Doe', 'doe.john@gmail.com', 'Very nice!', '2023-12-12 07:23:09'),
(2, 'John Wick', 'jwick@gmail.com', 'Very friendly restaurant!', '2023-12-12 07:23:50'),
(3, 'Aaron Paul', 'aa.paul@gmail.com', 'Large variance of good wine!', '2023-12-12 10:25:42'),
(4, 'Chuck Norris', 'norris.chuck@gmail.com', 'Comfortable place, great food and great staff. Looking forward to visiting this place again!', '2023-12-12 12:00:50');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `email`, `message`) VALUES
(1, 'John Wick', '0961235874', 'jwick@gmail.com', 'Is this a pet friendly restaurant?'),
(2, 'Chuck Norris', '0953285557', 'norris.chuck@gmail.com', 'Hello, are you open for a collaboration?');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `people` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `email`, `phone`, `people`, `date`, `time`, `message`) VALUES
(9, 'John Wick', 'jwick@gmail.com', '0961235874', 2, '2024-01-06', '20:00:00', 'I would like to sit by the window please.'),
(10, 'John Doe', 'doe.john@gmail.com', '0922489657', 4, '2023-12-15', '18:00:00', 'It\'s my sons birthday, could you surprise him?'),
(11, 'Ryan Gosling', 'youknowme@gmail.com', '0911224879', 6, '2023-12-14', '18:00:00', ''),
(12, 'Britney Spears', 'britneybitch@gmail.com', '0955016587', 2, '2023-12-18', '20:00:00', 'Don\'t put knives on my table!'),
(13, 'Pete Davidson', 'pdavidson93@gmail.com', '0903650102', 3, '2024-01-23', '21:00:00', ''),
(14, 'Chuck Norris', 'norris.chuck@gmail.com', '0953285557', 1, '2024-01-23', '17:00:00', '');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pre tabuľku `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
