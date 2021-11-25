-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 07:05 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhu_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(4) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_description` varchar(100) NOT NULL,
  `cat_type` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `reg_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

CREATE TABLE `client_info` (
  `cid` int(20) NOT NULL,
  `cfname` int(60) NOT NULL,
  `cmname` int(60) NOT NULL,
  `clname` int(60) NOT NULL,
  `cgender` varchar(10) NOT NULL,
  `caddress` varchar(150) NOT NULL,
  `cphone` varchar(14) NOT NULL,
  `cjob` int(255) NOT NULL,
  `ccol` int(150) NOT NULL,
  `cdep` varchar(150) NOT NULL,
  `cpetition` varchar(20) NOT NULL,
  `proveide_date` date NOT NULL,
  `proveide_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(5) NOT NULL,
  `history_title` varchar(60) NOT NULL,
  `history_content` varchar(255) NOT NULL,
  `history_date` date NOT NULL,
  `history_from` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(20) NOT NULL,
  `cat_id` int(20) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_type` varchar(100) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `item quantity` int(20) NOT NULL,
  `item_quality` varchar(50) NOT NULL,
  `item_image` varchar(50) NOT NULL,
  `item_status` varchar(50) NOT NULL,
  `available_items` int(20) NOT NULL,
  `supplied_by` varchar(150) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `reg_by` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(5) NOT NULL,
  `notification_title` varchar(60) NOT NULL,
  `notification_content` varchar(255) NOT NULL,
  `history_date` date NOT NULL,
  `notification_from` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplied_materials`
--

CREATE TABLE `supplied_materials` (
  `sup_id` int(100) NOT NULL,
  `item_id` int(100) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `item_amount` int(100) NOT NULL,
  `provide_date` date NOT NULL,
  `allowed_duration` date NOT NULL,
  `supply_status` varchar(30) NOT NULL,
  `petition` varchar(10) NOT NULL,
  `supplied_by` varchar(100) NOT NULL,
  `supplied_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `modified_date` date NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `username`, `password`, `modified_date`, `modified_by`) VALUES
(1, 'eyob', '123', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_informations`
--

CREATE TABLE `user_informations` (
  `id` int(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `phone_no` varchar(13) NOT NULL,
  `user_image` varchar(50) NOT NULL,
  `reg_by` varchar(100) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_informations`
--

INSERT INTO `user_informations` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `gender`, `user_type`, `phone_no`, `user_image`, `reg_by`, `reg_date`) VALUES
(1, 'BHU EMP 0001/21', 'Eyob', 'Tadesse', 'Ayana', 'Male', 'Higher Admin', '0917580482', '', '', '2021-03-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `client_info`
--
ALTER TABLE `client_info`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `cat_id` (`cat_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `supplied_materials`
--
ALTER TABLE `supplied_materials`
  ADD PRIMARY KEY (`sup_id`),
  ADD KEY `supplied_materials_ibfk_1` (`cat_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_informations`
--
ALTER TABLE `user_informations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_info`
--
ALTER TABLE `client_info`
  MODIFY `cid` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplied_materials`
--
ALTER TABLE `supplied_materials`
  MODIFY `sup_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_informations`
--
ALTER TABLE `user_informations`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`history_id`) REFERENCES `user_accounts` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `supplied_materials`
--
ALTER TABLE `supplied_materials`
  ADD CONSTRAINT `supplied_materials_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `supplied_materials_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD CONSTRAINT `user_accounts_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_informations` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
