-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 06:23 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrid`
--

-- --------------------------------------------------------

--
-- Table structure for table `back_info`
--

CREATE TABLE `back_info` (
  `a_id` int(11) NOT NULL,
  `a_name` text NOT NULL,
  `designation` text NOT NULL,
  `signature` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `back_info`
--

INSERT INTO `back_info` (`a_id`, `a_name`, `designation`, `signature`) VALUES
(1, 'Md xyz xyz', 'Secretary', '825150.png'),
(2, 'Md abc abc', 'Secretary', '687434.png');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `en_no` text NOT NULL,
  `name` text NOT NULL,
  `na_vo_num` text NOT NULL,
  `blood` text NOT NULL,
  `address` text NOT NULL,
  `cellphone` text NOT NULL,
  `email` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `en_no`, `name`, `na_vo_num`, `blood`, `address`, `cellphone`, `email`, `img`, `a_id`) VALUES
(9, '53446436436', 'MD lkjh afsf', '459863215875562', 'O+', 'X Street Dhaka Bangladesh', '01986356978', 'lkjh@abc.com', '737815.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `back_info`
--
ALTER TABLE `back_info`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `back_info`
--
ALTER TABLE `back_info`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
