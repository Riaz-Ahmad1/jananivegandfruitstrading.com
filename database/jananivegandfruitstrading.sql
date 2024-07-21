-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 01:35 AM
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
-- Database: `jananivegandfruitstrading`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '123', '2022-08-05 13:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_requests`
--

CREATE TABLE `applicant_requests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `moving_from` varchar(255) NOT NULL,
  `moving_to` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `seen` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_requests`
--

INSERT INTO `applicant_requests` (`id`, `name`, `email`, `phone`, `moving_from`, `moving_to`, `date`, `details`, `created_at`, `status`, `seen`) VALUES
(4, 'rizwan', 'rizwan@gmail.com', '111111111111', 'dubia', 'sharjah', '2022-08-11', 'i have to shift my office ', '2022-08-10 18:08:44', 0, 0),
(5, 'asif', 'muhammadasif1406@gmail.com', '971859304690', 'dubai', 'alain', '2022-10-15', 'jghghgvg hgvghvgh', '2022-08-13 14:45:53', 0, 0),
(6, 'asif', 'muhammadasif1406@gmail.com', '971859304690', 'dubai', 'alain', '2022-10-15', 'jghghgvg hgvghvgh', '2022-08-13 14:45:53', 0, 0),
(7, 'M.babu', 'babumukkera04@gmail.com', '799328510001', '', '', '2022-09-19', '', '2022-09-19 04:53:57', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `callreq`
--

CREATE TABLE `callreq` (
  `id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `callreq`
--

INSERT INTO `callreq` (`id`, `phone`, `created_at`, `status`) VALUES
(9, 'riaz@gmail.com', '2024-07-21 22:07:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `mobile1` varchar(100) NOT NULL,
  `mobile2` varchar(100) NOT NULL,
  `map` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `mobile1`, `mobile2`, `map`, `email`) VALUES
(6, '+971589238954', '+9715549914515', 'Near Eid Gah Musallah, Al Baraha, Deira Dubai - UAE', 'mdtourismllc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `gallary`
--

CREATE TABLE `gallary` (
  `id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallary`
--

INSERT INTO `gallary` (`id`, `pic`, `created_at`) VALUES
(7, 'i1.jpeg', '2023-12-18 20:01:23'),
(8, 'i12.jpg', '2023-12-18 20:01:33'),
(9, 'pexels-å…‰æ›¦-åˆ˜-10658203.jpg', '2023-12-21 11:01:34'),
(10, 'Private-Helicopter-in-Dubai-1-min.jpg', '2023-12-21 11:02:26'),
(12, 'Safari-in-Dubai-with-BBQ-dinner-1200x900-min.jpg', '2023-12-21 11:04:58'),
(13, 'e2.jpg', '2023-12-21 11:07:47'),
(14, '02 (2).jpg', '2023-12-21 11:09:45'),
(15, '1 (1)-min.jpg', '2023-12-21 11:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `seen` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `msg`, `created_at`, `status`, `seen`) VALUES
(12, 'riaz ahmad', 'test@gmail.com', 'subject', 'hello word', '2024-07-21 22:25:08', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `simage` varchar(255) NOT NULL,
  `scateg` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `sname`, `simage`, `scateg`, `price`, `created_at`) VALUES
(6, 'Grapes', 'best-product-5.jpg', 'Fruit', '12', '2024-07-21 19:57:45'),
(7, 'Orange', 'fruite-item-1.jpg', 'Fruit', '52', '2024-07-21 20:08:56'),
(8, 'Banana', 'best-product-3.jpg', 'Fruit', '23', '2024-07-21 23:18:42'),
(9, 'Red Grapes', 'best-product-2.jpg', 'Fruit', '12', '2024-07-21 23:19:10'),
(10, 'Aroo', 'best-product-4.jpg', 'Fruit', '12', '2024-07-21 23:19:34'),
(11, 'Gobhii', 'featur-3.jpg', 'Vegetable', '23', '2024-07-21 23:19:58'),
(12, 'Potatos', 'vegetable-item-5.jpg', 'Vegetable', '12', '2024-07-21 23:20:32'),
(13, 'Green Dhanya', 'vegetable-item-6.jpg', 'Vegetable', '23', '2024-07-21 23:20:55'),
(14, 'Tamotos', 'vegetable-item-1.jpg', 'Vegetable', '23', '2024-07-21 23:21:27'),
(15, 'Apple', 'fruite-item-6.jpg', 'Fruit', '12', '2024-07-21 23:21:49'),
(16, 'Staborry', 'featur-2.jpg', 'Fruit', '12', '2024-07-21 23:22:10'),
(17, 'bundle of fruits', 'hero-img-1.png', 'Fruit', '100', '2024-07-21 23:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `picture`, `designation`, `created_at`) VALUES
(9, 'riaz ahmad', 'WhatsApp Image 2024-05-15 at 7.09.49 PM (2).jpeg', 'web deveoperd', '2024-07-13 03:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `pic`, `comment`, `profession`, `created_at`) VALUES
(4, 'Muhammad Muzamil', 'testimonial-1.jpg', '                                                                                                100% quality with home delivery service , very cooperative and experienced staff as well very good communication. i would highly recommend.                    ', 'Business', '2024-07-13 19:21:34'),
(5, 'Riaz Ahmad', 'website php laravel admin panel business professional.jpg', '                                                100% quality with home delivery service , very cooperative and experienced staff as well very good communication. i would highly recommend.                                  ', 'Software Engr', '2024-07-21 21:56:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_requests`
--
ALTER TABLE `applicant_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `callreq`
--
ALTER TABLE `callreq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicant_requests`
--
ALTER TABLE `applicant_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `callreq`
--
ALTER TABLE `callreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
