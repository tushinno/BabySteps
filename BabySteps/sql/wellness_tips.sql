-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2025 at 06:38 PM
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
-- Table structure for table `wellness_tips`
--

CREATE TABLE `wellness_tips` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `tip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wellness_tips`
--

INSERT INTO `wellness_tips` (`id`, `category`, `subcategory`, `tip`) VALUES
(1, 'Foods to Avoid', 'Soft Cheeses', 'Avoid brie, camembert, blue cheese, ricotta, and feta as they may contain Listeria bacteria. Safe only if cooked to at least 75°C.'),
(2, 'Foods to Avoid', 'Soft Serve Ice Creams', 'Avoid soft serve ice creams as they are stored in temperatures that allow Listeria to grow.'),
(3, 'Foods to Avoid', 'Eggs', 'Avoid raw or undercooked eggs and dishes like homemade mayonnaise, aioli, mousses, or raw cake batters.'),
(4, 'Foods to Avoid', 'Raw Fish/Seafood', 'Avoid raw fish and seafood due to possible Listeria contamination.'),
(5, 'Foods to Avoid', 'Meats', 'Avoid liver, organs, raw meats, and cured meats due to vitamin A and bacterial risks.'),
(6, 'Foods to Avoid', 'Sesame Products', 'Avoid hummus, tahini, and halva as they can cause foodborne illness risks.'),
(7, 'Foods to Avoid', 'Drinks', 'Avoid alcohol, energy drinks, and limit caffeine to 200mg a day.'),
(8, 'Foods to Avoid', 'Fruits to Limit', 'Avoid pineapple (may induce early labor), eggplant (linked to eclampsia risk), papaya (may trigger contractions), and grapes (may cause hormonal imbalance).'),
(9, 'Foods to Avoid', 'Canned/Frozen Fruits', 'Avoid canned or frozen fruits when possible for freshness and safety.'),
(10, 'Foods Safe to Eat', NULL, 'Eat dairy made from pasteurized milk, thoroughly cooked eggs, and fish high in omega-3 fatty acids.'),
(11, 'Foods Safe to Eat', NULL, 'Include fiber-rich foods like oats, berries, and broccoli.'),
(12, 'Wellness', 'Factual Tips', 'Avoid carrying heavy items and long drives. Walking can help induce labor when close to due date.'),
(13, 'Wellness', 'Skin', 'Discoloration and acne are common during pregnancy. Wear sunscreen and apply oils like Bio-Oil for stretch marks. Avoid nail polish and removers due to chemicals.'),
(14, 'Wellness', 'Body Comfort', 'Wear slip-on shoes to support the feet. Choose loose clothing and bras for comfort.'),
(15, 'Wellness', 'Exercise & Movement', 'Move and lift slowly during exercise. Avoid standing or sitting too long to prevent varicose veins.'),
(16, 'Wellness', 'Sleep', 'Lie on your side with knees bent to relieve pressure and improve sleep. Take short naps for energy.'),
(17, 'Wellness', 'Leg Cramps', 'Stretch calf muscles before bed to reduce leg cramps.'),
(18, 'Vitamins & Nutrition', 'Calcium', 'Eat low-fat dairy, pasteurized cheese, yogurt, tofu, almonds, and green veggies like spinach and broccoli.'),
(19, 'Vitamins & Nutrition', 'Iron', 'Include red meat, poultry, salmon, eggs, dried fruits, and dark green vegetables.'),
(20, 'Vitamins & Nutrition', 'Folic Acid', 'Take 0.6mg folic acid daily to prevent birth defects like spina bifida.'),
(21, 'Weight Management', NULL, 'Gaining too much weight can cause diabetes, high blood pressure, or increase C-section risk. Maintain healthy weight for safe pregnancy and delivery.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wellness_tips`
--
ALTER TABLE `wellness_tips`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wellness_tips`
--
ALTER TABLE `wellness_tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
