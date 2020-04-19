-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 11:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_list`
--

CREATE TABLE `bus_list` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `board` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `available_seat` int(100) NOT NULL DEFAULT 40,
  `total_seat` int(100) NOT NULL DEFAULT 40
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_list`
--

INSERT INTO `bus_list` (`id`, `name`, `board`, `destination`, `available_seat`, `total_seat`) VALUES
(1, 'Shonar Bangla', 'Dhaka', 'Sherpur', 40, 40),
(2, 'Shonar Bangla', 'Sherpur', 'Dhaka', 40, 40),
(3, 'Hazi', 'Dhaka', 'Sherpur', 40, 40),
(4, 'Hazi', 'Sherpur', 'Dhaka', 40, 40),
(5, 'Hanif', 'Dhaka', 'Mymensingh', 40, 40),
(6, 'Hanif', 'Mymensingh', 'Dhaka', 40, 40),
(7, 'Ena', 'Dhaka', 'Mymensingh', 40, 40),
(8, 'Ena', 'Mymensingh', 'Dhaka', 40, 40);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nid` int(50) NOT NULL,
  `balance` int(20) NOT NULL DEFAULT 0,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `nid`, `balance`, `type`) VALUES
(26, 'abir', '$2y$10$X0wNChsxszQ/8xqe6axlH.jqrhzPwd1wdBptAtID1BHoF.e.FpUVG', 'Abir', 'Mahmud', 'amabirmahmud@gmail.com', 1234567890, 0, 'user'),
(27, 'hasib', '$2y$10$XXzhoIJFhkgZa3iyOtO8jeVXiGqvx.rYVPcB704NOQutdR7hUnINa', 'Hasib', 'Shanto', 'hasibshanto0@gmail.com', 987654321, 0, 'user'),
(28, 'ayon', '$2y$10$6GBqrMcHWKM701fzl/U7ZugbR9axUDYkXwcler8bPsKGCYn8N93wu', 'Nabil Arman', 'Ayon', 'nabilarmanayon@gmail.com', 2147483647, 0, 'user'),
(1002, 'mahmud', '$2y$10$WxNzlhcRIOjfNZa52/5ugu8ny06fdUTLfZ8.wSMUQBiFXAKzjeqx6', 'Abir', 'Mahmud', 'mahmud@gmail.com', 12345678, 0, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_list`
--
ALTER TABLE `bus_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_list`
--
ALTER TABLE `bus_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
