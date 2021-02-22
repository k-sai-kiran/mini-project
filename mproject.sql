-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 03:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_status`) VALUES
(1, 'Admin', 'admin@gmail.com', 'password', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(10) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_description` text NOT NULL,
  `project_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_description`, `project_status`) VALUES
(1, 'first', '<p>123</p>', 1),
(4, 'second', '<p>2</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(10) NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `task_issuedate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `dead_line` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `task_details` text NOT NULL,
  `task_project` int(10) NOT NULL,
  `task_receiver` int(10) NOT NULL,
  `task_sender` int(10) NOT NULL,
  `task_sender_name` varchar(50) NOT NULL,
  `task_sender_image` text NOT NULL,
  `task_display` int(10) NOT NULL DEFAULT 1,
  `task_status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_issuedate`, `dead_line`, `task_details`, `task_project`, `task_receiver`, `task_sender`, `task_sender_name`, `task_sender_image`, `task_display`, `task_status`) VALUES
(6, 'hello', '0000-00-00 00:00:00', '2020-11-28 22:39:00', '<p>2</p>', 1, 5, 1, 'ram', '', 1, 'pending'),
(7, '00', '0000-00-00 00:00:00', '2020-11-28 23:35:00', '<p>5662</p>', 1, 14, 1, 'ram', '', 1, 'pending'),
(9, '213', '2020-11-04 00:16:00', '2020-11-20 00:16:00', '<p>1124</p>', 1, 20, 1, 'ram', '', 1, 'pending'),
(11, '20', '2020-11-28 00:20:09', '2020-11-06 00:19:00', '<p>456845</p>', 1, 17, 1, 'ram', '', 1, 'working'),
(16, 'task2', '2021-02-18 16:28:16', '2021-02-24 13:30:00', '<p>two</p>', 1, 24, 23, 'user1', '', 1, 'working'),
(17, 'task3', '2021-02-18 11:59:57', '2021-02-24 13:00:00', '<p>three</p>', 1, 25, 24, 'user2', '', 1, 'pending'),
(18, 'task4', '2021-02-18 17:01:05', '2021-02-18 13:18:00', '<p>four</p>', 1, 27, 25, 'user3', '', 1, 'pending'),
(23, 'task1', '0000-00-00 00:00:00', '2021-02-18 13:20:00', '<p>one</p>', 1, 23, 1, 'Admin', '', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_status` int(10) NOT NULL,
  `user_gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`, `user_status`, `user_gender`) VALUES
(23, 'user1', 't', 'user1@gmail.com', '1234', 1, 'male'),
(24, 'user2', 't', 'user2@gmail.com', '1234', 1, 'male'),
(25, 'user3', 't', 'user3@gmail.com', '1234', 1, 'male'),
(27, 'user4', 't', 'user4@gmail.com', '1234', 1, 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
