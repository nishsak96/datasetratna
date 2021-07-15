-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 09:48 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datasetratna`
--

-- --------------------------------------------------------

--
-- Table structure for table `delete_log`
--

CREATE TABLE `delete_log` (
  `id` int(11) NOT NULL,
  `bill_type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `amount` decimal(7,3) NOT NULL,
  `purity` decimal(7,3) NOT NULL,
  `pure_amount` decimal(7,3) NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `edit_log`
--

CREATE TABLE `edit_log` (
  `id` int(11) NOT NULL,
  `old_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(7,3) NOT NULL,
  `purity` decimal(7,3) NOT NULL,
  `pure_amount` decimal(7,3) NOT NULL,
  `type` varchar(50) NOT NULL,
  `bill_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sheet1`
--

CREATE TABLE `sheet1` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(30) NOT NULL,
  `amount` decimal(7,3) NOT NULL,
  `purity` decimal(7,3) NOT NULL,
  `pure_amount` decimal(7,3) NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sheet2`
--

CREATE TABLE `sheet2` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(30) NOT NULL,
  `amount` decimal(7,3) NOT NULL,
  `purity` decimal(7,3) NOT NULL,
  `pure_amount` decimal(7,3) NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delete_log`
--
ALTER TABLE `delete_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edit_log`
--
ALTER TABLE `edit_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sheet1`
--
ALTER TABLE `sheet1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sheet2`
--
ALTER TABLE `sheet2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delete_log`
--
ALTER TABLE `delete_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `edit_log`
--
ALTER TABLE `edit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sheet1`
--
ALTER TABLE `sheet1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sheet2`
--
ALTER TABLE `sheet2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
