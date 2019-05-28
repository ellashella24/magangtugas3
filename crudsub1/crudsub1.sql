-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2019 at 01:44 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudsub1`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_05_27_013948_table_transaction', 1),
(2, '2019_05_27_014239_table_user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `invoice_code` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `service_expired` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invoice_total` decimal(12,2) NOT NULL,
  `payment_tax` decimal(12,2) NOT NULL,
  `surcharge` decimal(12,2) NOT NULL,
  `payment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `invoice_code`, `customer_id`, `service_id`, `service_start`, `service_expired`, `invoice_total`, `payment_tax`, `surcharge`, `payment_time`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'T1', 1, 1, '2019-05-27 03:48:41', '2019-05-27 03:48:41', '100000.00', '10000.00', '1000.00', '2019-05-27 03:48:41', 0, '2019-05-27 03:48:41', '2019-05-27 03:48:41'),
(2, 'T2', 2, 2, '2019-05-27 03:53:30', '2019-05-27 03:53:30', '200000.00', '20000.00', '2000.00', '2019-05-27 03:53:30', 0, '2019-05-27 03:53:30', '2019-05-27 03:53:30'),
(3, 'T3', 3, 6, '2019-05-27 03:54:00', '2019-05-27 03:54:00', '600000.00', '60000.00', '6000.00', '2019-05-27 03:54:00', 0, '2019-05-27 03:54:00', '2019-05-27 03:59:15'),
(4, 'T4', 4, 4, '2019-05-27 03:54:25', '2019-05-27 03:54:25', '400000.00', '40000.00', '4000.00', '2019-05-27 03:54:25', 0, '2019-05-27 03:54:25', '2019-05-27 03:54:25'),
(5, 'T5', 5, 5, '2019-05-27 03:54:58', '2019-05-27 03:54:58', '500000.00', '50000.00', '5000.00', '2019-05-27 03:54:58', 0, '2019-05-27 03:54:58', '2019-05-27 03:54:58'),
(6, 'T6', 6, 6, '2019-05-28 07:06:23', '2019-05-28 07:06:23', '600000.00', '60000.00', '6000.00', '2019-05-28 07:06:23', 1, '2019-05-28 07:06:23', '2019-05-28 07:06:23'),
(7, 'T10', 7, 7, '2019-05-28 07:06:59', '2019-05-28 07:06:59', '1000000.00', '100000.00', '10000.00', '2019-05-28 07:06:59', 1, '2019-05-28 07:06:59', '2019-05-28 07:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `customer_id` int(11) NOT NULL,
  `customer_code` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_postalcode` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `service_expired` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`customer_id`, `customer_code`, `customer_name`, `customer_address`, `customer_district`, `customer_city`, `customer_province`, `customer_postalcode`, `customer_email`, `customer_password`, `service_start`, `service_expired`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '1Z', 'ha', 'hi', 'hu', 'kuyi', 'ba', '78787', 'oy@kuycoba.com', 'ba123', '2019-05-27 03:04:39', '2019-05-27 03:04:39', 1, '2019-05-27 03:04:39', '2019-05-28 02:35:23'),
(2, '2B', 'Dita', 'Bantaran V No. 17', 'Tulusrejo', 'Malang', 'Jawa Timur', '65141', 'dita@bantaran5.com', '123', '2019-05-27 03:14:56', '2019-05-27 03:14:56', 1, '2019-05-27 03:14:56', '2019-05-27 03:22:51'),
(3, '3C', 'Mia', 'Kebon Jeruk V No. 16', 'Tulusrejo', 'Malang', 'Jawa Timur', '65141', 'mia@kebonjeruk5.com', '123', '2019-05-27 03:16:05', '2019-05-27 03:16:05', 1, '2019-05-27 03:16:05', '2019-05-27 03:24:19'),
(4, '4D', 'Tama', 'Bantaran 1 No. 1', 'Tulusrejo', 'Malang', 'Jawa Timur', '65141', 'tama@bantaran1.com', '123', '2019-05-27 03:17:59', '2019-05-27 03:17:59', 1, '2019-05-27 03:17:59', '2019-05-27 03:17:59'),
(5, '5D', 'Lala', 'Bantaran Indah', 'Tulusrejo', 'Malang', 'Jawa Timur', '65141', 'lala@bantaranindah.com', '123', '2019-05-27 03:20:47', '2019-05-27 03:20:47', 1, '2019-05-27 03:20:47', '2019-05-27 03:20:47'),
(18, '7G', 'Coba', 'Buring', 'Buring', 'Malang', 'Jawa Timur', '65136', 'coba@buring.com', '123', '2019-05-27 12:00:46', '2019-05-27 12:00:46', 1, '2019-05-27 12:00:46', '2019-05-27 12:00:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
