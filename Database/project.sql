-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2026 at 05:53 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_id` text NOT NULL,
  `admin_name` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `admin_name`, `password`, `email`, `mobile`) VALUES
(1, 'raj@123', 'Raj', '$2y$10$iRn5Z4hKbMIHePscj3IEDuTWAQPktjZxkms6AMbrqbEIxnh3AM6NW', 'raj@gmail.com', '1234567890'),
(4, 'admin@123', 'admin', '$2y$10$DlCMEZMADiRMLHU8hVRXL.WA0jUz.MeIyVAGbOsZR9EM8IgyCcFcq', 'admin@gmail.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(11) NOT NULL,
  `member_id` text NOT NULL,
  `document` varchar(255) DEFAULT 'NULL',
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `member_id`, `document`, `status`) VALUES
(1, 'user', 'user_Document', 'approved'),
(2, 'user1', 'NULL', 'pending'),
(4, 'user3', 'NULL', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `member_id` text NOT NULL,
  `level_no` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `member_id`, `level_no`) VALUES
(1, 'user', 3),
(2, 'user1', 3),
(4, 'user3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `member_id` text NOT NULL,
  `member_name` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `point` int(11) NOT NULL,
  `sponsor_id` varchar(20) DEFAULT 'NULL',
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `member_id`, `member_name`, `password`, `email`, `mobile`, `point`, `sponsor_id`, `status`) VALUES
(1, 'user', 'user', '$2y$10$LsQDNBqGzUNgTIBjfaSXh.xfbJ.Le8Ztsv2FFBcYnhN2VW79AvOHe', 'user@gmail.com', '1234567890', 0, 'NULL', 'active'),
(2, 'user1', 'user1', '$2y$10$n8pLRHsq/eE3Dqp/WtTrI.GnlkMzBhiNsXPwZM3Am9pADtL6WuhNe', 'user1@gmail.com', '1122334455', 0, 'user', 'active'),
(4, 'user3', 'user3', '$2y$10$A8ryWGzHzESAW8De/iJBJ.YFd.o63Dc9/Z/FsE3QpsaBSswdag14.', 'user3@gmail.com', '0987667890', 0, 'user', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `reward_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `price`, `reward_points`) VALUES
(1, 'Silver', 200.00, 100),
(2, 'Gold', 500.00, 250),
(3, 'Platinum', 1000.00, 500),
(4, 'Heroic', 1500.00, 750);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `description`, `product_image`) VALUES
(1, 'Herbal Wellness Supplement', 1299, 'A natural herbal formula that boosts immunity, improves digestion, and supports overall wellness. Made with powerful Ayurvedic ingredients.', '1_Herbal Immunity Capsules.jpg'),
(2, 'Protein Nutrition Powder', 2199, 'High-quality protein powder for muscle growth, recovery, and daily energy. Suitable for men and women.', '2_Protein Nutrition Powder.webp'),
(3, 'Aloe Vera Skin Care Gel', 100, 'Soothes skin, reduces dryness, and provides natural glow. Suitable for face and body.', '3_Aloe Vera Skin Care Gel.webp'),
(4, 'Herbal Hair Growth Oil', 499, 'Reduces hair fall and promotes strong hair.', '4_Herbal Hair Growth Oil.webp'),
(5, 'Vitamin C Tablets', 699, 'Improves immunity and supports skin health.', '5_Vitamin C Tablets.webp'),
(6, 'Omega 3 Fish Oil Capsules', 1199, 'Supports heart, brain, and joint health.', '6_Omega 3 Fish Oil Capsules.jpg'),
(7, 'Herbal Face Wash', 249, 'Deep cleanses skin and removes impurities.', '7_Herbal Face Wash.jpg'),
(8, 'Herbal Pain Relief Balm', 199, 'Quick relief from body pain and muscle stiffness.', '8_Herbal Pain Relief Balm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products_purchases`
--

CREATE TABLE `products_purchases` (
  `id` int(11) NOT NULL,
  `member_id` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `date_and_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products_purchases`
--

INSERT INTO `products_purchases` (`id`, `member_id`, `product_id`, `price`, `date_and_time`) VALUES
(1, 'user', 3, 100, '2026-02-09 22:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `member_id` text NOT NULL,
  `package_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `upi_id` text NOT NULL,
  `date_and_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `member_id`, `package_id`, `amount`, `status`, `upi_id`, `date_and_time`) VALUES
(6, 'user', 1, 200.00, 'approved', 'user@upi', '2026-02-07 11:50:47'),
(7, 'user', 3, 1000.00, 'pending', 'user@upi', '2026-02-09 21:14:30'),
(8, 'user', 4, 1500.00, 'pending', 'user@upi', '2026-02-09 21:14:36'),
(9, 'user', 1, 200.00, 'pending', 'user@upi', '2026-02-09 21:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `member_id` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` enum('credit','debit') NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `member_id`, `amount`, `type`, `description`) VALUES
(6, 'user', 10.00, 'credit', 'point withdraw'),
(7, 'user', 100.00, 'credit', 'point withdraw'),
(8, 'user', 100.00, 'debit', 'Product Purchase');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `member_id` text NOT NULL,
  `point` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `member_id`, `point`, `amount`, `status`) VALUES
(9, 'user', 10, 10.00, 'approved'),
(10, 'user', 100, 100.00, 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`) USING HASH;

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_id` (`member_id`) USING HASH;

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_id` (`member_id`) USING HASH;

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`),
  ADD UNIQUE KEY `package_name` (`package_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_purchases`
--
ALTER TABLE `products_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_purchases`
--
ALTER TABLE `products_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `fk_level` FOREIGN KEY (`id`) REFERENCES `member` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
