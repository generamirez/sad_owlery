-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 04:42 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `owlery_sad`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(7) NOT NULL,
  `voucher_code` varchar(50) NOT NULL,
  `amount` double(30,2) NOT NULL,
  `expense_date` datetime NOT NULL,
  `source_id` int(7) NOT NULL,
  `exptype_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `voucher_code`, `amount`, `expense_date`, `source_id`, `exptype_id`) VALUES
(4, '1237', 1234.00, '2018-05-09 00:00:00', 1, 1),
(6, '12344', 213.00, '2018-05-09 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense_sources`
--

CREATE TABLE `expense_sources` (
  `src_id` int(7) NOT NULL,
  `src_name` varchar(50) NOT NULL,
  `src_type` tinyint(1) NOT NULL,
  `exptype_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_sources`
--

INSERT INTO `expense_sources` (`src_id`, `src_name`, `src_type`, `exptype_id`) VALUES
(1, 'smth', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `exptype_id` int(7) NOT NULL,
  `exptype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_types`
--

INSERT INTO `expense_types` (`exptype_id`, `exptype_name`) VALUES
(1, 'electricity'),
(2, 'water');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(7) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `space` varchar(20) NOT NULL,
  `number_of_people` tinyint(2) NOT NULL,
  `package_type` varchar(20) DEFAULT NULL,
  `date_start` datetime NOT NULL,
  `voucher_code` varchar(50) NOT NULL,
  `discount_amt` double(3,2) NOT NULL,
  `new_package` tinyint(1) NOT NULL,
  `partnership` tinyint(1) NOT NULL,
  `session_status` tinyint(1) NOT NULL,
  `date_end` datetime NOT NULL,
  `amt_due` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `customer_name`, `space`, `number_of_people`, `package_type`, `date_start`, `voucher_code`, `discount_amt`, `new_package`, `partnership`, `session_status`, `date_end`, `amt_due`) VALUES
(24, 'Gene Carlo Ramirez', 'shared space', 12, 'weekly', '2018-04-17 08:23:29', '134', 1.22, 0, 0, 0, '0000-00-00 00:00:00', 0.00),
(28, 'abcd', 'shared space', 12, 'weekly', '2018-04-17 08:23:29', '213425', 5.00, 1, 1, 0, '2018-05-13 18:55:10', 11660.00),
(42, 'Gene', 'Meeting Room A', 14, '', '2018-05-12 21:07:49', 'ewfasd', 0.00, 1, 0, 0, '2018-05-13 18:55:23', 1300.00),
(43, 'Gene', 'Meeting Room B', 10, '', '2018-05-12 21:23:51', 'efqawsd', 0.00, 0, 1, 1, '0000-00-00 00:00:00', 0.00),
(44, 'qwefds', 'Meeting Room B', 14, '1', '2018-05-12 21:29:16', 'esfdcx', 0.00, 1, 0, 1, '0000-00-00 00:00:00', 0.00),
(45, 'qer', 'Meeting Room B', 13, '1', '2018-05-12 21:32:10', 'weqdsf', 0.00, 0, 0, 1, '0000-00-00 00:00:00', 0.00),
(46, 'qwefdsc', 'Meeting Room B', 11, 'None', '2018-05-12 21:33:09', 'dscxz', 0.00, 1, 0, 1, '0000-00-00 00:00:00', 0.00),
(47, 'Thea', 'Shared Space', 1, '', '2018-05-13 22:29:19', 'qrwertytyuw6y3q523qres', 0.00, 0, 0, 1, '0000-00-00 00:00:00', 0.00),
(48, 'Thea', 'Shared Space', 1, 'None', '2018-05-13 22:30:13', 'edfgcv', 0.00, 1, 0, 0, '2018-05-13 22:30:31', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `level`) VALUES
(1, 'admin123', 'abcdefg', 'admin'),
(2, 'employee123', 'abcdefg', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`),
  ADD UNIQUE KEY `voucher_code` (`voucher_code`),
  ADD KEY `source_id` (`source_id`),
  ADD KEY `exptype_id` (`exptype_id`);

--
-- Indexes for table `expense_sources`
--
ALTER TABLE `expense_sources`
  ADD PRIMARY KEY (`src_id`),
  ADD UNIQUE KEY `exptype_id` (`exptype_id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`exptype_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `usernames` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expense_sources`
--
ALTER TABLE `expense_sources`
  MODIFY `src_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `exptype_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expense_srcid` FOREIGN KEY (`source_id`) REFERENCES `expense_sources` (`src_id`),
  ADD CONSTRAINT `exptype_id` FOREIGN KEY (`exptype_id`) REFERENCES `expense_types` (`exptype_id`);

--
-- Constraints for table `expense_sources`
--
ALTER TABLE `expense_sources`
  ADD CONSTRAINT `exptypeidsrc_expsrc` FOREIGN KEY (`exptype_id`) REFERENCES `expense_types` (`exptype_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
