-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2025 at 11:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_babysteps`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `due_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `due_date`, `created_at`) VALUES
(1, 'Mother 1', 'mother1@gmail.com', '$2y$10$19zFQlL7MBFgWcOoigOW4uGaI6NSnWAB6Eil0Wxo0Ykj5NLI8bxQq', NULL, '2025-10-04 18:38:39'),
(2, 'Waki', 'joaqee@gmail.com', '$2y$10$MHCn9qGr9/5rl/vAjHSS2O5OdSfpdRUwyLnf29u1ZZBQQrOOr/bKK', NULL, '2025-10-04 20:52:48'),
(3, 'kaila', 'kaila@gmail.com', '$2y$10$cC5gtIVJUHyetbtxyZNRbOx81rbBpU0ENAgv.QlJCfEfPtOlvhpv6', NULL, '2025-10-04 20:53:03'),
(4, 'daniwen', 'daniwen@gmail.com', '$2y$10$xxQJVYRpB26QUGot3ByAJOX7nOtBizCSq35PcOTs7Rtwv7nvYUblW', NULL, '2025-10-04 20:53:18'),
(15, 'dick', 'dick@gmail.com', '$2y$10$ZYhHIInKtEGZkc9Ss2nYIOl6KqMrIkTFzJyLH.1ZFaj8jlY89YXka', '2026-01-01', '2025-10-09 05:34:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
