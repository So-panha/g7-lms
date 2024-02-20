-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 06:58 PM
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
-- Database: `lms_database`
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
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reques_leave`
--

CREATE TABLE `reques_leave` (
  `leave_id` int(11) NOT NULL,
  `tyle_leave` int(11) NOT NULL,
  `start_leave` date NOT NULL,
  `end_leave` date NOT NULL,
  `alert` tinyint(1) NOT NULL,
  `reason` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `place` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `password`, `email`, `sendInvite`, `gender`, `country`, `role`, `position_id`, `amount`, `place`) VALUES
(4, 'Cameron Conner', 'Bryar Michael', '$2y$10$BQBHOfraj9RELYUCRm.hAurhXRj7yyTCexvJ9uCD0cJ/f1Uv6rFHC', 'gymymopygo@mailinator.com', 'on', 'Male', 'Cambodia', 'manager', 3, '61', 'Koh Kong'),
(7, 'Mufutau Morales', 'Maggie Bryan', 'Pa$$w0rd!', 'toju@mailinator.com', 'on', 'Female', 'Cambodia', 'manager', 1, '55', 'Svay Rieng'),
(8, 'Sonia Glover', 'Rhonda Cole', '$2y$10$11I1hwHspvw/o4g8jzuZYuG/MlKXv78M2GThHDbBwR63Yxh1gqtv.', 'nofob@mailinator.com', '', 'Female', 'English', 'admin', 1, '11', 'Siem Reap'),
(17, 'Wilma Carson', 'Yuli Copeland', '$2y$10$3vefBi8bftYmVJEwJd4EDe.DbdB90Tvf3f1Si.RSxeEyhaAmHygce', 'pupugaho@mailinator.com', 'on', 'Male', 'English', 'manager', 2, '61', 'Kandal'),
(18, 'Desiree Ingram', 'Raja Erickson', '$2y$10$nGo1QG7uCh1vWGaZ8qi5qu6sS3FbQVNx7DJm/TShUFWK67nu3VlAS', 'jydaci@mailinator.com', '', 'Female', 'Country of employee', 'Role', 3, '40', 'Preah Sihanouk'),
(19, 'Madeson Mccarthy', 'Hiroko Poole', '$2y$10$GCVZeViCDJz3BlSos7TNp.2aUw7p84gU0eF/.nIQRfV8ZWpy4ulX.', 'vuwyhug@mailinator.com', '', 'Female', 'France', 'Role', 4, '8', 'Koh Kong'),
(26, 'Colette Spence', 'Emily Alford', '$2y$10$X7diCsUoFMcxSya8eFfiwOlxp7OK5IUTd69FOwKkQ6ipEZhWgnFvS', 'tydynuz@mailinator.com', 'on', 'Male', 'Country of employee', 'manager', 2, '98', 'Phnom Penh'),
(27, 'Jescie Wade', 'Amethyst Stevenson', '$2y$10$moexRIPdWQKb974hcA/AZ.k34n.kZIszQW/5jDE3zfMNQRK9N0AAO', 'tagogu@mailinator.com', 'on', 'Male', 'Country of employee', 'manager', 1, '86', 'Siem Reap'),
(28, 'Beatrice Vargas', 'Ayanna Scott', '$2y$10$Sct6QR.uKfOkEGa4nHwUMOwExkWKjSJg9SN5cUXQwS/qnG347zA6W', 'camahas@mailinator.com', '', 'Male', 'Cambodia', 'employee', 3, '27', 'Koh Kong'),
(31, 'Bevis Bird', 'Xaviera Mays', '$2y$10$rg9PGVAnAgJwZuIbWBnHzOZUg1ivusemUNpvv0u74VbOSrOXejNG6', 'huwipyc@mailinator.com', 'on', 'Male', 'France', 'admin', 3, '95', 'Takeo'),
(38, 'Phelan Torres', 'Wayne Berger', '$2y$10$h1PCppJqKtz0ODIBrJNUOeGq9UKTDrWex7ekwuqXt.PpzmI6o2rCK', 'cyvem@mailinator.com', 'on', 'Male', 'Country of employee', 'admin', 2, '72', 'Tbong Khmom'),
(40, 'sopanha', 'sin', '$2y$10$k7n.pE8t91elY8dKMiROXOCOVEjlmOP/GlRtlOP44ZlWWC51Hes6e', 'sopanha@gmail.com', '', 'Male', 'Cambodia', 'admin', 1, '1000', 'Phnom Penh'),
(41, 'Elton Lee', 'Forrest Savage', '$2y$10$EjLyPUOYnY/5XjL2KoY/lO1W6zcvf5KlQNaGTUBPC30.vN1kHE/ou', 'zamezig@mailinator.com', '', 'Female', 'Country of employee', 'admin', 2, '76', 'Kampong Speu'),
(42, 'rin', 'youern', '$2y$10$q5iiImlhwxq/mFIQ4iPVPOMmlE/q5ApYJfQxjTzJjA050J7xuZ6UG', 'rin.youern@student.passerellenumeriques.org', 'on', 'Male', 'Cambodia', 'admin', 1, '1234', 'Banteay Meanchey'),
(56, 'dara', 'sin', '$2y$10$n1AhDfFgLlJtLusDSXx9yOACTcoJmvUSc12XEAeYpTkV0o03YmU0G', 'daradd@gmail.com', 'on', 'Male', 'Cambodia', 'admin', 1, '8900', 'Banteay Meanchey'),
(57, 'phally', 'change', '$2y$10$HW/CczrkMI8IMx/Cjdnnre22TkZK8mRE7RJuxpAQXMhdLq/Yt95nS', 'phally@gmail.com', 'on', 'Female', 'Cambodia', 'admin', 1, '1000', 'Banteay Meanchey');

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
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profile_user_id_foreign` (`user_id`);

--
-- Indexes for table `reques_leave`
--
ALTER TABLE `reques_leave`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `reques_leave_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_fname_unique` (`fname`),
  ADD KEY `users_position_foreign` (`position_id`);

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
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reques_leave`
--
ALTER TABLE `reques_leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reques_leave`
--
ALTER TABLE `reques_leave`
  ADD CONSTRAINT `reques_leave_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_position_foreign` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
