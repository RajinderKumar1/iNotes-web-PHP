-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2022 at 12:31 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.10

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `inotes`
--

CREATE TABLE `inotes` (
  `Sr_no` int(12) NOT NULL,
  `Title` varchar(20) NOT NULL DEFAULT 'No Note present',
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inotes`
--

INSERT INTO `inotes` (`Sr_no`, `Title`, `Description`) VALUES
(126, '', ''),
(129, 'Study PHP', 'Study php because exams are coming'),
(131, 'Go to play', 'Go to play with friends'),
(132, 'Preeti', 'Go to preetis home'),
(133, 'Chai Drink', 'Drinking Chai at evening'),
(136, 'Football', 'Playing football'),
(137, 'Anmol talk', 'In evening'),
(152, 'Php is good', 'We can update this app later');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inotes`
--
ALTER TABLE `inotes`
  ADD PRIMARY KEY (`Sr_no`),
  ADD UNIQUE KEY `Title` (`Title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inotes`
--
ALTER TABLE `inotes`
  MODIFY `Sr_no` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
