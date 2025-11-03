-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2025 at 10:07 PM
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
-- Table structure for table `journal_entries`
--

CREATE TABLE `journal_entries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journal_entries`
--

INSERT INTO `journal_entries` (`id`, `user_id`, `title`, `content`, `created_at`) VALUES
(11, 2, 'goldeh', 'baby', '2025-10-18 03:18:41'),
(13, 20, '1dw1', 'd1d1qweqweqwe', '2025-10-20 03:45:00'),
(15, 26, 'da', 'asdaadsa', '2025-10-25 14:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` int(11) NOT NULL,
  `week_number` tinyint(4) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`id`, `week_number`, `description`) VALUES
(1, 1, 'Pregnancy just beginning — your body is getting ready for ovulation and fertilization.'),
(2, 2, 'The egg prepares to meet the sperm — fertilization may happen soon.'),
(3, 3, 'Fertilization happens — the baby starts as a tiny group of cells that will grow fast.'),
(4, 4, 'Embryo implants in the uterus — about the size of a poppy seed.'),
(5, 5, 'Baby’s heart and brain begin to form — about the size of a sesame seed.'),
(6, 6, 'Baby’s heart may start beating — about the size of a lentil (¼ inch).'),
(7, 7, 'Arms and legs begin to form — about the size of a blueberry (½ inch).'),
(8, 8, 'Baby’s face starts forming — about the size of a raspberry (over ½ inch).'),
(9, 9, 'Baby looks more like a tiny human with fingers and toes — about the size of a grape.'),
(10, 10, 'Major organs developing quickly — about the size of a strawberry.'),
(11, 11, 'Baby can move slightly — about the size of a fig.'),
(12, 12, 'Reflexes begin — about the size of a lime (≈2 inches).'),
(13, 13, 'Second trimester begins — baby about the size of a plum (≈2½ inches).'),
(14, 14, 'Baby can make small facial expressions — about the size of a lemon.'),
(15, 15, 'Bones strengthening — about the size of an apple.'),
(16, 16, 'You might feel flutters soon — baby about the size of an avocado.'),
(17, 17, 'Baby can hear sounds — about the size of a turnip/singkamas.'),
(18, 18, 'Fingerprints form — about the size of a bell pepper.'),
(19, 19, 'You may start feeling kicks — about the size of a pomegranate.'),
(20, 20, 'Halfway point — baby about the size of a banana.'),
(21, 21, 'Baby can swallow — about the size of a mango.'),
(22, 22, 'Eyes and lips more defined — about the size of a sweet potato.'),
(23, 23, 'Skin becomes less see-through — about the size of a grapefruit.'),
(24, 24, 'Lungs developing — about the size of an ear of corn.'),
(25, 25, 'Hair may start to grow — about the size of an acorn squash.'),
(26, 26, 'Baby reacts to your voice — about the size of a spaghetti squash.'),
(27, 27, 'Third trimester begins — baby about the size of a head of cauliflower.'),
(28, 28, 'Baby can blink and may dream — about the size of a large eggplant.'),
(29, 29, 'Muscles and lungs maturing — about the size of a butternut squash.'),
(30, 30, 'Brain growing rapidly — about the size of a large cabbage.'),
(31, 31, 'Baby moves more and can turn its head — about the size of a coconut.'),
(32, 32, 'Toenails form — about the size of a papaya.'),
(33, 33, 'Baby practices breathing movements — about the size of a pineapple.'),
(34, 34, 'Body fills out with fat — about the size of a cantaloupe.'),
(35, 35, 'Hearing is sharper — about the size of a honeydew melon.'),
(36, 36, 'Baby getting ready for birth — about the size of romaine lettuce.'),
(37, 37, 'Early term — baby about the size of swiss chard.'),
(38, 38, 'Baby gaining weight fast — about the size of a mini watermelon.'),
(39, 39, 'Baby could arrive anytime — about the size of a pumpkin.'),
(40, 40, 'Baby is ready for the world — about the size of a watermelon.');

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
(1, 'admin', 'admin@gmail.com', '$2y$10$oZo9BRQQtnQlKGsFPiTisuL9pgawKrjmOftkYrhKNRyNEnzBnlh0y', '2025-10-26', '2025-10-17 00:40:16', 'admin'),
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
(20, 'Manato', 'manato@gmail.com', '$2y$10$3SrWYdStf0hY84b09EQlE.Y0AAGg.zGD8smlGsEEgxEBwYiGENZ8u', '2026-01-01', '2025-10-17 01:12:17', 'user'),
(23, 'mowm', 'mowm@gmail.com', '$2y$10$GIhXCHafNYlltVrGp9.3LuhzdRj8yfH7typfuMSRTZZi4cot3BlvG', '2025-12-12', '2025-10-24 02:22:13', 'user'),
(24, 'hey', 'hey@gmail.com', '$2y$10$bt7wcEBGggXpKb7ewpkqK.6OrZTPsLyPVJMFO3iYrhu3Db0K3UtNi', '2026-07-17', '2025-10-24 03:06:50', 'user'),
(25, 'phea', 'phea@gmail.com', '$2y$10$O2SwQ2KOdtwEpGg.VV1wbe.aZ8RaH1cgiD2Sf/LlDQuf0KaShrcUS', '2026-07-25', '2025-10-25 14:23:28', 'user'),
(26, 'ginodvr_', 'giti.devera.up@phinmaed.com', '$2y$10$cKJRYSQQY1sSNw0cwUoene.XEt495tL6r/fNElZ/0CbsjUYoUtnIK', '2026-08-01', '2025-10-25 14:42:22', 'user');

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
(10, 'Foods Safe to Eat', 'Dairy', 'Eat dairy made from pasteurized milk, thoroughly cooked eggs, and fish high in omega-3 fatty acids.'),
(11, 'Foods Safe to Eat', 'Fiber', 'Include fiber-rich foods like oats, berries, and broccoli.'),
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
-- Indexes for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_journal_user` (`user_id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `week_number` (`week_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wellness_tips`
--
ALTER TABLE `wellness_tips`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journal_entries`
--
ALTER TABLE `journal_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `wellness_tips`
--
ALTER TABLE `wellness_tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD CONSTRAINT `fk_journal_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
