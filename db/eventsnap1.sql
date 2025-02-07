-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 08:55 PM
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
-- Database: `eventsnap1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'vanessabedano', '$2y$10$4ygkAAri1pRoBlMnqhbc..IH6qvtPyb3GVdZOvWnEElPfS8tG84B2', '2025-02-05 19:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `photoshoot_date` date NOT NULL,
  `preferred_time` time NOT NULL,
  `photoshoot_type` varchar(255) NOT NULL,
  `photoshoot_package` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dream_photoshoot` text DEFAULT NULL,
  `services` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `booking_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `photoshoot_date`, `preferred_time`, `photoshoot_type`, `photoshoot_package`, `first_name`, `last_name`, `email`, `phone`, `address`, `dream_photoshoot`, `services`, `price`, `booking_time`, `user_id`) VALUES
(1, '2025-02-08', '15:00:00', 'debut', 35, 'Vanessa Anne', 'Bedano', 'vanessabedano@gmail.com', '09123456789', 'ABC 123 MANILA PH', 'SHEMENESHESHE', 'photographers,aerial', 53000.00, '2025-02-05 19:12:24', 1),
(2, '2025-02-09', '10:00:00', 'wedding', 50, 'Anne', 'Bedano', 'vanessabedano@gmail.com', '09123456789', 'ABC 123 MANILA PH', 'abc 123 yow hey', 'eventbooth', 36500.00, '2025-02-05 19:19:58', 1),
(3, '2025-02-20', '06:19:00', 'wedding', 46, 'Vince', 'bedano', 'vincebedano@gmail.com', '09123456789', 'ABC 123 MANILA DUN SA MALAPIT PH', 'Good photoshoot', 'photographers,videographers,usb,aerial,slideshow,eventbooth', 17200.00, '2025-02-05 19:38:05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `source` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `full_name`, `company_name`, `email`, `phone`, `source`, `subject`, `message`, `created_at`) VALUES
(1, 'Vanessa Anne Bedano', 'ABC Corporation', 'vanessabedano@gmail.com', '09123456789', 'Website', 'HELLO', 'HELLO HI HELLO', '2025-02-05 19:06:18'),
(2, 'Vanessa Anne Bedano', 'ABC Corporation', 'vanessabedano@gmail.com', '09123456789', 'Referral', 'HELLO', 'TESTING HELLO', '2025-02-05 19:08:56'),
(3, 'Vince Bedano', '', 'vincebedano@gmail.com', '09123456789', 'Other', 'Quotation for wedding', 'Hi, send me a full quotation for wedding with-', '2025-02-05 19:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_replies`
--

