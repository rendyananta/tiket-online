-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 25, 2016 at 02:16 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket_online`
--
CREATE DATABASE IF NOT EXISTS `tiket_online` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tiket_online`;

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `name`, `code`, `created_at`) VALUES
(37, 'Sriwijaya Air', 'SRWJY', '2016-12-24 23:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `flight_schedules`
--

CREATE TABLE `flight_schedules` (
  `id` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `airline` int(11) NOT NULL,
  `origin` varchar(11) NOT NULL,
  `aim` varchar(11) NOT NULL,
  `departure` datetime NOT NULL,
  `arrival` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flight_schedules`
--

INSERT INTO `flight_schedules` (`id`, `code`, `airline`, `origin`, `aim`, `departure`, `arrival`, `price`, `capacity`, `available`, `created_at`) VALUES
(28, 'SRWJY0000000028', 37, 'Bandung', 'Surabaya', '2016-12-24 23:57:56', '2016-12-25 06:58:14', 500000, 95, 78, '2016-12-25 00:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `schedule` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `email`, `phone`, `schedule`, `code`, `amount`, `total`, `created_at`) VALUES
(6, 'Rendy', 'rendy@gmail.com', '085106593870', 28, 'SRWJY2800000006', 3, 1500000, '2016-12-25 16:07:45'),
(7, 'Rendy Ananta', 'rendyananta66@gmail.com', '085106593870', 28, 'SRWJY2800000007', 2, 1000000, '2016-12-25 19:35:55'),
(8, 'Om om telolet', 'telolet@telolet.com', '0832613813721', 28, 'SRWJY2800000008', 4, 2000000, '2016-11-25 19:36:54');

--
-- Triggers `transactions`
--
DELIMITER $$
CREATE TRIGGER `available_trigger_update` AFTER UPDATE ON `transactions` FOR EACH ROW UPDATE flight_schedules SET flight_schedules.available = flight_schedules.available - new.amount WHERE flight_schedules.id = new.schedule
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$N8ligido5hQ7V1aZ.VnpyOpNnlFPpcioJFRGdEeOISnJKmzG2MAXa', 'admin', '2016-12-25 06:53:59'),
(2, 'Staff Perusahaan', 'staff', '$2y$10$/m6TobaLz9w6qldBZq9Rr.7FO1xQpqv8.hqfTtc18mGfLh90sHt0K', 'staff', '2016-12-25 07:59:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `flight_schedules`
--
ALTER TABLE `flight_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_airline` (`airline`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_schedule` (`schedule`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `flight_schedules`
--
ALTER TABLE `flight_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight_schedules`
--
ALTER TABLE `flight_schedules`
  ADD CONSTRAINT `schedule_airline` FOREIGN KEY (`airline`) REFERENCES `airlines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transaction_schedule` FOREIGN KEY (`schedule`) REFERENCES `flight_schedules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
