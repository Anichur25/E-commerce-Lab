-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 09:10 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE `entry` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `NickName` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Website` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `entryNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`ID`, `FullName`, `NickName`, `Address`, `Website`, `DOB`, `entryNo`) VALUES
(1, 'Anichur Rahman', 'Anis', 'Faridpur', 'www.Google.com', '2018-05-15', 1),
(1, 'Anichur Rahman', 'Anis', 'Faridpur', 'www.Google.com', '2018-05-15', 2),
(1, 'Mahbub Hasan', 'Mahbub', 'Joypurhat', 'www.Mysite.com', '2019-11-24', 3);

-- --------------------------------------------------------

--
-- Table structure for table `entrycount`
--

CREATE TABLE `entrycount` (
  `ID` int(11) NOT NULL,
  `TotalEntry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entrycount`
--

INSERT INTO `entrycount` (`ID`, `TotalEntry`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `ID` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `entryNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`ID`, `phone`, `entryNo`) VALUES
(1, '01969311081', 1),
(1, '01969311081', 2),
(1, '01969311084', 3),
(1, '01994470674', 3),
(1, '01757757575', 3),
(1, '01757757575', 3),
(1, '01798765443', 3);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`UserName`, `Email`, `Password`, `ID`) VALUES
('anis', 'aniscseru@gmail.com', '1234', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
