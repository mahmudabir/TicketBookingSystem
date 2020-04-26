-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 12:45 PM
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
-- Table structure for table `bus_history`
--

CREATE TABLE `bus_history` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `bus_id` int(100) NOT NULL,
  `seat` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_history`
--

INSERT INTO `bus_history` (`id`, `username`, `bus_id`, `seat`, `date`, `payment`, `status`) VALUES
(3, 'abir', 1, 1, '2020-04-21 18:33:23', 300, 'paid'),
(4, 'abir', 1, 2, '2020-04-21 21:32:19', 600, 'paid'),
(5, 'abir', 3, 2, '2020-04-21 21:32:44', 600, 'paid'),
(6, 'abir', 1, 2, '2020-04-21 21:33:17', 600, 'paid'),
(7, 'abir', 1, 3, '2020-04-21 21:33:25', 900, 'paid'),
(8, 'abir', 1, 3, '2020-04-21 21:43:03', 900, 'paid'),
(9, 'abir', 3, 4, '2020-04-21 21:43:18', 1200, 'paid'),
(10, 'abir', 3, 1, '2020-04-21 21:43:46', 300, 'paid'),
(11, 'abir', 3, 1, '2020-04-21 21:44:53', 300, 'paid'),
(12, 'abir', 3, 1, '2020-04-21 21:45:12', 300, 'paid'),
(13, 'abir', 3, 1, '2020-04-21 21:45:19', 300, 'paid'),
(14, 'abir', 5, 1, '2020-04-21 21:45:35', 350, 'paid'),
(15, 'abir', 5, 1, '2020-04-21 21:46:21', 350, 'paid'),
(16, 'abir', 7, 1, '2020-04-21 21:47:43', 220, 'paid'),
(17, 'abir', 7, 1, '2020-04-21 21:47:53', 220, 'paid'),
(18, 'abir', 7, 1, '2020-04-21 21:48:59', 220, 'paid'),
(19, 'abir', 7, 1, '2020-04-21 21:49:02', 220, 'paid'),
(20, 'abir', 7, 1, '2020-04-21 21:49:13', 220, 'paid'),
(21, 'abir', 3, 4, '2020-04-21 21:49:29', 1200, 'paid'),
(22, 'abir', 3, 4, '2020-04-21 21:54:57', 1200, 'paid'),
(23, 'abir', 3, 4, '2020-04-21 21:55:09', 1200, 'paid'),
(24, 'abir', 5, 1, '2020-04-21 21:55:32', 350, 'paid'),
(25, 'abir', 5, 1, '2020-04-21 21:55:42', 350, 'paid'),
(26, 'abir', 5, 1, '2020-04-21 21:56:29', 350, 'paid'),
(27, 'abir', 5, 1, '2020-04-21 21:56:56', 350, 'paid'),
(28, 'abir', 5, 1, '2020-04-21 21:58:47', 350, 'paid'),
(29, 'abir', 5, 1, '2020-04-21 21:58:50', 350, 'paid'),
(30, 'abir', 5, 1, '2020-04-21 21:59:07', 350, 'paid'),
(31, 'abir', 5, 1, '2020-04-21 21:59:10', 350, 'paid'),
(32, 'abir', 7, 1, '2020-04-21 21:59:51', 220, 'paid'),
(33, 'abir', 7, 1, '2020-04-21 22:00:18', 220, 'paid'),
(34, 'abir', 7, 1, '2020-04-21 22:00:22', 220, 'paid'),
(35, 'abir', 7, 1, '2020-04-21 22:01:15', 220, 'paid'),
(36, 'abir', 5, 1, '2020-04-21 22:01:52', 350, 'paid'),
(37, 'abir', 7, 1, '2020-04-21 22:02:05', 220, 'paid'),
(38, 'abir', 3, 1, '2020-04-21 22:02:45', 300, 'paid'),
(39, 'abir', 3, 1, '2020-04-21 22:05:08', 300, 'paid'),
(40, 'abir', 3, 1, '2020-04-21 22:05:17', 300, 'paid'),
(41, 'abir', 3, 1, '2020-04-21 22:06:48', 300, 'paid'),
(42, 'abir', 7, 1, '2020-04-21 22:07:07', 220, 'paid'),
(43, 'abir', 3, 1, '2020-04-21 22:07:19', 300, 'paid'),
(44, 'abir', 7, 1, '2020-04-21 22:07:52', 220, 'paid'),
(45, 'abir', 7, 1, '2020-04-21 22:08:18', 220, 'paid'),
(46, '', 7, 1, '2020-04-21 22:08:35', 220, 'paid'),
(47, 'abir', 7, 4, '2020-04-21 22:09:46', 880, 'paid'),
(48, 'abir', 7, 3, '2020-04-21 22:10:33', 660, 'paid'),
(49, 'abir', 7, 3, '2020-04-21 22:10:47', 660, 'paid'),
(50, 'abir', 7, 1, '2020-04-21 22:14:27', 220, 'paid'),
(51, 'abir', 7, 1, '2020-04-21 22:14:31', 220, 'paid'),
(52, 'abir', 7, 1, '2020-04-21 22:15:26', 220, 'paid'),
(53, 'abir', 7, 1, '2020-04-21 22:15:27', 220, 'paid'),
(54, 'abir', 7, 1, '2020-04-21 22:15:28', 220, 'paid'),
(55, 'abir', 7, 1, '2020-04-21 22:15:40', 220, 'paid'),
(56, 'abir', 7, 1, '2020-04-21 22:27:54', 220, 'paid'),
(57, 'abir', 7, 1, '2020-04-21 22:28:15', 220, 'paid'),
(58, 'abir', 5, 1, '2020-04-21 22:42:00', 350, 'paid'),
(59, 'abir', 5, 1, '2020-04-21 22:46:16', 350, 'paid'),
(60, 'abir', 7, 1, '2020-04-22 10:46:34', 220, 'paid'),
(61, 'abir', 7, 1, '2020-04-22 10:53:43', 220, 'paid'),
(62, 'abir', 3, 1, '2020-04-22 10:56:37', 300, 'paid'),
(63, 'abir', 3, 1, '2020-04-22 10:56:39', 300, 'paid'),
(64, 'abir', 3, 1, '2020-04-22 10:56:40', 300, 'paid'),
(65, 'abir', 3, 1, '2020-04-22 10:56:47', 300, 'paid'),
(66, 'mahmud', 3, 3, '2020-04-22 11:30:47', 900, 'paid'),
(67, 'abir', 1, 3, '2020-04-22 11:42:58', 900, 'paid'),
(68, 'abir', 3, 2, '2020-04-22 14:16:48', 600, 'paid'),
(69, 'abir', 3, 4, '2020-04-22 14:53:02', 1200, 'paid'),
(70, 'abir', 5, 4, '2020-04-22 15:02:31', 1400, 'paid'),
(71, 'abir', 5, 4, '2020-04-22 15:06:59', 1400, 'paid'),
(72, 'abir', 1, 1, '2020-04-22 15:07:07', 300, 'paid'),
(73, 'abir', 3, 4, '2020-04-22 15:07:34', 1200, 'paid'),
(74, 'abir', 5, 1, '2020-04-22 15:07:47', 350, 'paid'),
(75, 'abir', 5, 1, '2020-04-22 15:09:27', 350, 'paid'),
(76, 'abir', 3, 1, '2020-04-22 15:09:35', 300, 'paid'),
(77, 'abir', 1, 1, '2020-04-22 15:10:04', 300, 'paid'),
(78, 'abir', 1, 1, '2020-04-22 15:11:11', 300, 'paid'),
(79, 'abir', 1, 4, '2020-04-22 15:11:19', 1200, 'paid'),
(80, 'abir', 1, 1, '2020-04-22 15:11:54', 300, 'paid'),
(81, 'abir', 1, 1, '2020-04-22 15:12:54', 300, 'paid'),
(82, 'abir', 1, 1, '2020-04-22 15:13:17', 300, 'paid'),
(83, 'abir', 3, 1, '2020-04-22 15:14:23', 300, 'paid'),
(84, 'abir', 7, 1, '2020-04-22 15:22:07', 220, 'paid'),
(85, 'abir', 7, 1, '2020-04-22 15:37:36', 220, 'paid'),
(86, 'abir', 7, 3, '2020-04-22 18:16:54', 660, 'paid'),
(87, 'abir', 7, 3, '2020-04-22 18:17:09', 660, 'paid'),
(88, 'abir', 7, 3, '2020-04-22 18:19:46', 660, 'paid'),
(89, 'abir', 7, 3, '2020-04-22 18:20:29', 660, 'paid'),
(90, 'abir', 7, 1, '2020-04-22 18:25:27', 220, 'paid'),
(91, 'abir', 7, 1, '2020-04-22 18:58:52', 220, 'paid'),
(92, 'abir', 7, 3, '2020-04-22 19:01:10', 660, 'paid'),
(93, 'abir', 7, 3, '2020-04-22 19:01:13', 660, 'paid'),
(94, 'abir', 7, 3, '2020-04-22 19:01:59', 660, 'paid'),
(95, 'abir', 7, 3, '2020-04-22 19:02:00', 660, 'paid'),
(96, 'abir', 7, 3, '2020-04-22 19:02:00', 660, 'paid'),
(97, 'abir', 1, 2, '2020-04-22 19:02:23', 600, 'paid'),
(98, 'abir', 1, 2, '2020-04-22 19:02:32', 600, 'paid'),
(99, 'abir', 1, 2, '2020-04-22 19:02:34', 600, 'paid'),
(100, 'abir', 1, 2, '2020-04-22 19:03:22', 600, 'paid'),
(101, 'abir', 5, 2, '2020-04-22 19:04:56', 700, 'paid'),
(104, 'abir', 2, 3, '2020-04-23 17:09:40', 900, 'paid'),
(105, 'abir', 7, 3, '2020-04-25 20:36:43', 660, 'paid'),
(106, 'abir', 7, 3, '2020-04-25 20:36:45', 660, 'paid'),
(107, 'abir', 7, 3, '2020-04-25 20:36:48', 660, 'paid'),
(108, 'abir', 1, 3, '2020-04-25 20:45:42', 900, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `bus_list`
--

CREATE TABLE `bus_list` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `board` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'nonac',
  `cost` int(100) NOT NULL,
  `available_seat` int(100) NOT NULL DEFAULT 40,
  `total_seat` int(100) NOT NULL DEFAULT 40
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_list`
--