CREATE TABLE `inquiry_replies` (
  `id` int(11) NOT NULL,
  `inquiry_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `reply_message` text NOT NULL,
  `replied_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry_replies`
--

INSERT INTO `inquiry_replies` (`id`, `inquiry_id`, `admin_id`, `reply_message`, `replied_at`) VALUES
(1, 2, 1, 'HI HELLO TOO', '2025-02-05 19:15:50'),
(2, 2, 1, 'HMMMMM\r\n', '2025-02-05 19:16:01'),
(3, 1, 1, 'OKAY THANKS', '2025-02-05 19:16:07'),
(4, 3, 1, 'please rely on the packages tab', '2025-02-05 19:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id` int(11) NOT NULL,
  `photoshoot_type` varchar(255) NOT NULL,
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`id`, `photoshoot_type`, `package_id`, `package_name`, `price`) VALUES
(1, 'corp', 1, 'Package 1', 5000.00),
(2, 'corp', 2, 'Package 2', 10000.00),
(3, 'corp', 3, 'Package 3', 20000.00),
(4, 'corp', 4, 'Package 4', 30000.00),
(5, 'corp', 5, 'Package 5', 35000.00),
(6, 'corp', 6, 'Package 6', 45000.00),
(7, 'kiddie', 7, 'Package 7', 3000.00),
(8, 'kiddie', 8, 'Package 8', 5000.00),
(9, 'kiddie', 9, 'Package 9', 8000.00),
(10, 'kiddie', 10, 'Package 10', 12000.00),
(11, 'kiddie', 11, 'Package 11', 14000.00),
(12, 'kiddie', 12, 'Package 12', 17000.00),
(13, 'baptism', 13, 'Package 13', 3000.00),
(14, 'baptism', 14, 'Package 14', 5000.00),
(15, 'baptism', 15, 'Package 15', 8000.00),
(16, 'baptism', 16, 'Package 16', 12000.00),
(17, 'baptism', 17, 'Package 17', 14000.00),
(18, 'baptism', 18, 'Package 18', 17000.00),
(19, 'adult', 19, 'Package 19', 5000.00),
(20, 'adult', 20, 'Package 20', 10000.00),
(21, 'adult', 21, 'Package 21', 15000.00),
(22, 'adult', 22, 'Package 22', 25000.00),
(23, 'adult', 23, 'Package 23', 30000.00),
(24, 'adult', 24, 'Package 24', 35000.00),
(25, 'adult', 25, 'Package 25', 45000.00),
(26, 'adult', 26, 'Package 26', 50000.00),
(27, 'adult', 27, 'Package 27', 55000.00),
(28, 'debut', 28, 'Package 28', 5000.00),
(29, 'debut', 29, 'Package 29', 10000.00),
(30, 'debut', 30, 'Package 30', 15000.00),
(31, 'debut', 31, 'Package 31', 25000.00),
(32, 'debut', 32, 'Package 32', 30000.00),
(33, 'debut', 33, 'Package 33', 35000.00),
(34, 'debut', 34, 'Package 34', 45000.00),
(35, 'debut', 35, 'Package 35', 50000.00),
(36, 'debut', 36, 'Package 36', 55000.00),
(37, 'civil', 37, 'Package 37', 5000.00),
(38, 'civil', 38, 'Package 38', 10000.00),
(39, 'civil', 39, 'Package 39', 15000.00),
(40, 'civil', 40, 'Package 40', 25000.00),
(41, 'civil', 41, 'Package 41', 30000.00),
(42, 'civil', 42, 'Package 42', 35000.00),
(43, 'civil', 43, 'Package 43', 45000.00),
(44, 'civil', 44, 'Package 44', 50000.00),
(45, 'civil', 45, 'Package 45', 55000.00),
(46, 'wedding', 46, 'Basic A', 500.00),
(47, 'wedding', 47, 'Basic B', 800.00),
(48, 'wedding', 48, 'Basic C', 1200.00),
(49, 'wedding', 49, 'Classic A', 500.00),
(50, 'wedding', 50, 'Classic B', 800.00),
(51, 'wedding', 51, 'Classic C', 1200.00),
(52, 'wedding', 52, 'Standard A', 500.00),
(53, 'wedding', 53, 'Standard B', 800.00),
(54, 'wedding', 54, 'Standard C', 1200.00),
(55, 'wedding', 55, 'Premium A', 500.00),
(56, 'wedding', 56, 'Premium B', 800.00),
(57, 'wedding', 57, 'Premium C', 1200.00);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `status` enum('pending','accepted','declined') DEFAULT 'pending',
  `decline_reason` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `user_id`, `booking_id`, `status`, `decline_reason`, `created_at`) VALUES
(1, 1, 1, 'declined', 'NO! AYOKO!', '2025-02-05 19:12:24'),
(2, 1, 2, 'accepted', 'SIGE NA NGA!', '2025-02-05 19:19:58'),
(3, 2, 3, 'declined', 'Madami masyado', '2025-02-05 19:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'vanessabedano@gmail.com', '$2y$10$SCETxVno/cK3tH.cZiAZAeMb7mReoipB83vSChR6aiNKsSS.WJTQa', '2025-02-05 19:08:14'),
(2, 'vincebedano@gmail.com', '$2y$10$84ApBKNjaNYXaMrAjJN2Ie0bUB4mK3LZa0Rr4vm8K99Cpp4sYeUH2', '2025-02-05 19:34:52');

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
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry_replies`
--
ALTER TABLE `inquiry_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiry_id` (`inquiry_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inquiry_replies`
--
ALTER TABLE `inquiry_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `inquiry_replies`
--
ALTER TABLE `inquiry_replies`
  ADD CONSTRAINT `inquiry_replies_ibfk_1` FOREIGN KEY (`inquiry_id`) REFERENCES `inquiries` (`id`),
  ADD CONSTRAINT `inquiry_replies_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `status_ibfk_2` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
