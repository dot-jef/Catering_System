-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 08:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `catering_form`
--

CREATE TABLE `catering_form` (
  `ref_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `location` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `date_time` datetime NOT NULL,
  `occasion` varchar(255) NOT NULL,
  `equipment_pack` varchar(25) DEFAULT NULL,
  `food_pack` varchar(25) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catering_form`
--

INSERT INTO `catering_form` (`ref_no`, `user_id`, `username`, `email`, `full_name`, `phone_number`, `location`, `landmark`, `date_time`, `occasion`, `equipment_pack`, `food_pack`, `comment`, `status`) VALUES
(12, 20, 'username', 'user@gmail.com', 'Juan Dela Cruz', '09123456781', '----- phase 1 lot 1 sec 1 block 1', '7/12', '2024-08-28 13:18:00', 'wedding', 'package 4', 'Package 2', '', ''),
(13, 20, 'username', 'user@gmail.com', 'Juan Dela Cruz', '09123456781', 'inocencio phase 1 lot 1 sec 1 block 1', '7/12', '2024-09-01 19:21:00', 'Funeral', 'package 1', 'package 1', 'kupal', 'Pending'),
(14, 21, 'testagain', 'testuser@gmail.com', 'Juan Dela Cruz', '09123456781', 'inocencio phase 1 lot 1 sec 1 block 1', '7/12', '2024-08-14 05:26:00', 'anniversary', 'Package 2', 'package 4', 'try lang', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`contact_id`, `user_id`, `user_username`, `user_email`, `message`) VALUES
(1, 0, 'username', '', 'Hello'),
(2, 0, 'username', '', 'Hi'),
(3, 20, 'username', '', 'Hi'),
(4, 20, 'username', 'user@gmail.com', 'Grabe naman talaga'),
(5, 20, 'username', 'user@gmail.com', 'a'),
(6, 21, 'user', 'anotheruser@gmail.com', 'this is my message'),
(7, 21, 'user', 'anotheruser@gmail.com', 'this is my message'),
(8, 21, 'user', 'anotheruser@gmail.com', 'this is spartAAAA!!!'),
(9, 21, 'user', 'anotheruser@gmail.com', 'this is spartAAAA!!!'),
(10, 21, 'user', 'anotheruser@gmail.com', 'this is spartAAAA!!!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(16, 's', 'bealynearcilla@gmail.com', '$2y$10$Y3ZyFm8Xu472MAVXP0b5J.bc0e3NOd7kalhYy/fqUEm2PTN2wQybe', ''),
(17, 'arniel', 'arniel@gmail.com', '$2y$10$5ioOoT9MODU50XEfVfAMtO9lZB1/xbkht8xwxr7Y/9bcEJAsGjthq', ''),
(18, 'Admin', 'admin@gmail.com', '$2y$10$Okkm1BBG1EoVS6u/ydAJaeL99rLcdsUWIevceIkW3iEhusfriZvEK', 'admin'),
(19, 'sherwin', 'sherwin@gmail.com', '$2y$10$8R3vM8ewVj36g.SOmj7B6uqzmec6HsP9gOjyaBZ94LFvJUBjQKmde', 'user'),
(20, 'username', 'user@gmail.com', '$2y$10$t3dRz3PtFb0UV4uKG84MIeFWEzkXdNAeWjVQyM1IUQeyraKHnOq72', 'user'),
(22, 'useragain', 'useruser@gmail.com', '$2y$10$E23/faCwCyD18iJVLm1kGeCExLxITUDvyiKJFCSxuH/VNc0jSBWne', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catering_form`
--
ALTER TABLE `catering_form`
  ADD PRIMARY KEY (`ref_no`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catering_form`
--
ALTER TABLE `catering_form`
  MODIFY `ref_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
