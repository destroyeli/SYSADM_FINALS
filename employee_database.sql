-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2026 at 06:11 AM
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
-- Database: `employee_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$xZ09mI2uVGw3bBtCG6cUiejU5RUReED41Yvv6W4TFa2PL9IQmaCOa');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_plain` varchar(100) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `email`, `password_plain`, `password_hash`, `phone_number`) VALUES
(1, 'Sky Macaspac', 'sky.macaspac@fun.com', 'Sky@2025Work', 'Sky@2025Work', '0917 482 1056'),
(2, 'David Credo', 'david.credo@fun.com', 'David#2025IT', 'David#2025IT', '0905 663 9182'),
(3, 'Angelito Regero', 'angelito.regero@fun.com', 'Angelito@2025', 'Angelito@2025', '0927 540 7731'),
(4, 'Nolan Casuga', 'nolan.casuga@fun.com', 'Nolan#Work25', 'Nolan#Work25', '0998 214 6650'),
(5, 'Vaughn Caringal', 'vaughn.caringal@fun.com', 'Vaughn@Desk25', 'Vaughn@Desk25', '0919 780 4421'),
(6, 'Anthony Genciana', 'anthony.genciana@fun.com', 'Anthony#IT25', 'Anthony#IT25', '0947 331 2098'),
(7, 'Crishia Guansing', 'crishia.guansing@fun.com', 'Crishia@Work25', 'Crishia@Work25', '0917 550 3846'),
(8, 'Angel Fabregas', 'angel.fabregas@fun.com', 'Angel#Office25', 'Angel#Office25', '0908 771 6603'),
(9, 'Andrie Detera', 'andrie.detera@fun.com', 'Andrie@Work25', 'Andrie@Work25', '0936 418 9027'),
(10, 'Peach Ranola', 'peach.ranola@fun.com', 'Peach#Desk25', 'Peach#Desk25', '0995 602 1184');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
