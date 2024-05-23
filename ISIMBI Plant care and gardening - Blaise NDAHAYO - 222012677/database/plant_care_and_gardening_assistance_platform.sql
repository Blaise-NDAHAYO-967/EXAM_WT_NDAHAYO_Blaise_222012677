-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 11:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plant_care_and_gardening_assistance_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `gardener_id` int(11) DEFAULT NULL,
  `appointment_date` datetime NOT NULL,
  `duration_minutes` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `customer_id`, `gardener_id`, `appointment_date`, `duration_minutes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-05-15 00:00:00', 23, '2024-05-30 05:21:00', '2024-05-09 05:21:00'),
(2, 1, 1, '2024-05-01 00:00:00', 19, '2024-05-14 05:22:00', '2024-05-14 05:22:00'),
(3, 1, 1, '2024-05-21 00:00:00', 20, '2024-05-31 18:03:00', '2024-05-24 18:03:00'),
(5, 1, 1, '2024-05-29 00:00:00', 0, '2024-05-30 18:05:00', '2024-05-31 18:05:00'),
(6, 1, 1, '2024-05-21 00:00:00', 34, '2024-05-31 18:08:00', '2024-05-24 18:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `careguides`
--

CREATE TABLE `careguides` (
  `guide_id` int(11) NOT NULL,
  `plant_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `careguides`
--

INSERT INTO `careguides` (`guide_id`, `plant_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '2024-05-31 06:47:00', '2024-05-10 08:48:00'),
(2, 1, 'werty', '2024-09-07 10:13:00', '2024-05-02 19:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`, `phone_number`) VALUES
(1, 'we', 'ttttttttttt@gmail.com', '3456');

-- --------------------------------------------------------

--
-- Table structure for table `gardeners`
--

CREATE TABLE `gardeners` (
  `gardener_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `experience_years` int(11) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `certifications` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gardeners`
--

INSERT INTO `gardeners` (`gardener_id`, `first_name`, `last_name`, `email`, `phone_number`, `experience_years`, `location`, `specialization`, `certifications`) VALUES
(1, 'tttttttttttttttttttttttttttttttttttttttt', 'gh', '0', 'gh', 0, 'gh', 'gh', 'gh');

-- --------------------------------------------------------

--
-- Table structure for table `plantissues`
--

CREATE TABLE `plantissues` (
  `issue_id` int(11) NOT NULL,
  `plant_id` int(11) DEFAULT NULL,
  `issue_type` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `solution` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `plant_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `scientific_name` varchar(100) DEFAULT NULL,
  `plant_type` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`plant_id`, `name`, `scientific_name`, `plant_type`, `description`) VALUES
(1, 'werty', 'dfghj', 'rtyui', 'sdfghjdfgh'),
(2, 'fdgfchg', 'dzdxfc', 'ertyu', 'dzdxfc'),
(3, 'dfghj', 'dfg', 'dfgh', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `planttypes`
--

CREATE TABLE `planttypes` (
  `type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `appointment_id`, `comment`) VALUES
(2, 1, 'gh');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `name`, `description`, `price`) VALUES
(2, 'fgh', '7000.00', 99999999.99),
(3, 'wertyedfdfg', 'wertywertyu', 78000.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'i', 'l', 'l', 'i@gmail.com', '0790100822', '$2y$10$jqggvro/NetQsP.GL5C6f.RoZX9Jcl7H8yc/cIes3KrDzK3ZXj32a', '2024-05-22 05:31:48', '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `gardener_id` (`gardener_id`);

--
-- Indexes for table `careguides`
--
ALTER TABLE `careguides`
  ADD PRIMARY KEY (`guide_id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `gardeners`
--
ALTER TABLE `gardeners`
  ADD PRIMARY KEY (`gardener_id`);

--
-- Indexes for table `plantissues`
--
ALTER TABLE `plantissues`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`plant_id`);

--
-- Indexes for table `planttypes`
--
ALTER TABLE `planttypes`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `careguides`
--
ALTER TABLE `careguides`
  MODIFY `guide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gardeners`
--
ALTER TABLE `gardeners`
  MODIFY `gardener_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plantissues`
--
ALTER TABLE `plantissues`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `planttypes`
--
ALTER TABLE `planttypes`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`gardener_id`) REFERENCES `gardeners` (`gardener_id`);

--
-- Constraints for table `careguides`
--
ALTER TABLE `careguides`
  ADD CONSTRAINT `careguides_ibfk_1` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`plant_id`);

--
-- Constraints for table `plantissues`
--
ALTER TABLE `plantissues`
  ADD CONSTRAINT `plantissues_ibfk_1` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`plant_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
