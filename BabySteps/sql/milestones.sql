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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `week_number` (`week_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
