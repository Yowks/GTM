-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2019 at 04:30 PM
-- Server version: 10.1.38-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `GTMLast`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number_staff` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `actif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `first_name`, `email`, `number_staff`, `password`, `actif`) VALUES
(1, 'polo', 'polo', 'polo@gmail.com', '1', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(9) NOT NULL,
  `id_order` varchar(255) NOT NULL,
  `id_equipment` varchar(255) NOT NULL,
  `id_user` int(9) NOT NULL,
  `reason_booking` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `user_level` int(1) NOT NULL,
  `priority` tinyint(1) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date_reservation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `id_order`, `id_equipment`, `id_user`, `reason_booking`, `state`, `user_level`, `priority`, `start_date`, `end_date`, `date_reservation`, `status`) VALUES
(47, '155550893678', '5', 78, 'projet école', 1, 2, 2, '2019-04-17', '2019-04-18', '2019-04-18 16:29:41', 1),
(48, '155552007378', '3', 78, 'retour', 1, 2, 2, '2019-04-17', '2019-04-18', '2019-04-17 18:54:33', 1),
(49, '155559622578', '2', 78, 'dsdsdsd', 1, 2, 2, '2019-04-18', '2019-04-19', '2019-04-18 16:03:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opinion`
--

CREATE TABLE `opinion` (
  `id` int(9) NOT NULL,
  `id_user` int(9) NOT NULL,
  `notice_note` int(1) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `material_state` int(1) NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `reference`, `material_state`, `comment`) VALUES
(1, 'camera 1', '0001', 1, 'Caméra n°1 sony md504'),
(2, 'citroen 2', '0002', 2, 'camera n°2 panasonic xz700'),
(3, 'Caméra 3', '0003', 2, 'Caméra Samsung 8985UT2'),
(4, 'Caméra 5', '0005', 1, 'GoPro model 78-58fr'),
(5, 'renault', '0004', 1, 'strtert');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(1) NOT NULL DEFAULT '1',
  `actif` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `email`, `phone`, `student_number`, `password`, `user_level`, `actif`) VALUES
(78, 'Drogba', 'Didier', 'drogba@gmail.com', '0494688585', '12456875fdf', '$2y$10$e7BtBLAzCB/uUgrjuYb9IeymgbR0Dc.9r7PItPDtbJTu9gKdddX12', 2, 1),
(80, 'Waddle', 'Chris', 'waddle@gmail.com', '0494878985', '12345687sd', '$2y$10$rteXLplgSlwiudbPqc/kMup95HXPnqSjU.zj5Wssj/UYs9/GZxNGm', 1, 1),
(85, 'mikha', 'zinedine', 'zinedine@gmail.com', '0494688775', '1234567esr', '$2y$10$p6Lt1yyE4d.FcyrzUuLDVud//38fTyPFffTMCbDGiDnemtSIfBtA2', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `student_number` (`student_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `opinion`
--
ALTER TABLE `opinion`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
