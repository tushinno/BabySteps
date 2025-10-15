-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2025 at 07:23 PM
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
  `due_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `due_date`, `created_at`) VALUES
(1, 'mowm', 'mowm@gmail.com', '$2y$10$1PkKLpmVyJA5avjlgBAMMOeT/8P5Cz3anoiSsHaxdyyGw7b9vsgwq', '2025-10-05', '2025-10-15 22:45:44'),
(2, 'gabriela', 'gabriela@gmail.com', '$2y$10$3Y745mqGn6omPVzO7742X.FqRhgsnhcydDGNrOdRJ4m.dL.EBCeYe', '2025-12-10', '2025-10-16 01:16:47'),
(3, 'Waki', 'waki@example.com', 'wakiii', '2025-11-20', '2025-10-16 01:22:19'),
(4, 'Dani', 'dani@example.com', 'daniii', '2025-11-21', '2025-10-16 01:22:19'),
(5, 'Kaila', 'kaila@example.com', 'kailaaa!', '2025-11-22', '2025-10-16 01:22:19'),
(6, 'JJ', 'jj@example.com', 'jjnarvasa', '2025-11-23', '2025-10-16 01:22:19'),
(7, 'Vanju', 'vanju@example.com', 'vanjuuu', '2025-11-24', '2025-10-16 01:22:19'),
(8, 'Jilai', 'jilai@example.com', 'jilaiii', '2025-11-25', '2025-10-16 01:22:19'),
(9, 'Xayve', 'xayve@example.com', 'xayveee', '2025-11-26', '2025-10-16 01:22:19'),
(10, 'Potati', 'potati@example.com', 'potatiii', '2025-11-27', '2025-10-16 01:22:19'),
(11, 'Goldiee', 'goldiee@example.com', 'goldieee', '2025-11-28', '2025-10-16 01:22:19'),
(12, 'Cutieworld', 'cutieworld@example.com', 'cutieworld', '2025-11-29', '2025-10-16 01:22:19'),
(13, 'Dick', 'dick@example.com', 'dickkk', '2025-12-01', '2025-10-16 01:22:19'),
(14, 'Rotsin', 'rotsin@example.com', 'rotsinnn', '2025-12-02', '2025-10-16 01:22:19'),
(15, 'Ynna', 'ynna@example.com', 'ynnaaa', '2025-12-03', '2025-10-16 01:22:19'),
(16, 'Angie', 'angie@example.com', 'angieee', '2025-12-04', '2025-10-16 01:22:19'),
(17, 'Jayce', 'jayce@example.com', 'jayceee', '2025-12-05', '2025-10-16 01:22:19'),
(18, 'Lilo', 'lilo@example.com', 'lilooo', '2025-12-06', '2025-10-16 01:23:27'),
(19, 'Mika', 'mika@example.com', 'mikaaa', '2025-12-07', '2025-10-16 01:23:27'),
(20, 'Nova', 'nova@example.com', 'novaaa', '2025-12-08', '2025-10-16 01:23:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
