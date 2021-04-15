-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 11:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `ordering` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `status`, `ordering`) VALUES
(213, 'member', 1, 995),
(214, 'admin', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `url` varchar(255) NOT NULL,
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`id`, `ip`, `url`, `time`) VALUES
(6, '::1', '/trainning/php_MYSQL/User_online/index.php', 1618473828),
(8, '::1', '/trainning/php_MYSQL/User_online/demo.php', 1618473828),
(9, '::1', '/trainning/php_MYSQL/User_online/index.php', 1618473828),
(10, '::1', '/trainning/php_MYSQL/User_online/index.php', 1618473828);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `usercol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `address`, `birthday`, `status`, `ordering`, `group_id`, `usercol`) VALUES
(1, 'anhtuan', 'dao', 'tuanda', 'tuanda@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'HN', '2021-04-20', 1, 1, 213, NULL),
(2, 'tuanda', 'tuanda', 'lol', 'lol@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '0000-00-00', NULL, NULL, 214, NULL),
(3, 'wayne', 'johnny', 'john', 'john@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'HN VIET NAME', '2021-04-05', 1, 5, 214, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
