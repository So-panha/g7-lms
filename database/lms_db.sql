-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 09:39 AM
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

INSERT INTO `calendar` (`event_id`, `event_name`, `event_start_date`, `event_end_date`, `category`, `user_id`) VALUES
(6, 'Ut ad sit temporibus', '2024-03-12 00:00:00', '2024-03-13 00:00:00', 'bg-info', 1),
(7, 'Maiores sint magna d', '2024-03-24 08:00:00', '2024-03-24 09:00:00', 'bg-warning', 1),
(8, 'Ab vero pariatur Na', '2024-03-05 00:00:00', '2024-03-06 00:00:00', 'bg-info', 1),
(10, 'Aliqua Sunt fugiat', '2024-03-24 09:30:00', '2024-03-24 10:30:00', 'bg-warning', 1),
(11, 'Neque cupidatat moll', '2024-03-25 08:30:00', '2024-03-25 09:30:00', 'bg-danger', 1),
(12, 'Sed accusamus in dol', '2024-03-25 10:30:00', '2024-03-25 11:30:00', 'bg-info', 1),
(13, 'Atque velit et ut re', '2024-03-24 11:00:00', '2024-03-24 12:00:00', 'bg-primary', 1),
(14, 'Nihil perspiciatis', '2024-03-24 12:15:00', '2024-03-24 13:15:00', 'bg-success', 1);

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
  `process` varchar(255) DEFAULT NULL,
  `reason` varchar(225) NOT NULL,
  `date_request` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request_leave`
--

INSERT INTO `request_leave` (`leave_id`, `type_leave`, `start_leave`, `end_leave`, `checked`, `process`, `reason`, `date_request`, `user_id`) VALUES
(1, 1, '27/03/2024', '28/03/2024', 'Approved', 'progress', 'go home', '27/03/2024', 15),
(2, 2, '28/03/2024', '28/03/2024', 'Approved', 'progress', 'have a headach', '27/03/2024', 15),
(3, 1, '27/03/2024', '28/03/2024', 'Pending', 'cancel', 'fdsfdsfs', '27/03/2024', 15),
(4, 1, '27/03/2024', '28/03/2024', 'Rejected', 'progress', 'tertrete', '27/03/2024', 15),
(5, 1, '27/03/2024', '28/03/2024', 'Approved', 'progress', 'eewsf', '27/03/2024', 15),
(6, 2, '27/03/2024', '28/03/2024', 'Approved', 'progress', 'dffefdsfdsf', '27/03/2024', 15),
(7, 1, '27/03/2024', '28/03/2024', 'Approved', 'progress', 'fsdfdsds', '27/03/2024', 15);

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
  `otp` int(10) DEFAULT NULL,
  `sendInvite` varchar(10) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `position_id` int(11) NOT NULL,
  `position_name` varchar(50) DEFAULT NULL,
  `place` varchar(200) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `manager` int(11) NOT NULL,
  `day_can_leave` int(11) DEFAULT NULL,
  `taken` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `password`, `email`, `otp`, `sendInvite`, `gender`, `country`, `role`, `position_id`, `position_name`, `place`, `picture`, `manager`, `day_can_leave`, `taken`) VALUES
(1, 'sopanha', 'sin', '$2y$10$k7n.pE8t91elY8dKMiROXOCOVEjlmOP/GlRtlOP44ZlWWC51Hes6e', 'sopanha@gmail.com', 374125, '', 'Male', 'Cambodia', 'admin', 1, NULL, 'Phnom Penh', '65e9ea58cbaec.jpg', 0, NULL, 0),
(2, 'Rin', 'kim', '$2y$10$KdLvYUBiDsfFUUH.3UmEZeFGAzx28NM4bC7S1l7Ij8uNgxOwSSLgm', 'rin@gmail.com', NULL, '', 'Male', '', 'manager', 1, 'Header IT', '', '66022106dd3f1.jpg', 0, 2, 0),
(3, 'KIm', 'Leang', '$2y$10$WvRiUxn3/BkznFMhl/vbZepQGMtfDEfntvvOt2A7vfXSScO.aH9E6', 'kimleang@gmail.com', NULL, '', 'Female', '', 'manager', 3, 'Header English', '', '6602217e93131.jpg', 0, 2, 0),
(4, 'votey', 'chhoeurn', '$2y$10$slzEopjOslLp5.s7GETjSejCh9nRKJiyAmRWfnb.9lng5h0ajAGsu', 'votey@gmail.com', NULL, '', 'Female', '', 'manager', 2, 'Header PL', '', '66022161aec27.jpg', 0, 2, 0),
(5, 'Chorn', 'Chorn', '$2y$10$MJ9UDmawhZrSEed8XA4Ws.phgPjXxWy0Sk8h03XhSt6QeREX6P9b.', 'Chorn@gmail.com', NULL, '', 'Male', '', 'manager', 4, 'Header Training', '', '6602212881f27.jpg', 0, 2, 0),
(6, '', '', '$2y$10$hq0Na.jLj3q5Aag7tu8Zl.qRUCRdB49uXamz/h7dNkszq6/wQh8UW', 'thida@gmail.com', NULL, '', 'Female', '', 'manager', 3, '', '', 'female.jpg', 3, 2, 0),
(7, 'Many', 'Dia', '$2y$10$WHyW5mSEZGo6rwrjih9qjeGgS1skt7BQBLkBkPMAT9ZU2wkPxhErS', 'many@gmail.com', NULL, '', 'Female', '', 'manager', 2, 'Teach', '', '6603f0142cd61.jpeg', 4, 2, 0),
(8, 'Dara', 'Kim', '$2y$10$kCaawoOwpgqS1c2LN3ws1OoLtsX4/AIBrfsp5rdYSvTPcCNeFtRLe', 'dara@gmail.com', NULL, '', 'Male', '', 'manager', 4, 'Teach', '', 'man.png', 5, 2, 0),
(9, 'Cheda', 'Him', '$2y$10$U1bVbm.w4HLz9qmGvPhHWO3nCTBeNPfTbs2QAurLN/BnL8oqD/z6e', 'cheda@gmail.com', NULL, '', 'Male', '', 'manager', 1, 'Trainer PHP', '', 'man.png', 2, 2, 0),
(12, 'chanda', 'sem', '$2y$10$mX7.oH6v.aTWbB69/2jy6e9/TP46kLYp0wYf0oh.5CtvoNHKRBp6q', 'da@gmail.com', NULL, '', 'Female', '', 'employee', 1, 'teacher', '', 'female.jpg', 9, 2, 0),
(13, 'chanthou', 'va', '$2y$10$XqYacBj0gR720I8r0jw9g.y6GmTg2qpf87J5.uP9obJj005rLt1oa', 'va@gmail.com', NULL, '', 'Male', '', 'employee', 1, 'teacher', '', 'man.png', 9, 2, 0),
(14, 'mala', 'meng', '$2y$10$Z6c/tAKz.eFyrzRAu1BHhOJsTlI1PeGpxYHY2/SL3dhTYzvRrBeaC', 'la@gmail.com', NULL, '', 'Female', '', 'employee', 1, 'teacher', '', 'female.jpg', 9, 2, 0),
(15, 'sally', 'dy', '$2y$10$YsaUlULeL2OIFHiwR6uc7upjxHjdzWqoFNPEM8K8cH9FCHSs964GO', 'sally@gmail.com', NULL, '', 'Female', '', 'employee', 2, 'teacher', '', 'female.jpg', 7, -1, 1),
(16, 'sakong', 'van', '$2y$10$gsOtbNT4rhRz0qmm0a2dNOmAJ5NSJ7suH7uhvBAR1M.i5TqRBjm.m', 'sakong@gmail.com', NULL, '', 'Male', '', 'employee', 2, 'teacher', '', 'man.png', 7, 2, 0),
(17, 'vanda', 'keam', '$2y$10$.4monrhXLbBXGxrF1iYZuuys.S7NBJx0mGrSRw5gtcZjGx4imBYZO', 'vanda@gmail.com', NULL, '', 'Male', '', 'employee', 2, 'teacher', '', 'man.png', 7, 2, 0),
(18, 'hong', 'heng', '$2y$10$Se/ktPp26RlDTsQX5NUVwOpNsko0vYgzWRx3DCXXNWjV7mLNicghe', 'hong@gmail.com', NULL, '', 'Male', '', 'employee', 3, 'teacher', '', 'man.png', 6, 2, 0),
(19, 'fongki', 'meng', '$2y$10$N0Ca41RRbj0otvwHMuduouqemNhJX0jMt2qUl0Sf2Rv2miMWERh8S', 'fong@gmail.com', NULL, '', 'Male', '', 'employee', 3, 'teacher', '', 'man.png', 6, 2, 0),
(20, 'chandy', 'thou', '$2y$10$sgtkXuY9dEc9PlLlZsAGi.9BtK7z6yJ2pqcegxBpXrBq/XYYan5PS', 'chandy@gmail.com', NULL, '', 'Female', '', 'employee', 3, 'teacher', '', 'female.jpg', 3, 2, 0),
(21, 'vany', 'chan', '$2y$10$9Zua9k7OTG2kYzw2xnXWwOMex7BP2sqs2OgaAvFHNHBB.N0DCkyze', 'vanny@gmail.com', NULL, '', 'Female', '', 'employee', 4, 'teacher', '', 'female.jpg', 8, 2, 0),
(27, 'Cha', 'Em', '$2y$10$ALuu4mzz9wi9NEc23.wrYuw.m4dMChU9IrDhTLc09hTAmhdgygF.2', 'chaem@gmail.com', NULL, '', 'Male', '', 'employee', 4, 'Teacher', '', 'man.png', 5, 2, 0),
(30, 'Sim', 'Sim', '$2y$10$1/QXDGvUGYMt2oy3hVMrkugUwhGPyfxVj69E5GSsPJvmMIkSnasDq', 'Sim@gmail.com', NULL, '', 'Male', '', 'manager', 5, 'Header Social Development', '', 'man.png', 0, 2, 0),
(31, 'Dara', 'KIm', '$2y$10$rKBgJO.lPR7pODO7DIcCJ.7sbv8zvV2R75bE0PU9IWnGf9CkXjj62', 'sopanha.sin@student.passerellesnumeriques.org', 820805, '', 'Male', '', 'employee', 1, 'Teach HTML', '', 'man.png', 9, 2, 0);

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
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request_leave`
--
ALTER TABLE `request_leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `type_leave`
--
ALTER TABLE `type_leave`
  MODIFY `type_leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
