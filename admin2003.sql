-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 01:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin2003`
--

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(2, 'Admin'),
(3, 'Author'),
(4, 'Editor'),
(5, 'Subscriber'),
(1, 'Superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_phone`, `user_email`, `user_username`, `user_password`, `role_id`, `user_photo`) VALUES
(1, 'Aminul Islam', '01654491921', 'aminul@gmail.com', 'aminul', '6512bd43d9caa6e02c990b0a82652dca', 1, 'user-1602502067-32761387.png'),
(2, 'Nazmul Khan', '0131231232', 'nazmul@gmail.com', 'nazmul', '6512bd43d9caa6e02c990b0a82652dca', 4, 'user-1602502119-53421021.jpg'),
(3, 'Saiful Islam', '01710721111', 'saiful@yahoo.com', 'saiful', '6512bd43d9caa6e02c990b0a82652dca', 1, 'user-1602502190-69429273.jpg'),
(4, 'Farhan Khan', '01977232322', 'farhan@gmail.com', 'farhan', '6512bd43d9caa6e02c990b0a82652dca', 5, ''),
(5, 'Masud Rana', '01988232343', 'masud@yahoo.com', 'masud', '6512bd43d9caa6e02c990b0a82652dca', 2, 'user-1602502273-43211800.jpg'),
(6, 'Jerry', '0186512121', 'jerry@yahoo.com', 'jerry', '6512bd43d9caa6e02c990b0a82652dca', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
