-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2025 at 11:53 PM
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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `due_date`, `created_at`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$oZo9BRQQtnQlKGsFPiTisuL9pgawKrjmOftkYrhKNRyNEnzBnlh0y', '2026-03-05', '2025-10-17 00:40:16', 'admin'),
(2, 'Waki', 'waki@gmail.com', '$2y$10$PinjvXJ3jNJqkK3I59xOnuEI8FQcioVstmnd7CUFnxTtmbpLXY81y', '2025-12-12', '2025-10-17 00:43:39', 'admin'),
(3, 'Dani', 'dani@gmail.com', '$2y$10$pgZJmbm//ORg66vfQ/J4c.G1m7nzzOX54TDB/.S8JKHrpQFriQhG.', '2025-11-21', '2025-10-17 00:44:12', 'admin'),
(4, 'Kaila', 'kaila@gmail.com', '$2y$10$xQ5pi0X4F8EtdGozgTAnCuk7oM0HKizVG5xi6F3.1zY.Uq5zlVWCK', '2025-11-20', '2025-10-17 00:44:38', 'admin'),
(5, 'jjnarvasa', 'jjnarvasa@gmail.com', '$2y$10$V7sQlCBi0qZYrGop0rapwuTksO9sn6hVzzux6PBMsXZh2kQABQUcO', '2025-11-23', '2025-10-17 00:45:44', 'user'),
(6, 'Vanju', 'vanju@gmail.com', '$2y$10$TKtmS./KGUAi4dmAiwubSun8Daueqm6/fbJWO0BzzPFTUgBZYX8OK', '2025-11-24', '2025-10-17 00:46:14', 'user'),
(7, 'Jilai', 'jilai@gmail.com', '$2y$10$iTlhd1wt/dEWG1.CalNQr.uxmKdlWHJUTYpviymIBTbmFCXu1paoS', '2025-11-24', '2025-10-17 00:46:57', 'user'),
(8, 'Xayve', 'xayve@gmail.com', '$2y$10$w35fLlduUtexKQvFLGqFKuQXD1vY2TIwgstOP8iix3llXCFcJoeay', '2025-11-26', '2025-10-17 00:47:49', 'user'),
(9, 'Potati', 'potati@gmail.com', '$2y$10$0dqycu2ok9orrdvCJkdp/e92ixmZP6o75YhZ9LnLBiQyFfUfIDflS', '2025-11-27', '2025-10-17 00:48:23', 'user'),
(10, 'Goldie', 'goldie@gmail.com', '$2y$10$yyt2mdVCD56BQra3PThgP.rlMyYOsYa2lkqT6IX/ajLpJqlShOHhW', '2025-11-28', '2025-10-17 00:48:56', 'user'),
(11, 'CutieWorld', 'cutieworld@gmail.com', '$2y$10$lOzRECm9Oad9xGoVkKdr3ezhNLrfXg9bNlOX0CVsjtX0e9dkO5H2G', '2025-11-29', '2025-10-17 00:49:39', 'user'),
(12, 'Dick', 'dick@gmail.com', '$2y$10$g5c0BZkwJ8K7XLBR1Xb35upuLAs8ui/mBRs/dVzXq8UACP.NvUZIq', '2025-12-01', '2025-10-17 00:50:29', 'user'),
(13, 'Rotsin', 'rotsin@gmail.com', '$2y$10$W4UsWJrKpn3Fzix8cK3mde6YApF.6fxxi6QAI75flBVJopaRF4qkS', '2025-12-01', '2025-10-17 00:51:17', 'user'),
(14, 'Irish', 'irish@gmail.com', '$2y$10$Cdk495MucL/.E4HjnW1KX.ZG9I6LT8gMd3YfNwajKYKHw0ADlyDD2', '2025-12-03', '2025-10-17 00:52:11', 'user'),
(15, 'Zyrille', 'zyrille@gmail.com', '$2y$10$nO0HdWifP76fFDd6dxD.Xe3Z08K4b/T/pVVUFyR0IwM5EDcjfaGUe', '2025-12-05', '2025-10-17 00:53:07', 'user'),
(16, 'Cassandra', 'cassandra@gmail.com', '$2y$10$SGenqT2y.6EzMvLzzIKH3epiViqegsj4CUH18FkqLuX5hNUJfqeWS', '2025-12-05', '2025-10-17 01:09:19', 'user'),
(17, 'Alana', 'alana@gmail.com', '$2y$10$MjUPO.gZKGmO4Zz3DYh3gukoI/3aCSpN7zBlN4lcaKEtEDoqK86/.', '2025-12-05', '2025-10-17 01:09:47', 'user'),
(18, 'Kirby', 'kirby@gmail.com', '$2y$10$RBsewljlGmSRAzKl7Hz79O2z3a3yeZG4MOXrZcVKpgZ9Mzd4xCSGm', '2026-10-12', '2025-10-17 01:10:20', 'user'),
(19, 'Angie', 'angie@gmail.com', '$2y$10$mTT/IJiOEwDlX6qetZslR.bhg6oPJZWVuOVVpBQAvVKbhSzWW7Ob2', '2025-12-12', '2025-10-17 01:11:25', 'user'),
(20, 'Manato', 'manato@gmail.com', '$2y$10$3SrWYdStf0hY84b09EQlE.Y0AAGg.zGD8smlGsEEgxEBwYiGENZ8u', '2025-12-12', '2025-10-17 01:12:17', 'user');

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