INSERT INTO `bus_list` (`id`, `name`, `board`, `destination`, `type`, `cost`, `available_seat`, `total_seat`) VALUES
(1, 'Shonar Bangla', 'Dhaka', 'Sherpur', 'nonac', 300, 40, 40),
(2, 'Shonar Bangla', 'Sherpur', 'Dhaka', 'nonac', 300, 40, 40),
(3, 'Hazi', 'Dhaka', 'Sherpur', 'nonac', 300, 40, 40),
(4, 'Hazi', 'Sherpur', 'Dhaka', 'nonac', 300, 40, 40),
(5, 'Hanif', 'Dhaka', 'Mymensingh', 'ac', 350, 40, 40),
(6, 'Hanif', 'Mymensingh', 'Dhaka', 'ac', 350, 40, 40),
(7, 'Ena', 'Dhaka', 'Mymensingh', 'nonac', 220, 40, 40),
(8, 'Ena', 'Mymensingh', 'Dhaka', 'nonac', 220, 40, 40);

-- --------------------------------------------------------

--
-- Table structure for table `launch_history`
--

CREATE TABLE `launch_history` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `launch_id` int(100) NOT NULL,
  `seat` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `launch_list`
--

CREATE TABLE `launch_list` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `board` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'nonac',
  `cost` int(100) NOT NULL,
  `available_seat` int(100) NOT NULL DEFAULT 240,
  `total_seat` int(100) NOT NULL DEFAULT 240
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `balance` int(100) NOT NULL DEFAULT 0,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `nid`, `balance`, `type`) VALUES
(26, 'abir', '$2y$10$X0wNChsxszQ/8xqe6axlH.jqrhzPwd1wdBptAtID1BHoF.e.FpUVG', 'Abir', 'Mahmud', 'amabirmahmud@gmail.com', '1234567890357890897654323456789', 2147455497, 'user'),
(27, 'hasib', '$2y$10$XXzhoIJFhkgZa3iyOtO8jeVXiGqvx.rYVPcB704NOQutdR7hUnINa', 'Hasib', 'Shanto', 'hasibshanto0@gmail.com', '987654321', 2147483647, 'user'),
(28, 'ayon', '$2y$10$6GBqrMcHWKM701fzl/U7ZugbR9axUDYkXwcler8bPsKGCYn8N93wu', 'Nabil Arman', 'Ayon', 'nabilarmanayon@gmail.com', '3214567', 2147483647, 'user'),
(1003, 'mahmud', '$2y$10$QWQutDEI1HegmOwd/9ppJuMlNSUsytHrvC3WnXjujSEQL0zBsLCk2', 'Abir', 'Mahmud', 'asdas@asdasd', '2147483647', 2147482747, 'superadmin'),
(1004, 'admin', '$2y$10$0UbaPxqagOVW6J/scUh4jesvUn/Nxih5Mkb13DVq1zDuvNOpvxIXW', 'Abir', 'Mahmud', 'asdfghjk@sfdghj', '123456789123', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `train_history`
--

CREATE TABLE `train_history` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `train_id` int(100) NOT NULL,
  `seat` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_history`
--

INSERT INTO `train_history` (`id`, `username`, `train_id`, `seat`, `date`, `payment`, `status`) VALUES
(1, 'abir', 4, 3, '2020-04-23 04:31:51', 900, 'paid'),
(2, 'abir', 6, 4, '2020-04-23 17:21:06', 1600, 'paid'),
(3, 'abir', 2, 3, '2020-04-25 20:21:22', 450, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `train_list`
--

CREATE TABLE `train_list` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `board` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'nonac',
  `cost` int(100) NOT NULL,
  `available_seat` int(100) NOT NULL DEFAULT 240,
  `total_seat` int(100) NOT NULL DEFAULT 240
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_list`
--

INSERT INTO `train_list` (`id`, `name`, `board`, `destination`, `type`, `cost`, `available_seat`, `total_seat`) VALUES
(1, 'Agnibina', 'Dhaka', 'Tarakandi', 'nonac', 150, 240, 240),
(2, 'Agnibina', 'Tarakandi', 'Dhaka', 'nonac', 150, 240, 240),
(3, 'Trina', 'Dhaka', 'Chittagong', 'nonac', 300, 240, 240),
(4, 'Trina', 'Chittagong', 'Dhaka', 'nonac', 300, 240, 240),
(5, 'Shuborno Express', 'Dhaka', 'Chittagong', 'ac', 400, 240, 240),
(6, 'Shuborno Express', 'Chittagong', 'Dhaka', 'ac', 400, 240, 240);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_history`
--
ALTER TABLE `bus_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_list`
--
ALTER TABLE `bus_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `launch_history`
--
ALTER TABLE `launch_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `launch_list`
--
ALTER TABLE `launch_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `train_history`
--
ALTER TABLE `train_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train_list`
--
ALTER TABLE `train_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_history`
--
ALTER TABLE `bus_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `bus_list`
--
ALTER TABLE `bus_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `launch_history`
--
ALTER TABLE `launch_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `launch_list`
--
ALTER TABLE `launch_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `train_history`
--
ALTER TABLE `train_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `train_list`
--
ALTER TABLE `train_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
