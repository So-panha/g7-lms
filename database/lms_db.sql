-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 05:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`) VALUES
(1, 'IT'),
(2, 'PL'),
(3, 'English'),
(4, 'Training'),
(5, 'Social Development');

-- --------------------------------------------------------

--
-- Table structure for table `request_leave`
--

CREATE TABLE `request_leave` (
  `leave_id` int(11) NOT NULL,
  `type_leave` int(11) NOT NULL,
  `start_leave` date NOT NULL,
  `end_leave` date NOT NULL,
  `checked` varchar(255) DEFAULT NULL,
  `reason` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request_leave`
--

INSERT INTO `request_leave` (`leave_id`, `type_leave`, `start_leave`, `end_leave`, `checked`, `reason`, `user_id`) VALUES
(3, 2, '0000-00-00', '0000-00-00', 'Pending', 'hello', 4),
(4, 2, '0000-00-00', '0000-00-00', 'Pending', 'hello', 4),
(5, 7, '0000-00-00', '0000-00-00', 'Pending', 'request', 4);

-- --------------------------------------------------------

--
-- Table structure for table `type_leave`
--

CREATE TABLE `type_leave` (
  `type_leave_id` int(11) NOT NULL,
  `type_leave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `type_leave`
--

INSERT INTO `type_leave` (`type_leave_id`, `type_leave`) VALUES
(1, 'Vacation'),
(2, 'Sick leave'),
(3, 'Personal leave'),
(4, 'Maternity leave'),
(5, 'Paternity leave'),
(6, 'Bereavement leave'),
(7, 'Training leave');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sendInvite` varchar(10) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `position_id` int(11) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `place` varchar(200) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `manager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `password`, `email`, `sendInvite`, `gender`, `country`, `role`, `position_id`, `amount`, `place`, `picture`, `manager`) VALUES
(1, 'sopanha', 'sin', '$2y$10$k7n.pE8t91elY8dKMiROXOCOVEjlmOP/GlRtlOP44ZlWWC51Hes6e', 'sopanha@gmail.com', '', 'Male', 'Cambodia', 'admin', 1, '1000', 'Phnom Penh', '', 0),
(2, 'rin', 'reamlly', '$2y$10$hp/YnmOGdHdLYFXpny7JSuem5zP2aZ7NIvSaPaHDX7N4ZCSTONwLG', 'rin@gmail.com', 'on', 'Male', 'Cambodia', 'manager', 1, '10000', 'Banteay Meanchey', '', 0),
(4, 'phally', 'rin', '$2y$10$nl3114xMZJyW.VspBEwIWO/S7LAkGsjb8x7RNrTREKTcIawEzogz6', 'rineyblack@gmail.com', '1', 'male', 'Cambodia', 'employee', 1, '1000', 'Banteay Meanchey', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `calendar_user_id_foreign` (`user_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `request_leave`
--
ALTER TABLE `request_leave`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `request_leave_user_id_foreign` (`user_id`),
  ADD KEY `request_leave_type_leave_foreign` (`type_leave`);

--
-- Indexes for table `type_leave`
--
ALTER TABLE `type_leave`
  ADD PRIMARY KEY (`type_leave_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `users_position_id_foreign` (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request_leave`
--
ALTER TABLE `request_leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_leave`
--
ALTER TABLE `type_leave`
  MODIFY `type_leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `request_leave`
--
ALTER TABLE `request_leave`
  ADD CONSTRAINT `request_leave_type_leave_foreign` FOREIGN KEY (`type_leave`) REFERENCES `type_leave` (`type_leave_id`),
  ADD CONSTRAINT `request_leave_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
