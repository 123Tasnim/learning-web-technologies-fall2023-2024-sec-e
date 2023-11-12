-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 11:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `cmplist`
--

CREATE TABLE `cmplist` (
  `category` varchar(20) NOT NULL,
  `subcat` varchar(20) NOT NULL,
  `complaintype` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `noc` varchar(20) NOT NULL,
  `complaintdetials` text NOT NULL,
  `compfile` mediumblob NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Sent',
  `comno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cmplist`
--

INSERT INTO `cmplist` (`category`, `subcat`, `complaintype`, `state`, `noc`, `complaintdetials`, `compfile`, `date`, `user`, `status`, `comno`) VALUES
('Category 1', 'Subcategory1', 'Complaint', 'State 2', 'real', 'population', '', '2023-11-12 21:38:45', 'samia', 'Cleared', 67),
('Category', 'Subcategory1', 'Complaint', 'State', 'real', ' accident  ', '', '2023-11-12 20:48:35', 'shayaan', 'Viewed', 69),
('Category', 'Subcategory1', 'Complaint', 'State', 'real', 'abcd', '', '2023-11-12 21:42:55', 'tasnim', 'Cleared', 65),
('Category', 'Subcategory1', 'Complaint', 'State', 'real', 'bike prlm', '', '2023-11-12 22:07:42', 'tasnim', 'Cleared', 68),
('Category 1', 'Subcategory1', 'Complaint', 'State 1', 'fake', 'bike', '', '2023-11-12 22:20:34', 'tasnim', 'Sent', 71),
('Category 1', 'Subcategory1', 'Complaint', 'State 1', 'real', 'abcsdsfewf', '', '2023-11-12 22:21:22', 'tasnim', 'Viewed', 70),
('Category 1', 'Subcategory1', 'Complaint', 'State 1', 'real', 'car accident', '', '2023-11-12 22:25:03', 'tasnim', 'Sent', 72),
('Category 1', 'Subcategory1', 'Complaint', 'State 1', 'fake', 'road accident', '', '2023-11-12 22:25:24', 'tasnim', 'Sent', 73),
('Category', 'Subcategory1', 'Complaint', 'State', 'real', 'acident', '', '2023-11-12 22:27:43', 'tasnim', 'Cleared', 74);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `access` char(1) NOT NULL DEFAULT 'u'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `pass`, `access`) VALUES
('samia', '456', 'u'),
('shayaan', '789', 'u'),
('shuara', '098', 'a'),
('tasnim', '123', 'u');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('unread','read') DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user`, `message`, `timestamp`, `status`) VALUES
(1, 'tasnim', 'Your Complaint has been Cleared', '2023-11-12 22:07:42', 'read'),
(2, 'tasnim', 'Your Complaint has been Viewed', '2023-11-12 22:21:22', 'read'),
(3, 'tasnim', 'Your Complaint has been Viewed', '2023-11-12 22:27:37', 'read'),
(4, 'tasnim', 'Your Complaint has been Cleared', '2023-11-12 22:27:43', 'read');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cmplist`
--
ALTER TABLE `cmplist`
  ADD PRIMARY KEY (`user`,`date`),
  ADD UNIQUE KEY `comno` (`comno`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `idx_user_id` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cmplist`
--
ALTER TABLE `cmplist`
  MODIFY `comno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
