-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 08:28 AM
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
('Category 1', 'Subcategory1', 'Complaint', 'State 1', 'real', 'abcsdsfewf', '', '2023-11-12 22:21:22', 'tasnim', 'Viewed', 70),
('Category', 'Subcategory1', 'Complaint', 'State', 'real', 'acident', '', '2023-11-12 22:27:43', 'tasnim', 'Cleared', 74),
('Category 1', 'Subcategory1', 'Complaint', 'State 1', 'real', 'car accident', '', '2023-11-13 05:02:54', 'tasnim', 'Cleared', 72),
('Category 2', 'Subcategory2', 'General Query', 'State 2', 'fake', 'enviroment problem', '', '2023-11-13 05:07:46', 'tasnim', 'Viewed', 78),
('Category 2', 'Subcategory1', 'Complaint', 'State 1', 'real', 'car damage', '', '2023-11-13 07:02:08', 'tasnim', 'Viewed', 82),
('Category', 'Subcategory1', 'Complaint', 'State', 'real', 'car ', '', '2023-11-13 07:02:15', 'tasnim', 'Cleared', 83),
('Category 1', 'Subcategory1', 'Complaint', 'State 1', 'real', 'road construction', '', '2023-11-21 10:27:23', 'tasnim', 'Cleared', 79),
('Category 1', 'Subcategory1', 'Complaint', 'State 1', 'real', 'floating problem', '', '2023-11-21 10:27:37', 'tasnim', 'Cleared', 80),
('Category 1', 'Subcategory1', 'General Query', 'State 2', 'real', 'road mapping', '', '2023-11-21 10:28:20', 'tasnim', 'Cleared', 81),
('Category', 'Subcategory1', 'Complaint', 'State', 'fake', 'population a and', '', '2023-11-26 13:15:53', 'tasnim', 'Viewed', 88),
('Category 1', 'Subcategory1', 'Complaint', 'State 1', 'real', 'bike', '', '2023-11-26 13:16:01', 'tasnim', 'Viewed', 87),
('Category 1', 'Subcategory1', 'Complaint', 'State 2', 'real', 'pollution ', '', '2023-11-26 13:28:17', 'tasnim', 'Cleared', 89),
('Category 2', 'Subcategory1', 'Complaint', 'State 1', 'fake', 'yrfugkghkhlknl', '', '2023-11-26 15:25:18', 'tasnim', 'Cleared', 90),
('Category 1', 'Subcategory1', 'Complaint', 'State 1', 'fake', 'sqwdewfergr', '', '2023-11-26 15:25:58', 'tasnim', 'Cleared', 91),
('Category 1', 'Subcategory2', 'Complaint', 'State 1', 'real', ' problem', '', '2023-11-26 16:36:27', 'tasnim', 'Cleared', 93),
('Category 1', 'Subcategory2', 'Complaint', 'State 1', 'real', 'hkjagkjada', '', '2023-11-26 18:26:18', 'tasnim', 'Cleared', 94),
('Category 1', 'Subcategory1', 'General Query', 'State 1', 'real', 'an', '', '2023-11-27 07:25:48', 'tasnim', 'Sent', 97),
('Category 1', 'Subcategory1', 'Complaint', 'State 1', 'fake', 'kahskahdkahk', '', '2023-11-28 09:33:44', 'tasnim', 'Sent', 98);

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
('admin', '123', 'a'),
('samia', '456', 'u'),
('shayaan', '789', 'u'),
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
(4, 'tasnim', 'Your Complaint has been Cleared', '2023-11-12 22:27:43', 'read'),
(5, 'tasnim', 'Your Complaint has been Viewed', '2023-11-13 05:02:23', 'read'),
(6, 'tasnim', 'Your Complaint has been Cleared', '2023-11-13 05:02:54', 'read'),
(7, 'tasnim', 'Your Complaint has been Viewed', '2023-11-13 05:07:46', 'read'),
(8, 'tasnim', 'Your Complaint has been Viewed', '2023-11-13 07:01:38', 'read'),
(9, 'tasnim', 'Your Complaint has been Viewed', '2023-11-13 07:02:08', 'read'),
(10, 'tasnim', 'Your Complaint has been Cleared', '2023-11-13 07:02:15', 'read'),
(11, 'tasnim', 'Your Complaint has been Viewed', '2023-11-21 10:24:57', 'read'),
(12, 'tasnim', 'Your Complaint has been Viewed', '2023-11-21 10:26:01', 'read'),
(13, 'tasnim', 'Your Complaint has been Cleared', '2023-11-21 10:27:23', 'read'),
(14, 'tasnim', 'Your Complaint has been Viewed', '2023-11-21 10:27:27', 'read'),
(15, 'tasnim', 'Your Complaint has been Cleared', '2023-11-21 10:27:37', 'read'),
(16, 'tasnim', 'Your Complaint has been Viewed', '2023-11-21 10:28:12', 'read'),
(17, 'tasnim', 'Your Complaint has been Cleared', '2023-11-21 10:28:20', 'read'),
(18, 'tasnim', 'Your Complaint has been Viewed', '2023-11-26 13:15:53', 'read'),
(19, 'tasnim', 'Your Complaint has been Viewed', '2023-11-26 13:16:01', 'read'),
(20, 'tasnim', 'Your Complaint has been Viewed', '2023-11-26 13:28:03', 'read'),
(21, 'tasnim', 'Your Complaint has been Cleared', '2023-11-26 13:28:17', 'read'),
(22, 'tasnim', 'Your Complaint has been Viewed', '2023-11-26 15:25:11', 'read'),
(23, 'tasnim', 'Your Complaint has been Viewed', '2023-11-26 15:25:12', 'read'),
(24, 'tasnim', 'Your Complaint has been Cleared', '2023-11-26 15:25:18', 'read'),
(25, 'tasnim', 'Your Complaint has been Cleared', '2023-11-26 15:25:58', 'read'),
(26, 'tasnim', 'Your Complaint has been Viewed', '2023-11-26 16:36:21', 'read'),
(27, 'tasnim', 'Your Complaint has been Cleared', '2023-11-26 16:36:27', 'read'),
(28, 'tasnim', 'Your Complaint has been Viewed', '2023-11-26 18:25:25', 'read'),
(29, 'tasnim', 'Your Complaint has been Cleared', '2023-11-26 18:26:18', 'read');

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
  MODIFY `comno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
