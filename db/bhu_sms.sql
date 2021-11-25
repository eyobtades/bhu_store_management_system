-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 01:22 PM
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
  `cat_status` varchar(20) NOT NULL,
  `reg_date` datetime NOT NULL,
  `reg_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`, `cat_type`, `cat_status`, `reg_date`, `reg_by`) VALUES
(9, 'Electronics', 'Computer, Laptops, Projector and Etc', 'Teaching and Learning Tools', 'Available', '2021-04-03 06:34:56', 'Fedhesa&nbsp;Mengistu'),
(10, 'Electronics', 'Computer, Laptops, Projector and Etc', 'Teaching and Learning Tools', 'Available', '2021-04-03 06:42:18', 'Fedhesa&nbsp;Mengistu'),
(11, 'Dormitory Materials', 'Foam, Mattress, Pillow', 'Student Service', 'Available', '2021-04-19 01:58:20', 'Fedhesa&nbsp;Mengistu'),
(12, 'Dormitory Materials', 'Foam, Mattress, Pillow', 'Student Service', 'Available', '2021-04-19 01:58:47', 'Fedhesa&nbsp;Mengistu'),
(13, 'Dormitory Materials', 'Foam, Mattress, Pillow', 'Student Service', 'Available', '2021-04-19 01:58:53', 'Fedhesa&nbsp;Mengistu');

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
  `item_quantity` int(20) NOT NULL,
  `item_quality` varchar(50) NOT NULL,
  `item_image` varchar(50) NOT NULL,
  `item_status` varchar(50) NOT NULL,
  `supplied_by` varchar(150) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `reg_by` varchar(80) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `cat_id`, `item_name`, `item_type`, `item_description`, `item_quantity`, `item_quality`, `item_image`, `item_status`, `supplied_by`, `comments`, `reg_by`, `reg_date`) VALUES
