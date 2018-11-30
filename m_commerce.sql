-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2018 at 08:25 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m.commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Huawei'),
(3, 'Samsung'),
(6, 'Iphone'),
(9, 'Oppo'),
(11, 'sony'),
(12, 'tecno');

-- --------------------------------------------------------

--
-- Table structure for table `mobiles`
--

CREATE TABLE `mobiles` (
  `mobile_id` int(11) NOT NULL,
  `mobile_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `rate` int(11) NOT NULL DEFAULT '0',
  `#love` int(11) DEFAULT '0',
  `#buy` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `m_brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mobiles`
--

INSERT INTO `mobiles` (`mobile_id`, `mobile_name`, `price`, `rate`, `#love`, `#buy`, `image`, `m_brand_id`) VALUES
(1, 'Huawei Nova 3i ', 5200, 5, 0, 0, 'Huawei Nova 3i.jpg', 1),
(2, 'Apple iPhone 6S Plus', 8500, 3, 0, 0, 'Apple iPhone 6S Plus.jpg', 6),
(6, 'Apple iPhone 6S', 7000, 3, 0, 0, 'Apple iPhone 6S.jpg', 6),
(9, 'iphone 4', 3200, 2, 0, 0, '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `tran_user_id` int(11) NOT NULL,
  `tran_mobile_id` int(11) NOT NULL,
  `trans_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `tran_user_id`, `tran_mobile_id`, `trans_date`) VALUES
(31, 1, 1, '2018-11-30'),
(32, 1, 2, '2018-11-13'),
(33, 1, 6, '2018-11-30'),
(34, 1, 9, '2018-11-30'),
(35, 1, 9, '2018-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `group_id` tinyint(4) NOT NULL DEFAULT '0',
  `create_account_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `msg`, `group_id`, `create_account_date`) VALUES
(1, 'mohamed abdullah', 'mohamed.abdullah.kamel1997@gmail.com', 'admin', '', 1, '2018-11-30'),
(2, 'mohamed salah', 'smohamed@gmail.com', 'admin', '', 1, '2018-11-30'),
(7, 'tarek abdullah', 'tarekabdullah@yahoo.com', 'admin', '', 0, '2018-11-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `mobiles`
--
ALTER TABLE `mobiles`
  ADD PRIMARY KEY (`mobile_id`),
  ADD KEY `m_brand_id` (`m_brand_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `tran_user_id` (`tran_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mobiles`
--
ALTER TABLE `mobiles`
  MODIFY `mobile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobiles`
--
ALTER TABLE `mobiles`
  ADD CONSTRAINT `mobiles_ibfk_1` FOREIGN KEY (`m_brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`tran_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
