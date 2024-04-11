-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2024 at 12:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FDCJoelitoNCWeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `recipient_id` int(10) UNSIGNED DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_ip` varchar(25) DEFAULT NULL,
  `modified_ip` varchar(25) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `recipient_id`, `message`, `created_ip`, `modified_ip`, `created`, `modified`) VALUES
(1, 3, 12, 'asdf', '127.0.0.1', NULL, '2024-04-09 09:21:24', '2024-04-09 09:21:24'),
(2, 3, 12, 'fasdf', '127.0.0.1', NULL, '2024-04-09 09:21:34', '2024-04-09 09:21:34'),
(3, 3, 12, 'adsf', '127.0.0.1', NULL, '2024-04-09 09:24:22', '2024-04-09 09:24:22'),
(6, 3, 4, 'jjkfkasdfla', '127.0.0.1', NULL, '2024-04-09 09:41:35', '2024-04-09 09:41:35'),
(20, 3, 4, 'ehyou', '127.0.0.1', NULL, '2024-04-09 10:44:36', '2024-04-09 10:44:36'),
(21, 4, 3, 'fadf', '::1', NULL, '2024-04-09 11:22:21', '2024-04-09 11:22:21'),
(22, 3, 2, 'Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> Hello, World <script>console.log(\'Hello, World\');</script> ', '127.0.0.1', NULL, '2024-04-09 11:25:35', '2024-04-09 11:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hobby` text DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `birthdate`, `gender`, `email`, `hobby`, `profile_pic`, `password`, `last_login_time`, `created`) VALUES
(1, 'Joma Tech', '2024-04-09', 'male', 'joma@gmail.com', 'asdf', '6613bf5895004_profile.png', '93477851451f6583c7efd383e715cb6f8accb804', '2024-04-08 11:40:31', '2024-04-03 05:55:45'),
(2, 'Fireship', '2000-04-10', 'female', 'fireship@gmail.com', 'Hello, World. Hello, World. Hello, World. Hello, World. Hello, World. Hello, World. Hello, World. Hello, World. Hello, World. Hello, World. Hello, World. ', '661481a3dc7e8_profile.png', '93477851451f6583c7efd383e715cb6f8accb804', '2024-04-09 02:18:40', '2024-04-03 05:56:20'),
(3, 'Traversy', '2000-02-08', 'male', 'traversy@gmail.com', 'Creating youtube content.', '661482bbe260a_profile.jpg', '93477851451f6583c7efd383e715cb6f8accb804', '2024-04-09 04:53:05', '2024-04-03 05:56:46'),
(4, 'George Town', '2000-02-11', 'female', 'webdev@gmail.com', 'I sleep all day and party all night.', '6613b6233f2c4_profile.png', '93477851451f6583c7efd383e715cb6f8accb804', '2024-04-09 09:36:45', '2024-04-04 03:49:25'),
(12, 'John Doe', '2000-04-10', 'male', 'johndoe@gmail.com', 'Thank you!', '66149154d0c0e_profile.jpg', '93477851451f6583c7efd383e715cb6f8accb804', '2024-04-09 02:45:57', '2024-04-08 11:33:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
