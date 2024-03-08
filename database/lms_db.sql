-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 04:35 AM
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
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_start_date` datetime NOT NULL,
  `event_end_date` datetime NOT NULL,
  `category` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `calendar`
--

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
  `start_leave` varchar(255) NOT NULL,
  `end_leave` varchar(255) NOT NULL,
  `checked` varchar(255) DEFAULT NULL,
  `reason` varchar(225) NOT NULL,
  `date_request` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request_leave`
--

INSERT INTO `request_leave` (`leave_id`, `type_leave`, `start_leave`, `end_leave`, `checked`, `reason`, `date_request`, `user_id`) VALUES
(18, 2, '08/03/2024', '09/03/2024', 'Approved', 'sick', '07/03/2024', 23),
(21, 8, '08/03/2024', '09/03/2024', 'Approved', '', '07/03/2024', 22);

-- --------------------------------------------------------

--
-- Table structure for table `type_leave`
--

CREATE TABLE `type_leave` (
  `type_leave_id` int(11) NOT NULL,
  `type_leave_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `type_leave`
--

INSERT INTO `type_leave` (`type_leave_id`, `type_leave_name`) VALUES
(1, 'Vacation'),
(2, 'Sick leave'),
(3, 'Personal leave'),
(4, 'Maternity leave'),
(5, 'Paternity leave'),
(6, 'Bereavement leave'),
(7, 'Training leave'),
(8, 'Birthday'),
(9, 'Work from home');

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
(1, 'sopanha', 'sin', '$2y$10$k7n.pE8t91elY8dKMiROXOCOVEjlmOP/GlRtlOP44ZlWWC51Hes6e', 'sopanha@gmail.com', '', 'Male', 'Cambodia', 'admin', 1, '1000', 'Phnom Penh', '65e9ea58cbaec.jpg', 0),
(21, 'rin', 'youern', '$2y$10$ZzFmvwiy1GuHzPiGSuveM.eT1g9ltghm2bQBBNkv17VR6d08Qs9J6', 'rin@gmail.com', 'on', 'Male', 'Cambodia', 'manager', 1, '1000', 'Banteay Meanchey', '65e9e506c82ee.jpg', 0),
(22, 'chorn', 'handsome boy', '$2y$10$BPFxTfPN9OvTPJyJH5GPpORO/hhzRs0MFaeaxnunFxGIMcKFmmfjy', 'chorn@gmail.com', 'on', 'Male', 'Cambodia', 'employee', 1, '10000', 'Siem Reap', '65e9e9a81ca5d.jpg', 21),
(23, 'kimleang', 'cute', '$2y$10$C.Iw3GrRYdRahrIyFUjbK.fuxaw6elBzw8t.qHsqkoCo0gB3/u8YC', 'kimleang@gmail.com', 'on', 'Female', 'Cambodia', 'employee', 1, '1000', 'Banteay Meanchey', '65ea786c8ea16.jpg', 21),
(24, 'tey', 'cute', '$2y$10$VR96qM6furj4PtDmWvqAOOTNzsJb4GraI2NCuXWYHGaX.TaCv5OIa', 'tey@gmail.com', 'on', 'Female', 'English', 'employee', 1, '1000', 'Preah Vihear', '65e9ea2628d98.jpg', 21);

--
-- Indexes for dumped tables
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
  ADD KEY `type_leave` (`type_leave`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `calendar`
--
--
-- AUTO_INCREMENT for table `calendar`

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
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `type_leave`
--
ALTER TABLE `type_leave`
  MODIFY `type_leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request_leave`

-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
ADD CONSTRAINT `calendar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
--
ALTER TABLE `request_leave`
  ADD CONSTRAINT `request_leave_ibfk_1` FOREIGN KEY (`type_leave`) REFERENCES `type_leave` (`type_leave_id`),
  ADD CONSTRAINT `request_leave_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
