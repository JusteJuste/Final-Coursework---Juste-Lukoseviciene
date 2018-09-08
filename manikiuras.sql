-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2018 at 09:04 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manikiuras`
--

-- --------------------------------------------------------

--
-- Table structure for table `manikiurasvilniuje`
--

CREATE TABLE `manikiurasvilniuje` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Address` text NOT NULL,
  `procedura1` tinyint(1) NOT NULL,
  `procedura2` tinyint(1) NOT NULL,
  `procedura3` tinyint(1) NOT NULL,
  `telefonas` varchar(12) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manikiurasvilniuje`
--

INSERT INTO `manikiurasvilniuje` (`id`, `Name`, `Address`, `procedura1`, `procedura2`, `procedura3`, `telefonas`, `content`) VALUES
(1, 'Nails by Lilly', 'B. Sruogos g. 36, Vilnius ', 1, 0, 0, '86454545', ''),
(2, 'Lialia nails', 'Rygos g. 2, Vilnius', 1, 0, 0, '455634563563', ''),
(9, 'Naguciai pas Loreta', 'Ateities g. 12, Vilnius', 1, 0, 0, '65465654', ''),
(10, 'Spalvoti buteliukai', 'Kalvariju g. 2, Vilnius', 1, 0, 0, '654654654', ''),
(11, 'Jolitos manikiuras', 'Sauletekio g. 14, Vilnius', 1, 0, 0, '565', 'Laukiame Jusu'),
(12, 'Fabijoniskiu mada', 'Visoriu g. 16, Vilnius', 1, 1, 1, '4546565', 'Skambinti uzsiregistruoti'),
(13, 'Braskes uogos', 'Kalvariju g. 125, Vilnius', 1, 1, 1, '6666666', 'Visa informacija FB svetaineje'),
(14, 'Monikos nails', 'Karoliniskiu g. 16, Vilnius', 1, 1, 1, '865465654', 'Priimu ir savaitgaliais'),
(26, 'Manikiuras zveryne', 'Latviu g. 3, Vilnius', 1, 1, 1, '86862', 'Dirbu tik savaitgaliais'),
(27, 'Sonatos naguciai', 'Medziotoju g. 12, VIlnius', 1, 1, 1, '865622255', 'Skambinkit'),
(40, 'Beuty collors', 'Apkasu g. 4, Vilnius', 1, 1, 0, '867755699', ''),
(41, 'Agnes naguciai', 'Kalvariju g. 99, Vilnius', 1, 1, 1, '867755633', 'Butina registracija'),
(42, 'Nail by Aurie', 'Justiniskiu g. 12, Vilnius', 1, 0, 1, '865532323', ''),
(43, 'Nails collor', 'Kareiviu g. 6, Vilnius', 1, 0, 0, '865422222', 'Skambinti'),
(44, 'Monikos naguciai', 'Gariunu g. 2, Vilnius', 1, 0, 0, '869533333', ''),
(45, 'Bubble nails', 'Karoliniskiu g. 56, Vilnius', 1, 1, 1, '864512312', ''),
(46, 'Colors by me', 'Ukmerges g. 224, Vilnius', 1, 0, 0, '867455555', ''),
(47, 'Nails by me', 'Latviu g. 9, Vilnius', 1, 0, 0, '86222222', ''),
(48, 'Sofijos manikiuras', 'Asanaviciutes g. 2, Vilnius', 1, 1, 1, '865499999', 'Kreiptis i FB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manikiurasvilniuje`
--
ALTER TABLE `manikiurasvilniuje`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telefonas` (`telefonas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manikiurasvilniuje`
--
ALTER TABLE `manikiurasvilniuje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