(1, 9, 'Lenovo Laptop', '', '', 3, 'High', '', 'Available', 'Ethio Gebeya', '', 'Fedhesa Gemechu', '2021-04-21'),
(4, 10, 'drtio', '', '', 0, '8', '', 'Available', '', '', '', '0000-00-00'),
(6, 10, 'Pen', '', '', 100, '', '', 'Available', '', '', '', '0000-00-00'),
(7, 9, 'Divider', '', '', 100, '', '', 'Available', '', '', '', '0000-00-00'),
(8, 10, 'Mobile', '', '', 4, '', '', 'Available', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `log_id` int(100) NOT NULL,
  `login_status` varchar(20) NOT NULL,
  `login_date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`log_id`, `login_status`, `login_date_time`) VALUES
(45, 'Active', '2021-03-27'),
(46, 'Offline', '2021-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(20) NOT NULL,
  `message_sender` int(100) NOT NULL,
  `message_reciever` int(100) NOT NULL,
  `message_title` varchar(100) NOT NULL,
  `message_content` varchar(255) NOT NULL,
  `message_attachment` varchar(50) NOT NULL,
  `sent_date` datetime NOT NULL,
  `recieved_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_sender`, `message_reciever`, `message_title`, `message_content`, `message_attachment`, `sent_date`, `recieved_date`) VALUES
(1, 43, 44, 'Hello Dear', 'Duraan Dursa Nagaan Siif Haa Ta`u.', '', '2021-03-26 13:18:51', '2021-03-26 13:18:51'),
(2, 43, 44, 'Need Approve', 'Please approve my request sir', '', '2021-03-26 13:31:41', '2021-03-26 13:31:41'),
(3, 47, 46, 'Hey Brother', 'Akkam Jirta? Nagaa keetii?', '', '2021-04-03 21:38:58', '2021-04-03 21:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `temperature` float NOT NULL,
  `moisture` float NOT NULL,
  `human` int(3) NOT NULL,
  `smoke` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`temperature`, `moisture`, `human`, `smoke`, `timestamp`) VALUES
(27.4, 101.4, 3, 34, '2021-04-16 12:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(5) NOT NULL,
  `notification_title` varchar(60) NOT NULL,
  `notification_content` varchar(255) NOT NULL,
  `date_time` date NOT NULL,
  `notification_from` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `notification_title`, `notification_content`, `date_time`, `notification_from`) VALUES
(1, 'Has Last  Login Activity.', 'He is store keeper. ', '2021-03-21', 'Eyob Tadesse'),
(2, 'Has Changed 1 User Account Password', '', '2021-03-21', 'Bikila Mengistu'),
(3, 'Has been deactivated from system.', '', '2021-03-15', 'Eyob Tadesse'),
(4, 'Has been warned from system', '', '2021-03-18', 'Eyob Tadesse'),
(5, 'New Logged in detected', 'Logged in to the system.', '2021-04-09', 'System'),
(6, 'New Logged in detected', 'Logged in to the system.', '2021-04-10', 'System'),
(7, 'New Logged in detected', 'Logged in to the system.', '2021-04-14', 'System'),
(8, 'New Logged in detected', 'Logged in to the system.', '2021-04-14', 'System'),
(9, 'New Logged in detected', 'Logged in to the system.', '2021-04-14', 'System'),
(10, 'New Logged in detected', 'Logged in to the system.', '2021-04-14', 'System'),
(11, 'New Logged in detected', 'Logged in to the system.', '2021-04-14', 'System'),
(12, 'New Logged in detected', 'Logged in to the system.', '2021-04-15', 'System'),
(13, 'New Logged in detected', 'Logged in to the system.', '2021-04-15', 'System'),
(14, 'New Logged in detected', 'Logged in to the system.', '2021-04-15', 'System'),
(15, 'New Logged in detected', 'Logged in to the system.', '2021-04-15', 'System'),
(16, 'New Logged in detected', 'Logged in to the system.', '2021-04-15', 'System'),
(17, 'New Logged in detected', 'Logged in to the system.', '2021-04-15', 'System'),
(18, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(19, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(20, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(21, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(22, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(23, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(24, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(25, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(26, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(27, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(28, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(29, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(30, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(31, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(32, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(33, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(34, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(35, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(36, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(37, 'New Logged in detected', 'Logged in to the system.', '2021-04-16', 'System'),
(38, 'New Logged in detected', 'Logged in to the system.', '2021-04-17', 'System'),
(39, 'New Logged in detected', 'Logged in to the system.', '2021-04-17', 'System'),
(40, 'New Logged in detected', 'Logged in to the system.', '2021-04-17', 'System'),
(41, 'New Logged in detected', 'Logged in to the system.', '2021-04-17', 'System'),
(42, 'New Logged in detected', 'Logged in to the system.', '2021-04-19', 'System'),
(43, 'New Logged in detected', 'Logged in to the system.', '2021-04-19', 'System'),
(44, 'New Logged in detected', 'Logged in to the system.', '2021-04-19', 'System'),
(45, 'New Logged in detected', 'Logged in to the system.', '2021-04-19', 'System'),
(46, 'New Logged in detected', 'Logged in to the system.', '2021-04-20', 'System'),
(47, 'New Logged in detected', 'Logged in to the system.', '2021-04-21', 'System'),
(48, 'New Logged in detected', 'Logged in to the system.', '2021-04-21', 'System'),
(49, 'New Logged in detected', 'Logged in to the system.', '2021-04-21', 'System'),
(50, 'New Logged in detected', 'Logged in to the system.', '2021-04-21', 'System'),
(51, 'New Logged in detected', 'Logged in to the system.', '2021-04-21', 'System'),
(52, 'New Logged in detected', 'Logged in to the system.', '2021-04-21', 'System'),
(53, 'New Logged in detected', 'Logged in to the system.', '2021-04-21', 'System'),
(54, 'New Logged in detected', 'Logged in to the system.', '2021-04-22', 'System'),
(55, 'New Logged in detected', 'Logged in to the system.', '2021-04-22', 'System'),
(56, 'New Logged in detected', 'Logged in to the system.', '2021-04-22', 'System'),
(57, 'New Logged in detected', 'Logged in to the system.', '2021-04-22', 'System'),
(58, 'New Logged in detected', 'Logged in to the system.', '2021-04-22', 'System'),
(59, 'New Logged in detected', 'Logged in to the system.', '2021-04-22', 'System'),
(60, 'New Logged in detected', 'Logged in to the system.', '2021-04-22', 'System'),
(61, 'New Logged in detected', 'Logged in to the system.', '2021-04-22', 'System'),
(62, 'New Logged in detected', 'Logged in to the system.', '2021-06-11', 'System'),
(63, 'New Logged in detected', 'Logged in to the system.', '2021-06-11', 'System'),
(64, 'New Logged in detected', 'Logged in to the system.', '2021-06-30', 'System'),
(65, 'New Logged in detected', 'Logged in to the system.', '2021-06-30', 'System'),
(66, 'New Logged in detected', 'Logged in to the system.', '2021-06-30', 'System'),
(67, 'New Logged in detected', 'Logged in to the system.', '2021-11-10', 'System'),
(68, 'New Logged in detected', 'Logged in to the system.', '2021-11-10', 'System'),
(69, 'New Logged in detected', 'Logged in to the system.', '2021-11-10', 'System'),
(70, 'New Logged in detected', 'Logged in to the system.', '2021-11-24', 'System');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `req_id` int(20) NOT NULL,
  `reg_title` varchar(255) NOT NULL,
  `req_approve` varchar(30) NOT NULL,
  `req_from` int(20) NOT NULL,
  `req_sent_date` date NOT NULL,
  `req_approved_date` date NOT NULL,
  `req_approved_by` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `store_users`
--

CREATE TABLE `store_users` (
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
  `provide_by` varchar(100) NOT NULL,
  `provide_date` date NOT NULL,
  `provide_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplied_materials`
--

CREATE TABLE `supplied_materials` (
  `sup_id` int(100) NOT NULL,
  `item_id` int(100) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `cid` int(20) NOT NULL,
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
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(20) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `test_value` tinyint(1) NOT NULL,
  `test_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `login_status` varchar(10) NOT NULL,
  `modified_date` date NOT NULL,
  `modified_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `username`, `password`, `login_status`, `modified_date`, `modified_by`) VALUES
(44, 'eyob', '1234', 'Active', '2021-03-25', '0'),
(45, 'eyoayana', '1234', 'Active', '2026-03-21', 'Eyob Tadess'),
(46, 'eyoayana', '12345', 'Active', '2026-03-21', 'Eyob Tadess'),
(47, 'betel', 'betel', 'Offline', '2021-04-03', 'Eyob Tadesse'),
(48, 'mesgosay', 'n)&6bIE7', 'Offline', '2027-03-21', 'Eyob Tadesse'),
(49, 'bikdhaba', '@AJz7n&0', 'Offline', '2027-03-21', 'Eyob Tadesse'),
(50, 'efraseffa', 'B$Sf28r{', 'Offline', '2005-04-21', 'Eyobe Tadesse'),
(51, 'bilgalata', 'tH2]Dc%1', 'Offline', '2005-04-21', 'Efrem Cherinet'),
(52, 'mesmichael', '1&KGun8@', 'Offline', '2005-04-21', 'Efrem Cherinet'),
(53, 'azeasseffa', 'uJ)Bi0/6', 'Offline', '2005-04-21', 'Efrem Cherinet'),
(54, 'jack', '12345678', 'Offline', '0000-00-00', ''),
(55, 'abdi', '123456', 'Offline', '0000-00-00', ''),
(56, 'ebi', '1234', 'Offline', '0000-00-00', ''),
(57, 'amanu', '1234567', 'Offline', '0000-00-00', ''),
(58, 'ketayana', '&7X)d4We', 'Offline', '2007-04-21', 'Ebisa Xoama'),
(59, 'ketayana', '[Yg@r63K', 'Offline', '2007-04-21', 'Ebisa Xoama'),
(60, 'ketayana', 'Io/63W)k', 'Offline', '2007-04-21', 'Ebisa Xoama'),
(61, 'ketayana', '}57iE$mO', 'Offline', '2007-04-21', 'Ebisa Xoama'),
(62, 'ketayana', '8$A9Uvn[', 'Offline', '2007-04-21', 'Ebisa Xoama'),
(63, 'ketayana', '!6iStB)8', 'Offline', '2007-04-21', 'Ebisa Xoama'),
(64, 'ketayana', '#P74s&Bt', 'Offline', '2007-04-21', 'Ebisa Xoama'),
(65, 'ketayana', 'u5}(kI4B', 'Offline', '2007-04-21', 'Ebisa Xoama'),
(66, 'kayayana', 'e%wFM{32', 'Offline', '2007-04-21', 'Ebisa Xoama'),
(67, 'kayayana', '8yMf%@E1', 'Offline', '2007-04-21', 'Ebisa Xoama'),
(68, 'kayayana', 'E8%nW2(e', 'Offline', '2007-04-21', 'Ebisa Xoama'),
(69, 'kayayana', '65V&Bwv]', 'Offline', '2007-04-21', 'Ebisa Xoama'),
(70, 'kayayana', '}5h9Q{Ll', 'Offline', '2007-04-21', 'Kayo Tadesse'),
(71, 'desaseffa', '9EO}j&f4', 'Offline', '2009-04-21', 'Eyobe Tadesse'),
(72, 'bikdhaba', '123456', '', '2016-04-21', 'Eyobe Tadesse'),
(73, 'bilbulcha', 'M$kc62Z}', '', '2017-04-21', 'Eyobe Tadesse'),
(74, 'kensharew', ')xJp60M!', '', '2017-04-21', 'Eyobe Tadesse'),
(75, 'fGHgHYUIO', '52l()oNP', '', '2021-04-21', 'Eyobe Tadesse');

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
  `region` varchar(200) NOT NULL,
  `zone` varchar(200) NOT NULL,
  `woreda` varchar(200) NOT NULL,
  `kebele` varchar(150) NOT NULL,
  `phone_no` varchar(13) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `user_image` varchar(50) NOT NULL,
  `reg_by` varchar(100) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_informations`
--

INSERT INTO `user_informations` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `gender`, `user_type`, `region`, `zone`, `woreda`, `kebele`, `phone_no`, `user_status`, `user_image`, `reg_by`, `reg_date`) VALUES
(43, 'EMP 0002/20', 'Rahek', 'Belachew', 'Aseffa', 'Female', 'Store Keeper', 'Oromia', 'Kellem Wollega', 'Gidami', '03', '1234567809', 'Active', '', '', '0000-00-00'),
(44, 'RU 4554/09-9', 'Eyobi', 'Tadesse', 'Ayana', 'Male', 'Store Keeper', 'Oromia', 'Kellem Wollega', 'Gidami', 'Girayi Bisha', '0917580481', 'Active', '', '', '0000-00-00'),
(45, 'EMP 0004/20', 'Fedhesa', 'Mengistu', 'Dhaabaa', 'Male', 'Store Manager', 'Oromia', 'West Guji', 'Agaro', 'Tibe', '0909345655', 'Active', '', 'Eyob Tadesse', '2026-03-21'),
(46, 'EMP 0102/21', 'Eyobe', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Kellem Wollega', 'Gidami', 'Girayi Bisha', '0917580482', 'Active', '', 'Eyob Tadesse', '2026-03-21'),
(47, 'BHU 0001/21', 'Eyob', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Kellem Wollega', 'Gidami', 'Girayi Bisha', '0917580482', 'Active', '', 'Eyob Tadesse', '2026-03-21'),
(48, 'EMP 0011/21 ', 'Meseret', 'Haile', 'Gosay', 'Female', 'Store Manager', 'Addis Ababa', 'Finfine', 'Piassa', '06', '0946780022', 'Active', '', 'Eyob Tadesse', '2027-03-21'),
(49, 'EMP 3445/21', 'Bikila', 'Mengistu', 'Dhaba', 'Male', 'Store Manager', 'Oromia', 'East Wollega', 'Bila', 'Bobine', '0909090011', 'Active', '', 'Eyob Tadesse', '2027-03-21'),
(50, 'BHU 2001/21', 'Efrem', 'Cherinet', 'Aseffa', 'Male', 'System Admin', 'Oromia', 'West Shoa', 'Bako', 'Tibe', '0954709355', 'Active', '', 'Eyobe Tadesse', '2005-04-21'),
(51, 'NHU 456/09', 'Bilisu ', 'Lamessa', 'Galata', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Haro', 'Limu', '0909090900', 'Active', '', 'Efrem Cherinet', '2005-04-21'),
(52, 'Me 001/090', 'Meseret', 'Haile', 'Michael', 'Male', 'System Admin', 'Addis Ababa', 'Addis Ababa', 'Piassa', '06', '0988783400', 'Active', '', 'Efrem Cherinet', '2005-04-21'),
(53, 'TYU 9009/09', 'Azeb', 'Assegid', 'Asseffa', 'Female', 'System Admin', 'Amhara', 'Bahirdar', 'Debre Birhan', '02', '0901610190', 'Active', '', 'Efrem Cherinet', '2005-04-21'),
(54, 'tyu 0987/09', 'Jackob', 'Keke', 'Loin', 'Male', 'System Admin', 'Africa', 'Tanzania', 'Ethiopia', 'Nairobi', '0898896655', 'Active', '', 'Eyobe Tadesse', '2007-04-21'),
(55, 'UBS 2345/09', 'Abdi', 'Abdu', 'Abdo', 'Male', 'System Admin', 'Ethiopia', 'Ethiopia', 'Ethiopia', 'Ethiopia', '0911223344', 'Active', '', 'Eyobe Tadesse', '2007-04-21'),
(56, 'RTY 0978/09', 'Ebisa', 'Xoama', 'Kamuz', 'Male', 'System Admin', 'Oromia', 'Adisu', 'Aroge', 'Taye', '0911223344', 'Active', '', 'Eyobe Tadesse', '2007-04-21'),
(57, 'BHU 2340/09', 'Amanu', 'Beka', 'Dhaba', 'Male', 'System Admin', 'Oromia', 'Ke Wol', 'Giadam', 'Girbish', '0917376123', 'Active', '', 'Eyobe Tadesse', '2007-04-21'),
(58, 'tui 0987/09', 'Ketim', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Beghi', '09', '0989898900', 'Active', '', 'Ebisa Xoama', '2007-04-21'),
(59, 'tui 0988/09', 'Ketim', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Beghi', '09', '0989898900', 'Active', '', 'Ebisa Xoama', '2007-04-21'),
(60, 'tui 0990/09', 'Ketim', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Beghi', '09', '0989898900', 'Active', '', 'Ebisa Xoama', '2007-04-21'),
(61, 'tui 0991/09', 'Ketim', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Beghi', '09', '0989898900', 'Active', '', 'Ebisa Xoama', '2007-04-21'),
(62, 'tui 0992/09', 'Ketim', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Beghi', '09', '0989898900', 'Active', '', 'Ebisa Xoama', '2007-04-21'),
(63, 'tui 0993/09', 'Ketim', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Beghi', '09', '0989898900', 'Active', '', 'Ebisa Xoama', '2007-04-21'),
(64, 'tui 0994/09', 'Ketim', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Beghi', '09', '0989898900', 'Active', '', 'Ebisa Xoama', '2007-04-21'),
(65, 'tui 0995/09', 'Ketim', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Beghi', '09', '0989898900', 'Active', '', 'Ebisa Xoama', '2007-04-21'),
(66, 'tui 0996/09', 'Kayo', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Beghi', '09', '0989898900', 'Active', '', 'Ebisa Xoama', '2007-04-21'),
(67, 'tui 0997/09', 'Kayo', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Beghi', '09', '0989898900', 'Active', '', 'Ebisa Xoama', '2007-04-21'),
(68, 'tud 0997/09', 'Kayo', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Beghi', '09', '0989898900', 'Active', '', 'Ebisa Xoama', '2007-04-21'),
(69, 'tud 0999/09', 'Kayo', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Beghi', '09', '0989898900', 'Active', '', 'Ebisa Xoama', '2007-04-21'),
(70, 'BHU1001/09', 'Kayo', 'Tadesse', 'Ayana', 'Male', 'System Admin', 'Oromia', 'Wollega', 'Beghi', '09', '0989898900', 'Active', '', 'Kayo Tadesse', '2007-04-21'),
(71, 'GHY 2030/09', 'Desalegn', 'Mengistu', 'Aseffa', 'Male', 'System Admin', 'Oromia', 'Kellem Wollega', 'Getema', '03', '0917580392', 'Active', '', 'Eyobe Tadesse', '2009-04-21'),
(72, 'Ru 2312/09', 'Bikila', 'Mengistu', 'Dhaba', 'Male', 'Store Manager', 'Oromia', 'West Wallaggaa', 'Boji', 'Bobine', '0923124543', 'Active', '', 'Eyobe Tadesse', '2016-04-21'),
(73, 'RU 4554/09', 'Bilisu', 'Lamessa', 'Bulcha', 'Male', 'Store Manager', 'Oromia', 'East Wollegea', 'Haro Limu', 'Suge', '0909090909', 'Active', '', 'Eyobe Tadesse', '2017-04-21'),
(74, 'RU 3422/09', 'Kenean', 'Sileshi', 'Sharew', 'Female', 'Store Manager', 'Addis abeba', 'kirkos', 'leghar', '15/16', '251935369450', 'Active', '', 'Eyobe Tadesse', '2017-04-21'),
(75, 'RU 2556/09', 'FGHJI', 'RTYU', 'GHYUIO', 'Female', 'Store Keeper', 'ETIYTR', 'SDFGH', 'LKJHGFDS', '34', '0987654321', 'Active', '', 'Eyobe Tadesse', '2021-04-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_reciever` (`message_reciever`),
  ADD KEY `message_sender` (`message_sender`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `req_approved_by` (`req_approved_by`),
  ADD KEY `requests_ibfk_3` (`req_from`);

--
-- Indexes for table `store_users`
--
ALTER TABLE `store_users`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `supplied_materials`
--
ALTER TABLE `supplied_materials`
  ADD PRIMARY KEY (`sup_id`),
  ADD KEY `supplied_materials_ibfk_1` (`cat_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

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
  MODIFY `cat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `log_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `req_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_users`
--
ALTER TABLE `store_users`
  MODIFY `cid` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplied_materials`
--
ALTER TABLE `supplied_materials`
  MODIFY `sup_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `user_informations`
--
ALTER TABLE `user_informations`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`history_id`) REFERENCES `user_accounts` (`id`);

--
-- Constraints for table `login_history`
--
ALTER TABLE `login_history`
  ADD CONSTRAINT `login_history_ibfk_1` FOREIGN KEY (`log_id`) REFERENCES `user_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`message_reciever`) REFERENCES `user_informations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`message_sender`) REFERENCES `user_informations` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`req_id`) REFERENCES `user_informations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`req_approved_by`) REFERENCES `user_informations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`req_from`) REFERENCES `user_informations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplied_materials`
--
ALTER TABLE `supplied_materials`
  ADD CONSTRAINT `supplied_materials_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `supplied_materials_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `supplied_materials_ibfk_3` FOREIGN KEY (`cid`) REFERENCES `store_users` (`cid`);

--
-- Constraints for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD CONSTRAINT `user_accounts_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_informations` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
