-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 17, 2024 at 11:52 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailwebs_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Gowtham', 'gowtham@gmail.com', '$2y$10$Zspp6UYM9vQRR7qzsfzQhOlC0zO/4FdPhUbFBuqkG8i1F4S4DaE6q', '2024-10-15 01:49:18', '2024-10-15 19:19:18'),
(2, 'Test', 'test@gmail.com', '$2y$10$0STSa5n4mFHeP6niuw4hueJaMbjtMQQpZXIec.P2CZjxu/Rm4KUNW', '2024-10-16 02:44:48', '2024-10-16 20:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `mark` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `subject`, `mark`, `created_at`, `updated_at`) VALUES
(1, 'Gowtham', 'Computer Science', 96, '2024-10-16 06:58:11', '2024-10-16 12:28:11'),
(3, 'Raj', 'Tamil', 93, '2024-10-16 11:44:03', '2024-10-16 17:14:03'),
(4, 'Raj', 'English', 92, '2024-10-16 11:44:16', '2024-10-16 17:14:16'),
(5, 'Test 1', 'Tamil', 80, '2024-10-16 02:01:41', '2024-10-16 19:31:41'),
(6, 'Test 2', 'Maths', 40, '2024-10-16 02:02:01', '2024-10-16 19:32:01'),
(7, 'Test 3', 'Social Science', 78, '2024-10-16 02:46:00', '2024-10-16 20:16:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
