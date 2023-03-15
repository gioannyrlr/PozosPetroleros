-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 01:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplicacion_pozos`
--

-- --------------------------------------------------------

--
-- Table structure for table `mediciones`
--

CREATE TABLE `mediciones` (
  `medicionID` int(11) NOT NULL,
  `medicion` float(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `pozoID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pozos`
--

CREATE TABLE `pozos` (
  `pozoID` int(11) NOT NULL,
  `nombrePozo` varchar(40) DEFAULT NULL,
  `extension` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `pozos`
--

INSERT INTO `pozos` (`pozoID`, `nombrePozo`, `extension`) VALUES
(1, 'Cuenca Oriental', '153000'),
(2, 'Cuenca Maracaibo - Falcón', '67000'),
(3, 'Cuenca Barinas - Apure', '87000'),
(4, 'Cuenca Tuy - Cariaco', '14000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mediciones`
--
ALTER TABLE `mediciones`
  ADD PRIMARY KEY (`medicionID`);

--
-- Indexes for table `pozos`
--
ALTER TABLE `pozos`
  ADD PRIMARY KEY (`pozoID`),
  ADD UNIQUE KEY `nombrePozo` (`nombrePozo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mediciones`
--
ALTER TABLE `mediciones`
  MODIFY `medicionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pozos`
--
ALTER TABLE `pozos`
  MODIFY `pozoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
